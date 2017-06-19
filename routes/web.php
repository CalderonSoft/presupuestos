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

	Route::resource('items', 'ItemController');

	Route::resource('values', 'ValueController');

	Route::name('categories_create')->get('/categories/create/{budget}', 'CategoryController@create');

	Route::name('categories_edit')->get('/categories/edit/{category}/{year}', 'CategoryController@edit');

	Route::name('categories_destroy')->delete('/categories/{category}/{year}', 'CategoryController@destroy');

	Route::name('items_create')->get('/items/create/{category}', 'ItemController@create');

	Route::name('budgets_show')->get('/budget/{budget}/{year}', 'BudgetController@show');

	Route::name('budgets_year')->get('/budget/{budget}', 'BudgetController@setYear');

	Route::name('items_edit')->get('/item/{item}/{budget}/{year}', 'ItemController@edit');

	Route::name('values_update')->post('/value', 'ValueController@update');



});

Route::get('/', 'BudgetController@index')->name('home');

Route::get('/loginT', function(){
	return view('Auth.login');
});

Route::get('/registerT', function(){
	return view('Auth.register');
});
