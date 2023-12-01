<?php

namespace Database\Seeders;
use App\Models\Level;
use App\Models\Task;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $level = Level::create([
            'name' => 'Easy',
            'difficulty' => 'Easy',
            'required_points' => 100,
            'learning_objective' => 'Learn the basics of time management.',
        ]);

        Task::create([
            'level_id' => $level->id,
            'description' => 'Answer emails',
            'estimated_duration' => 15,
            'points' => 20,
            'learning_content' => 'Effective email management boosts productivity.',
        ]);
    }
}
