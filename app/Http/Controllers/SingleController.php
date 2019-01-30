<?php

namespace App\Http\Controllers;
use App\Teamplate;
use App\Category;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;

class SingleController extends Controller
{
    public function execute($id, Request $request)
    {

//вытащить отдельно категории и вщять код из функции similar

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


    //    $teamplate_like = Teamplate::where('title', 'LIKE', '%' . $request->name . '%')->offset($request->hidden_number*4)->limit(4)->get();

        $category_with_templates = Category::with('template')->where('title', 'LIKE', '%' . $request->name . '%')->get();
        $cat = $category_with_templates[0]->template()->get();
        $return_cat=[];

        $start_count = ($request->hidden_number)*4;
        $end_count = ($request->hidden_number*4)+3;
//длина массива
        $number_arr  = count($cat)-1;
        if($end_count >= $number_arr)
        {
            $end_count = $number_arr;
        }

        for ($i = $start_count; $i <= $end_count; $i++) {
            $return_cat[]=$cat[$i];
        }
//
//        for ($i =  4; $i <= 5; $i++) {
//            $return_cat[]=$cat[$i];
//        }

        return   $return_cat;
    }


    //получаю количество записей в бд
    public function ajaxcount(Request $request){

     //   $teamplate_like = Teamplate::where('title', 'LIKE', '%' . $request->name . '%')->get();
        $category_with_templates = Category::with('template')->where('title', 'LIKE', '%' . $request->name . '%')->get();
        $cat = $category_with_templates[0]->template()->get();
        return $cat;
    }

    public function refresh(Request $request)
    {
       // $template = Teamplate::where('title','=',$request->name)->get();
        $template = Teamplate::with('categories')->where('title','=',$request->name)->get();
        return $template;
    }

    public function testrefresh()
    {
//вытаскиваю с отношениями

        $category = Category::with('template') ->where('id' ,'=' ,'9') ->get();
            $cat = $category[0]->template;
        dd($cat);
    }



// вернет в вид шаблоны по категориям
    public function similar(Request $request){
        //выборка похожих по категориям

        $cat=[];
    foreach ($request->name as $req)
{
    $category = Category::with('template') ->where('id' ,'=' ,$req['id']) ->get();
    $cat[]=$category[0]->template;
}

$return_cat =[];
    $stop = '0';

    foreach ($cat as $ret_cat) {
        foreach ($ret_cat as $r_cat){
            $return_cat[] =$r_cat;
            if(count($return_cat)=='3')
            {
                $stop='1';
                break;
            }

        }
        if($stop=='1')
        {
            break;
        }
    }


        return  $return_cat;
    }




}
