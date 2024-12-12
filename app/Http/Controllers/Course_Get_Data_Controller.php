<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course_GetData;

class Course_Get_Data_Controller extends Controller
{
    public function index()
    {
        $courses = Course_GetData::all(); // Mengambil semua data dari tabel courses_getdata
        return view('main', compact('courses'));
    }
}
