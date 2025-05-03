<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('materials')->get();
        return view('datacourse', compact('courses'));
    }

    public function create()
    {
        return view('createcourse');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string',
        'thumbnail' => 'required|image',
        'description' => 'required|string',
        'materials.*.title' => 'required|string',
        'materials.*.video' => 'required|url'
    ]);

    $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');

    $course = Course::create([
        'name' => $validated['name'],
        'description' => $validated['description'],
        'thumbnail' => $thumbnailPath,
        'status' => 'aktif'
    ]);

    foreach ($request->materials as $material) {
        $course->materials()->create([
            'title' => $material['title'],
            'video_url' => $material['video']
        ]);
    }

    return redirect()->route('courses.index')->with('success', 'Course berhasil ditambahkan.');
}


    public function edit(Course $course)
    {
        return view('editcourse', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image',
            'materials.*.title' => 'required|string',
            'materials.*.video' => 'required|string',
        ]);
    
        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $course->thumbnail = $path;
        }
    
        $course->name = $request->name;
        $course->description = $request->description;
        $course->save();
    
        // Hapus materi lama
        $course->materials()->delete();
    
        // Tambah materi baru
        foreach ($request->materials as $material) {
            $course->materials()->create([
                'title' => $material['title'],
                'video_url' => $material['video'],
            ]);
        }
    
        return redirect()->route('courses.index')->with('success', 'Course berhasil diperbarui.');
    }
    

    public function destroy(Course $course)
    {
        $course->materials()->delete();
        $course->delete();

        return redirect()->route('datacourse')->with('success', 'Course deleted successfully.');
    }
}
