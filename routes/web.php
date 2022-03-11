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
    return view('plantilla.principal');
});

Route::get('/login', function () {
    return view('login.index');
});


Route::get('/database', function () {
    return view('database.database');
});

Route::get('/trucades', function () {
    return view('callCard.callCard');
});

