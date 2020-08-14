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
// BackendController
// --------------
Route::middleware('auth')->group(function(){
Route::get('dashboard', 'BackendController@dashboard')->name('dashboard');
Route::resource('items', 'ItemController');
Route::resource('brands', 'BrandController');
Route::resource('categories','CategoryController');
Route::resource('subcategories','SubcategoryController');
Route::resource('orders', 'OrderController');
// get-4/post-1/put-1/delet-1
});

// Frontend
// ---------
Route::get('/','FrontendController@home')->name('homepage');

Route::get('item','FrontendController@item')->name('itemname');
Route::get('about','FrontendController@about')->name('aboutname');
Route::get('contact','FrontendController@contact')->name('contactname');
Route::get('checkout','FrontendController@checkout')->name('checkoutname');
Route::get('register','FrontendController@register')->name('registername');
Route::get('login','FrontendController@login')->name('loginname');
Route::get('detail/{id}','FrontendController@detail')->name('detailname');
Route::get('profile','FrontendController@profile')->name('profilename');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
