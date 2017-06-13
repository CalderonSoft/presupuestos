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

Route::group(['middleware' => 'auth'], function(){

	Route::resource('budgets', 'BudgetController');

	Route::resource('categories', 'CategoryController');

});

Route::get('/', 'BudgetController@index')->name('home');

