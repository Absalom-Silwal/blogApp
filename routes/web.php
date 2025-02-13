<?php

use Illuminate\Support\Facades\Route;

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
Route::namespace('App\Http\Controllers')->group(function(){
    Route::get('','BlogAppController@index');
    Route::get('/login','BlogAppController@loginModal');
    Route::get('/register','BlogAppController@registerModal');
    Route::get('/detail/{id}','BlogAppController@detail');
    Route::get('/get/{type}','BlogAppController@get');
    Route::get('/getFile','BlogAppController@getFile');
    Route::get('/addEdit/{type}','BlogAppController@addEdit');
    Route::post('register','BlogAppController@register');
    Route::post('login', 'BlogAppController@login');
    Route::middleware('auth:web')->group(function(){
        Route::post('logout', 'BlogAppController@logout');
        Route::post('/create/{type}','BlogAppController@create');
        Route::post('/update/{type}/{id}','BlogAppController@update');
        Route::post('/delete/{type}/{id}','BlogAppController@delete');
    });
    
});

