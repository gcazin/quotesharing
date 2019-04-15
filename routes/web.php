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

use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

/**
 * View for the authentication
 */
Route::namespace('Auth')->group(function() {
    Route::get('/inscription', 'RegisterController@index')->name('inscription');
    Route::get('/connexion', 'LoginController@index')->name('connexion');
    Route::get('/dashboard', 'UserController@index')->name('dashboard');
    Route::get('/update', 'UserController@update')->name('update');
    Route::post('/update-avatar', 'UserController@update_avatar')->name('update.avatar');
    Route::post('/update-info', 'UserController@update_info')->name('update.info');
});

Route::namespace('Post')->group(function() {
    Route::post('/dashboard', 'PostController@publish')->name('post.publish');
    Route::get('/citations', 'QuoteController@index')->name('citations');
});

Route::namespace('Admin')->group(function() {
   Route::get('/admin', 'AdminController@index')->name('admin');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
