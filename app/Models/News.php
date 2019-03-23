<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //

    //relationships
    //each news has only one category one to one relation
    public function category()
    {
        return $this->belongsTo('App\Models\Category');

    }

    //each news has many tags one to many relation
    public function tags()
    {
        return $this->hasMany('App\Models\Tag');
    }


    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
