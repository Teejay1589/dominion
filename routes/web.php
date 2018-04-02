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



// Patients
Route::get('/patients', 'PatientsController@index')->name('patients');
Route::post('/patients/create', 'PatientsController@store')->name('patients.store');
Route::get('/patients/edit/{id}', 'PatientsController@edit')->name('patients.edit');
Route::post('/patients/update/{id}', 'PatientsController@update')->name('patients.update');
Route::get('/patients/delete/{id}', 'PatientsController@destroy')->name('patients.destroy');

// Cases
Route::get('/cases', 'CasesController@index')->name('cases');
Route::post('/cases/create', 'CasesController@store')->name('cases.store');
Route::get('/cases/edit/{id}', 'CasesController@edit')->name('cases.edit');
Route::post('/cases/update/{id}', 'CasesController@update')->name('cases.update');
Route::get('/cases/delete/{id}', 'CasesController@destroy')->name('cases.destroy');

