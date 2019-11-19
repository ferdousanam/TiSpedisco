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

Auth::routes(['verify' => true]);

Route::middleware('guest', function () {
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::get('/register', 'Auth\RegisterController@register')->name('register');
    
    Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
});

Route::get('/email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::group(['namespace' => 'FrontEndCon'], function () {
    Route::resource('ship-comparator', 'ShipComparatorController');
    Route::post('selected-carrier', 'ShipComparatorController@selectedCarrier')->name('selected-carrier');
    Route::resource('ship-details', 'ShipDetailsController');
    Route::resource('ship-address', 'ShipAddressController');
    Route::resource('payment-design', 'PaymentDesignController');
});

Route::group(['namespace' => 'BackEndCon'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'UserController@home')->name('home');
    Route::group(['middlware' => 'verified', 'prefix' => 'user'], function () {
        Route::get('/', 'HomeController@index');
        Route::get('/dashboard', 'UserController@dashboard')->name('user.dashboard');
        Route::get('/ticket', 'UserController@ticket')->name('user.ticket');
        Route::get('/tickets', 'UserController@getTickets')->name('user.getTickets');
        Route::post('/ticket', 'UserController@cruTicket')->name('cru.ticket');
        Route::get('/order', 'UserController@order')->name('user.order');
        Route::get('/address', 'UserController@address')->name('user.address');
        Route::get('/creditCard', 'UserController@creditCard')->name('user.creditCard');
        Route::get('/profile', 'UserController@profile')->name('user.profile');
        Route::get('/passChange', 'UserController@passChange')->name('user.passChange');
        Route::get('/fatture', 'UserController@fatture')->name('user.fatture');
    });
});


Route::group(['prefix' => 'api/v0.1'], function () {
    Route::resource('ship-details', 'Api\ShipDetailsController');
});

// Custom page route goes here
Route::get('/{slug}', 'HomeController@slug')->name('page.show');