<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use Faker\Factory as Faker;

class CourseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Data manual awal
        $courses = [
            ['name' => 'Laravel Basics', 'mentor' => 'Ahmad', 'students_count' => 120, 'status' => 'published'],
            ['name' => 'Flutter Mastery', 'mentor' => 'Budi', 'students_count' => 95, 'status' => 'published'],
            ['name' => 'React Fundamentals', 'mentor' => 'Citra', 'students_count' => 78, 'status' => 'draft'],
            ['name' => 'Data Science Intro', 'mentor' => 'Dewi', 'students_count' => 60, 'status' => 'published'],
            ['name' => 'UI/UX Design', 'mentor' => 'Eka', 'students_count' => 45, 'status' => 'draft'],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }

        // Tambah data palsu
        for ($i = 0; $i < 20; $i++) {
            Course::create([
                'name' => $faker->sentence(3),
                'mentor' => $faker->firstName,
                'students_count' => $faker->numberBetween(10, 150),
                'status' => $faker->randomElement(['published', 'draft']),
            ]);
        }
    }
}
