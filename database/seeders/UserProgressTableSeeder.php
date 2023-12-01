<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserProgress;
use App\Models\User;
use App\Models\Level;

class UserProgressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $level = Level::first();
        UserProgress::create([
            'user_id' => $user->id,
            'level_id' => $level->id,
            'completed_at' => now(),
            'earned_points' => 30,
            'learning_feedback' => 'Good progress on the second task!',
        ]);
    }
}
