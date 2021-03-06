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

Route::get('/', 'PagesController@dashboard');
Route::post('/invoices', 'PagesController@postInvoice');
Route::get('/invoices/create', 'PagesController@create');
Route::get('/invoices/{id}', 'PagesController@edit');
Route::post('/invoices/delete', 'PagesController@delete');
