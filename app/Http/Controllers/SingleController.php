<?php

namespace App\Http\Controllers;
use App\Teamplate;

use Illuminate\Http\Request;

class SingleController extends Controller
{
    public function execute($id){


        $templates = Teamplate::find($id);

        return view('site.single_product')->with(['templates'=> $templates]);
    }
}
