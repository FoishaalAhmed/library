<?php

namespace App\Http\Controllers;

use App\Model\Book;
use Illuminate\Http\Request;
use Auth;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (@Auth::user()->hasRole(['Admin'])) {

            return redirect(route('admin.dashboard'));

        } else {

            $book_id = Session::get('book_id');

            if ($book_id) {

                $book = Book::findOrFail($book_id);

                return redirect()->route('book.detail', [$book_id, strtolower(str_replace(' ', '-', $book->name))]);

            } else {

                return redirect()->route('user.dashboard');
            }
            
        }
    }
}
