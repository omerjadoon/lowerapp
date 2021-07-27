<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    public function adhasmanyimage(){
        return $this->hasMany('App\AdImage', 'ad_id', 'id');
    }
    public function belongtoseller(){
        return $this->belongsTo('App\SellerDetail','seller_id','id');
     }
     public function belongtocategory(){
        return $this->belongsTo('App\Category','cat_id','id');
     }
}
