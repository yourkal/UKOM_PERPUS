<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index', [
            'categories' => Category::all(),
            'books_fiksi' => Book::where('category_id', 1)->take(10)->get(),
            'books_nonfiksi' => Book::where('category_id', 2)->take(10)->get(),
            'books_rpl' => Book::where('category_id', 3)->take(10)->get(),
            'books_otkp' => Book::where('category_id', 4)->take(10)->get(),
            'books_ph' => Book::where('category_id', 5)->take(10)->get(),
        ]);
    }
}
