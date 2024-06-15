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

    public function getBookApi(){
        $book = Book::all();

        return response()->json($book);
    }

    public function createBookApi(Request $request){
        $data = $request->validate ([
            'title' => 'required',
            'isbn' => 'required',
            'writer' => 'required',
            'year' => 'required|numeric',
        ]);

        $newBook = Book::create($data);
        if($newBook != null){
            return response() -> json($newBook);
        } else {
            return response() -> json("Submit Failed");
        }
    }

    public function updateBookApi($id, Request $request){
        $data = $request->validate ([
            'title' => 'required',
            'isbn' => 'required',
            'writer' => 'required',
            'year' => 'required|numeric',
        ]);

        $updatedBook = Book::find($id);
        $updatedBook->title = $data['title'];
        $updatedBook->isbn = $data['isbn'];
        $updatedBook->writer = $data['writer'];
        $updatedBook->year = $data['year'];
        $updatedBook->save();
    
        return response() -> json($updatedBook);
    }

    public function deleteBookApi($id, Request $request){
        $deletedBook = Book::find($id);
        $deletedBook->delete();
        return response() -> json($deletedBook);
    }
}