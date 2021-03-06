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
Route::get('/models', function () {
    return view('models');
});


Route::resource('roles', 'RolesController');
Route::resource('users', 'UsersController');
Route::resource('invoices', 'InvoicesController');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/invoices/{invoice}/download', 'InvoicesController@download');

Route::get('/logout', 'Auth\LoginController@logout');

// Route::post('/invoices',
//     function() {
//         echo('TEST function');
//     }
// );
Route::post('/invoices/search', 'InvoicesController@search');
