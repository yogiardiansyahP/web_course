<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgressBelajar;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $progressData = ProgressBelajar::where('user_id', $user->id)
            ->orderBy('created_at')
            ->pluck('persentase');

        return view('dashboard', compact('progressData'));
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