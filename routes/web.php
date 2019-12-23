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

// Route::get('/', function () {
//     return view('admin.index');
// });

Auth::routes();

//Route::get('/home', 'HomeViewController@index')->name('home');
Route::get('/','HomeViewController@index');
Route::get('/index','HomeViewController@index');
// Route::get('/addcategory','ProductsController@index');

Route::resource('addcategory','ProductsController');
Route::resource('subcategory','SubCategoryController');

Route::post('addcategory/update','ProductsController@update');
Route::post('subcategory/update','SubCategoryController@update');


Route::get('addcategory/destroy/{id}', 'ProductsController@destroy');
Route::get('subcategory/destroy/{id}', 'SubCategoryController@destroy');


Route::get('showproduct/{id}', 'ShowProductController@index');


Route::post('/store','ProductsController@store');
Route::resource('additem','ProductItemController');
Route::post('/additem/action','ProductItemController@action');
Route::post('/additem/delete','ProductItemController@del');
Route::post('images-upload', 'ProductItemController@imagesUploadPost')->name('images.upload');
//Route::get('multiple-file-upload', 'ProductItemController@index');

Route::post('multiple-file-upload/upload', 'ProductItemController@upload')->name('upload');

//Route::get('/login','LoginController@index')->name('signup');