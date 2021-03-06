<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\UsuarisController;
use App\Http\Controllers\Api\PerfilsController;

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

Route::get('/error', function () { return view('error.error'); })->name('error');
Route::get('/database', function () { return view('database.database'); })->name('database');

Route::get('/login', [UsuarisController::class, 'showLogin'])->name('login');
Route::get('/logout', [UsuarisController::class, 'logout'])->name('logout');
Route::get('/put_login', [UsuarisController::class, 'login']);
Route::get('/expedients', function () {
    return view('callManagement.callManagement');
});

Route::get('/clearcache', function () { 
    $notice = 'CONFIG';

    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('config:clear');

    $notice = '/ APPLICATION';

    $exitCode = Artisan::call('cache:clear');

    $notice = '/ VIEW';

    $exitCode = Artisan::call('view:clear');

    $notice = 'cleared';

    return $notice;
});

Route::middleware(['cors'])->group(function () {
    Route::post('/hogehoge', 'Controller@hogehoge');
});

Route::middleware(['auth'])->group(function () {
    Route::middleware(['role: 1, 2, 3'])->group(function () {
        Route::get('/', function () { return view('mainPage.mainPage'); });

        Route::get('/trucades', function () {
            return view('callCard.callCard');
        });

        Route::get('/ayuda', function () {
            return view('videoCard.video');
        });
    });

    Route::middleware(['role: 2,3'])->group(function () {
        Route::get('/expedients', function () {
            return view('callManagement.callManagement');
        });
    });

    Route::middleware(['role: 3'])->group(function () {
        Route::get('/mapa', function () {
            return view('map.map');
        });

        Route::get('/grafic', function () {
            return view('graph.graph');
        });

        Route::get('/admin', function () {
            return view('admin.admin');
        });
    });
});




// 1 -> Operador 112
// 2 -> Supervisor 112
// 3 -> Administrador Sistema
