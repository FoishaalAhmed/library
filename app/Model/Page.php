<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Session;

class Page extends Model
{
    protected $fillable = [
        'name', 'priority', 'text', 'photo', 
    ];

    public function store_page($request)
    {
        $image = $request->file('photo');

        if ($image) {

            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/pages/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $this->photo     = $image_url;
        }

        $this->name     = $request->name;
        $this->priority = $request->priority;
        $this->text     = $request->text;
        $store_page     = $this->save();

        $store_page ? Session::flash('message', 'New Page Created Successfully!') : Session::flash('message', 'Page Create Failed!');
    }

    public function update_page($request, $id)
    {
        $page = $this::findOrFail($id);
        
        $image = $request->file('photo');

        if ($image) {

            if (file_exists($page->photo)) unlink($page->photo);

            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/pages/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $page->photo     = $image_url;
        }

        $page->name     = $request->name;
        $page->priority = $request->priority;
        $page->text     = $request->text;
        $page_update    = $page->save();

        $page_update ? Session::flash('message', 'Page Updated Successfully!') : Session::flash('message', 'Page Update Failed!');
    }


    public function destroy_page($id)
    {
        $page = $this::findOrFail($id);
        if (file_exists($page->photo)) unlink($page->photo);

         $delete_page = $this::where('id', $id)->delete();

        $delete_page ? Session::flash('message', 'Page Deleted Successfully!') : Session::flash('message', 'Page Delete Failed!');
    }
}
