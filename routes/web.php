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

Route::get('/','WelcomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('notification/handling','NotificationController@handling');

Route::group(['middleware'=>'auth'],function(){

	Route::get('payment/detail/{plan_id}','PaymentController@detail')->name('payment.detail');
	Route::post('payment/checkout','PaymentController@checkout')->name('payment.checkout');
	Route::get('payment/success/{order_id}','PaymentController@success')->name('payment.success');

	Route::post('payment/installment','PaymentController@installment')->name('payment.installment');

	Route::get('orders/byauth','OrderController@byauth');
	Route::get('transactions/byauth','TransactionController@byauth');

	Route::resources([
		"orders"=>"OrderController",
		"transactions"=>"TransactionController"
	]);

	Route::get('getstatus/{order_id}','PaymentController@getstatus');

});


// backpack custom ====================================================================================
Route::group(['prefix' => config('backpack.base.route_prefix', 'admin'), 'middleware' => ['web','admin'], 'namespace' => 'Admin'], function () {
    // Backpack\MenuCRUD
    CRUD::resource('menu-item', 'MenuItemCrudController');
});

Route::get('{page}/{subs?}', ['uses' => 'PageController@index'])
    ->where(['page' => '^((?!admin).)*$', 'subs' => '.*']);
// ====================================================================================================