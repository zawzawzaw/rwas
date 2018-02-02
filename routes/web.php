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

Route::get('/', function () {
  return view('welcome');
});

Route::get('xtopia', function () {
    // return view('welcome');
  return 'xtopia';
});

Route::get('drs', function() {
  return 'drs';
});

Route::get('seaware', 'SoapController@show');

Route::get('fetch_seaware_csv', 'FetchSeawareCsvController@index');

Route::resource('cabin_inventory', 'CabinInventoryController');