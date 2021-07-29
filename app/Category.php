<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function cathasmanyad(){
        return $this->hasMany('App\Ad', 'cat_id', 'id');
    }
}
