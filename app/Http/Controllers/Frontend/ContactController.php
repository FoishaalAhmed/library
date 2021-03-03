<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Administrator;
use App\Model\Author;
use App\Model\Book;
use App\Model\BorrowBook;
use App\Model\Contact;
use App\Model\Query;
use Illuminate\Http\Request;
use Validator;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::firstOrFail();
        return view('frontend.contact', compact('contact'));
    }

    public function query(Request $request)
    {
        $validation = Validator::make($request->all(), [

            'name'    => 'required|string|max:255',
            'email'   => 'nullable|email|max:255',
            'phone'   => 'required|string:max:15',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|',

        ]);

        $error_array = array();
        $success_output = '';

        if ($validation->fails()) {

            foreach ($validation->messages()->getMessages() as $field_name => $messages) {

                $error_array[] = $messages;
            }
        } else {

            $query = new Query;

            $query->store_query($request);

            $success_output = '<div class="alert alert-success"> Query Send Successfully! </div>';
        }

        $output = array(

            'error'   => $error_array,
            'success' => $success_output
        );

        echo json_encode($output);
    }

    public function member()
    {
        $borrow_book = new BorrowBook();
        $members = $borrow_book->getTopMember();

        return view('frontend.member', compact('members'));
    }

    public function search(Request $request)
    {
        $authors        = null;
        $administrators = null;
        $books          = null;

        $search_option = $request->search_option;
        $search_text   = strtolower($request->search_text);

        if($search_option == 'All') {
            
            $authors = Author::whereRaw('lower(authors.name) like (?)', ["%{$search_text}%"])->select('authors.id', 'authors.name', 'authors.photo', 'authors.birth_date', 'authors.death_date')->get();

            $administrators = Administrator::whereRaw('lower(administrators.name) like (?)', ["%{$search_text}%"])->select('administrators.position', 'administrators.name', 'administrators.photo', 'administrators.company','administrators.facebook', 'administrators.twitter', 'administrators.linkedin')->orderBy('priority', 'desc')->get();
            
            $books = Book::whereRaw('lower(books.name) like (?)', ["%{$search_text}%"])->select('books.id', 'books.name', 'books.photo')->orderBy('date', 'desc')->get();

        } elseif($search_option == 'Books') {

            $books = Book::whereRaw('lower(books.name) like (?)', ["%{$search_text}%"])->select('books.id', 'books.name', 'books.photo')->orderBy('date', 'desc')->get();

        } elseif ($search_option == 'Author') {

            $authors = Author::whereRaw('lower(authors.name) like (?)', ["%{$search_text}%"])->select('authors.id', 'authors.name', 'authors.photo', 'authors.birth_date', 'authors.death_date')->get();

        } else {

            $administrators = Administrator::whereRaw('lower(administrators.name) like (?)', ["%{$search_text}%"])->select('administrators.position', 'administrators.name', 'administrators.photo', 'administrators.company', 'administrators.facebook', 'administrators.twitter', 'administrators.linkedin')->orderBy('priority', 'desc')->get();
        }

        return view('frontend.search', compact('authors', 'administrators', 'books'));

    }
}
