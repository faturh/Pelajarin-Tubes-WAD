<?php
namespace App\Http\Controllers;

use App\Models\Jobseaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


class JobseakerController extends Controller
{
    // List all Jobseaker resources
    public function index()
    {
        $jobseaker = Jobseaker::all();
        return view('admin.jobseaker.index', compact('jobseaker'));
    }

    public function create()
    {
        return view('admin.jobseaker.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateJobseaker($request);

        $imagePath = $request->hasFile('Image') 
            ? $request->file('Image')->store('jobseaker', 'public') 
            : null;

        Jobseaker::create(array_merge($validated, ['Image' => $imagePath]));

        return redirect()->route('admin.jobseaker.index')->with('success', 'E-Learning created successfully.');
    }

    public function edit($id)
    {
        // Mencari E-Learning berdasarkan ID
        $jobseaker = Jobseaker::findOrFail($id);  // pastikan menggunakan primary key yang benar
    
        // Mengirimkan variabel ke view
        return view('admin.jobseaker.edit', compact('jobseaker'));  // atau ['Jobseaker' => $Jobseaker]
    }
    
    
    

    public function update(Request $request, $id)
    {
        $Jobseaker = Jobseaker::findOrFail($id); // Pastikan menggunakan primary key JobseakerId
        $data = $request->only(['Title', 'Link', 'Publisher', 'Description', 'ended_at']);
    
        if ($request->hasFile('Image')) {
            $data['Image'] = $request->file('Image')->store('jobseaker_images', 'public');
        }
    
        $Jobseaker->update($data);
        return redirect()->route('admin.jobseaker.index')->with('success', 'Jobseaker updated successfully.');
    }
    
    

    public function destroy($id)
    {
        $Jobseaker = Jobseaker::findOrFail($id); // Pastikan menggunakan JobseakerId
        $Jobseaker->delete();
        return redirect()->route('admin.jobseaker.index')->with('success', 'Jobseaker deleted successfully.');
    }

    
    protected function validateJobseaker(Request $request)
    {
        return $request->validate([
            'Title' => 'required|string|max:255',
            'Link' => 'required|url',
            'Publisher' => 'required|string|max:255',
            'Description' => 'nullable|string',
            'ended_at' => 'nullable|date',
            'Image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    }
}
