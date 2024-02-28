<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    if ($request->has('title')) {
        $books = Book::where('title', 'LIKE', '%' . $request->title . '%')->get();
    } else {
        $books = Book::all();
    }
    return view('pages.books', ['books' => $books]);
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('pages.booksDetail', [
            'book' => $book,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }

    // public function search(Request $request) {
    //     if ($request->has('search')) {
    //         $books = Book::where('title', 'like', '%' . $request->search . '%')->get();
    //     } else {
    //         $books = Book::all();
    //     }
    //     return view('pages.books', [
    //      'books' => $books 
    //     ]);
    // }
}
