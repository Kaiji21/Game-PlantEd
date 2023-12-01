<?php

namespace Database\Seeders;
use App\Models\UserBadge;
use App\Models\User;
use App\Models\Badge;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserBadgesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $badge = Badge::first();
        UserBadge::create([
            'user_id' => $user->id,
            'badge_id' => $badge->id,
            'earned_at' => now(),
            'learning_feedback' => 'Congratulations on earning the Procrastination Buster badge!',
        ]);
    }
}
