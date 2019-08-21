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

Route::get('/','homeController@index')->name('home');
Route::get('/signin', 'loginController@index')->name('login');
Route::post('/signin', 'loginController@verify');

Route::get('/admin/index', 'adminController@index')->name('admin.index');
Route::get('/admin/pages/signup','adminController@signup')->name('signup');
Route::post('/admin/pages/signup','adminController@store');
Route::get('/admin/pages/banuser', 'adminController@banuser')->name('banuser');
Route::get('/admin/pages/userlist', 'adminController@userlist')->name('userlist');
Route::get('/admin/pages/userlist/block/{id}', 'adminController@block')->name('userlist.block');
Route::get('/admin/pages/userlist/unblock/{id}', 'adminController@unblock')->name('userlist.unblock');


Route::get('/logout', 'logoutController@index')->name('logout');