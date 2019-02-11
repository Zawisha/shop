<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Teamplate;
use Illuminate\Support\Facades\Gate;


class UserPanelController extends Controller
{
    public function execute()
    {

$orders =Order::where('user_id','=',Auth::user()->id)->get();

$user_template=[];

        foreach ($orders as $order)
        {
            $user_template[]=Teamplate::where('id','=',$order->template_id)->get();
        }

        if(Gate::denies('Admin_perm',Auth::user()))
        {
            return view('site.user_cab')->with(['orders' => $user_template,'perm' =>'0']);
        }
        else
        {
            return view('site.user_cab')->with(['orders' => $user_template,'perm' =>'1']);
        }



    }
}
