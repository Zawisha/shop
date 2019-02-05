<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teamplate;
use Illuminate\Support\Facades\Validator;
use  Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;



use App\Category;

class AdminController extends Controller
{

    public function admin_execute()
    {
        if(Gate::denies('Admin_perm',Auth::user()))
        {
            abort(403);
        };
        return view('site.admin_panel');
    }


    public function add()
    {
        if(Gate::denies('Admin_perm',Auth::user()))
        {
            abort(403);
        };
        return view('site.add');

    }

    public function add_template(Request $request){
        if(Gate::denies('Admin_perm',Auth::user()))
        {
            abort(403);
        };


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

        return redirect()->route('adminka');



    }


}


