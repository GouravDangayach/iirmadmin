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
// Route::group([
//     'middleware' => 'api',
//     'namespace' => 'App\Http\Controllers\API',
//     'prefix' => 'api'
    
//     ], function ($router) {
    
//     Route::post('register', 'AuthController@register');
//     Route::post('login', 'AuthController@login');
// });

Route::get('/admin/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/{pathMatch}', function(){ return view('welcome'); })->where('pathMatch',".*");

// Route::get('/{pathMatch}', function(){ return view('page'); })->where('pathMatch',".*");