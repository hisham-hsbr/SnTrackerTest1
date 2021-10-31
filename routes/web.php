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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/soon', function () {
    return view('adminPanel/soon');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', function () {
    return view('userPanel/home');
});

// Route::get('/adminpanel2', function () {
//     return view('adminPanel/home2');
// });
// Route::get('/adminpanel', function () {
//     return view('adminPanel/home');
// });

Route::resource('admin/customer', 'CustomerController');
Route::resource('admin/product', 'ProductController');
Route::resource('admin/SerialNumber', 'SerialNumberController');
Route::resource('admin/BottomPrice', 'BottomPriceController');
Route::resource('admin/brand', 'BrandController');
Route::resource('admin/division', 'DivisionController');
Route::resource('admin/supplier', 'SupplierController');


Route::get('admin/BottomPrice/{BottomPrice}/edit', 'BottomPriceController@edit')->name('admin.BottomPrice.edit');
Route::get('admin/Product/{Product}/edit', 'ProductController@edit')->name('admin.Product.edit');

// Route::resource('admin/BottomPrice', 'BottomPriceController');
// Route::resource('admin/SerialNumber{id}', 'SerialNumberController');

Route::get('SerialNumber', 'SerialNumberController@getSerialNumbers')->name('get.SerialNumbers');

Route::get('Product', 'ProductController@getProducts')->name('get.Products');
Route::get('Supplier', 'SupplierController@getsuppliers')->name('get.suppliers');

Route::get('BottomPrice', 'BottomPriceController@getBottomPrices')->name('get.BottomPrices');
Route::get('Brand', 'BrandController@getbrands')->name('get.brands');

Route::get('Division', 'DivisionController@getdivisions')->name('get.divisions');

Route::get('BottomPrice/act', 'BottomPriceController@act')->name('admin.BottomPrice.act');








Route::get('BottomPrice/export', 'BottomPricesExportController@export');
Route::get('SerialNumber/export', 'SerialNumberExportController@export');


Route::get('BottomPrice/Import', 'BottomPriceImportController@show');
Route::post('BottomPrice/import', 'BottomPriceImportController@store');
// Route::get('BottomPrice/edit','BottomPriceController@edit');

Route::get('SerialNumber/Import', 'SerialNumberImportController@show');
Route::post('SerialNumber/import', 'SerialNumberImportController@store');


// Route::resource('/BottomPrice', 'BottomPriceImportController');
