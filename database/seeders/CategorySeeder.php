<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'Romanzo']);
        Category::create(['name' => 'Saggio']);
        Category::create(['name' => 'Fantascienza']);
        Category::create(['name' => 'Fantasy']);
    }
}