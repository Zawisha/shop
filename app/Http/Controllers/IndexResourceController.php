<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teamplate;
use App\Category;
use Illuminate\Support\Facades\Session;

class IndexResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $category = Category::all();

        if(isset($request->template_category)) {

            Session::put('find', $request->template_category);

        }



        if ((Session::has('find'))&&(Session::get('find'))) {

            $req_find = Session::get('find');
            $category_with_templates = Category::with('template')->where('id', '=', $req_find)->get();
            $cat = $category_with_templates[0]->template()->paginate(3);

            return view('site.index')->with(['templates' => $cat, 'category' => $category]);
        }
        else
        {
            $templates = Teamplate::paginate(4);
            return view('site.index')->with(['templates' => $templates, 'category' => $category]);
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
