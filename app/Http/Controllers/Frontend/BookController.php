<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Author;
use App\Model\Book;
use App\Model\BorrowBook;
use App\Model\Category;
use App\Model\Notice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('date', 'desc')->paginate(50);
        $categories = Category::select('id', 'name')->orderBy('name', 'asc')->get();
        $authors = Author::select('id', 'name')->orderBy('name', 'asc')->get();
        return view('frontend.book', compact('books', 'categories', 'authors'));
    }

    public function detail($id, $name)
    {
        $book_object = new Book();
        $book = $book_object->get_book_details($id);

        return view('frontend.book_detail', compact('book'));
    }

    public function borrow(Request $request)
    {
        if (Auth::check()) {

            $request->validate([
                'book'     => 'required|numeric',
                'quantity' => 'required|numeric',
                'from'     => 'required|date',
                'to'       => 'required|date|after_or_equal:from',
            ]);

            

            $borrow_book           = new BorrowBook();
            $borrow_book->user_id  = auth()->user()->id;
            $borrow_book->book_id  = $request->book;
            $borrow_book->from     = date('Y-m-d', strtotime($request->from));
            $borrow_book->to       = date('Y-m-d', strtotime($request->to));
            $borrow_book->quantity = $request->quantity;
            $borrow_book->status   = 0;

            $send = $borrow_book->save();

            $send ? Session::flash('message', 'Your request send successfully! We will confirm You. ') : Session::flash('message', 'Your request send failed!') ;

            $book_id = Session::get('book_id');

            if ($book_id) {

                Session::forget('book_id');
            }

            return redirect()->back();

        } else {

            Session::put('book_id', $request->book);
            return redirect()->route('login');
        }
    }

    public function notice_details($id, $title)
    {
        $notice = Notice::findOrFail($id);

        return view('frontend.notice_detail', compact('notice'));
    }

    public function education()
    {
        $books = Book::where('category_id', 1)->orderBy('date', 'desc')->paginate(50);
        $categories = Category::select('id', 'name')->orderBy('name', 'asc')->get();
        $authors = Author::select('id', 'name')->orderBy('name', 'asc')->get();
        return view('frontend.book', compact('books', 'categories', 'authors'));
    }

    public function author_books($id, $name)
    {
        $books = Book::where('author_id', $id)->orderBy('date', 'desc')->paginate(50);
        $categories = Category::select('id', 'name')->orderBy('name', 'asc')->get();
        $authors = Author::select('id', 'name')->orderBy('name', 'asc')->get();
        return view('frontend.book', compact('books', 'categories', 'authors'));
    }

    public function filter(Request $request)
    {
        $book_object = new Book();
        $books = $book_object->get_book_filtered_books($request);

        return view('frontend.filter', compact('books'));
    }
}
