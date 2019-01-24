<?php

namespace App\Http\Controllers;
use App\Teamplate;

use Illuminate\Http\Request;

class SingleController extends Controller
{
    public function execute($id, Request $request)
    {



      //  if($request ->isMethod('post')){

          $teamplate_like = Teamplate::where('title', 'LIKE', '%' . $request->search_text . '%')->get();
          //добавить валидацию
        //    dd('a');

         //   $msg = "This is a simple message.";
          //  return response()->json(array('msg'=> $msg), 200);

       // }

        if ($request->isMethod('get')) {
            $templates = Teamplate::find($id);
            return view('site.single_product')->with(['templates' => $templates]);
                        }
    }

    public function ajaxreq(Request $request){
        //$teamplate_like =$request->hidden_number;

        $teamplate_like = Teamplate::where('title', 'LIKE', '%' . $request->name . '%')->offset($request->hidden_number*4)->limit(4)->get();
//        $data = '123';
        return $teamplate_like;
    }


    //получаю количество записей в бд
    public function ajaxcount(Request $request){
        $teamplate_like = Teamplate::where('title', 'LIKE', '%' . $request->name . '%')->get();
        return $teamplate_like;
    }



}
