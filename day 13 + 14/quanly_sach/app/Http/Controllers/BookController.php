<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view("books.index", compact("books"));
    }

    public function create()
    {
        return view("books.create");
    }

    public function store(Request $request)
    {
        Book::create($request->all());
        return redirect("/books");
    }

    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view("books.edit", compact("book"));
    }

    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->all());
        return redirect("/books");
    }

    public function destroy(string $id)
    {
        Book::destroy($id);
        return redirect("/books");
    }
}
