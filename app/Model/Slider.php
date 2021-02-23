<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Session;

class Slider extends Model
{
    protected $fillable = [
        'photo', 
    ];

    public static $validateStoreRule = [

        'photo' => 'mimes:jpeg,jpg,png,gif,webp|max:1999|required',
        'title' => 'nullable|string|max:255',
        'text'  => 'nullable|string',
    ];

    public static $validateUpdateRule = [
        'photo' => 'mimes:jpeg,jpg,png,gif,webp|max:1999|nullable',
        'title' => 'nullable|string|max:255',
        'text'  => 'nullable|string',
    ];

    public function store_slider($request)
    {
        $image = $request->file('photo');

        $image_name      = date('YmdHis');
        $ext             = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name . '.' . $ext;
        $upload_path     = 'public/images/sliders/';
        $image_url       = $upload_path . $image_full_name;
        $success         = $image->move($upload_path, $image_full_name);
        $this->photo     = $image_url;
        $this->title     = $request->title;
        $this->text      = $request->text;

        $store_slider    = $this->save();

        $store_slider ? Session::flash('message', 'New Slider Created Successfully!') : Session::flash('message', 'Slider Create Failed!');

    }

    public function update_slider($request, $id)
    {
        $slider = $this::findOrFail($id);

        $image = $request->file('photo');

        if ($image) {

            if (file_exists($slider->photo)) unlink($slider->photo); 

            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/sliders/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $slider->photo     = $image_url;
        }

        $slider->title     = $request->title;
        $slider->text      = $request->text;

        $update_slider    = $slider->save();

        $update_slider ? Session::flash('message', 'Slider Updated Successfully!') : Session::flash('message', 'Slider Update Failed!');

    }

    public function destroy_slider($id)
    {
        $slider = $this::findOrFail($id);

        if (file_exists($slider->photo)) unlink($slider->photo); 

        $delete_slider    = $this::where('id', $id)->delete();

        $delete_slider ? Session::flash('message', 'Slider Deleted Successfully!') : Session::flash('message', 'Slider Delete Failed!');

    }
}
