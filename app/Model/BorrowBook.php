<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class BorrowBook extends Model
{
    protected $fillable = [
        'user_id', 'book_id', 'from', 'to', 'quantity', 'status',
    ];

    public function get_user_borrow_books(Int $user_id)
    {
        $books =DB::table('borrow_books')
                    ->join('books', 'borrow_books.book_id', '=', 'books.id')
                    ->leftJoin('ratings', 'borrow_books.book_id', '=', 'ratings.book_id')
                    ->where('borrow_books.user_id', $user_id)
                    ->orderBy('borrow_books.created_at', 'desc')
                    ->select('borrow_books.*', 'books.name', 'ratings.rating')
                    ->get();
        return $books;
    }

    public function getBorrowBooks()
    {
        $books = DB::table('borrow_books')
                     ->join('books', 'borrow_books.book_id', '=', 'books.id')
                     ->join('users', 'borrow_books.user_id', '=', 'users.id')
                     ->orderBy('borrow_books.created_at', 'desc')
                     ->select('borrow_books.*', 'books.name', 'users.name as user')
                     ->get();
        return $books;
    }

    public function changeStatus($id, $status)
    {
        $book = $this::findOrFail($id);

        $book->status = $status;

        $changeStatus = $book->save();

        $changeStatus ? Session::flash('message', 'Status Changed Successfully!') : Session::flash('message', 'Status Changed Failed!') ;

    }

    public function getReturnQuantityByBook(Int $book_id)
    {
        $return = $this::where('book_id', $book_id)
                         ->where('status', 3)
                         ->selectRaw('SUM(quantity) as return_quantity');

        if ($return->count() > 0) {

            return $return->first()->return_quantity;

        } else {

            return '0';
        }
        
    }

    public function getBorrowQuantityByBook(Int $book_id)
    {
        $borrow = $this::where('book_id', $book_id)
                         ->where('status', 1)
                         ->selectRaw('SUM(quantity) as borrow_quantity');

        if ($borrow->count() > 0) {

            return $borrow->first()->borrow_quantity;

        } else {

            return '0';
        }
        
    }

    public function getTopMember()
    {
        $members = $this::join('users', 'borrow_books.user_id', '=', 'users.id')
                          ->selectRaw('users.name, users.photo, SUM(borrow_books.quantity) as total_quantity')
                          ->where('borrow_books.status', 1)
                          ->orWhere('borrow_books.status', 3)
                          ->orderBy('total_quantity', 'desc')  
                          ->groupBy('borrow_books.user_id')
                          ->groupBy('borrow_books.book_id')
                          ->paginate(50);
        return $members;
    }
}
