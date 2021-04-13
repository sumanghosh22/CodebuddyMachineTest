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

Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');

Route::get('admin/category-tree-view',['as'=>'category.list.add','uses'=>'CategoryController@manageCategory'])->middleware('is_admin');
Route::post('admin/add-category',['as'=>'add.category','uses'=>'CategoryController@addCategory'])->middleware('is_admin');
Route::get('admin/categoy/list', 'CategoryController@showCategories')->name('category.list')->middleware('is_admin');
Route::get('admin/categoy/edit/{id}', 'CategoryController@edit')->name('category.edit')->middleware('is_admin');
Route::get('admin/categoy/delete/{id}', 'CategoryController@destroy')->name('category.delete')->middleware('is_admin');
Route::post('admin/categoy/update/{id}', 'CategoryController@update')->name('update.category')->middleware('is_admin');
Route::get('product/add/{id}',['as'=>'product.add','uses'=>'ProductController@create'])->middleware('is_admin');
Route::post('product/save',['as'=>'save.product','uses'=>'ProductController@store'])->middleware('is_admin');







