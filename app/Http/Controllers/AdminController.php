<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teamplate;
use Illuminate\Support\Facades\Validator;
use  Illuminate\Support\Facades\DB;

use App\Category;

class AdminController extends Controller
{

    public function add()
    {

        return view('site.add');

    }

    public function add_template(Request $request){
        $input = $request->except('_token');

        $validator = Validator::make($input, [

            'title' => 'required|max:255|unique:templates',
            'alias' =>'required|max:255|unique:templates',
            'price' => 'required',
            'img' =>'mimes:jpeg,jpg,png|required|max:100000',
        ]);


        if($validator ->fails()){

            return redirect()->route('add')->withErrors($validator)->withInput();

        }
        $input['img']=$input['title'];
       // dd($input);
        DB::table('templates')->insert([
            ['title' => $input['title'],'alias' => $input['alias'],'price' => $input['price'],'img' => $input['img']],
        ]);

dd($input);



    }


}


