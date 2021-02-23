<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Session;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'name',  'email', 'phone', 'address', 'photo',  'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static $validatePasswordRule = [

        'old_password'    => 'required|string',
        'new_password'    => 'required|string|min:8',
    ];

    public static $validatePhotoRule = [

        'photo'       => 'mimes:jpeg,jpg,png,gif|required|max:1999',
    ];

    public static $validateInfoRule = [

        'name'        => 'required|string|max:255',
        'email'       => 'required|email|max:255',
        'phone'       => 'numeric|nullable',
        'address'     => 'string|nullable',

    ];

    public function store_user($request)
    {
        $image = $request->file('photo');

        if ($image) {

            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/users/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $this->photo     = $image_url;
        }

        $this->name      = $request->name;
        $this->email     = $request->email;
        $this->phone     = $request->phone;
        $this->address   = $request->address;
        $this->password  = Hash::make($request->password);
        $user_store      = $this->save();
        $user_id         = $this->id;

        $user_info = $this::findOrFail($user_id);

        $user_info->assignRole($request->role_id);

        $user_store ? Session::flash('message', 'New User Created Successfully!') : Session::flash('message', 'User Create Failed!');
    }


    public function update_user($request, $id)
    {
        $user = $this::findOrFail($id);
        $image = $request->file('photo');

        if ($image) {

            if (file_exists($user->photo)) unlink($user->photo);

            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/users/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $user->photo     = $image_url;
        }

        $user->name      = $request->name;
        $user->email     = $request->email;
        $user->phone     = $request->phone;
        $user->address   = $request->address;
        $user_update     = $user->save();

        $user_update ? Session::flash('message', 'User Updated Successfully!') : Session::flash('message', 'User Update Failed!');
    }

    public function destroy_user($id)
    {
        $user = $this::findOrFail($id);
        if (file_exists($user->photo)) unlink($user->photo);

        $user_delete = $this::where('id', $id)->delete();

        $user_delete ? Session::flash('message', 'User Deleted Successfully!') : Session::flash('message', 'User Delete Failed!');
    }

    public function update_user_photo($request, $id)
    {
        $user  = $this::findOrFail($id);

        $image = $request->file('photo');

        if ($image) {

            if (file_exists($user->photo)) unlink($user->photo);

            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/users/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $user->photo     = $image_url;
        }

        $user_update       = $user->save();

        if ($user_update) {

            Session::flash('message', 'User Photo Updated Successfully!');
        } else {

            Session::flash('message', 'User Photo Update Failed!');
        }
    }

    public function update_user_password($request, $id)
    {
        $user = User::findOrFail($id);

        if (Hash::check($request->old_password, $user->password)) {
            $user->fill([

                'password' => Hash::make($request->new_password)

            ])->save();

            Session::flash('message', 'User Password Updated Successfully!');
        } else {

            Session::flash('message', 'User Password Updated Successfully!');
        }
    }

    public function update_user_info($request, $id)
    {
        try {

            $user  = $this::findOrFail($id);

            $user->name     = $request->name;
            $user->address  = $request->address;
            $user->email    = $request->email;
            $user->phone    = $request->phone;
            $user_update    = $user->save();

            if ($user_update) {

                Session::flash('message', 'User Info Updated Successfully!');

            } else {

                Session::flash('message', 'User Info Update Failed!');
            }
        } catch (QueryException $exception) {

            return redirect()->back()->withErrors('Email Already Taken!');
            //Session::flash('message', 'Email Or Phone Already Taken!');
        }
    }
}
