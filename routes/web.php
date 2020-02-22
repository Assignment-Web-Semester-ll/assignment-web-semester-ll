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
//--Upload Image
Route::get('image-upload', 'AdminPage\ImageUploadController@imageUpload') -> name('image.upload');
Route::post('image-upload', 'AdminPage\ImageUploadController@imageUploadPost') -> name('image.upload.post');

/*******************************
 *      Start Resource
 *******************************/
//---Blog Category
Route::resource('blogcategory', 'AdminPage\BlogCategoryController');
//---Reporter User
Route::resource('reporteruser', 'AdminPage\ReporterUserController');

/*******************************
 *      End Resource
 *******************************/