<?php

namespace Database\Seeders;
use App\Models\Badge;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BadgesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Badge::create([
            'name' => 'Procrastination Buster',
            'description' => 'Awarded for timely task completion.',
            'image_path' => 'path/to/badge_image.png',
            'learning_content' => 'Avoiding procrastination leads to better time management.',
        ]);
    }
}
