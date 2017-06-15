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

	Route::name('categories_create')->get('/categories/create/{budget}', 'CategoryController@create');

	Route::resource('items', 'ItemController');

	Route::name('items_create')->get('/items/create/{category}', 'ItemController@create');

});

Route::get('/', 'BudgetController@index')->name('home');

Route::get('/loginT', function(){
	return view('Auth.login');
});

Route::get('/registerT', function(){
	return view('Auth.register');
});
