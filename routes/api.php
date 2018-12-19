<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace'=>'API','middleware'=>'auth:api'],function(){
	Route::post('payment/checkout','PaymentController@checkout');
});

Route::group(['namespace'=>'API'],function(){
	Route::resources([
		"plans"=>"PlanController",
		"schedules"=>"ScheduleController"
	]);

	Route::post('getvoucher','VoucherController@getVoucher');
});
