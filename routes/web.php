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

Route::get('/email/verify', 'Auth\VerificationController@show')->name('verification.notice');

Route::group(['namespace' => 'FrontEndCon'], function () {
    Route::get('/', 'HomeController@index');
    Route::resource('ship-comparator', 'ShipComparatorController');
    Route::post('selected-carrier', 'ShipComparatorController@selectedCarrier')->name('selected-carrier');
    Route::resource('ship-details', 'ShipDetailsController');
    Route::resource('ship-address', 'ShipAddressController');
    Route::resource('payment-design', 'PaymentDesignController');
    Route::resource('invoice', 'InvoiceController');
    Route::resource('order-confirm', 'OrderConfirmController');

    Route::get('/home', 'UserController@home')->name('home');
    Route::group(['middleware' => 'verified', 'prefix' => 'user'], function () {
        Route::get('/', 'HomeController@index');
        Route::get('/passChange', 'UserController@passChange')->name('user.passChange');
        Route::post('/singleUpdate', 'UserController@singleUpdate')->name('profile.singleUpdate');

        Route::get('/dashboard', 'UserController@dashboard')->name('user.dashboard');
        Route::resource('order', 'UserOrderController', ['as' => 'user']);
        Route::resource('address', 'UserAddressController', ['as' => 'user']);
        Route::get('/creditCard', 'UserController@creditCard')->name('user.creditCard');
        Route::get('/profile', 'UserController@profile')->name('user.profile');
        Route::resource('fatture', 'UserInvoiceController', ['as' => 'user']);
        Route::get('/email/change/{token}', 'UserController@emailChange')->name('changeEmail.confirm');

        Route::get('/ticket', 'TicketController@ticket')->name('user.ticket');
        Route::get('/tickets', 'TicketController@getTickets')->name('user.getTickets');
        Route::get('/singleTicket', 'TicketController@singleTicket')->name('user.singleTicket');
        Route::post('/ticket', 'TicketController@cruTicket')->name('cru.ticket');
        Route::post('/reply', 'TicketController@cruReply')->name('cru.reply');
        Route::post('/fileUpload', 'TicketController@fileUpload')->name('ticket.fileUpload');
    });
});

Route::group(['namespace' => 'BackEndCon'], function () {
});

Route::group(['prefix' => 'api/v0.1', 'as' => 'api.'], function () {
    Route::resource('ship-details', 'Api\ShipDetailsController');
});

// Custom page route goes here
Route::get('/{slug}', 'HomeController@slug')->name('page.show');
