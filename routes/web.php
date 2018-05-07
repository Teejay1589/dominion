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



// Cases
Route::get('/p/cases', 'CasesController@index')->name('p.cases');



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
// Route::get('/m/patients/edit/{id}', 'Internal\PatientsController@edit')->name('m.patients.edit');
Route::post('/m/patients/update/{id}', 'Internal\PatientsController@update')->name('m.patients.update');
Route::get('/m/patients/delete/{id}', 'Internal\PatientsController@destroy')->name('m.patients.destroy');
Route::get('/m/patients/password/reset/{id}', 'Internal\PatientsController@password_reset')->name('m.patients.password.reset');

// Cases
Route::get('/m/cases', 'Internal\CasesController@index')->name('m.cases');
Route::post('/m/cases/create', 'Internal\CasesController@store')->name('m.cases.store');
// Route::get('/m/cases/edit/{id}', 'Internal\CasesController@edit')->name('m.cases.edit');
Route::post('/m/cases/update/{id}', 'Internal\CasesController@update')->name('m.cases.update');
Route::get('/m/cases/delete/{id}', 'Internal\CasesController@destroy')->name('m.cases.destroy');

// Surgeries
Route::get('/m/surgeries', 'Internal\SurgeryController@index')->name('m.surgeries');
Route::post('/m/surgeries/create', 'Internal\SurgeryController@store')->name('m.surgeries.store');
Route::post('/m/surgeries/create/{id}', 'Internal\SurgeryController@resurgery')->name('m.surgeries.resurgery');
// Route::get('/m/surgeries/edit/{id}', 'Internal\SurgeryController@edit')->name('m.surgeries.edit');
Route::post('/m/surgeries/update/{id}', 'Internal\SurgeryController@update')->name('m.surgeries.update');
Route::get('/m/surgeries/delete/{id}', 'Internal\SurgeryController@destroy')->name('m.surgeries.destroy');

// Surgeries
Route::get('/m/surgery_names', 'Internal\SurgeryNameController@index')->name('m.surgery_names');
Route::post('/m/surgery_names/create', 'Internal\SurgeryNameController@store')->name('m.surgery_names.store');
Route::post('/m/surgery_names/create/{id}', 'Internal\SurgeryNameController@resurgery')->name('m.surgery_names.resurgery');
// Route::get('/m/surgery_names/edit/{id}', 'Internal\SurgeryNameController@edit')->name('m.surgery_names.edit');
Route::post('/m/surgery_names/update/{id}', 'Internal\SurgeryNameController@update')->name('m.surgery_names.update');
Route::get('/m/surgery_names/delete/{id}', 'Internal\SurgeryNameController@destroy')->name('m.surgery_names.destroy');