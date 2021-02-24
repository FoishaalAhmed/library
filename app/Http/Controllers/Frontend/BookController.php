<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('date', 'desc')->paginate(50);
        return view('frontend.book', compact('books'));
    }
}
