<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post; // added import

class Category extends Model
{
    use HasFactory;
    // Relationship: Category has many posts.
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
