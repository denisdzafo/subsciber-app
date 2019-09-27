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

Route::get('/','PageController@getIndex')->name('index.page');
Route::get('/unsubscribe','PageController@getUnsubscribe')->name('unsubscribe.page');


Route::post('email/submit','SubscriberController@emailSubmit')->name('email.submit');
Route::get('email/unsubscribe/{id}','SubscriberController@emailUnsubscribe')->name('email.unsubscribe');

Route::post('paypal', 'PaymentController@payWithpaypal')->name('paypal');

Route::get('status', 'PaymentController@getPaymentStatus');
