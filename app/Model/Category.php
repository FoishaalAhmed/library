<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Session;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    public static $validateStoreRule = [

        'name'  => 'required|string|max:255|unique:categories,name',
    ];

    public static $validateUpdateRule = [

        'name' => 'required|string|max:255',
    ];

    public function store_category($request)
    {
        $this->name         = $request->name;
        $category           = $this->save();

        if ($category) {

            Session::flash('message', 'New Category Created Successfully!');

        } else {

            Session::flash('message', 'Category Create Failed!');
        }
    }

    public function update_category($request, $id)
    {
        try {

            $category  = $this::findOrFail($id);

            $category->name     = $request->name;
            $category_update    = $category->save();

            if ($category_update) {

                Session::flash('message', 'Category Updated Successfully!');

            } else {

                Session::flash('message', 'Category Update Failed!');
            }

        } catch (QueryException $exception) {

            return redirect()->back();
            //Session::flash('message', 'Email Or Phone Already Taken!');
        }
    }

    public function delete_category($id)
    {

        $category_delete = $this::where('id', $id)->delete();

        if ($category_delete) {

            Session::flash('message', 'Category Deleted Successfully!');

        } else {

            Session::flash('message', 'Category Delete Failed!');
        }
    }
}
