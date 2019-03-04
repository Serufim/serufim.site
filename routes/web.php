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
            Route::get('/coupons/trashed', 'CouponController@trashed_index')->name('coupons.trashed');
            Route::get('/coupons/trashed/{coupon}/restore', 'CouponController@restore')->name('coupons.restore');
            Route::get('/coupons/trashed/{coupon}/force', 'CouponController@force')->name('coupons.force');
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
            Route::resource('/questions', "QuestionController",['names' => [
                'index'  => 'questions.index',
                'create' => 'questions.create',
                'store'  => 'questions.store',
                'show'   => 'questions.show',
                'edit'   => 'questions.edit',
                'update' => 'questions.update',
                'destroy'=> 'questions.destroy',
            ]]);
            Route::resource('/{question_id}/choice', "ChoiceController",['names' => [
                'index'  => 'choice.index',
                'create' => 'choice.create',
                'store'  => 'choice.store',
                'show'   => 'choice.show',
                'edit'   => 'choice.edit',
                'update' => 'choice.update',
                'destroy'=> 'choice.destroy',
            ]]);
            Route::resource('/coupons_from_readers', "CouponsFromReadersController",['names' => [
                'index' => 'coupon_from_readers.index',
                'destroy' => 'coupon_from_readers.destroy',
            ]]);
            Route::resource('/coupon_analitics', "CouponAnaliticsController",['names' => [
                'index' => 'coupon_analitics.index',
            ]]);
        });
});

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home');
