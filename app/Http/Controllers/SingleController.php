<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingleController extends Controller
{
    public function execute(){
        return view('site.single_product');
    }
}
