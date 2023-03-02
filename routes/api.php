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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
        Route::get('list', 'App\Http\Controllers\PersonController@list');
        Route::post('create', 'App\Http\Controllers\PersonController@create');
        Route::put('update/{id}', 'App\Http\Controllers\PersonController@update');
        Route::delete('destroy/{id}', 'App\Http\Controllers\PersonController@destroy');
        Route::get('show/{id}', 'App\Http\Controllers\PersonController@show');
});
