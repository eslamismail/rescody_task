<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes([
    'register' => false,
]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');
Route::middleware(['auth'])->group(function () {
    Route::resource('companies', 'CompanyController');
    Route::resource('employees', 'EmployeeController');
});
