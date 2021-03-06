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
Route::namespace('Api')
    ->group(function (){
        Route::get('/coupons', 'CouponController@index');
        Route::apiResource('/coupon_copies', 'CouponCopiesController')->only(['index','store']);
        Route::get('/coupon_types', 'CouponTypeController@index');
        Route::post('/send_coupon', 'CouponsFromReadersController@store');
        Route::post('/check_token', 'CaptchaController@check');
    });