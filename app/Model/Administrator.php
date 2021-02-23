<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Session;

class Administrator extends Model
{
    protected $fillable = [
        'name', 'position', 'company', 'facebook', 'twitter', 'linkedin', 'priority', 'bio', 'photo',
    ];

    public function store_administrator($request)
    {
        $image = $request->file('photo');

        if ($image) {

            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/administrators/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $this->photo     = $image_url;
        }

        $this->name     = $request->name;
        $this->position = $request->position;
        $this->company  = $request->company;
        $this->facebook = $request->facebook;
        $this->twitter  = $request->twitter;
        $this->linkedin = $request->linkedin;
        $this->priority = $request->priority;
        $this->bio      = $request->bio;

        $store_administrator = $this->save();

        $store_administrator ? Session::flash('message', 'New Administrator Created Successfully!') : Session::flash('message', 'Administrator Create Failed!');
    }

    public function update_administrator($request, $id)
    {
        $administrator = $this::findOrFail($id);

        $image = $request->file('photo');

        if ($image) {

            if (file_exists($administrator->photo)) unlink($administrator->photo);

            $image_name           = date('YmdHis');
            $ext                  = strtolower($image->getClientOriginalExtension());
            $image_full_name      = $image_name . '.' . $ext;
            $upload_path          = 'public/images/administrators/';
            $image_url            = $upload_path . $image_full_name;
            $success              = $image->move($upload_path, $image_full_name);
            $administrator->photo = $image_url;
        }

        $administrator->name     = $request->name;
        $administrator->position = $request->position;
        $administrator->company  = $request->company;
        $administrator->facebook = $request->facebook;
        $administrator->twitter  = $request->twitter;
        $administrator->linkedin = $request->linkedin;
        $administrator->priority = $request->priority;
        $administrator->bio      = $request->bio;

        $update_administrator = $administrator->save();

        $update_administrator ? Session::flash('message', 'Administrator Updated Successfully!') : Session::flash('message', 'Administrator Update Failed!');
    }

    public function destroy_administrator($id)
    {
        $administrator = $this::findOrFail($id);
        if (file_exists($administrator->photo)) unlink($administrator->photo);

        $destroy_administrator = $this::where('id', $id)->delete();

        $destroy_administrator ? Session::flash('message', 'Administrator Deleted Successfully!') : Session::flash('message', 'Administrator Delete Failed!');
    }
}
