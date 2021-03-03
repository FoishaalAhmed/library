<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Book;
use App\Model\BorrowBook;
use Illuminate\Http\Request;

class StockController extends Controller
{
    private $BorrowBookObject;

    public function __construct()
    {
        $this->BorrowBookObject = new BorrowBook();
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $books = Book::select('id', 'name', 'quantity')->get();

        if ($books) {

            foreach ($books as $key => $value) {
                $returned = $this->BorrowBookObject->getReturnQuantityByBook($value->id);
                $borrowed = $this->BorrowBookObject->getBorrowQuantityByBook($value->id);

                $available = $value->quantity + $returned - $borrowed;

                $books[$key]->borrow = $borrowed;
                $books[$key]->available = $available;   
            }
        }

        return view('backend.admin.stock', compact('books'));
    }
}
