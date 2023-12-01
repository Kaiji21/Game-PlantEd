<?php

namespace Database\Seeders;
use App\Models\Task;
use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $level = Level::where('name', 'Easy')->first();
        Task::create([
            'level_id' => $level->id,
            'description' => 'Finish reports',
            'estimated_duration' => 30,
            'points' => 30,
            'learning_content' => 'Structured reporting improves communication.',
        ]);
    }
}
