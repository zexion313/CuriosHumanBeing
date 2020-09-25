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
Route::group(['middleware' => 'auth'], function(){ 
    // All the routes that require login authentication
});



// Admin Dashbaord Please Work
// Route::get('admin', 'CustomAuthController@showLoginForm')->name('custom.login');
// Route::post('admin', 'CustomAuthController@Login');
Route::get('admindash', 'CustomAuthController@dashboard')->name('admindash');



Auth::routes();

// Pages
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/contactus', 'PagesController@contactus');

// Posts
Route::resource('/posts', 'PostsController');

// UserProfile
Route::get('/profile/{username}', 'UserProfileController@index');
Route::patch('/dashboard/{id}', 'UserProfileController@update')->name('userprofile.update');

// Dashboard for Users
Route::get('/dashboard/{username}', 'DashboardController@index')->name('dashboard');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


