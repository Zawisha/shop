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



Route::get('/cart',['uses'=>'CartController@execute','as'=>'cart']);

Route::get('/contact',['uses'=>'ContactController@execute','as'=>'contact']);