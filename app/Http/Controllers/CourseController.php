<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Materi;
use Illuminate\Support\Str;
use App\Models\ProgressBelajar;

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
            'materials.*.slug' => 'required|string|alpha_dash',
            'price' => 'required|numeric',
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
            'slug' => Str::slug($request->name),
            'price' => $request->price,
        ]);

        if ($request->has('materials')) {
            foreach ($request->materials as $material) {
                $slug = Str::slug($material['title']);

                $course->materials()->create([
                    'title' => $material['title'],
                    'video_url' => $material['video'],
                    'slug' => $slug,
                ]);

                Materi::create([
                    'course_id' => $course->id,
                    'nama_materi' => $material['title'],
                    'slug' => $slug,
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
            'materials.*.slug' => 'nullable|string|alpha_dash',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $course->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'thumbnail' => $validated['thumbnail'] ?? $course->thumbnail,
            'status' => $validated['status'],
            'mentor' => $validated['mentor'],
            'slug' => Str::slug($validated['name']),
            'price' => $validated['price'],
        ]);

        if ($request->has('materials')) {
            foreach ($request->materials as $materialData) {
                $slug = Str::slug($materialData['title']);

                if (isset($materialData['id'])) {
                    $material = Material::find($materialData['id']);
                    if ($material) {
                        $material->update([
                            'title' => $materialData['title'],
                            'video_url' => $materialData['video'],
                            'slug' => $slug,
                        ]);

                        $materi = Materi::where('course_id', $course->id)->where('slug', $material->slug)->first();
                        if ($materi) {
                            $materi->update([
                                'nama_materi' => $materialData['title'],
                                'slug' => $slug,
                            ]);
                        } else {
                            Materi::create([
                                'course_id' => $course->id,
                                'nama_materi' => $materialData['title'],
                                'slug' => $slug,
                            ]);
                        }
                    }
                } else {
                    Material::create([
                        'course_id' => $course->id,
                        'title' => $materialData['title'],
                        'video_url' => $materialData['video'],
                        'slug' => $slug,
                    ]);

                    Materi::create([
                        'course_id' => $course->id,
                        'nama_materi' => $materialData['title'],
                        'slug' => $slug,
                    ]);
                }
            }
        }

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->materials()->delete();
        Materi::where('course_id', $course->id)->delete();

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

        $courses = Course::whereHas('transactions', function ($query) use ($userId) {
            $query->where('user_id', $userId)
                ->whereIn('status', ['pending', 'in_progress']);
        })->get();

        $completedCourses = Course::whereHas('transactions', function ($query) use ($userId) {
            $query->where('user_id', $userId)
                ->where('status', 'selesai');
        })->get();

        $progressData = ProgressBelajar::where('user_id', $userId)
            ->pluck('persentase', 'course_id')
            ->toArray();

        $courseLabels = $courses->pluck('name')->toArray();

        return view('datacourse', compact('courses', 'completedCourses', 'progressData', 'courseLabels'));
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

        // Define the currentSlug
        $currentSlug = $materi->slug;

        return view('materi', [
            'course' => $course,
            'materials' => $materials,
            'materis' => $materis,
            'transaction' => $transaction,
            'materi' => $materi,
            'currentSlug' => $currentSlug, // Pass the currentSlug to the view
        ]);
    }

    public function lanjutkanMateri($slug)
    {
        $user = Auth::user();
        $materi = Materi::where('slug', $slug)->firstOrFail();
        $course = $materi->course;
        $materis = $course->materis()->orderBy('id')->get();

        $slugs = $materis->pluck('slug')->values();
        $currentIndex = $slugs->search($slug);
        $total = $slugs->count();
        $persentase = (int)(($currentIndex + 1) / $total * 100);

        ProgressBelajar::updateOrCreate(
            ['user_id' => $user->id],
            ['persentase' => $persentase]
        );

        return redirect()->route('materi.show', $slug);
    }

    public function selesai()
    {
        $user = Auth::user();

        $kursusSelesai = Transaction::with('course')
            ->where('user_id', $user->id)
            ->where('status', 'selesai')
            ->get();

        return view('kursus_selesai', compact('kursusSelesai'));
    }
}
