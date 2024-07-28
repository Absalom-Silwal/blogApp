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
    Route::post('register','BlogAppController@register');
    Route::post('login', 'BlogAppController@login');
    Route::middleware('auth:sanctum')->group(function () {
        //need type variable
        Route::resource('posts', PostController::class);
        Route::get('posts/search', [PostController::class, 'search']);
        Route::resource('categories', CategoryController::class);
    });
});

