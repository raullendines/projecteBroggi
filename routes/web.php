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

Route::get('/', function () { return view('plantilla.principal'); });

Route::get('/database', function () { return view('database.database'); });

Route::get('/error', function () { return view('error.error'); })->name('error');

Route::get('/login', [UsuarisController::class, 'showLogin'])->name('login');
Route::get('/logout', [UsuarisController::class, 'logout'])->name('logout');
Route::get('/put_login', [UsuarisController::class, 'login']);
Route::get('/expedients', function () {
    return view('callManagement.callManagement');
});

Route::middleware(['auth'])->group(function () {
    Route::middleware(['role: 1, 2, 3'])->group(function () {
        Route::get('/trucades', function () {
            return view('callCard.callCard');
        });
    }); 

    Route::middleware(['role: 2,3'])->group(function () {
        Route::get('/expedients', function () {
            return view('callManagement.callManagement');
        });
    }); 

    Route::middleware(['role: 3'])->group(function () {
        Route::get('/map', function () {
            return view('callManagement.callManagement');
        });

        Route::get('/graph', function () {
            return view('callManagement.callManagement');
        });
    }); 
});


// 1 -> Operador 112
// 2 -> Supervisor 112
// 3 -> Administrador Sistema
