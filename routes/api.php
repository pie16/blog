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

Route::get('/user', function (Request $request) {
    return $request->user();
});
    //->middleware('auth:api')
//Route::post('/register', 'Auth\RegisterController@register');


Route::get('/posts', 'Api\v1\PostsController@index');
Route::get('/posts/{id}', 'Api\v1\PostsController@show');
Route::post('/posts', 'Api\v1\PostsController@store');
Route::put('/posts/{id}', 'Api\v1\PostsController@update');
Route::delete('/posts/{id}', 'Api\v1\PostsController@destroy');