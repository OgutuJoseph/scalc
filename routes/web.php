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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');

Route::resource('employees','EmployeesController');
 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('net_incomes','NetIncomesController');

Route::get('show',function(){
    $salary = NetIncome::table('net_incomes')->get();
    return view('net_incomes.show', ['salary' => $salary]);
});
