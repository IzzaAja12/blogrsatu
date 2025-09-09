<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    // Relasi One-to-Many ke Posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
