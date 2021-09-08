<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AuthorBackground extends Model
{
    protected $fillable = [
        'photo',
    ];

    public static $validateRule = [
        'photo'      => 'mimes:jpeg,jpg,png,gif,webp|max:19999|required',
    ];

    public function storeAuthorBackground(Object $request)
    {
        $image = $request->file('photo');
        $image_name      = date('YmdHis');
        $ext             = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name . '.' . $ext;
        $upload_path     = 'public/images/authors/';
        $image_url       = $upload_path . $image_full_name;
        $success         = $image->move($upload_path, $image_full_name);
        $this->photo     = $image_url;
        $storeAuthorBackground = $this->save();

        $storeAuthorBackground
            ? session()->flash('message', 'Author Background Stored Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }

    public function updateAuthorBackground(Object $request, Int $id)
    {
        $background = $this::findOrFail($id);
        if (file_exists($background->photo)) unlink($background->photo);
        $image = $request->file('photo');
        $image_name      = date('YmdHis');
        $ext             = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name . '.' . $ext;
        $upload_path     = 'public/images/authors/';
        $image_url       = $upload_path . $image_full_name;
        $success         = $image->move($upload_path, $image_full_name);
        $background->photo     = $image_url;
        $updateAuthorBackground = $background->save();

        $updateAuthorBackground
            ? session()->flash('message', 'Author Background Updated Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }
}
