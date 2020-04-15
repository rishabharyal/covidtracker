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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/actions', 'HomeController@actions');
Route::resource('/addresses', 'AddressController');
Route::resource('/infected-places', 'InfectedPlaceController');
Route::resource('/recently-visited-locations', 'RecentlyVisitedLocationController');
Route::resource('/infection-details', 'InfectionDetailsController');
Route::resource('/place-types', 'PlaceTypeController');
