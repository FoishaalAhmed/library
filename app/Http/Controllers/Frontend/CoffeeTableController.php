<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\BookTable;
use App\Model\CoffeeTable;
use App\Model\Supporter;
use Illuminate\Http\Request;
use Validator;

class CoffeeTableController extends Controller
{
    public function index()
    {
        $coffees = CoffeeTable::orderBy('table_number', 'asc')->get();

        return view('frontend.table', compact('coffees'));
    }

    public function coffee(Request $request)
    {
        $error_array = array();
        $success_output = '';

        //echo $request->start_time;

        $table_book = BookTable::where('date', date('Y-m-d', strtotime($request->date)))->where('end_time' , '>=', $request->start_time)->where('end_time', '<=', $request->end_time)->where('table_id', $request->table_id)->count();

        //echo $table_book;

        if ($table_book > 0) {

            $success_output = '<div class="alert alert-danger"> Table Not Available in this time! </div>';

        } else {

            $validation = Validator::make($request->all(), [

                'date'        => 'required|date',
                'end_time'    => 'required|string|max:5',
                'start_time'  => 'required|string|max:5',
                'table_id'    => 'required|numeric',
                'name'        => 'required|string|max:255',

            ]);

            if ($validation->fails()) {

                foreach ($validation->messages()->getMessages() as $field_name => $messages) {

                    $error_array[] = $messages;
                }
            } else {

                $book_table = new BookTable();

                $return_message = $book_table->store_book_table($request);

                $success_output = '<div class="alert alert-success"> ' . $return_message . ' </div>';
            }
        }

        $output = array(

            'error'   => $error_array,
            'success' => $success_output
        );

        echo json_encode($output);
        
    }

    public function support(Request $request)
    {
        $validation = Validator::make($request->all(), [

            'currency'    => 'required|string|max:255',
            'email'       => 'nullable|email|max:255',
            'phone'       => 'required|string|max:15',
            'amount'      => 'required|numeric|min:10',
            'first_name'  => 'required|string|max:255',
            'last_name'   => 'required|string|max:255',
            'nationality' => 'nullable|string|max:255',

        ]);

        $error_array = array();
        $success_output = '';

        if ($validation->fails()) {

            foreach ($validation->messages()->getMessages() as $field_name => $messages) {

                $error_array[] = $messages;
            }
        } else {

            $support = new Supporter();

            $return_message = $support->store_support($request);

            $success_output = '<div class="alert alert-success"> '. $return_message .' </div>';
        }

        $output = array(

            'error'   => $error_array,
            'success' => $success_output
        );

        echo json_encode($output);
    }


}
