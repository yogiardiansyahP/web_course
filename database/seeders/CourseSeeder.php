<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Material;
use Faker\Factory as Faker;

class CourseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Data manual awal
        $courses = [
            ['name' => 'Laravel Basics', 'thumbnail' => $faker->imageUrl(), 'description' => $faker->paragraph(), 'mentor' => 'Ahmad', 'status' => 'aktif'],
            ['name' => 'Flutter Mastery', 'thumbnail' => $faker->imageUrl(), 'description' => $faker->paragraph(), 'mentor' => 'Budi', 'status' => 'aktif'],
            ['name' => 'React Fundamentals', 'thumbnail' => $faker->imageUrl(), 'description' => $faker->paragraph(), 'mentor' => 'Citra', 'status' => 'nonaktif'],
            ['name' => 'Data Science Intro', 'thumbnail' => $faker->imageUrl(), 'description' => $faker->paragraph(), 'mentor' => 'Dewi', 'status' => 'aktif'],
            ['name' => 'UI/UX Design', 'thumbnail' => $faker->imageUrl(), 'description' => $faker->paragraph(), 'mentor' => 'Eka', 'status' => 'nonaktif'],
        ];

        foreach ($courses as $courseData) {
            $course = Course::create($courseData);

            // Tambahkan beberapa materi untuk setiap course
            for ($i = 0; $i < 3; $i++) {
                Material::create([
                    'course_id' => $course->id,
                    'title' => $faker->sentence(3),
                    'video_url' => $faker->url,
                ]);
            }
        }

        // Tambah data palsu
        for ($i = 0; $i < 20; $i++) {
            $course = Course::create([
                'name' => $faker->sentence(3),
                'thumbnail' => $faker->imageUrl(),
                'description' => $faker->paragraph(),
                'mentor' => $faker->firstName,
                'status' => $faker->randomElement(['aktif', 'nonaktif']),
            ]);

            // Tambahkan beberapa materi untuk setiap course palsu
            for ($j = 0; $j < 3; $j++) {
                Material::create([
                    'course_id' => $course->id,
                    'title' => $faker->sentence(3),
                    'video_url' => $faker->url,
                ]);
            }
        }
    }
}