<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Session;

class BookTable extends Model
{
    protected $fillable = [

        'name', 'table_id', 'date', 'start_time', 'end_time', 'status', 
    ];

    public function store_book_table(Object $request)
    {
        $this->name       = $request->name ;
        $this->table_id   = $request->table_id ;
        $this->date       = $request->date ;
        $this->start_time = $request->start_time ;
        $this->end_time   = $request->end_time ;
        $this->status     = 1 ;

        $store_book_table = $this->save();

        if ($store_book_table) {

            return 'Table Booked Confirmed!';

        } else {

            return 'Something went wrong!';
        }
    }

    public function get_table_booking()
    {
        $tables = $this::join('coffee_tables', 'book_tables.table_id', '=', 'coffee_tables.id') 
                         ->orderBy('book_tables.date', 'desc')
                         ->select('book_tables.*', 'coffee_tables.table_number')
                         ->get();
        return $tables;
    }

    public function changeBookingStatus($id, $status)
    {
        $book_table = $this::findOrFail($id);

        $book_table->status = $status;
        $change = $book_table->save();

        $change ?
        Session::flash('message', 'Status Change Successfully!') :
        Session::flash('message', 'Something went wrong!');
    }
}
