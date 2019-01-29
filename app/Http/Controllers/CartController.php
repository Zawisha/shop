<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teamplate;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    public function execute(){

        if (Session::has('cart_list'))
        {
            $cart = Session::get('cart_list');
            $cart_id_to_db=[];
            foreach ($cart as $cart_id)
            {
                $cart_id_to_db[]=$cart_id['id'];
            }
            $cart_id_to_db = array_unique($cart_id_to_db);


            $cart_res=[];
            foreach ($cart_id_to_db as $cart)
            {
                $cart_res[]=Teamplate::where('id','=',$cart)->get();
            }

                //dd($cart_res);
            return view('site.cart') ->with(['cart_result' => $cart_res]);
        }

        else
        {
            return view('site.cart');
        }

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
            //количество
            Session::put('count', 1);
            //цена
            Session::put('price', $cart_result[0]->price);
        }

        $cart_result[0]=Session::get('count');
        $cart_result[1]=Session::get('price');



        if (Session::has('cart_list'))
        {

            $push_arr = ['id' => $request->name];
            Session::push('cart_list', $push_arr);

        }
else
{
    $push_arr = ['id' =>  $request->name];
    Session::push('cart_list',$push_arr);
}


     //   $cart = Session::get('cart_list');

        return  $cart_result;

    }


    public function delete_from_cart(Request $request){


    // return  Session::get('cart_list');


        if (Session::has('cart_list')) {

            $event_data_display = Session::get('cart_list');

            $cart=[];
            foreach ($event_data_display as $cart_id)
            {
                if($cart_id['id']!=$request->name) {
                    $cart[] = $cart_id['id'];
                }


            }

           $cart = array_unique($cart);

            Session::forget('cart_list');
           // $push_arr=[];
            foreach ($cart as $cart_one)
            {
                $push_arr= ['id' => $cart_one];
                //здесь получаю отдельные значения массива и запихиваю их ОТДЕЛЬНО в сессию
//                $push_arr = ['id' => $cart_one['id']];
               Session::push('cart_list', $push_arr);
            }

       //     return  Session::get('cart_list');
//return $push_arr;
            Session::forget('price');
            Session::forget('count');



            if (Session::has('cart_list')) {

$for_count= Session::get('cart_list');

            foreach ($for_count as $item)
            {
                $result =Teamplate::where('id','=',$item['id'])->get();

                if (Session::has('price'))
                {
                    $price_cart =  Session::get('price');
                    $price_cart +=$result[0]->price;
                    Session::put('price', $price_cart);
                }
                else
                {

                    $price_cart =$result[0]->price;
                    Session::put('price', $price_cart);

                }

                if(Session::has('count'))
                {
                    $count_cart =  Session::get('count');
                    $count_cart ++;
                    Session::put('count', $count_cart);
                }
                else
                {
                    Session::put('count', '1');
                }



            }







          //  $cart_result[0]=Session::get('count');
            $cart_result[0]=Session::get('price');
            $cart_result[1]=Session::get('count');
            return $cart_result;
            }

            else
            {
                return $cart_result='no items';
            }



        }



    }

}
