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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/products', 'ProductController@index')->middleware('auth')->name('productList');
Route::post('/products-store', 'ProductController@store')->middleware('auth')->name('productStore');
Route::post('/products-update/{id}', 'ProductController@update')->middleware('auth')->name('productupdate');
Route::post('/products-delete/{id}', 'ProductController@destroy')->middleware('auth')->name('productDelete');
