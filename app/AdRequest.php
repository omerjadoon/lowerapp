<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdRequest extends Model
{
     public function belongtoads(){
        return $this->belongsTo('App\Ad','ad_id','id');
     }
     public function belongtobuyer(){
      return $this->belongsTo('App\BuyerDetail','buyer_id','id');
   }
}
