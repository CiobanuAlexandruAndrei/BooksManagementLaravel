<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run()
    {
        Book::create([
            'title' => 'Il nome della rosa',
            'description' => 'Un romanzo storico di Umberto Eco.',
            'pages' => 512,
            'author_id' => 1, 
            'category_id' => 1, 
        ]);

        Book::create([
            'title' => 'Cent’anni di solitudine',
            'description' => 'Un romanzo di Gabriel García Márquez.',
            'pages' => 417,
            'author_id' => 2, 
            'category_id' => 1, 
        ]);

        Book::create([
            'title' => 'Harry Potter e la pietra filosofale',
            'description' => 'Il primo libro della serie di Harry Potter.',
            'pages' => 223,
            'author_id' => 3, 
            'category_id' => 4, 
        ]);
    }
}