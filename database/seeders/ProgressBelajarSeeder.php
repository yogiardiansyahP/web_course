<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProgressBelajar;
use App\Models\User;

class ProgressBelajarSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            ProgressBelajar::create([
                'user_id' => $user->id,
                'persentase' => rand(0, 100)
            ]);
        }
    }
}