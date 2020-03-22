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
Auth::routes();

Route::get('/home', function () { return view('adminpage.home'); });
Route::get('/blog/create', function () { return view('adminpage.blogcreate'); });
// Route::get('/show', 'AdminPage\BlogCategoryController@show');
// Route::get('/showtest', function(){  
//     if(Request::ajax()){
//         return "getRequest has loaded.";
//     }
// });

//--BlogCategory
Route::delete('/blogcategory/destory/{id}', 'AdminPage\BlogCategoryController@destroy');
Route::get('/blogcategory/edit/{id}', 'AdminPage\BlogCategoryController@edit');
Route::put('/blogcategory/update/{id}', 'AdminPage\BlogCategoryController@update');

//--ReporterUser
Route::delete('/reporteruser/destory/{id}', 'AdminPage\ReporterUserController@destroy');
Route::get('/reporteruser/edit/{id}', 'AdminPage\ReporterUserController@edit');
Route::get('/reporteruser/show/{id}', 'AdminPage\ReporterUserController@show');
Route::post('/reporteruser/update/{id}', 'AdminPage\ReporterUserController@update');

//--Blog
Route::delete('/blog/destory/{id}', 'AdminPage\BlogController@destroy');
Route::get('/blog/edit/{id}', 'AdminPage\BlogController@edit');
Route::get('/blog/show/{id}', 'AdminPage\BlogController@show');
Route::post('/blog/update/{id}', 'AdminPage\BlogController@update');
Route::get('/blog', 'AdminPage\BlogController@index');
Route::get('/blog/create', 'AdminPage\BlogController@create');

//--Upload Image
Route::get('image-upload', 'AdminPage\ImageUploadController@imageUpload') -> name('image.upload');
Route::post('image-upload', 'AdminPage\ImageUploadController@imageUploadPost') -> name('image.upload.post');

/*******************************
 *      Start Resource
 *******************************/
//---Blog Category
Route::resource('blogcategory', 'AdminPage\BlogCategoryController');
//---Reporter User
// Route::resource('blog', 'AdminPage\BlogController');
//---Reporter User
Route::resource('reporteruser', 'AdminPage\ReporterUserController');

/*******************************
 *      End Resource
 *******************************/


Route::post('/login','LoginController@login');
Route::get('/logout','LoginController@logout')->name('logout');
// Route::get('/login', 'Auth\LoginController@index');
// Route::post('/login/checklogin', 'Auth\LoginController@checklogin');
// Route::get('/login/successlogin', 'Auth\LoginController@successlogin');
// Route::get('/logout', 'Auth\LoginController@logout');

//COMMENT
Route::get('/comment', 'Commnet\CommentController@index');
Route::get('/comment/response', 'Commnet\CommentController@index');
Route::get('/comment/show', 'Commnet\CommentController@show');
Route::get('/comment/update', 'Commnet\CommentController@update');