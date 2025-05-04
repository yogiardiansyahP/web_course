<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgressBelajar;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $progressData = ProgressBelajar::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get(['persentase'])
            ->pluck('persentase')
            ->toArray();

        $progressDataFilled = array_fill(0, 11, 0);
        foreach ($progressData as $value) {
            $progressDataFilled[] = $value;
        }

        $progressDataFilled = array_slice($progressDataFilled, -11);

        $courses = Course::with('materials')->where('status', 'aktif')->get();

        return view('dashboard', compact('progressDataFilled', 'courses'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'persentase' => 'required|integer|min:0|max:100',
        ]);

        $user = Auth::user();
        $progress = ProgressBelajar::updateOrCreate(
            ['user_id' => $user->id],
            ['persentase' => $request->input('persentase')]
        );

        return response()->json([
            'message' => 'Progress berhasil disimpan!',
            'data' => $progress
        ]);
    }

    public function getProgress(Request $request)
    {
        $user = Auth::user();
        $progress = ProgressBelajar::where('user_id', $user->id)->first();

        if ($progress) {
            return response()->json([
                'message' => 'Data progress berhasil diambil',
                'data' => $progress
            ]);
        } else {
            return response()->json([
                'message' => 'Data progress tidak ditemukan',
                'data' => null
            ]);
        }
    }
}
