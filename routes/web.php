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


// Patients
// Visits
Route::get('/p/visits', 'VisitController@index')->name('p.visits');
Route::get('/p/surgeries', 'SurgeryController@index')->name('p.surgeries');
Route::get('/p/billings', 'BillingController@index')->name('p.billings');
Route::get('/p/sms', 'SmsController@index')->name('p.sms');
Route::get('/p/patient_files', 'PatientFileController@index')->name('p.patient_files');



// Internals
Route::get('/m/home', 'Internal\HomeController@index')->name('m.home');
Route::get('/m/login', 'Auth\Internal\LoginController@showLoginForm')->name('m.login');
Route::post('/m/login', 'Auth\Internal\LoginController@login')->name('m.login');
Route::get('/m/register', 'Auth\Internal\RegisterController@showRegisterForm')->name('m.register');
Route::post('/m/register', 'Auth\Internal\RegisterController@register')->name('m.register');
Route::post('/m/logout', 'Auth\Internal\LoginController@logout')->name('m.logout');


Route::namespace('Internal')->group(function () {
	Route::prefix('m')->group(function () {
		Route::get('/', function() {
			return redirect('/m/login');
		});
		Route::get('/profile', 'HomeController@profile')->name('m.profile');
		Route::post('/profile/update', 'HomeController@update')->name('m.profile.update');
		Route::post('/password/change', 'HomeController@change_password')->name('m.password.change');
		Route::post('/upload/cv', 'HomeController@upload_cv')->name('m.upload.cv');
		Route::get('/settings', 'HomeController@settings')->name('settings')->middleware('can:view,App\Setting');
		Route::post('/settings/update', 'HomeController@update_settings')->name('update.settings')->middleware('can:update,App\Setting');

		// Manage My Permissions
		Route::get('/my-permissions', 'HomeController@my_permissions');

		// Patients
		Route::get('/medical-history/{id}', 'PatientsController@medical_history')->middleware('can:update,App\Patient');
		Route::get('/patients', 'PatientsController@index')->middleware('can:view,App\Patient');
		Route::post('/patients/create', 'PatientsController@store')->middleware('can:create,App\Patient');
		// Route::get('/patients/edit/{id}', 'PatientsController@edit');
		Route::post('/patients/update/{id}', 'PatientsController@update')->middleware('can:update,App\Patient');
		Route::get('/patients/delete/{id}', 'PatientsController@destroy')->middleware('can:delete,App\Patient');
		Route::get('/patients/password/reset/{id}', 'PatientsController@password_reset')->middleware('can:update,App\Patient');
		Route::get('/patients/{filter}/{searchterm?}', 'PatientsController@filter')->where('searchterm', '.*')->middleware('can:view,App\Patient');

		// Patient Files
		Route::get('/patient_files', 'PatientFileController@index')->middleware('can:view,App\PatientFile');
		Route::post('/patient_files/create', 'PatientFileController@store')->middleware('can:create,App\PatientFile');
		// Route::get('/patient_files/edit/{id}', 'PatientFileController@edit');
		Route::post('/patient_files/update/{id}', 'PatientFileController@update')->middleware('can:update,App\PatientFile');
		Route::get('/patient_files/delete/{id}', 'PatientFileController@destroy')->middleware('can:delete,App\PatientFile');
		Route::get('/patient_files/{filter}/{searchterm?}', 'PatientFileController@filter')->where('searchterm', '.*')->middleware('can:view,App\PatientFile');

		// Cases
		Route::get('/visits', 'VisitController@index')->middleware('can:view,App\Visit');
		Route::post('/visits/create', 'VisitController@store')->middleware('can:create,App\Visit');
		// Route::get('/visits/edit/{id}', 'VisitController@edit');
		Route::post('/visits/update/{id}', 'VisitController@update')->middleware('can:update,App\Visit');
		Route::get('/visits/delete/{id}', 'VisitController@destroy')->middleware('can:delete,App\Visit');
		Route::get('/visits/{filter}/{searchterm?}', 'VisitController@filter')->where('searchterm', '.*')->middleware('can:view,App\Visit');

		// Surgeries
		Route::get('/surgeries', 'SurgeryController@index')->middleware('can:view,App\Surgery');
		Route::post('/surgeries/create', 'SurgeryController@store')->middleware('can:create,App\Surgery');
		Route::post('/surgeries/create/{id}', 'SurgeryController@resurgery')->middleware('can:create,App\Surgery');
		// Route::get('/surgeries/edit/{id}', 'SurgeryController@edit');
		Route::post('/surgeries/update/{id}', 'SurgeryController@update')->middleware('can:update,App\Surgery');
		Route::get('/surgeries/delete/{id}', 'SurgeryController@destroy')->middleware('can:delete,App\Surgery');
		Route::get('/surgeries/{filter}/{searchterm?}', 'SurgeryController@filter')->where('searchterm', '.*')->middleware('can:view,App\Surgery');

		// Surgeries
		Route::get('/surgery_names', 'SurgeryNameController@index')->middleware('can:view,App\SurgeryName');
		Route::post('/surgery_names/create', 'SurgeryNameController@store')->middleware('can:create,App\SurgeryName');
		// Route::get('/surgery_names/edit/{id}', 'SurgeryNameController@edit');
		Route::post('/surgery_names/update/{id}', 'SurgeryNameController@update')->middleware('can:update,App\SurgeryName');
		Route::get('/surgery_names/delete/{id}', 'SurgeryNameController@destroy')->middleware('can:delete,App\SurgeryName');
		Route::get('/surgery_names/{filter}/{searchterm?}', 'SurgeryNameController@filter')->where('searchterm', '.*')->middleware('can:view,App\SurgeryName');

		// Billings
		Route::get('/billings', 'BillingController@index')->middleware('can:view,App\Billing');
		Route::post('/billings/create', 'BillingController@store')->middleware('can:create,App\Billing');
		// Route::get('/billings/edit/{id}', 'BillingController@edit');
		Route::post('/billings/update/{id}', 'BillingController@update')->middleware('can:update,App\Billing');
		Route::get('/billings/delete/{id}', 'BillingController@destroy')->middleware('can:delete,App\Billing');
		Route::get('/billings/toggle_status/{id}', 'BillingController@toggle_is_paid')->middleware('can:update,App\Billing');
		Route::get('/billings/{filter}/{searchterm?}', 'BillingController@filter')->where('searchterm', '.*')->middleware('can:view,App\Billing');

		// Sms
		Route::get('/sms', 'SmsController@index')->middleware('can:view,App\Sms');
		Route::get('/sms/create', 'SmsController@create')->middleware('can:create,App\Sms');
		Route::get('/sms/unpaid', 'SmsController@unpaid')->middleware('can:create,App\Sms');
		Route::post('/sms/create', 'SmsController@store')->middleware('can:create,App\Sms');
		// Route::get('/sms/edit/{id}', 'SmsController@edit');
		Route::post('/sms/update/{id}', 'SmsController@update')->middleware('can:update,App\Sms');
		Route::get('/sms/delete/{id}', 'SmsController@destroy')->middleware('can:delete,App\Sms');
		Route::get('/sms/balance', 'SmsController@balance')->middleware('can:view,App\Sms');
		Route::get('/sms/{filter}/{searchterm?}', 'SmsController@filter')->where('searchterm', '.*')->middleware('can:view,App\Sms');

		// Reminders
		Route::get('/reminders', 'ReminderController@index')->middleware('can:view,App\Reminder');
		Route::post('/reminders/create', 'ReminderController@store')->middleware('can:create,App\Reminder');
		// Route::get('/reminders/edit/{id}', 'ReminderController@edit');
		Route::post('/reminders/update/{id}', 'ReminderController@update')->middleware('can:update,App\Reminder');
		Route::get('/reminders/delete/{id}', 'ReminderController@destroy')->middleware('can:delete,App\Reminder');
		Route::get('/reminders/toggle_status/{id}', 'ReminderController@toggle_done')->middleware('can:update,App\Reminder');
		Route::get('/reminders/{filter}/{searchterm?}', 'ReminderController@filter')->where('searchterm', '.*')->middleware('can:view,App\Reminder');

		// User Permissions
		Route::prefix('user-permissions')->group(function () {
			Route::get('/', 'UserPermissionController@index')->middleware('can:view,App\UserPermission');
			Route::post('/create', 'UserPermissionController@store')->middleware('can:create,App\UserPermission');
			// Route::get('/edit/{id}', 'UserPermissionController@edit');
			Route::post('/update/{id}', 'UserPermissionController@update')->middleware('can:update,App\UserPermission');
			Route::get('/delete/{id}', 'UserPermissionController@destroy')->middleware('can:delete,App\UserPermission');
			Route::get('/{filter}/{searchterm?}', 'UserPermissionController@filter')->where('searchterm', '.*')->middleware('can:view,App\UserPermission');
		});

		// Users
		Route::prefix('users')->group(function () {
			Route::get('/', 'UserController@index')->middleware('can:view,App\User');
			Route::post('/create', 'UserController@store')->middleware('can:create,App\User');
			// Route::get('/edit/{id}', 'UserController@edit');
			Route::post('/update/{id}', 'UserController@update')->middleware('can:update,App\User');
			Route::get('/delete/{id}', 'UserController@destroy')->middleware('can:delete,App\User');
			Route::get('/password/reset/{id}', 'UserController@password_reset')->middleware('can:update,App\User');
			Route::get('/{filter}/{searchterm?}', 'UserController@filter')->where('searchterm', '.*')->middleware('can:view,App\User');
		});

		// AJAX Uploads
		Route::post('/upload/profile_picture', 'HomeController@ajax_upload_profile_picture');
		Route::post('/upload/hospital_logo', 'HomeController@ajax_upload_hospital_logo');
	});
});





// Blog Page
Route::get('/blog', 'PublicController@blog');
Route::get('/blog/{slug}', ['as' => '/blog/blog.single', 'uses' => 'PublicController@getSingle'])->where('slug', '[\w\d\-\_]+');

// Blog Post
Route::resource('/m/blog/posts', 'Internal\PostController');
Route::post('/m/blog/post/create', 'Internal\PostController@store')->name('m/blog/posts.store')->middleware('can:create,App\Post');
Route::get('/m/blog/post/edit/{id}', 'Internal\PostController@edit')->name('/m/blog/posts.edit')->middleware('can:update,App\Post');
Route::post('/m/blog/post/edit/{id}', 'Internal\PostController@update')->name('/m/blog/posts.update')->middleware('can:update,App\Post');
Route::get('/m/blog/post/delete/{id}', 'Internal\PostController@destroy')->name('/m/blog/posts.destroy')->middleware('can:delete,App\Post');
Route::get('/m/blog/posts/{filter}/{searchterm?}', 'Internal\PostController@filter')->where('searchterm', '.*')->middleware('can:view,App\Post');

// Blog
Route::get('/m/blog', ['uses' => 'Internal\BlogController@getIndex', 'as' => '/m/blog/blog.index']);
Route::get('/m/blog/{slug}', ['as' => '/m/blog/blog.single', 'uses' => 'Internal\BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');