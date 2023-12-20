<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }

    public function show($id)
    {
        $book = Book::with(['genre:id,name', 'authors:id'])->find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $filteredAuthors = $book->authors->filter(function ($author) use ($book) {
            return $author->id === $book->id;
        });

        $response = [
            'id' => $book->id,
            'title' => $book->title,
            'description' => $book->description,
            'ISBN' => $book->ISBN,
            'genre_id' => $book->genre_id,
            'author_id' => $book->author_id,
            'genre' => $book->genre,
            'authors' => $filteredAuthors,
            'created_at' => $book->created_at,
            'updated_at' => $book->updated_at,
        ];

        return response()->json($response);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'ISBN' => 'required|string|max:255',
            'genre_id' => 'required|exists:genres,id',
            'author_id' => 'required|exists:authors,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $book = new Book([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'ISBN' => $request->input('ISBN'),
            'genre_id' => $request->input('genre_id'),
        ]);

        $book->author_id = $request->input('author_id');
        $book->save();

        return response()->json($book, 201);
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'ISBN' => 'required|string|max:255',
            'genre_id' => 'required|exists:genres,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $book->update($request->all());

        if ($request->has('authors')) {
            $book->authors()->sync($request->input('authors'));
        }

        return response()->json($book);
    }

    public function destroy($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $book->authors()->detach();
        $book->delete();

        return response()->json(['message' => 'success', 'data' => $book], 200);
    }
}
