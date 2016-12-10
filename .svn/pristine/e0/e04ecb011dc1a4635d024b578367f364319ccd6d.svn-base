<?php

/*
  |--------------------------------------------------------------------------
  | Routes File
  |--------------------------------------------------------------------------
  |
  | Here is where you will register all of the routes in an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */



/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | This route group applies the "web" middleware group to every route
  | it contains. The "web" middleware group is defined in your HTTP
  | kernel and includes session state, CSRF protection, and more.
  |
 */

Route::group(['middleware' => ['web', 'auth']],
        function () {

    Route::match(['get', 'post'], 'profile', 'ProfileController@index');
    Route::post('profile/update/{id}', 'ProfileController@update');
    Route::get('profile/edit/{id}', 'ProfileController@edit');
    Route::post('profile/store', 'ProfileController@store');

    Route::get('credit-card', 'CreditCardController@index');
    Route::get('balance', 'CreditCardController@showBalance');
    Route::get('userBalanceManagement', 'CreditCardController@manage');
    Route::get('credit-card/edit/{id}', 'CreditCardController@edit');
    Route::post('credit-card/update/{id}', 'CreditCardController@update');

    Route::post('payment/{id}', 'PaypalController@store');
    Route::get('increase/balance', 'PaypalController@increaseBalance');

    Route::get('subscription', 'HomeController@subscription');

    Route::get('subscription/unsubscribe', 'HomeController@unsubscribe');


    Route::get('history/payment', 'PaymentHistoryController@index');
});

Route::group(['middleware' => 'web'],
        function () {
    Route::auth();
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', 'HomeController@index');
});

