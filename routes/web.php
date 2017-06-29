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

	// Users
	Route::resource('users', 'UserController');
	Route::name('users_create')->post('/user', 'Auth\RegisterController@createUser');

	// Budgets
	Route::resource('budgets', 'BudgetController');

	Route::name('budgets_show')->get('/budget/{budget}/{year}', 'BudgetController@show');
	Route::name('budgets_year')->get('/budget/{budget}', 'BudgetController@setYear');
	Route::name('budgets_indexExecute')->get('/budget_real', 'BudgetController@indexExecute');
	Route::name('budgets_execute')->get('/budget_real/{budget}', 'BudgetController@execute');

	// Categories
	Route::resource('categories', 'CategoryController');

	Route::name('categories_create')->get('/categories/create/{budget}', 'CategoryController@create');
	Route::name('categories_edit')->get('/categories/edit/{category}/{year}', 'CategoryController@edit');
	Route::name('categories_destroy')->delete('/categories/{category}/{year}', 'CategoryController@destroy');

	// Items
	Route::resource('items', 'ItemController');

	Route::name('items_create')->get('/items/create/{category}', 'ItemController@create');
	Route::name('items_edit')->get('/item/{item}/{budget}/{year}', 'ItemController@edit');
	Route::name('items_destroy')->delete('/items/{item}/{year}', 'ItemController@destroy');

	// Values
	Route::resource('values', 'ValueController');

	Route::name('values_update')->post('/value', 'ValueController@update');
	Route::name('values_create')->get('/value/{item}', 'ValueController@create');
	Route::name('values_storeReal')->post('/realValue', 'ValueController@storeReal');

	// Reportes
	Route::name('reports_index')->get('/report_index/{report}', 'ReportController@index');
	Route::name('reports_history')->get('/report/{budget}', 'ReportController@history');
	Route::name('reports_plannedExecuted')->get('/report/{budget}/{year}/{month}', 'ReportController@plannedExecuted');
	Route::name('reports_month')->post('/report', 'ReportController@setMonth');

	// PDFs
	Route::name('pdfs_history')->get('/history_pdf/{budget}', 'PdfController@history');
	Route::name('pdfs_plannedExecuted')->get('/plannedExecuted_pdf/{budget}/{year}/{month}', 'PdfController@plannedExecuted');
	Route::name('pdfs_budget')->get('/budget_pdf/{budget}/{year}', 'PdfController@budget');

});

Route::get('/', 'BudgetController@index')->name('home');

Route::get('/loginT', function(){
	return view('Auth.login');
});

Route::get('/registerT', function(){
	return view('Auth.register');
});
