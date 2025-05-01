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

    public function showUser()
    {
        $users = User::all();
        return view('datauser', compact('users'));
    }

    public function showTransaksi()
    {
        $users = User::all();
        return view('datatransaksi', compact('users'));
    }

    public function showCourse()
    {
        $courses = Course::with('materials')->get();
        return view('datacourse', compact('courses'));
    }
}
