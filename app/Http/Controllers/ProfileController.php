<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Menampilkan profil pengguna
    public function index()
    {
        $user = Auth::user();  // Mendapatkan data pengguna yang sedang login
        return view('profile.yourprofile', compact('user'));
    }

    // Menampilkan form edit profil
    public function edit()
    {
        $user = Auth::user();  // Mendapatkan data pengguna yang sedang login
        return view('profile.edit', compact('user'));
    }

    // Mengupdate profil pengguna
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'bio' => 'nullable|string|max:1000',
            'password' => 'nullable|string|min:8|confirmed',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validasi gambar
        ]);

        // Mendapatkan pengguna yang sedang login
        $user = Auth::user();

        // Mengupdate data pengguna
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->bio = $request->input('bio');

        // Jika password diisi, update password
        if ($request->has('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Jika ada gambar profil baru
        if ($request->hasFile('profile_picture')) {
            // Menghapus foto profil lama jika ada
            if ($user->profile_picture) {
                Storage::delete('public/profile_pictures/' . $user->profile_picture);
            }

            // Menyimpan foto profil baru
            $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = basename($imagePath);  // Simpan nama file gambar
        }

        // Simpan perubahan
        $user->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('profile.view')->with('success', 'Profile updated successfully!');
    }
}
