<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    CRUD::resource('plan', 'PlanCrudController');
    CRUD::resource('planfeature', 'PlanFeatureCrudController');
    CRUD::resource('payment', 'PaymentCrudController');
    CRUD::resource('person', 'PersonCrudController');
    CRUD::resource('order', 'OrderCrudController');
    CRUD::resource('voucher', 'VoucherCrudController');
    CRUD::resource('planhasvoucher', 'PlanHasVoucherCrudController');
    CRUD::resource('slider', 'SliderCrudController');
    CRUD::resource('schedule', 'ScheduleCrudController');
    CRUD::resource('scheduledetail', 'ScheduleDetailCrudController');
    CRUD::resource('planhasschedule', 'PlanHasScheduleCrudController');
    CRUD::resource('transaction', 'TransactionCrudController');
    CRUD::resource('transactionstatus', 'TransactionStatusCrudController');
    CRUD::resource('transactionhasstatus', 'TransactionHasStatusCrudController');
    CRUD::resource('orderstatus', 'OrderStatusCrudController');
    CRUD::resource('tag', 'TagCrudController');
    CRUD::resource('orderhasstatus', 'OrderHasStatusCrudController');
    CRUD::resource('orderhasperson', 'OrderHasPersonCrudController');
    CRUD::resource('passport', 'PassportCrudController');
    CRUD::resource('personhaspassport', 'PersonHasPassportCrudController');
}); // this should be the absolute last line of this file