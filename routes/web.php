<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});
Route::prefix('admin')->middleware('auth')->namespace('Admin')->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard')->middleware('auth');
    Route::get('/daftar-acara', 'EventController@index')->name('event');
    Route::get('/tambah-acara', 'EventController@create');
    Route::put('/tambah-acara', 'EventController@store');
    Route::delete('/tambah-acara', 'EventController@destroy');
    Route::get('/edit/{event}', 'EventController@edit');
    Route::put('/ubah-acara/{event}', 'EventController@update');
    Route::get('/{event}', 'EventController@show');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
