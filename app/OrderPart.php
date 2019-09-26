<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderPart extends Model
{
    public function order(){
        return $this->belongsTo('App\Order');
    }

    public function products(){
        return $this->hasMany('App\Product');
    }
}
