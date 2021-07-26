<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyerDetail extends Model
{
    public function belongtocity(){
        return $this->belongsTo('App\City','city_id','id');
     }
}
