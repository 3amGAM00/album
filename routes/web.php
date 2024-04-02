<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

Route::group(['prefix'=>"/","namespace"=>"App\Http\Controllers\Album"],function(){
    Route::get("/","AlbumController@index");
    Route::post("/Album/store","AlbumController@store");
    Route::post("/Album/update","AlbumController@update");
    Route::get('/Album/show/{id}',"AlbumController@show");    
    Route::get('/Album/delete/{id}',"AlbumController@destroy");    
    Route::group(['prefix'=>"/image"],function(){
        Route::post('/store',"ImageController@store");
        Route::get('/delete/{id}',"ImageController@destroy");
    });

});
