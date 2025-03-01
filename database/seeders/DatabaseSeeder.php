<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create()->each(function ($user) {
            Category::factory(3)->create()->each(function ($category) use ($user) {
                Post::factory(5)->create([
                    'user_id' => $user->id,
                    'category_id' => $category->id,
                ]);
            });
        });
    }
}
