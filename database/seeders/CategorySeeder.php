<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['nama' => 'Sains', 'slug' => 'sains']);
        Category::create(['nama' => 'Budaya Geek', 'slug' => 'budaya-geek']);
        Category::create(['nama' => 'Fakta Unik', 'slug' => 'fakta-unik']);
        Category::create(['nama' => 'Teknologi', 'slug' => 'teknologi']);
    }
}