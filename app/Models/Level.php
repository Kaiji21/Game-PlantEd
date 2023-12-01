<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'difficulty', 'required_points', 'learning_objective'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function userProgress()
    {
        return $this->hasMany(UserProgress::class);
    }

}
