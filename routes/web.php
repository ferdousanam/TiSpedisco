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

Route::get('/sess', function () {
    dd(session()->all());
    return session()->all();
});

Auth::routes(['verify' => true]);

Route::middleware('guest', function () {
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::get('/register', 'Auth\RegisterController@register')->name('register');

    Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
});


Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::group(['namespace' => 'FrontEndCon'], function () {
    Route::resource('ship-comparator', 'ShipComparatorController');
    Route::post('selected-carrier', 'ShipComparatorController@selectedCarrier')->name('selected-carrier');
    Route::resource('ship-details', 'ShipDetailsController');
    Route::resource('ship-address', 'ShipAddressController');
    Route::resource('payment-design', 'PaymentDesignController');
    Route::resource('order-confirm', 'OrderConfirmController');
});

Route::group(['namespace' => 'BackEndCon'], function () {
    Route::get('/', 'HomeController@index');
});

Route::group(['prefix' => 'api/v0.1', 'as' => 'api.'], function () {
    Route::resource('ship-details', 'Api\ShipDetailsController');
});

// Custom page route goes here
Route::get('/{slug}', 'HomeController@slug')->name('page.show');
