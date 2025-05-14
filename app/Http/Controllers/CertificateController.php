<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class CertificateController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $certificates = Certificate::with('course')
            ->where('user_id', $userId)
            ->get();

        return view('sertifikat', compact('certificates'));
    }

    public function show($id)
    {
        $userId = Auth::id();
        $certificate = Certificate::with('course')
            ->where('user_id', $userId)
            ->findOrFail($id);

        return view('sertifikat.detail', compact('certificate'));
    }

    public function completeCourse($courseId)
    {
        $user = Auth::user();
        $course = Course::findOrFail($courseId);

        if ($this->userHasCompletedCourse($user, $course)) {
            $certificate = $this->generateCertificate($user, $course);

            Certificate::create([
                'user_id' => $user->id,
                'course_id' => $course->id,
                'title' => 'Sertifikat ' . $course->name,
                'certificate_path' => 'storage/certificates/' . $certificate->filename,
                'issued_at' => now()
            ]);
            

            return redirect()->route('sertifikat')->with('message', 'Sertifikat berhasil dibuat.');
        }

        return redirect()->route('dashboard')->with('error', 'Kamu belum menyelesaikan kursus.');
    }

    private function generateCertificate($user, $course)
    {
        $certificateData = [
            'name' => $user->name,
            'course' => $course->name,
        ];

        $htmlContent = view('sertifikat.template', $certificateData)->render();

        $pdf = Pdf::loadHTML($htmlContent);
        $filename = 'certificate_' . $user->id . '_' . $course->id . '.pdf';
        $path = storage_path('app/public/certificates/' . $filename);
        $pdf->save($path);

        return (object) ['filename' => $filename];
    }

    private function userHasCompletedCourse($user, $course)
    {
        return true;
    }
}
