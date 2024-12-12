<?php

namespace App\Http\Controllers;

use App\Models\Elearn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ElearnController extends Controller
{
    // Menampilkan daftar elearn
    public function index()
    {
        $elearn = Elearn::all();
        return view('admin.elearn.index', compact('elearn'));
    }

    // Menampilkan form untuk menambah elearn baru
    public function create()
    {
        return view('admin.elearn.create');
    }

    // Menyimpan elearn baru
    public function store(Request $request)
    {
        $request->validate([
            'Title' => 'required',
            'Link' => 'required|url',
            'Publisher' => 'required',
            'Description' => 'nullable',
            'ended_at' => 'nullable|date',
            'Image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('Image')) {
            $imagePath = $request->file('Image')->store('elearning', 'public');
        }

        Elearn::create(array_merge($request->all(), ['Image' => $imagePath]));

        return redirect()->route('admin.elearning.index')->with('success', 'E-Learn created successfully.');
    }

    // Menampilkan form untuk mengedit elearn
    public function edit(Elearn $elearn)
    {
        return view('admin.elearn.edit', compact('elearn'));
    }

    // Memperbarui data elearn
    public function update(Request $request, $id)
        {
            $elearn = Elearn::findOrFail($id);

            $request->validate([
                'Title' => 'required',
                'Link' => 'required|url',
                'Publisher' => 'required',
                'Description' => 'nullable',
                'Image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'ended_at' => 'nullable|date',
            ]);

            $imagePath = $elearn->Image; // Gambar lama
            if ($request->hasFile('Image')) {
                if ($imagePath) {
                    Storage::disk('public')->delete($imagePath); // Hapus gambar lama
                }
                $imagePath = $request->file('Image')->store('elearn', 'public');
            }
                
            
            // Update other fields
            $elearn->Title = $request->Title;
            $elearn->Link = $request->Link;
            $elearn->Publisher = $request->Publisher;
            $elearn->Description = $request->Description;
            $elearn->ended_at = $request->ended_at;
            $elearn->save();
            $elearn->update(array_merge($request->all(), ['Image' => $imagePath]));
            
            return redirect()->route('admin.elearn.index')->with('success', 'E-Learning updated successfully.');
        }
        
        //     'Title' => 'required|string|max:255',
        //     'Link' => 'required|url',
        //     'Publisher' => 'required|string|max:255',
        //     'Description' => 'nullable|string',
        //     'Image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        //     'ended_at' => 'nullable|date',
        // ]);

        // // Handle file upload
        // if ($request->hasFile('Image')) {
        //     $path = $request->file('Image')->store('elearning', 'public');
        //     $elearn->Image = $path;
        // }

    // Menghapus elearn
    public function destroy(Elearn $elearn)
    {
        if ($elearn->Image) {
            Storage::disk('public')->delete($elearn->Image); // Hapus gambar dari storage
        }

        $elearn->delete();

        return redirect()->route('admin.elearn.index')->with('success', 'E-Learn deleted successfully.');
    }
}
