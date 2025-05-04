<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:aktif,nonaktif',
            'mentor' => 'nullable|string|max:255',
            'materials.*.title' => 'required|string',
            'materials.*.video' => 'required|string',
        ]);

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
        } else {
            return redirect()->back()->with('error', 'Thumbnail tidak ditemukan.');
        }

        $course = Course::create([
            'name' => $request->name,
            'description' => $request->description,
            'thumbnail' => $path,
            'status' => $request->status,
            'mentor' => $request->mentor,
        ]);

        if ($request->has('materials')) {
            foreach ($request->materials as $material) {
                $course->materials()->create([
                    'title' => $material['title'],
                    'video_url' => $material['video'],
                ]);
            }
        }

        return redirect()->route('courses.index')->with('success', 'Course berhasil ditambahkan.');
    }

    public function edit(Course $course)
    {
        return view('editcourse', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);
    
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'status' => 'required|in:aktif,nonaktif',
            'mentor' => 'nullable|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        $course->name = $request->name;
        $course->description = $request->description;
        $course->status = $request->status;
        $course->mentor = $request->mentor;
    
        if ($request->hasFile('thumbnail')) {
            if ($course->thumbnail && Storage::exists('public/' . $course->thumbnail)) {
                Storage::delete('public/' . $course->thumbnail);
            }
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $course->thumbnail = $path;
        }
    
        $course->save();
    
        $course->materials()->delete();
        $materials = $request->input('materials', []);
        foreach ($materials as $material) {
            $course->materials()->create([
                'title' => $material['title'],
                'video_url' => $material['video'],
            ]);
        }
    
        return redirect()->route('courses.index');
    }
    

    public function destroy(Course $course)
    {
        $course->materials()->delete();
        if ($course->thumbnail && Storage::exists('public/' . $course->thumbnail)) {
            Storage::delete('public/' . $course->thumbnail);
        }

        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course berhasil dihapus.');
    }
}
