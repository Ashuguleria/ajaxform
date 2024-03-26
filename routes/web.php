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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/',[App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::group(['middleware'=>['auth', 'isUser']], function() {
    Route::group(['prefix' => 'user', 'as'=> 'user.'], function() {
        Route::get('/', 'TestController@index')->name('index');
        Route::get('create', 'TestController@create')->name('create');
        Route::post('/', 'TestController@store')->name('store');
    });
});
