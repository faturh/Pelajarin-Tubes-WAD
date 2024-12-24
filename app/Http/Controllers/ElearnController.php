<?php
namespace App\Http\Controllers;

use App\Models\Elearn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


class ElearnController extends Controller
{
    // List all Elearning resources
    public function index()
    {
        $elearn = Elearn::all();
        return view('admin.elearn.index', compact('elearn'));
    }

    public function create()
    {
        return view('admin.elearn.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateElearn($request);

        $imagePath = $request->hasFile('Image') 
            ? $request->file('Image')->store('elearning', 'public') 
            : null;

        Elearn::create(array_merge($validated, ['Image' => $imagePath]));

        return redirect()->route('admin.elearning.index')->with('success', 'E-Learning created successfully.');
    }

    public function edit($id)
    {
        // Mencari E-Learning berdasarkan ID
        $elearn = Elearn::findOrFail($id);  // pastikan menggunakan primary key yang benar
    
        // Mengirimkan variabel ke view
        return view('admin.elearn.edit', compact('elearn'));  // atau ['elearn' => $elearn]
    }
    
    
    

    public function update(Request $request, $id)
    {
        $elearn = Elearn::findOrFail($id); // Pastikan menggunakan primary key ElearnId
        $data = $request->only(['Title', 'Link', 'Publisher', 'Description', 'ended_at']);
    
        if ($request->hasFile('Image')) {
            $data['Image'] = $request->file('Image')->store('elearning_images', 'public');
        }
    
        $elearn->update($data);
        return redirect()->route('admin.elearning.index')->with('success', 'E-learning updated successfully.');
    }
    
    

    public function destroy($id)
    {
        $elearn = Elearn::findOrFail($id); // Pastikan menggunakan ElearnId
        $elearn->delete();
        return redirect()->route('admin.elearning.index')->with('success', 'E-learning deleted successfully.');
    }

    
    protected function validateElearn(Request $request)
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
