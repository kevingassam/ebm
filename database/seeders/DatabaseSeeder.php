<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AdminSeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(ProjetSeeder::class);
        $this->call(TemoignageSeeder::class);
        $this->call(BannerSeeder::class);
    }
}
