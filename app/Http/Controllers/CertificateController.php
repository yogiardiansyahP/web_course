<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $certificates = Certificate::where('user_id', $userId)->get();
        return view('sertifikat', compact('certificates'));
    }

    public function show($id)
    {
        $userId = Auth::id();
        $certificate = Certificate::where('user_id', $userId)->findOrFail($id);
        return view('sertifikat.detail', compact('certificate'));
    }
}