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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register', 'API\RegisterController@register');

Route::middleware('auth:api')->group( function () {
    Route::resource('videogames', 'API\VideogameController');
});

Route::middleware('auth:api')->group( function () {
    Route::resource('comments', 'API\CommentController');
});
