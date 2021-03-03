<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\BorrowBook;
use Illuminate\Http\Request;

class BorrowBookController extends Controller
{
    private $BorrowBookObject;

    public function __construct()
    {
        $this->BorrowBookObject = new BorrowBook();
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $books = $this->BorrowBookObject->getBorrowBooks();
        return view('backend.admin.borrow.index', compact('books'));
    }

    public function status(Int $id, Int $status)
    {
        $this->BorrowBookObject->changeStatus($id, $status);
        return redirect()->back();
    }
}
