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
        });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
