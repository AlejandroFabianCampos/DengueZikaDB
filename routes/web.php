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
    return view('home');
})->name('home');

Route::get('basededatos', function () {
    return view('baseDeDatos');
})->name('baseDeDatos');

Route::prefix('admin')->group(function () {
    Route::get('datosUpload', function() {
        return view('datosUpload');
    });

    Route::post('import', 'importController@import')->name('datosPost');

});