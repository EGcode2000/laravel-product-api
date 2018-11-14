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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
//Route::options('products', ['middleware' => 'cors', function(){return;}]);
//Route::options('products/{any?}', ['middleware' => 'cors', function(){return;}]);

Route::resource('products','ProductController',[
    'only'=>['index', 'store', 'update', 'destroy']
]);


/*
//just for practicing

Route::get('product', ['as' => 'index', 'uses' => 'ProductController@index']);
Route::post('product', ['as' => 'store', 'uses' => 'ProductController@store']);
Route::put('product/{id}', ['as' => 'update', 'uses' => 'ProductController@update']);
Route::delete('product/{id}', ['as' => 'delete', 'uses' => 'ProductController@destroy']);
*/