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

Route::get('/', 'BackendController@dashboard')->name('dashboard');
Route::resource('items', 'ItemController');
Route::resource('brands', 'BrandController');
Route::resource('categories','CategoryController');
Route::resource('subcategories','SubcategoryController');


// get-4/post-1/put-1/delet-1