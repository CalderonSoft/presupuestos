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
	Route::name('budgets.index')->get('budgets', 'BudgetController@index');
	Route::name('budgets_edit')->get('budgets_edit', 'BudgetController@edit');
	Route::name('budgets.store')->post('budgets', 'BudgetController@store');
	Route::name('budgets_create')->get('budgets_create', 'BudgetController@create');

});

Route::get('/', 'BudgetController@index')->name('home');

Route::resource('budgets', 'BudgetController');
