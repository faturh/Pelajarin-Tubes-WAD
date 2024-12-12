<?php
namespace App\Http\Controllers;

use App\Models\Elearn_GetData;
use Illuminate\Http\Request;

class Elearn_Get_Data_Controller extends Controller
{
    public function index()
    {
        $elearns = Elearn_GetData::all();
        return view('elearn_main', compact('elearns'));
    }
}
