<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Supporter extends Model
{
    protected $fillable = [

        'first_name', 'last_name', 'nationality', 'email', 'phone', 'amount', 'currency', 
    ];

    public function store_support($request)
    {
        $this->first_name  = $request->first_name ;
        $this->last_name   = $request->last_name ;
        $this->nationality = $request->nationality ;
        $this->email       = $request->email ;
        $this->phone       = $request->phone ;
        $this->amount      = $request->amount ;
        $this->currency    = $request->currency ;
        $store_support     = $this->save();

        if($store_support) return 'Your information is collected! We will contact you soon.'; 
        
        else return 'Something went wrong';
    }
}
