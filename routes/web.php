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

Auth::routes();

// Route::resource('home', 'AdvertisementController');
Route::get('home', 'AdvertisementController@index');
// Route::get('advertisement/{id}', 'AdvertisementController@show')->name('advertisement.show');
Route::resource('home', 'AdvertisementController', ['only' => [
    'index', 'show'
]]);


Route::group(['middleware' => 'guest'], function() {
    //
});


Route::group(['middleware' => 'auth'], function() {
    Route::resource('account', 'AccountController');

    Route::resource('advertisement', 'AdvertisementController'); 
    // Route::delete('advertisement/{advertisement}', 'AdvertisementController@destroy')->name('advertisement.destroy');  
    //
});
