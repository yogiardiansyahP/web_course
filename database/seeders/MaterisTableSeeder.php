<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Materi;
use App\Models\Course;
use Illuminate\Support\Str;

class MaterisTableSeeder extends Seeder
{
    public function run(): void
    {
        $courses = Course::all();

        if ($courses->isEmpty()) {
            return;
        }

        $materiList = [
            ['course_id' => $courses[0]->id, 'nama_materi' => 'Pengenalan'],
            ['course_id' => $courses[0]->id, 'nama_materi' => 'Install MySQL Workbench'],
            ['course_id' => $courses[1]->id ?? $courses[0]->id, 'nama_materi' => 'Quiz'],
            ['course_id' => $courses[1]->id ?? $courses[0]->id, 'nama_materi' => 'Data Manipulation Language (DML) Part I - 1'],
            ['course_id' => $courses[2]->id ?? $courses[0]->id, 'nama_materi' => 'Pembuatan Relasi Antara Tabel'],
            ['course_id' => $courses[2]->id ?? $courses[0]->id, 'nama_materi' => 'Course selesai'],
        ];

        foreach ($materiList as $materi) {
            Materi::create([
                'course_id' => $materi['course_id'],
                'nama_materi' => $materi['nama_materi'],
                'slug' => Str::slug($materi['nama_materi']),
            ]);
        }
    }
}
