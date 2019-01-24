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

Route::get('/', function () {
    return view('main.main');
})->name('main');

Route::namespace('Web\Main')->group(function (){
    Route::get('/coupons', 'CouponController@index')->name('coupons');
    Route::get('/chat', 'ChatController@index')->name('chat');
    Route::get('/projects', 'ProjectController@index')->name('projects');

    Route::get('/projects/{project}', 'ProjectController@show')->name('projects.view');
});


Route::namespace('Web\Admin')
    ->prefix('admin')
    ->group(function (){
        Route::middleware(['auth'])->group(function () {
            Route::get('/', "AdminController@main")->name('admin');
            Route::resource('/projects', "ProjectController",['names' => [
                'index' => 'projects.index',
                'create' => 'projects.create',
                'store' => 'projects.store',
                'show' => 'projects.show',
                'edit' => 'projects.edit',
                'update' => 'projects.update',
                'destroy' => 'projects.destroy',
            ]]);
            Route::resource('/coupons', "CouponController",['names' => [
                'index' => 'coupons.index',
                'create' => 'coupons.create',
                'store' => 'coupons.store',
                'show' => 'coupons.show',
                'edit' => 'coupons.edit',
                'update' => 'coupons.update',
                'destroy' => 'coupons.destroy',
            ]]);
            Route::resource('/coupon_types', "CouponTypeController",['names' => [
                'index' => 'coupon_types.index',
                'create' => 'coupon_types.create',
                'store' => 'coupon_types.store',
                'show' => 'coupon_types.show',
                'edit' => 'coupon_types.edit',
                'update' => 'coupon_types.update',
                'destroy' => 'coupon_types.destroy',
            ]]);
            Route::resource('/coupons_from_readers', "CouponsFromReadersController",['names' => [
                'index' => 'coupon_from_readers.index',
                'destroy' => 'coupon_from_readers.destroy',
            ]]);
        });
});

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home');
