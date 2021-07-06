<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table='cities';
    public function belongtostate(){
       return $this->belongsTo('App\State','state_id','id');
    }
}
