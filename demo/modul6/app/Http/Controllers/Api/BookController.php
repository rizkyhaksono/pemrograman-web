<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
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
        $book = Book::with('genre', 'authors')->find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        return response()->json($book);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'ISBN' => 'required|string|max:255',
            'genre_id' => 'required|exists:genres,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $book = Book::create($request->all());

        if ($request->has('authors')) {
            $book->authors()->attach($request->input('authors'));
        }

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

        return response()->json(null, 204);
    }
}
