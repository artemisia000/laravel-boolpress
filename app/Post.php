<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
        'slug',
        'category_id',
        'cover',
    ];


    //Relazioni con categorie
    public function category(){
        return $this->belongsTo('App\Category');
    }


    //Relazioni con Tag
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

}
