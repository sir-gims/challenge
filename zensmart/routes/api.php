<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    // o
//    return $request->user();
//});


Route::get('counter', 'CounterController@index');
Route::get('counter/one', 'CounterController@oneCounter');

Route::post('counter/iniate', 'CounterController@iniateCounter');
//Route::post('counter/updateClickTally', 'CounterController@updateCounter');
