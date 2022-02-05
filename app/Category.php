<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //Relazione con Post
    public function posts() {
        return $this->hasMany('App\Post');
    }
}
