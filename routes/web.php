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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['namespace' => 'FrontEndCon'], function () {
    Route::resource('ship-comparator', 'ShipComparatorController');
    Route::post('selected-carrier', 'ShipComparatorController@selectedCarrier')->name('selected-carrier');
    Route::resource('ship-details', 'ShipDetailsController');
    Route::resource('ship-address', 'ShipAddressController');
    Route::resource('payment-design', 'PaymentDesignController');
});

Route::group(['namespace' => 'BackEndCon'], function () {
    Route::get('/', 'HomeController@index');
});




Route::group(['prefix' => 'api/v0.1'], function () {
    Route::resource('ship-details', 'Api\ShipDetailsController');
});
