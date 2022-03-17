<?php

use App\Http\Controllers\Api\PerfilsController;
use App\Http\Controllers\UsuarisController;
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

Route::resource('/perfils', PerfilsController::class);

Route::get('/database', function () {
    return view('database.database');
});


Route::get('/login', [UsuarisController::class, 'showLogin'])->name('login');
Route::get('/logout', [UsuarisController::class, 'logout'])->name('logout');
Route::get('/put_login', [UsuarisController::class, 'login']);
Route::get('/expedients', function () {
    return view('callManagement.callManagement');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/trucades', function () {
        return view('callCard.callCard');
    });

    Route::get('/expedients', function () {
        return view('callManagement.callManagement');
    });
    

});

