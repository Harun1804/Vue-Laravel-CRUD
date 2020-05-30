<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all()->toArray();
        return array_reverse($books);
    }

    public function add(Request $request)
    {
        $book = Book::create([
            'name'      => $request->name,
            'author'    => $request->author
        ]);
        return response()->json('The book successfully added');
    }

    public function edit(Book $book)
    {
        $book = Book::find($book->id);
        return response()->json($book);
    }

    public function update(Request $request, Book $book)
    {
        $book = Book::find($book->id);
        $book->update($request->all());
        return response()->json('The book successfullt updated');
    }

    public function delete($id)
    {
        $book = Book::find($id);
        $book->delete();
        return response()->json('The Book Successfully deleted');
    }
}
