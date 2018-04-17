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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::post('/profile/update', 'HomeController@update')->name('profile.update');
Route::post('/password/change', 'HomeController@change_password')->name('password.change');



// Internals
Route::get('/m/home', 'Internal\HomeController@index')->name('m.home');
Route::get('/m/login', 'Auth\Internal\LoginController@showLoginForm')->name('m.login');
Route::post('/m/login', 'Auth\Internal\LoginController@login')->name('m.login');
Route::get('/m/register', 'Auth\Internal\RegisterController@showRegisterForm')->name('m.register');
Route::post('/m/register', 'Auth\Internal\RegisterController@register')->name('m.register');
Route::post('/m/logout', 'Auth\Internal\LoginController@logout')->name('m.logout');

Route::get('/m/profile', 'Internal\HomeController@profile')->name('m.profile');
Route::post('/m/profile/update', 'Internal\HomeController@update')->name('m.profile.update');
Route::post('/m/password/change', 'Internal\HomeController@change_password')->name('m.password.change');

// Patients
Route::get('/m/patients', 'Internal\PatientsController@index')->name('m.patients');
Route::post('/m/patients/create', 'Internal\PatientsController@store')->name('m.patients.store');
Route::get('/m/patients/edit/{id}', 'Internal\PatientsController@edit')->name('m.patients.edit');
Route::post('/m/patients/update/{id}', 'Internal\PatientsController@update')->name('m.patients.update');
Route::get('/m/patients/delete/{id}', 'Internal\PatientsController@destroy')->name('m.patients.destroy');

// Cases
Route::get('/m/cases', 'Internal\CasesController@index')->name('m.cases');
Route::post('/m/cases/create', 'Internal\CasesController@store')->name('m.cases.store');
Route::get('/m/cases/edit/{id}', 'Internal\CasesController@edit')->name('m.cases.edit');
Route::post('/m/cases/update/{id}', 'Internal\CasesController@update')->name('m.cases.update');
Route::get('/m/cases/delete/{id}', 'Internal\CasesController@destroy')->name('m.cases.destroy');