<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['id','title'];


        public function template()
    {

    return $this->belongsToMany('App\Template','templates_categories','category_id','template_id');

    }

}