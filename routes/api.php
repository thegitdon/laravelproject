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
Route::apiResource('contacts', 'ContactController');
//https://www.twilio.com/blog/building-and-consuming-a-restful-api-in-laravel-php
//https://www.techiediaries.com/laravel/php-laravel-7-6-tutorial-crud-example-app-bootstrap-4-mysql-database/
//https://www.techiediaries.com/install-laravel-8-php-7-3-composer/
//https://www.youtube.com/playlist?list=PLAXHw-BiDq2qtHnYMHhEuOomdIg--mDRy
//https://www.youtube.com/watch?v=HqpC86CvrRU&list=PLuaRu05D7vP4RwIaMIs2zB3rmLEueL_hi&index=10&ab_channel=YouDevs
//https://www.youtube.com/watch?v=p3Z3RR091Wk&ab_channel=T%C3%BAHo%C3%A0ng
//https://medium.com/techvblogs/build-rest-api-with-laravel-879137ef8679
//Route::get('contacts', "ContactController@index");
//Route::post('contacts', "ContactController@store");
