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
    return view('welcome');
});

Route::resource('budgets', 'BudgetController');


Route::get('/home', function () {
    return view('Auth/home');
});

Route::get('/login', function () {
    return view('Auth/login');
});

Route::get('/register', function () {
    return view('Auth/registro');
});
