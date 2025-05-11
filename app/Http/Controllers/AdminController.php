<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalCourses = Course::count();
        $totalUsers = User::count();
        $totalTransactions = Transaction::count();
        $activities = Transaction::latest()->take(5)->with('user')->get();
        $courses = Course::all();

        return view('admin', compact(
            'totalCourses',
            'totalUsers',
            'totalTransactions',
            'activities',
            'courses'
        ));
    }

    public function apiDataCourse(Request $request)
    {
        $courses = Course::with('materials')->get();

        return response()->json([
            'success' => true,
            'data' => $courses
        ]);
    }

    public function dataUser(Request $request)
    {
        $limit = $request->input('limit', 4);
        $users = User::paginate($limit);
        return view('datauser', compact('users'));
    }

    public function showUser(Request $request)
    {
        $limit = $request->input('limit', 4);
        $users = User::paginate($limit);
        return view('datauser', compact('users'));
    }

    public function showTransaksi()
    {
        $transactions = Transaction::with('user')->get();
        return view('datatransaksi', compact('transactions'));
    }

    public function showCourse()
    {
        $courses = Course::with('materials')->get();
        return view('datacourse', compact('courses'));
    }
}
