<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use App\Model\Author;
use App\Model\Category;

class AuthorController extends Controller
{
    private $author_object;

    public function __construct()
    {
        $this->author_object = new Author();
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        return view('backend.admin.author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        return view('backend.admin.author.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorRequest $request)
    {
        $this->author_object->store_author($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author     = Author::findOrFail($id);
        $genres     = explode(',', $author->genres);
        $categories = Category::select('id', 'name')->get();
        return view('backend.admin.author.update', compact('categories', 'author', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorRequest $request, $id)
    {
        $this->author_object->update_author($request, $id);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->author_object->destroy_author($id);
        return redirect()->back();
    }
}
