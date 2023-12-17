<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::create(['name' => 'John Doe', 'bio' => 'An accomplished author']);
        Author::create(['name' => 'Jane Smith', 'bio' => 'Best-selling novelist']);
    }
}
