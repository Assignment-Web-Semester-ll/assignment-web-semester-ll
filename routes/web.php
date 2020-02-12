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

use App\Http\Controllers\Controller;

Route::get('/', function () { return view('adminpage.home'); });

// Route::get('/BlogCategory/index', 'AdminPage\BlogCategoryController@index');

Route::get('/BlogCategory/destroy/{blogcategory}', 'AdminPage\BlogCategoryController@destroy');

/*******************************
 *      Start Resource
 *******************************/
//---Blog Category
Route::resource('blogcategory', 'AdminPage\BlogCategoryController');

/*******************************
 *      End Resource
 *******************************/