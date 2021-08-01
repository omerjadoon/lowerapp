<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdRequest extends Model
{
     public function belongtoads(){
        return $this->belongsTo('App\Ad','ad_id','id');
     }
}
