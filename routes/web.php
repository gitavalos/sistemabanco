<?php

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

Route::get('/', function () {return view('welcome');})->name('/');

Auth::routes();
Route::post('/realizartransferencia','SaldoController@realizartransferencia')->name('realizartransferencia');
Route::get('/consultasaldo','SaldoController@consultasaldo')->name('saldo');
Route::get('/transferenciasaldo','SaldoController@transferenciasaldo')->name('transferencia');
Route::get('/home', 'HomeController@index')->name('home');
