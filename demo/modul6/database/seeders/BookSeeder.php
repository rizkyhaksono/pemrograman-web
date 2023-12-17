<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Assuming you have Genre and Author models with their own seeders
        $fictionGenreId = 1; // Change this with the actual ID from the Genre seeder
        $nonFictionGenreId = 2; // Change this with the actual ID from the Genre seeder

        $johnDoeAuthorId = 1; // Change this with the actual ID from the Author seeder
        $janeSmithAuthorId = 2; // Change this with the actual ID from the Author seeder

        Book::create([
            'title' => 'The Great Novel',
            'description' => 'An epic novel of imagination',
            'ISBN' => 'ABC123',
            'genre_id' => $fictionGenreId,
            'author_id' => $johnDoeAuthorId,
        ]);

        Book::create([
            'title' => 'Historical Facts',
            'description' => 'A non-fiction book based on historical events',
            'ISBN' => 'XYZ456',
            'genre_id' => $nonFictionGenreId,
            'author_id' => $janeSmithAuthorId,
        ]);
    }
}
