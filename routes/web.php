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
	$page = collect();
	$page->title = 'Home';
	$page->view = 'welcome';
	return view($page->view)
		->with('page', $page);
});

Auth::routes();
// Register Overwrite
Route::get('/register', function () {
	return redirect()->back();
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::post('/profile/update', 'HomeController@update')->name('profile.update');
Route::post('/password/change', 'HomeController@change_password')->name('password.change');



// Visits
Route::get('/p/visits', 'VisitController@index')->name('p.visits');



// Internals
Route::get('/m/home', 'Internal\HomeController@index')->name('m.home');
Route::get('/m/login', 'Auth\Internal\LoginController@showLoginForm')->name('m.login');
Route::post('/m/login', 'Auth\Internal\LoginController@login')->name('m.login');
Route::get('/m/register', 'Auth\Internal\RegisterController@showRegisterForm')->name('m.register');
Route::post('/m/register', 'Auth\Internal\RegisterController@register')->name('m.register');
Route::post('/m/logout', 'Auth\Internal\LoginController@logout')->name('m.logout');


Route::namespace('Internal')->group(function () {
	Route::prefix('m')->group(function () {
		Route::get('/profile', 'HomeController@profile')->name('m.profile');
		Route::post('/profile/update', 'HomeController@update')->name('m.profile.update');
		Route::post('/password/change', 'HomeController@change_password')->name('m.password.change');

		// Patients
		Route::get('/patients', 'PatientsController@index');
		Route::post('/patients/create', 'PatientsController@store');
		// Route::get('/patients/edit/{id}', 'PatientsController@edit');
		Route::post('/patients/update/{id}', 'PatientsController@update');
		Route::get('/patients/delete/{id}', 'PatientsController@destroy');
		Route::get('/patients/password/reset/{id}', 'PatientsController@password_reset');
		Route::get('/patients/{filter}/{searchterm?}', 'PatientsController@filter')->where('searchterm', '.*');

		// Patient Visits
		Route::get('/patient/{id}/visits', 'PatientVisitsController@index');
		// Route::post('/patient/{id}/visits/create', 'PatientVisitsController@store');
		// Route::get('/patient/{id}/visits/edit/{id}', 'PatientVisitsController@edit');
		// Route::post('/patient/{id}/visits/update/{id2}', 'PatientVisitsController@update');
		// Route::get('/patient/{id}/visits/delete/{id2}', 'PatientVisitsController@destroy');
		Route::get('/patient/{id}/visits/{filter}/{searchterm?}', 'PatientVisitsController@filter')->where('searchterm', '.*');

		// Cases
		Route::get('/visits', 'VisitController@index');
		Route::post('/visits/create', 'VisitController@store');
		// Route::get('/visits/edit/{id}', 'VisitController@edit');
		Route::post('/visits/update/{id}', 'VisitController@update');
		Route::get('/visits/delete/{id}', 'VisitController@destroy');
		Route::get('/visits/{filter}/{searchterm?}', 'VisitController@filter')->where('searchterm', '.*');

		// Surgeries
		Route::get('/surgeries', 'SurgeryController@index');
		Route::post('/surgeries/create', 'SurgeryController@store');
		Route::post('/surgeries/create/{id}', 'SurgeryController@resurgery');
		// Route::get('/surgeries/edit/{id}', 'SurgeryController@edit');
		Route::post('/surgeries/update/{id}', 'SurgeryController@update');
		Route::get('/surgeries/delete/{id}', 'SurgeryController@destroy');
		Route::get('/surgeries/{filter}/{searchterm?}', 'SurgeryController@filter')->where('searchterm', '.*');

		// Surgeries
		Route::get('/surgery_names', 'SurgeryNameController@index');
		Route::post('/surgery_names/create', 'SurgeryNameController@store');
		Route::post('/surgery_names/create/{id}', 'SurgeryNameController@resurgery');
		// Route::get('/surgery_names/edit/{id}', 'SurgeryNameController@edit');
		Route::post('/surgery_names/update/{id}', 'SurgeryNameController@update');
		Route::get('/surgery_names/delete/{id}', 'SurgeryNameController@destroy');
		Route::get('/surgery_names/{filter}/{searchterm?}', 'SurgeryNameController@filter')->where('searchterm', '.*');
		Route::get('/surgeries/{filter}/{searchterm?}', 'SurgeryController@filter')->where('searchterm', '.*');
	});
});





// Blog Page
Route::get('/blog', 'PublicController@blog');
Route::get('/blog/{slug}', ['as' => '/blog/blog.single', 'uses' => 'PublicController@getSingle'])->where('slug', '[\w\d\-\_]+');

// Blog Post
Route::resource('/m/blog/posts', 'Internal\PostController');
Route::post('/m/blog/post/create', 'Internal\PostController@store')->name('m/blog/posts.show');
Route::get('/m/blog/post/edit/{id}', 'Internal\PostController@update');
Route::get('/m/blog/post/delete/{id}', 'Internal\PostController@destroy')->name('/m/blog/posts.destroy');
Route::post('/m/blog/post/{id}/edit', 'Internal\PostController@update')->name('/m/blog/posts.edit');

// Blog
Route::get('/m/blog', ['uses' => 'Internal\BlogController@getIndex', 'as' => '/m/blog/blog.index']);
Route::get('/m/blog/{slug}', ['as' => '/m/blog/blog.single', 'uses' => 'Internal\BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');