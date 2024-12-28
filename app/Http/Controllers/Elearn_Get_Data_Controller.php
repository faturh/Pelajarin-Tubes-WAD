<?php
namespace App\Http\Controllers;

use App\Models\Elearn_GetData;
use Illuminate\Http\Request;

class Elearn_Get_Data_Controller extends Controller
{
    public function index()
    {
        $elearns = Elearn_GetData::all();
        return view('homepage.elearn_main', compact('elearns'));
    }

    public function show($id)
    {
        $elearn = Elearn_GetData::findOrFail($id); // Ensure Elearn_GetData is your model
        return view('halaman_elearn.show', compact('elearn'));
    }
}
