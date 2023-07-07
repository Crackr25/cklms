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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/viewbook', 'api\Bookscontroller@index'); 
Route::post('/studentlogin', 'api\LoginController@login'); 
Route::post('/studentlogin1', 'api\LoginController1@index'); 
Route::get('/bookchapter/{id}', 'api\BooksController@bookChapter');
Route::get('/bookchapter2/{id}', 'api\Bookscontroller@bookChapter2'); 
