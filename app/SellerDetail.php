<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerDetail extends Model
{
    public function belongtocity(){
        return $this->belongsTo('App\City','city_id','id');
     }
     public function sellerpostedmanyads()
     {
         return $this->hasMany('App\Ad','seller_id','id');
     }
     public function belongtouser(){
        return $this->belongsTo('App\User','user_id','id');
     }
  

}

