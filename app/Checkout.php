<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    //
    public function orders()
    {
        return $this->hasMany('App\Order' ,'checkout_id');
    }
}
