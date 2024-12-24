<?php

namespace App\Http\Controllers;


use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    // Menampilkan daftar courses
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }

    // Menampilkan form untuk menambah course baru
    public function create()
    {
        return view('admin.courses.create');
    }
    
   
    public function store(Request $request)
    {
        $request->validate([
            'Title' => 'required',
            'Link' => 'required|url',
            'Publisher' => 'required',
            'Description' => 'nullable',
            'Image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('Image')) {
            $imagePath = $request->file('Image')->store('courses', 'public');
        }

        Course::create(array_merge($request->all(), ['Image' => $imagePath]));

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');
    }


    // Menampilkan form untuk mengedit course
    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

   
    public function update(Request $request, Course $course)
        {
            $request->validate([
                'Title' => 'required',
                'Link' => 'required|url',
                'Publisher' => 'required',
                'Description' => 'nullable',
                'Image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imagePath = $course->Image; // Gambar lama
            if ($request->hasFile('Image')) {
                if ($imagePath) {
                    Storage::disk('public')->delete($imagePath); // Hapus gambar lama
                }
                $imagePath = $request->file('Image')->store('courses', 'public');
            }

            $course->update(array_merge($request->all(), ['Image' => $imagePath]));

            return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');
        }



    // Menghapus course
    public function destroy(Course $course)
    {
   
        if ($course->Image) {
            Storage::disk('public')->delete($course->Image);
        }
        $course->delete();
    

        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully.');
    }
}
