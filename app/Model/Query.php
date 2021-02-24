<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Session;

class Query extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'subject', 'message',
    ];

    // public static $validateRule = [

    //     'name'    => 'required|string|max:255',
    //     'email'   => 'nullable|email|max:255',
    //     'phone'   => 'required|numeric',
    //     'subject' => 'required|string|max:255',
    //     'message' => 'required|string|',
    // ];


    public function store_query(Object $request)
    {
        $this->name    = $request->name;
        $this->email   = $request->email;
        $this->phone   = $request->phone;
        $this->subject = $request->subject;
        $this->message = $request->message;
        $this->save();
    }

    public function destroy_query(Int $id)
    {
        $query = Query::findOrFail($id);
        $destroy_query = $query->delete();

        $destroy_query ? Session::flash('message', 'Query Deleted Successfully!') : Session::flash('message', 'Query Delete Failed!') ;
    }
}
