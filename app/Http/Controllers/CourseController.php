<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Materi;

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

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png',
            'mentor' => 'required|string|max:255',
            'status' => 'required|in:aktif,nonaktif',
            'price' => 'required|numeric',
            'materials.*.title' => 'required|string',
            'materials.*.video' => 'nullable|url',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $course->update($validated);

        if ($request->has('materials')) {
            foreach ($request->materials as $materialData) {
                if (isset($materialData['id'])) {
                    $material = Material::find($materialData['id']);
                    if ($material) {
                        $material->update([
                            'title' => $materialData['title'],
                            'video_url' => $materialData['video'],
                        ]);
                    }
                } else {
                    Material::create([
                        'course_id' => $course->id,
                        'title' => $materialData['title'],
                        'video_url' => $materialData['video'],
                    ]);
                }
            }
        }

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
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

    public function showCourses()
    {
        $courses = Course::with('materials')->get();
        return view('daftarcourse', compact('courses'));
    }

    public function showKelas()
    {
        $courses = Course::with('materials')->get();
        return view('kelas', compact('courses'));
    }

    public function showData()
    {
        $courses = Course::with('materials')->get();
        return view('daftarcourse', compact('courses'));
    }

    public function showUserCourses()
{
    $userId = Auth::id();

    // Get courses that are being studied
    $courses = Course::whereHas('transactions', function ($query) use ($userId) {
        $query->where('user_id', $userId)
              ->whereIn('status', ['pending', 'in_progress']);
    })->get();

    // Get courses that are completed
    $completedCourses = Course::whereHas('transactions', function ($query) use ($userId) {
        $query->where('user_id', $userId)
              ->where('status', 'selesai');
    })->get();

    return view('datacourse', compact('courses', 'completedCourses'));
}



    public function showMaterials(Course $course)
    {
        $user = Auth::user();
    
        $transaction = Transaction::where('user_id', $user->id)
            ->where('course_name', $course->name)
            ->whereIn('status', ['settlement', 'capture', 'pending'])
            ->first();
    
        $materials = Material::where('course_id', $course->id)->get();
        $materis = $course->materis;
    
        return view('materi', [
            'course' => $course,
            'materials' => $materials,
            'materis' => $materis,
            'transaction' => $transaction,
        ]);
    }
    public function showMateriBySlug($slug)
    {
        $materi = Materi::where('slug', $slug)->firstOrFail();
        $course = $materi->course;
    
        $transaction = Transaction::where('user_id', Auth::id())
            ->where('course_name', $course->name)
            ->whereIn('status', ['settlement', 'capture', 'pending'])
            ->first();
    
        $materials = Material::where('course_id', $course->id)->get();
        $materis = $course->materis;
    
        return view('materi', [
            'course' => $course,
            'materials' => $materials,
            'materis' => $materis,
            'transaction' => $transaction,
            'materi' => $materi,
        ]);
    }    

    public function selesai()
{
    $user = Auth::user();

    // Ambil transaksi kursus milik user yang statusnya selesai
    $kursusSelesai = Transaction::with('course') // pastikan relasi 'course' ada di model Transaction
        ->where('user_id', $user->id) // Fix here
        ->where('status', 'selesai') // sesuaikan dengan status selesai yang kamu pakai
        ->get();

    return view('kursus_selesai', compact('kursusSelesai'));
}

}
