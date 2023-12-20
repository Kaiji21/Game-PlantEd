<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTask extends Model
{
    use HasFactory;


    protected $fillable = ['user_id','task_id','completed','points_earned'];



    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'user_tasks')->withTimestamps();
    }


    public function users()
    {
        return $this->belongsToMany(User::class, 'user_tasks')->withTimestamps();
    }


}
