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

Route::get('home', 'AdvertisementController@index');
// Route::resource('advertisement', 'AdvertisementController', ['only' => [
//     'show'
// ]]);

Route::group(['prefix' => 'advertisement'], function() {
    Route::get('{id}', 'AdvertisementController@show')->where('id', '[0-9]+');
    Route::get('categories/{id}', 'AdvertisementController@showCategoryItems')->where('id', '[0-9]+')->name('advertisement.categories');
    Route::post('advertisement/filter', 'AdvertisementController@filter')->name('advertisement.filter');
});


Route::group(['middleware' => 'auth'], function() {
    Route::resource('account', 'AccountController');
    Route::resource('advertisement', 'AdvertisementController');
});
