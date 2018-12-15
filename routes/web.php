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

Route::get('payment/detail/{plan_id}','PaymentController@detail')->name('payment.detail');

Route::group(['middleware'=>'auth'],function(){
	Route::post('payment/checkout','PaymentController@checkout')->name('payment.checkout');
});


// backpack custom ====================================================================================
Route::group(['prefix' => config('backpack.base.route_prefix', 'admin'), 'middleware' => ['web','admin'], 'namespace' => 'Admin'], function () {
    // Backpack\MenuCRUD
    CRUD::resource('menu-item', 'MenuItemCrudController');
});

Route::get('{page}/{subs?}', ['uses' => 'PageController@index'])
    ->where(['page' => '^((?!admin).)*$', 'subs' => '.*']);
// ====================================================================================================