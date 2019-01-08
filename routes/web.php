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

Route::group(['namespace' => 'Website'],function(){
	Route::get('/','HomeController@index');
	Route::get('post/{post}','PostController@post')->name('post');

	Route::get('post/tag/{tag}','HomeController@tag')->name('tag');
	Route::get('post/category/{category}','HomeController@category')->name('category');

	//vue routes
	Route::post('getPosts','PostController@getAllPosts');
	
});
Route::group(['namespace' => 'Admin'],function(){
	Route::get('admin/home','HomeController@index')->name('admin.home');
	Route::get('admin/settings','SettingsController@index')->name('admin.settings');
	
	Route::post('admin/settings/store','SettingsController@store')->name('admin.settings.store');
	// Users Routes
	Route::resource('admin/user','UserController');
	// Roles Routes
	// Route::resource('admin/role','RoleController');
	// Permission Routes
	// Route::resource('admin/permission','PermissionController');
	// Post Routes
	Route::resource('admin/post','PostController');
	// Tag Routes
	Route::resource('admin/tag','TagController');
	// Category Routes
	Route::resource('admin/category','CategoryController');
	// Admin Auth Routes
	
});
