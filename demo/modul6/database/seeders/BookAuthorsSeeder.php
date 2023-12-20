<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookAuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book = Book::find(1);
        $authors = [1, 2, 3];
        $book->authors()->attach($authors, ['is_main_author' => true]);
    }
}
