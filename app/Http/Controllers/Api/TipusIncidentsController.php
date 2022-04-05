<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TipusIncidentsResource;
use App\Models\TipusIncidents;
use Illuminate\Http\Request;

class TipusIncidentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipusIncidents = TipusIncidents::all();

        return TipusIncidentsResource::collection($tipusIncidents); 
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
     * @param  \App\Models\TipusIncidents  $tipusIncidents
     * @return \Illuminate\Http\Response
     */
    public function show(TipusIncidents $tipusIncidents)
    {   
        $tipus = TipusIncidents::join('incidents', 'incidents.cartes_incidents_id', '=', 'tipus_incidents.id')
                                ->join('cartes_trucades', 'incidents.id', '=', 'cartes_trucades.incidents_id')
                                /* ->where('cartes_trucades', $tipusIncidents) */
                                ->select('cartes_trucades.dades_personals_id', 'incidents.descripcio')
                                ->get();

        return TipusIncidentsResource::collection($tipus);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipusIncidents  $tipusIncidents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipusIncidents $tipusIncidents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipusIncidents  $tipusIncidents
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipusIncidents $tipusIncidents)
    {
        //
    }
}
