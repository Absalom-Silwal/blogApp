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
Route::namespace('App\Http\Controllers\Api')->group(function(){

    Route::post('register','BlogAppApiController@register')->name('register');
    Route::post('login', 'BlogAppApiController@login')->name('login');
    Route::get('/get/{type}','BlogAppApiController@get');
    Route::get('/view/{type}/{id}','BlogAppApiController@view');
    Route::middleware('auth:sanctum')->group(function(){
        Route::post('logout', 'BlogAppApiController@logout')->name('logout');
        Route::post('/upload','BlogAppApiController@upload')->name('upload.image');
        Route::post('/assign/category-to/{blog}','BlogAppApiController@assignCategory');
        Route::post('/create/{type}','BlogAppApiController@create');
        Route::post('/update/{type}/{id}','BlogAppApiController@update');
        Route::post('/delete/{type}/{id}','BlogAppApiController@delete');
    });

});
