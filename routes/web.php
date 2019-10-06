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
Route::get('/reactivate','PageController@getReactivate')->name('reactivate.page');

Route::get('/subscribers','PageController@getSubscribers')->name('subscribers.page');

Route::get('/admin/dashboard','PageController@getAdminDashboard')->name('admin.dashboard');
Route::resource('quotes','QuoteController');

Route::get('deactivate/subscriber/{id}', 'SubscriberController@deactivateSubscriber')->name('deactivate.subscriber');
Route::get('activate/subscriber/{id}', 'SubscriberController@activateSubscriber')->name('activate.subscriber');


Route::post('email/submit','SubscriberController@emailSubmit')->name('email.submit');
Route::get('email/unsubscribe/{id}','SubscriberController@emailUnsubscribe')->name('email.unsubscribe');


Route::get('account/reactivate/{id}','SubscriberController@accountReactivateMail')->name('account.reactivate.mail');
Route::post('account/reactivate','SubscriberController@accountReactivate')->name('account.reactivate');

Route::post('paypal', 'PaymentController@payWithpaypal')->name('paypal');

Route::get('status', 'PaymentController@getPaymentStatus');
