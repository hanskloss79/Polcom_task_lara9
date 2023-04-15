<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // using Factory
        Post::factory()->count(20000)->create();
        Post::factory()->count(20000)->create();
        Post::factory()->count(20000)->create();
        Post::factory()->count(20000)->create();
        Post::factory()->count(20000)->create();
    }
}
