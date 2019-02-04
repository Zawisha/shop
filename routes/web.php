<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();


Route::resource('/', 'IndexResourceController');

Route::get('/single/{id}',['uses'=>'SingleController@execute','as'=>'single']);
Route::post('/single',['uses'=>'SingleController@ajaxreq','as'=>'ajaxreq']);
Route::post('/count_elem',['uses'=>'SingleController@ajaxcount','as'=>'ajaxcount']);
Route::post('/refresh_template',['uses'=>'SingleController@refresh','as'=>'refresh']);
Route::post('/similar_template',['uses'=>'SingleController@similar','as'=>'similar']);

Route::get('/refresh_template',['uses'=>'SingleController@testrefresh','as'=>'testrefresh']);

Route::get('/cart',['uses'=>'CartController@execute','as'=>'cart']);

Route::get('/contact',['uses'=>'ContactController@execute','as'=>'contact']);

Route::get('/cart',['uses'=>'CartController@execute','as'=>'cart']);
Route::post('/add_to_cart',['uses'=>'CartController@add_one_more','as'=>'cart']);
Route::post('/delete_from_cart',['uses'=>'CartController@delete_from_cart','as'=>'delete_item']);

Route::get('/user',['uses'=>'UserPanelController@execute','as'=>'user_panel']);

Route::post('/end_order',['uses'=>'CartController@end_order','as'=>'end_order']);
//админка


Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
Route::get('/',['uses'=>'AdminController@admin_execute','as'=>'adminka']);
Route::get('/add',['uses'=>'AdminController@add','as'=>'add']);
Route::post('/add',['uses'=>'AdminController@add_template','as'=>'add_template']);
});
//добавить заказ
