<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::namespace('App\Http\Controllers')->group(function(){

    Route::post('register','BlogAppController@register')->name('register');
    Route::post('login', 'BlogAppController@login')->name('login');
    Route::get('/get/{type}','BlogAppController@get');
    Route::get('/view/{type}/{id}','BlogAppController@view');
    Route::middleware('auth:sanctum')->group(function(){
        
        Route::post('/upload','BlogAppController@upload')->name('upload.image');
        Route::post('/assign/category-to/{blog}','BlogAppController@assignCategory');
        Route::post('/create/{type}','BlogAppController@create');
        Route::post('/update/{type}/{id}','BlogAppController@update');
        Route::post('/delete/{type}/{id}','BlogAppController@delete');
    });

});
