<?php

namespace App\Http\Controllers\Api;

use App\Models\Agencies;
use Illuminate\Http\Request;
use App\Models\CartesTrucades;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContadorResource;
use App\Http\Resources\CartesTrucadesResource;

class CartesTrucadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $callcards = CartesTrucades::all();

        return CartesTrucadesResource::collection($callcards);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CartesTrucades  $cartesTrucades
     * @return \Illuminate\Http\Response
     */
    public function show(CartesTrucades $cartesTrucades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CartesTrucades  $cartesTrucades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartesTrucades $cartesTrucades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CartesTrucades  $cartesTrucades
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartesTrucades $cartesTrucades)
    {
        //
    }


    public function contador()
    {
        $contador = DB::table("cartes_trucades")
            ->join("incidents", "incidents.id", "=", "cartes_trucades.incidents_id")
            ->join("tipus_incidents", "incidents.classes_incidents_id", "=", "tipus_incidents.id")
            ->select("tipus_incidents.descripcio", DB::raw("count(*) as Contador"))
            ->groupBy("tipus_incidents.descripcio")
            ->get();

        return $contador->toJson(JSON_PRETTY_PRINT);
    }
}
