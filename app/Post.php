<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
        'slug',
    ];


    //Relazioni con categorie
    public function category(){
        return $this->belongsTo('App\Category');
    }
}
