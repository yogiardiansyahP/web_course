<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseApiController extends Controller
{
    // POST /api/courses/list
    public function list(Request $request)
    {
        $courses = Course::with('materials')->get();
        return response()->json($courses);
    }

    // POST /api/courses/detail
    public function detail(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:courses,id',
        ]);

        $course = Course::with('materials')->find($request->id);
        return response()->json($course);
    }

    // POST /api/courses (create)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'thumbnail' => 'required|image',
            'description' => 'required|string',
            'mentor' => 'required|string',
            'price' => 'required|numeric',
            'status' => 'required|in:aktif,nonaktif',
            'materials' => 'required|array',
            'materials.*.title' => 'required|string',
            'materials.*.video' => 'required|string',
        ]);

        $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');

        $course = Course::create([
            'name' => $validated['name'],
            'thumbnail' => $thumbnailPath,
            'description' => $validated['description'],
            'mentor' => $validated['mentor'],
            'price' => $validated['price'],
            'status' => $validated['status'],
        ]);

        foreach ($validated['materials'] as $material) {
            $course->materials()->create([
                'title' => $material['title'],
                'video_url' => $material['video'],
            ]);
        }

        return response()->json(['message' => 'Course created', 'course' => $course->load('materials')], 201);
    }

    // POST /api/courses/update
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:courses,id',
        ]);

        $course = Course::find($request->id);

        $data = $request->validate([
            'name' => 'sometimes|string',
            'thumbnail' => 'sometimes|image',
            'description' => 'sometimes|string',
            'mentor' => 'sometimes|string',
            'price' => 'sometimes|numeric',
            'status' => 'sometimes|in:aktif,nonaktif',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($course->thumbnail) {
                Storage::disk('public')->delete($course->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $course->update($data);

        return response()->json(['message' => 'Course updated', 'course' => $course]);
    }

    // POST /api/courses/delete
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:courses,id',
        ]);

        $course = Course::find($request->id);

        if ($course->thumbnail) {
            Storage::disk('public')->delete($course->thumbnail);
        }

        $course->materials()->delete();
        $course->delete();

        return response()->json(['message' => 'Course deleted']);
    }
}
