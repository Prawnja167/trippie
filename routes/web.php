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

Route::get('/','IndexController@index');
Route::get('/city/{city}','IndexController@city');


Auth::routes();

Route::group(['middleware' => 'auth'], function()
{
    Route::resource('/list/{list}/detail','HolidayDetailController');
    Route::resource('/list','HolidayController');
});

Route::resource('/place','PlaceController');	
Route::resource('/place/{place}/activities','PlaceAttractionController');

Route::post('/wishlist/{wishlist}','WishlistController@addWishlist');