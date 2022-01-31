<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


//rotte per autenticazione

Auth::routes();

//rotta per area ADMIN

Route::middleware('auth')
      ->namespace('Admin')
      ->name('admin.')
      ->prefix('admin')
      ->group(function () {

      Route::get('/', 'HomeController@index')->name('home');
      });

//Home front

Route::get('{any?}', function () {
    return view('guests.home');
})->where('any','.*');

