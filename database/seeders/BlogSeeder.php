<?php

namespace Database\Seeders;
use App\Models\Blog;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Création de 3 articles avec le factory
        Blog::factory()->count(20)->create();
    }
}
