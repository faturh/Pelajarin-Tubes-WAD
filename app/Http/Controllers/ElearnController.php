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
        $validated = $request->validate([
            'Title' => 'required|string|max:255',
            'Link' => 'required|url',
            'Publisher' => 'required|string|max:100',
            'Description' => 'nullable|string',
            'ended_at' => 'nullable|date',
            'Image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'Certificate' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        // Simpan file gambar jika ada
        $imagePath = $request->hasFile('Image') 
            ? $request->file('Image')->store('elearning_images', 'public') 
            : null;

        // Simpan file sertifikat jika ada
        $certificatePath = $request->hasFile('Certificate') 
            ? $request->file('Certificate')->store('elearning_certificates', 'public') 
            : null;

        // Gabungkan data validasi dengan path file
        Elearn::create(array_merge($validated, [
            'Image' => $imagePath,
            'Certificate' => $certificatePath,
        ]));

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
        $elearn = Elearn::findOrFail($id); // Cari berdasarkan primary key ElearnId
    
        $validated = $request->validate([
            'Title' => 'required|string|max:255',
            'Link' => 'required|url',
            'Publisher' => 'required|string|max:100',
            'Description' => 'nullable|string',
            'ended_at' => 'nullable|date',
            'Image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'Certificate' => 'nullable|file|mimes:pdf|max:5120',
        ]);
    
        // Simpan file gambar jika ada, dan hapus gambar lama jika diperbarui
        if ($request->hasFile('Image')) {
            if ($elearn->Image) {
                Storage::disk('public')->delete($elearn->Image);
            }
            $validated['Image'] = $request->file('Image')->store('elearning_images', 'public');
        }
    
        // Simpan file sertifikat jika ada, dan hapus sertifikat lama jika diperbarui
        if ($request->hasFile('Certificate')) {
            if ($elearn->Certificate) {
                Storage::disk('public')->delete($elearn->Certificate);
            }
            $validated['Certificate'] = $request->file('Certificate')->store('elearning_certificates', 'public');
        }
    
        $elearn->update($validated);
    
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
