<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    public function run()
    {
        Author::create(['name' => 'Umberto Eco', 'birthday' => '1932-01-05']);
        Author::create(['name' => 'Gabriel García Márquez', 'birthday' => '1927-03-06']);
        Author::create(['name' => 'J.K. Rowling', 'birthday' => '1965-07-31']);
    }
}