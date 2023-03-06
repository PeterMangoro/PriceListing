<?php

// use App\Http\Controllers\PaynowController;

// Paynow
// Route::controller(PaynowController::class)
//     ->prefix('user')
//     ->name('payments.')
//     ->middleware([
//         'auth:sanctum',
//         config('jetstream.auth_session'),
//         'verified',
//     ])
//     ->group(function () {
//         Route::get('/pay', 'newTransaction')->name('index');
//     });

// Route::get('/stripe-payment', [StripeController::class, 'handleGet']);
// Route::post('/stripe-payment', [StripeController::class, 'handlePost'])->name('stripe.payment');
// // Stripe
// Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function(){
//     Route::get('/user/setup-intent', [UserController::class, 'getSetupIntent']);
//     Route::post('/user/payments', [UserController::class,'postPaymentMethods']);
//     Route::get('/user/payment-methods', [UserController::class, 'getPaymentMethods']);
//     Route::post('/user/remove-payment', [UserController::class,'removePaymentMethod']);
//     Route::put('/user/subscription', [UserController::class, 'updateSubscription']);
// });

// Route::get('/', function (\Illuminate\Http\Request $request) {
//     $user = $request->user();
//     $user->modifyPermission('Edit');
// });

//   Route::post('/subscribe', 'StripeController@processSubscription');
// welcome page only for subscribed users
//   Route::get('/welcome/subscribe', 'StripeController@showWelcome')->middleware('subscribed');
