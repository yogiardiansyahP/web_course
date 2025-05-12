<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgressBelajar;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    public function getChartProgress(Request $request)
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

        return response()->json($progressDataFilled);
    }
}
