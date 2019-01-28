<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teamplate;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    public function execute(){
        return view('site.cart');
    }

    public function add_one_more(Request $request){

        $cart_result =Teamplate::where('id','=',$request->name)->get();

        if (Session::has('count'))
        {
            //количество
            $count_cart =  Session::get('count');
            $count_cart ++;
            Session::put('count', $count_cart);
            //цена
            $price_cart =  Session::get('price');
            $price_cart +=$cart_result[0]->price;
            Session::put('price', $price_cart);

        }
        else
        {
            Session::put('count', 1);
            Session::put('price', $cart_result[0]->price);
        }


        return  $cart_result[0]->price;

    }

}
