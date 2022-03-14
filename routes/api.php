<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AgenciesController;
use App\Models\CartesTrucades;
use App\Models\CartesTrucadesHasAgencies;
use App\Models\Comarques;
use App\Models\DadesPersonals;
use App\Models\EstatsAgencies;
use App\Models\EstatsExpedients;
use App\Models\Incidents;
use App\Models\Municipis;
use App\Models\TipusIncidents;
use App\Models\Usuaris;

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

Route::apiResource('agencies', AgenciesController::class);
Route::apiResource('call_cards', CartesTrucadesHasAgencies::class);
Route::apiResource('callCards2', CartesTrucades::class);
Route::apiResource('comarques', Comarques::class);
Route::apiResource('dades', DadesPersonals::class);
Route::apiResource('agencies_status', EstatsAgencies::class);
Route::apiResource('expedients_status', EstatsExpedients::class);
Route::apiResource('expedients', Expedients::class);
Route::apiResource('incidents', Incidents::class);
Route::apiResource('municipis', Municipis::class);
Route::apiResource('provincies', Provincies::class);
Route::apiResource('incidents_types', TipusIncidents::class);
Route::apiResource('usuaris', Usuaris::class);
