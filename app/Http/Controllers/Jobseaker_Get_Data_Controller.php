<?php
namespace App\Http\Controllers;

use App\Models\Jobseaker_GetData;
use Illuminate\Http\Request;

class jobseaker_Get_Data_Controller extends Controller
{
    public function index()
    {
        $jobseakers = Jobseaker_GetData::all();
        return view('homepage.jobseaker_main', compact('jobseakers'));
    }

    public function show($id)
    {
        $jobseaker = Jobseaker_GetData::findOrFail($id); // Ensure jobseaker_GetData is your model
        return view('halaman_jobseaker.show', compact('jobseaker'));
    }
}
