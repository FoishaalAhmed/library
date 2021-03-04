<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Session;

class CoffeeTable extends Model
{
    protected $fillable = [
        'table_number', 'photo', 
    ];

    public static $validateRule = [

        'table_number' => 'required|string|max:255',
        'photo'        => 'nullable|string|max:255',

    ];

    public function store_coffee_table(Object $request)
    {
        $this->table_number = $request->table_number;
        $store_coffee_table = $this->save();

        $store_coffee_table ? Session::flash('message', 'New Table Created Successfully!') :
        Session::flash('message', 'Table Create Failed!');
    }

    public function update_coffee_table($request, $id)
    {
        $coffee_table = $this::findOrFail($id);

        $coffee_table->table_number = $request->table_number;
        $update_coffee_table        = $coffee_table->save();

        $update_coffee_table ? Session::flash('message', 'Table Updated Successfully!') :
        Session::flash('message', 'Table Update Failed!');
    }

    public function destroy_coffee_table($id)
    {
        $delete_coffee_table = $this::where('id', $id)->delete();

        $delete_coffee_table ? Session::flash('message', 'Table Deleted Successfully!') :
        Session::flash('message', 'Table Delete Failed!');
    }


}
