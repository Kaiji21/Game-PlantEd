<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image_path', 'learning_content'];

    public function userBadges()
    {
        return $this->hasMany(UserBadge::class);
    }

}
