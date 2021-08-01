<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
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
     public function adhasmanyrequest(){
        return $this->hasMany('App\AdRequest', 'ad_id', 'id');
    }
    public function adrequestsend () {
        if(Auth::check()){
        return $this->hasOne('App\AdRequest', 'ad_id', 'id')->where('buyer_id',Auth ::user()->buyerDetail->id)->exists();
        }
     }
}
