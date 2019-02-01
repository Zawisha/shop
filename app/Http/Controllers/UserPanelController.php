<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Teamplate;

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

        return view('site.user_cab')->with(['orders' => $user_template]);;
    }
}
