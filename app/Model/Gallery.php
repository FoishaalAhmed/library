<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Session;

class Gallery extends Model
{
    protected $fillable = [
        'photo', 'type', 'video', 
    ];

    public static $validateRule = [
        'photo' => 'mimes:jpeg,jpg,png,gif,webp|max:1999|nullable',
        'type'  => 'string|required|max:255',
        'video' => 'string|nullable|max:255',
    ];

    public function store_gallery($request)
    {
        $image = $request->file('photo');

        if ($image) {

            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/galleries/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $this->photo     = $image_url;
        }

        $this->type  = $request->type;
        $this->video = $request->video;

        $store_gallery = $this->save();

        $store_gallery ? Session::flash('message', 'New Gallery Created Successfully!') : Session::flash('message', 'Gallery Create Failed!');
    }

    public function update_gallery($request, $id)
    {
        $gallery = $this::findOrFail($id);

        $image = $request->file('photo');

        $gallery->type  = $request->type;

        if ($request->type == 'Photo') {

            if ($image) {

                if (file_exists($gallery->photo)) unlink($gallery->photo);

                $image_name      = date('YmdHis');
                $ext             = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path     = 'public/images/galleries/';
                $image_url       = $upload_path . $image_full_name;
                $success         = $image->move($upload_path, $image_full_name);
                $gallery->photo   = $image_url;
            }

            $gallery->video = Null;

        } else {

            if (file_exists($gallery->photo)) unlink($gallery->photo);
            $gallery->video = $request->video;
            $gallery->photo = Null;
        }

        

        $update_gallery    = $gallery->save();

        $update_gallery ? Session::flash('message', 'Gallery Updated Successfully!') : Session::flash('message', 'Gallery Update Failed!');
    }

    public function destroy_gallery($id)
    {
        $gallery = $this::findOrFail($id);

        if (file_exists($gallery->photo)) unlink($gallery->photo);

        $delete_gallery    = $this::where('id', $id)->delete();

        $delete_gallery ? Session::flash('message', 'Gallery Deleted Successfully!') : Session::flash('message', 'Gallery Delete Failed!');
    }
}
