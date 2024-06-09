<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    //
    public function index(){
        $book = Book::all();
        return view('book.index', ['book' => $book]);
    }

    public function create(){
        return view('book.create');
    }

    public function store(Request $request){
        $data = $request->validate ([
            'title' => 'required',
            'isbn' => 'required|numeric',
            'writer' => 'required',
            'year' => 'required|numeric',
        ]);

        $newBook = Book::create($data);
        return redirect (route('book.index'));
    }

    public function edit(Book $book){
        return view('book.edit', ['book' => $book]);
    }

    public function update(Book $book, Request $request){
        $data = $request->validate ([
            'title' => 'required',
            'isbn' => 'required|numeric',
            'writer' => 'required',
            'year' => 'required|numeric',
        ]);

        $book->update($data); 
        return redirect (route('book.index'))->with('success', 'Update Successfully');
    }

    public function destroy(Book $book){
        $book->delete();
        return redirect (route('book.index'))->with('success', 'Deleted Successfully');

    }
}