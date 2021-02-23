<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Session;

class Author extends Model
{
    protected $fillable = [
        'name', 'birth_date', 'death_date', 'genres', 'photo', 'biography',
    ];

    public function store_author($request)
    {
        $image = $request->file('photo');

        if ($image) {

            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/authors/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $this->photo     = $image_url;
        }

        $this->name       = $request->name;
        $this->birth_date = date('Y-m-d', strtotime($request->birth_date));
        $this->death_date = date('Y-m-d', strtotime($request->death_date));
        $this->biography  = $request->biography;
        if ($request->genres != null) $this->genres = implode(',', $request->genres);
        $store_author     = $this->save();

        $store_author ? Session::flash('message', 'New Author Created Successfully!') : Session::flash('message', 'Author Create Failed!');
    }

    public function update_author($request, $id)
    {
        $author = $this::findOrFail($id);

        $image = $request->file('photo');

        if ($image) {

            if (file_exists($author->photo)) unlink($author->photo);

            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/authors/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $author->photo   = $image_url;
        }

        $author->name       = $request->name;
        $author->birth_date = date('Y-m-d', strtotime($request->birth_date));
        $author->death_date = date('Y-m-d', strtotime($request->death_date));
        $author->biography  = $request->biography;
        if ($request->genres != null) $author->genres = implode(',', $request->genres);
        else $author->genres = $request->genres;
        $update_author      = $author->save();

        $update_author ? Session::flash('message', 'Author Updated Successfully!') : Session::flash('message', 'Author Update Failed!');
    }

    public function destroy_author($id)
    {
        $author = $this::findOrFail($id);
        if (file_exists($author->photo)) unlink($author->photo);

        $delete_author = $this::where('id', $id)->delete();
        $delete_author ? Session::flash('message', 'Author Deleted Successfully!') : Session::flash('message', 'Author Delete Failed!');
    }
}
