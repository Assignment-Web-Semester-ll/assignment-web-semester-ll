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


Route::get('/frontend', function () {
    return view('frontend.index');
});
Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', function () { return view('admin.dashboard'); });
Route::get('/user', 'Admin\DashboardController@registered');
Route::get('/edit-user', 'Admin\DashboardController@editUser');
Route::post('/update-user', 'Admin\DashboardController@updateUser');
Route::delete('/delete-user', 'Admin\DashboardController@deleteUser');
// Route::group(['middleware' => ['admin']], function(){
//     Route::get('/dashboard', function () { return view('admin.dashboard'); });
//     Route::get('/user', 'Admin\DashboardController@registered');
//     Route::get('/edit-user', 'Admin\DashboardController@editUser');
//     Route::post('/update-user', 'Admin\DashboardController@updateUser');
//     Route::delete('/delete-user', 'Admin\DashboardController@deleteUser');
// });