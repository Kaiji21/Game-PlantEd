<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['level_id', 'description', 'estimated_duration', 'points', 'learning_content'];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

}
