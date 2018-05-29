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
Route::get('/m/patients/edit/{id}', 'Internal\PatientsController@edit')->name('m.patients.edit');
Route::post('/m/patients/update/{id}', 'Internal\PatientsController@update')->name('m.patients.update');
Route::get('/m/patients/delete/{id}', 'Internal\PatientsController@destroy')->name('m.patients.destroy');
Route::get('/m/patients/password/reset/{id}', 'Internal\PatientsController@password_reset')->name('m.patients.password.reset');

// Cases
Route::get('/m/cases', 'Internal\CasesController@index')->name('m.cases');
Route::post('/m/cases/create', 'Internal\CasesController@store')->name('m.cases.store');
Route::get('/m/cases/edit/{id}', 'Internal\CasesController@edit')->name('m.cases.edit');
Route::post('/m/cases/update/{id}', 'Internal\CasesController@update')->name('m.cases.update');
Route::get('/m/cases/delete/{id}', 'Internal\CasesController@destroy')->name('m.cases.destroy');

// Surgeries
Route::get('/m/surgeries', 'Internal\SurgeryController@index')->name('m.surgeries');
Route::post('/m/surgeries/create', 'Internal\SurgeryController@store')->name('m.surgeries.store');
Route::get('/m/surgeries/edit/{id}', 'Internal\SurgeryController@edit')->name('m.surgeries.edit');
Route::post('/m/surgeries/update/{id}', 'Internal\SurgeryController@update')->name('m.surgeries.update');
Route::get('/m/surgeries/delete/{id}', 'Internal\SurgeryController@destroy')->name('m.surgeries.destroy');

// Blog Page
Route::get('/blog', 'HomeController@blog');

// Blog Post
Route::resource('/m/blog/posts', 'Internal\PostController');
Route::post('/m/blog/post/create', 'Internal\PostController@store')->name('m/blog/posts.show');
Route::get('/m/blog/post/edit/{id}', 'Internal\PostController@update');
Route::get('/m/blog/post/delete/{id}', 'Internal\PostController@destroy')->name('/m/blog/posts.destroy');
Route::post('/m/blog/post/{id}/edit', 'Internal\PostController@update')->name('/m/blog/posts.edit');

// Blog
Route::get('/m/blog/{slug}', ['as' => '/m/blog/blog.single', 'uses' => 'Internal\BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
Route::get('/m/blog', ['uses' => 'Internal\BlogController@getIndex', 'as' => '/m/blog/blog.index']);