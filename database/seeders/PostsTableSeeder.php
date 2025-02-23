<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('posts')->insert([
            'user_id' => 1,
            'category_id' => 1,
            'title' => 'First Post',
            'body' => 'This is the body of the first post.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('posts')->insert([
            'user_id' => 2,
            'category_id' => 2,
            'title' => 'Second Post',
            'body' => 'This is the body of the second post.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
