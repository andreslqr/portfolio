<?php

namespace Database\Seeders;

use App\Models\Blog\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory()->active()->count(50)->create();
        Post::factory()->inactive()->count(50)->create();
    }
}
