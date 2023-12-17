<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::create(['name' => 'Fiction', 'description' => 'Books of fictional content']);
        Genre::create(['name' => 'Non-Fiction', 'description' => 'Books based on real events']);
    }
}
