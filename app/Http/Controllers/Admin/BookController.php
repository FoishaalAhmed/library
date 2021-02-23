<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Author;
use App\Model\Book;
use App\Model\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private $book_object;

    public function __construct()
    {
        $this->book_object = new Book;
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->book_object->get_all_book();

        return view('backend.admin.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        $authors    = Author  ::select('id', 'name')->get();
        return view('backend.admin.book.create', compact('categories', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Book::$validateRule);
        $this->book_object->store_book($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book       = Book::findOrFail($id);
        $categories = Category::select('id', 'name')->get();
        $authors    = Author::select('id', 'name')->get();
        return view('backend.admin.book.update', compact('categories', 'authors', 'book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(Book::$validateRule);
        $this->book_object->update_book($request, $id);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->book_object->destroy_book($id);
        return redirect()->back();
    }
}
