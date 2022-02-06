<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //Relazioni con Post
    public function posts(){
        return $this->belongsToMany('App\Post');
    }
}
