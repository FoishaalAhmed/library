<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Session;

class Contact extends Model
{
    protected $fillable = [

        'name', 'email', 'phone', 'mobile', 'fax', 'map', 'address', 
    ];

    public static $validateRule = [

        'name'    => 'required|string|max:255',
        'email'   => 'nullable|email|max:255',
        'phone'   => 'nullable|numeric',
        'fax'     => 'nullable|numeric',
        'mobile'  => 'required|numeric',
        'map'     => 'nullable|string',
        'address' => 'nullable|string',
        'fb'      => 'nullable|string|max:255',
        'twitter' => 'nullable|string|max:255',
        'linkedin' => 'nullable|string|max:255',
        'instagram' => 'nullable|string|max:255',
    ];

    public function update_contact($request, $id)
    {
        $contact = $this::findOrFail($id);

        $contact->name      = $request->name;
        $contact->email     = $request->email;
        $contact->phone     = $request->phone;
        $contact->fax       = $request->fax;
        $contact->mobile    = $request->mobile;
        $contact->map       = $request->map;
        $contact->address   = $request->address;
        $contact->fb        = $request->fb;
        $contact->twitter   = $request->twitter;
        $contact->linkedin  = $request->linkedin;
        $contact->instagram = $request->instagram;
        $update_contact   = $contact->save();

        $update_contact ? Session::flash('message', 'Contact Updated Successfully!') : Session::flash('message', 'Contact Update Failed!');
    }

}
