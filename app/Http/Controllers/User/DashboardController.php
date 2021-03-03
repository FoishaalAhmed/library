<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Book;
use App\Model\BorrowBook;
use App\Model\Rating;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['user', 'auth']);
    }

    public function index()
    {
        $user = User::findOrFail(auth()->user()->id);
        return view('frontend.user.dashboard', compact('user'));
    }

    public function profile()
    {
        $user = User::findOrFail(auth()->user()->id);
        return view('frontend.user.profile', compact('user'));
    }

    public function books()
    {
        $borrow_book = new BorrowBook();

        $books = $borrow_book->get_user_borrow_books(auth()->user()->id);

        return view('frontend.user.books', compact('books'));
    }

    public function ratings($id, $name)
    {
        $book = Book::findOrFail($id);
        return view('frontend.user.rating', compact('book'));
    }

    public function give_rating(Request $request)
    {

        $rating  = new Rating();

        $rating->user_id = $request->user_id;
        $rating->book_id = $request->book_id;
        $rating->rating  = $request->rating;

        $save_rating     = $rating->save();

        if ($save_rating) {

            echo "Rating is successful!";

        } else {

            echo "Rating is failed!";
        }
        
    }
}
