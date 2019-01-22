<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teamplate extends Model
{
    protected $table = 'templates';

    protected $fillable = ['id','title','text','price','alias','img'];

}
