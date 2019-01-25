<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teamplate extends Model
{
    protected $table = 'templates';

    protected $fillable = ['id','title','text','price','alias','img'];



            public function categories()
    {
    return $this->belongsToMany('App\Category','templates_categories','template_id','category_id');
    }

}