<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PerfilsController;
use App\Http\Controllers\Api\UsuarisController;
use App\Http\Controllers\Api\AgenciesController;
use App\Http\Controllers\Api\ComarquesController;
use App\Http\Controllers\Api\IncidentsController;
use App\Http\Controllers\Api\MunicipisController;
use App\Http\Controllers\Api\ExpedientsController;
use App\Http\Controllers\Api\ProvinciesController;
use App\Http\Controllers\Api\CodiTrucadaController;
use App\Http\Controllers\Api\CartesTrucadesController;
use App\Http\Controllers\Api\DadesPersonalsController;
use App\Http\Controllers\Api\EstatsAgenciesController;
use App\Http\Controllers\Api\TipusIncidentsController;
use App\Http\Controllers\Api\EstatsExpedientsController;
use App\Http\Controllers\Api\CartesTrucadesHasAgenciesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('perfils', PerfilsController::class);
Route::apiResource('agencies', AgenciesController::class);
Route::apiResource('call_cards_agencies', CartesTrucadesHasAgenciesController::class);
Route::apiResource('call_card', CartesTrucadesController::class);
    Route::get('contador', [CartesTrucadesController::class, 'contador']);
    Route::get('comarca', [CartesTrucadesController::class, 'comarques']);
Route::apiResource('dades', DadesPersonalsController::class);
Route::apiResource('agencies_status', EstatsAgenciesController::class);
Route::apiResource('expedients_status', EstatsExpedientsController::class);
Route::apiResource('expedients', ExpedientsController::class);
Route::apiResource('incidents', IncidentsController::class);
Route::apiResource('municipis', MunicipisController::class);
Route::apiResource('provincies', ProvinciesController::class);
Route::apiResource('incidents_types', TipusIncidentsController::class);
Route::apiResource('usuaris', UsuarisController::class);
Route::apiResource('comarques', ComarquesController::class);
Route::apiResource('codi_trucada', CodiTrucadaController::class);


