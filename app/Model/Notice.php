<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Session;

class Notice extends Model
{
    protected $fillable = [
        'date', 'title', 'slug', 'document', 'description',
    ];

    public function store_notice($request)
    {
        $image = $request->file('document');

        if ($image) {

            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/notices/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $this->document  = $image_url;

            //dd($image_url);
        }

        $this->date        = date('Y-m-d', strtotime($request->date));
        $this->title       = $request->title;
        $this->slug        = $request->slug;
        $this->description = $request->description;

        $store_notice = $this->save();

        $store_notice ? Session::flash('message', 'New Notice Created Successfully!') : Session::flash('message', 'Notice Create Failed!');
    }

    public function update_notice($request, $id)
    {
        try {

            $notice = $this::findOrFail($id);
            $image = $request->file('document');

            if ($image) {

                if (file_exists($notice->document)) unlink($notice->document);

                $image_name      = date('YmdHis');
                $ext             = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path     = 'public/images/notices/';
                $image_url       = $upload_path . $image_full_name;
                $success         = $image->move($upload_path, $image_full_name);
                $notice->document  = $image_url;
            }

            $notice->date        = date('Y-m-d', strtotime($request->date));
            $notice->title       = $request->title;
            $notice->slug        = $request->slug;
            $notice->description = $request->description;

            $update_notice = $notice->save();

            $update_notice ? Session::flash('message', 'Notice Updated Successfully!') : Session::flash('message', 'Notice Update Failed!');

        } catch (QueryException $exception) {

            return redirect()->back();
            //Session::flash('message', 'Email Or Phone Already Taken!');
        }
    }

    public function destroy_notice($id)
    {
        $notice = $this::findOrFail($id);
        if (file_exists($notice->document)) unlink($notice->document);

        $delete_notice = $this::where('id', $id)->delete();
        $delete_notice ? Session::flash('message', 'Notice Deleted Successfully!') : Session::flash('message', 'Notice Delete Failed!');
    }
}
