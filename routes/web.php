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

Route::get('/', 'AdvertisementController@index');
Route::get('categories/{id}', 'AdvertisementController@showCategoryItems')->where('id', '[0-9]+')->name('advertisement.categories');

Route::group(['prefix' => 'advertisement'], function() {
    Route::get('{id}', 'AdvertisementController@show')->where('id', '[0-9]+');
    Route::post('filter', 'AdvertisementController@filter')->name('advertisement.filter');
});


Route::group(['middleware' => 'auth'], function() {
    Route::resource('account', 'AccountController');
    Route::get('profile/edit/{option?}/{id?}', 'AccountController@editAccount')->name('profile.edit');
    
    Route::resource('advertisement', 'AdvertisementController');
    
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
});
