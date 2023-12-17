<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'ISBN', 'genre_id'];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'books_authors', 'book_id', 'author_id')
            ->withPivot('is_main_author')
            ->withTimestamps();
    }
}
