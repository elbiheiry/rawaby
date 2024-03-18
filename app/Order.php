<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = ['name' ,'qty' ,'price' ,'kind' ,'type' ,'cutting' ,'packing' ,'head' ,'comments' ,'total'];
}
