<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Certificate;
use App\Models\User;
use App\Models\Course;
use Carbon\Carbon;

class CertificateSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $courses = Course::all();

        foreach ($users as $user) {
            foreach ($courses as $course) {
                Certificate::create([
                    'user_id' => $user->id,
                    'course_id' => $course->id,
                    'title' => 'Sertifikat ' . $course->name,
                    'certificate_path' => 'path/to/certificate.pdf',
                    'issued_at' => Carbon::now(),
                ]);
            }
        }
    }
}