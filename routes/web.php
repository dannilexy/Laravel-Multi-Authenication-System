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

Route::get('/', 'LoginController@index')->name('login');
Route::get('/home', 'LoginController@index');
Route::get('/admin','AdminController@logins');
Route::get('/author', 'AuthorController@logins');
Route::get('/user/register','LoginController@register');
Route::get('/admin/register','AdminController@index');
Route::get('/author/register','AuthorController@index');

Route::post('/admin/Create','AdminController@create')->name('AdminCreate');
Route::post('/user/Create','LoginController@create')->name('UserCreate');
Route::post('/author/Create','AuthorController@create')->name('AuthorCreate');

Route::post('/admin/login','AdminController@login')->name('AdminLogin');
Route::post('/user/login','LoginController@login')->name('UserLogin');
Route::post('/author/login','AuthorController@login')->name('AuthorLogin');

Route::get('/user/home','LoginController@home')->middleware('auth:user');
Route::get('/admin/home','AdminController@home')->middleware('auth:admin');
Route::get('/author/home','AuthorController@home')->middleware('auth:author');

Route::get('/logout', 'LoginController@logout')->middleware('auth');

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
