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

Route::get('/', function () {
    return auth()->guard()->user() ? to_route('home') : to_route('login');
})->name('welcome');

Route::group([
    'namespace' => '\App\Http\Controllers',
], function () {
    Route::get('/login/callback', 'LoginCallbackController@store')
        ->name('login.callback');
});

Route::group([
    'namespace' => '\App\Http\Controllers',
    'middleware' => 'auth',
], function () {
    Route::controller('HomeController')->group(function () {
        Route::get('/home', 'index')->name('home');
        Route::get('/profile', 'profile')->name('profile');
    });
});
