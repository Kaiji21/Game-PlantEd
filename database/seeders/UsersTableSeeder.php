<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Level;
use App\Models\UserProgress;
use App\Models\UserBadge;
use App\Models\Badge;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $level = Level::where('name', 'Easy')->first();


        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
            'level_id' => $level->id,
            'role'=>'user'

        ]);

        UserProgress::create([
            'user_id' => $user->id,
            'level_id' => $level->id,
            'completed_at' => now(),
            'earned_points' => 20,
            'learning_feedback' => 'Great job completing the first task!',
        ]);

        $badge = Badge::where('name', 'Task Master')->first();

        if ($badge) {
            UserBadge::create([
                'user_id' => $user->id,
                'badge_id' => $badge->id,
                'earned_at' => now(),
                'learning_feedback' => 'Congratulations on earning the Task Master badge!',
            ]);
        } else {

            echo "Badge 'Task Master' not found.\n";
        }
    }
}
