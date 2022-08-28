<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\NombreControlador;
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

Route::get('/', function () {
    $x = 'Ro7alty';
    return view('welcome', ['name' => $x]);
});

Route::get('/techs', 'NombreControlador@index');

Route::get('/test', function () {
    return 'Docker works! :)';
});

/*Route::get('/toby', function(){
    return response()->json([
        'mess' => 'API'
    ]);
});*/
Route::get('/toby', 'NombreControlador@totest');

//to create multiple routes... mapped to ContactController
//These routes are used to serve HTML templates and also as API endpoints for working with the
//Contact Model
//Route::resource('contacts', 'ContactController');
//to create a controller that will only expose a RESTful API
//to exclude the routes that are used to serve the HTML templates
//Route::apiResource('', '');
//resource