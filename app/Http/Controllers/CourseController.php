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
        $request->validate([
            'name' => 'required|string|max:255',
            'mentor' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'materials' => 'required|array',
            'materials.*' => 'required|string'
        ]);

        $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');

        $course = Course::create([
            'name' => $request->name,
            'mentor' => $request->mentor,
            'thumbnail' => $thumbnailPath,
            'description' => $request->description,
            'status' => 'active',
        ]);

        foreach ($request->materials as $materialTitle) {
            Material::create([
                'course_id' => $course->id,
                'title' => $materialTitle
            ]);
        }

        return redirect()->route('datacourse')->with('success', 'Course created successfully.');
    }

    public function edit(Course $course)
    {
        return view('editcourse', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mentor' => 'required|string|max:255',
            'description' => 'required|string',
            'materials' => 'required|array',
            'materials.*' => 'required|string'
        ]);

        $course->update([
            'name' => $request->name,
            'mentor' => $request->mentor,
            'description' => $request->description,
        ]);

        foreach ($request->materials as $materialTitle) {
            $course->materials()->updateOrCreate(
                ['title' => $materialTitle],
                ['course_id' => $course->id, 'title' => $materialTitle]
            );
        }

        return redirect()->route('datacourse')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->materials()->delete();
        $course->delete();

        return redirect()->route('datacourse')->with('success', 'Course deleted successfully.');
    }
}
