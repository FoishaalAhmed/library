<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Session;

class Book extends Model
{
    protected $fillable = [
        'date', 'name', 'suitable_for', 'publish_year', 'author_id', 'category_id', 'quantity', 'donation', 'donar', 'photo',
    ];

    public static $validateRule = [
        'date'         => 'date|required',
        'name'         => 'string|required|max:255',
        'suitable_for' => 'string|required|max:255',
        'publish_year' => 'string|nullable|max:5',
        'author_id'    => 'numeric|nullable',
        'category_id'  => 'numeric|nullable',
        'quantity'     => 'numeric|required',
        'donation'     => 'string|nullable|max:5',
        'donar'        => 'string|nullable|max:255',
        'photo'        => 'mimes:jpeg,jpg,png,gif,webp|max:1999|nullable',
    ];

    public function get_all_book()
    {
       $books = $this::leftJoin('authors', 'books.author_id' , '=', 'authors.id')
                        ->leftJoin('categories', 'books.category_id', '=', 'categories.id')
                        ->orderBy('books.date', 'desc')
                        ->select('books.id', 'books.quantity', 'books.photo', 'books.name', 'authors.name as author', 'categories.name as category')
                        ->get();
        return $books;
    }


    public function get_book_details($id)
    {
       $books = $this::leftJoin('authors', 'books.author_id' , '=', 'authors.id')
                        ->leftJoin('categories', 'books.category_id', '=', 'categories.id')
                        ->where('books.id', $id)
                        ->select('books.*', 'authors.name as author', 'categories.name as category')
                        ->firstOrFail();
        return $books;
    }

    public function store_book($request)
    {
        $image = $request->file('photo');

        if ($image) {

            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/books/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $this->photo     = $image_url;
        }

        $this->name         = $request->name;
        $this->date         = date('Y-m-d', strtotime($request->date));
        $this->suitable_for = $request->suitable_for;
        $this->publish_year = $request->publish_year;
        $this->author_id    = $request->author_id;
        $this->category_id  = $request->category_id;
        $this->quantity     = $request->quantity;
        $this->donation     = $request->donation;
        $this->donar        = $request->donar;
        $store_book         = $this->save();

        $store_book ? Session::flash('message', 'New Book Created Successfully!') : Session::flash('message', 'Book Create Failed!');
    }

    public function update_book($request, $id)
    {
        $book = $this::findOrFail($id);

        $image = $request->file('photo');

        if ($image) {

            if (file_exists($book->photo)) unlink($book->photo);

            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/books/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $book->photo     = $image_url;
        }

        $book->name         = $request->name;
        $book->date         = date('Y-m-d', strtotime($request->date));
        $book->suitable_for = $request->suitable_for;
        $book->publish_year = $request->publish_year;
        $book->author_id    = $request->author_id;
        $book->category_id  = $request->category_id;
        $book->quantity     = $request->quantity;
        $book->donation     = $request->donation;
        $book->donar        = $request->donar;
        $update_book        = $book->save();

        $update_book ? Session::flash('message', 'Book Updated Successfully!') : Session::flash('message', 'Book Update Failed!');
    }

    public function destroy_book($id)
    {
        $book = $this::findOrFail($id);
        if (file_exists($book->photo)) unlink($book->photo);

        $delete_book        =  $this::where('id', $id)->delete();

        $delete_book ? Session::flash('message', 'Book Deleted Successfully!') : Session::flash('message', 'Book Delete Failed!');
    }

    public function get_book_filtered_books($request)
    {
        $query = $this::leftJoin('ratings', 'books.id', '=', 'ratings.book_id');

        if($request->category != '') $query->where('books.category_id', $request->category);
        if($request->author != '') $query->where('books.author_id', $request->author);
        if($request->suitable_for != '') $query->where('books.suitable_for', $request->suitable_for);
        if($request->publish_year != '') $query->where('books.publish_year', $request->publish_year);
        if($request->rating != '') $query->where('ratings.rating', '>', $request->rating);

        $query->groupBy('ratings.book_id');
        $query->orderBy('ratings.rating', 'desc');

        $books = $query->select('books.*')->get();

        return $books;

    }
}
