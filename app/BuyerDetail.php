<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyerDetail extends Model
{
    public function belongtocity(){
        return $this->belongsTo('App\City','city_id','id');
     }
     public function buyerhasmanyadrequest(){
        return $this->hasMany('App\AdRequest', 'buyer_id','id');
     }
}
