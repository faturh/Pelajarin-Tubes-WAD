<?php

use Illuminate\Support\Facades\Route;   
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\JobseakerController;
use App\Http\Controllers\ElearnController;
use App\Http\Controllers\Course_Get_Data_Controller;
use App\Http\Controllers\Elearn_Get_Data_Controller;
use App\Http\Controllers\Jobseaker_Get_Data_Controller;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\ProfileController;

// Halaman Login Utama
Route::get('/', function () {
    return redirect('/login'); // Redirect langsung ke login
});

// Halaman Login
Route::get('/login', function () {
    return view('akses_Awal.login');
})->name('login');

// Proses Login
Route::post('/login', function (Illuminate\Http\Request $request) {
    $credentials = $request->only('email', 'password');
    $user = User::where('email', $credentials['email'])->first();

    if (!$user || !Hash::check($credentials['password'], $user->password)) {
        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    Auth::attempt($credentials);

    // Redirect berdasarkan role
    if ($user->role === 'admin') {
        return redirect('/admin/courses');
    }

    return redirect('/main');
});

// Rute Logout
Route::post('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken(); // CSRF token regeneration
    return redirect('/login')->with('message', 'Kamu berhasil LogOut.');
})->name('logout');


// Halaman Tidak Berizin
Route::get('/unauthorized', function () {
    return response('Unauthorized', 403);
});

// Rute untuk Admin

Route::middleware(['auth', CheckRole::class . ':admin'])->prefix('admin')->name('admin.')->group(function () {
    // Resource route untuk courses
    Route::resource('courses', CourseController::class);
    Route::resource('elearning', ElearnController::class);
    Route::resource('jobseaker', JobseakerController::class);
    Route::resource('sertifikat', JobseakerController::class);
});


// Rute untuk User
Route::middleware(['auth', CheckRole::class . ':user'])->group(function () {
    Route::get('/main', [Course_Get_Data_Controller::class, 'index'])->name('main');
    
    // elearn user
    Route::get('/elearn', [Elearn_Get_Data_Controller::class, 'index'])->name('elearn_main');
    Route::get('/elearn/{id}', [Elearn_Get_Data_Controller::class, 'show'])->name('halaman_elearn');
    // jobseaker user
    Route::get('/jobseaker', [Jobseaker_Get_Data_Controller::class, 'index'])->name('jobseaker_main');
    Route::get('/Jobseaker/{id}', [Jobseaker_Get_Data_Controller::class, 'show'])->name('halaman_jobseaker');


});

// Rute Pendaftaran
Route::get('/register', [RegisterController::class, 'showRegisterForm']);
Route::post('/register', [RegisterController::class, 'register']);
