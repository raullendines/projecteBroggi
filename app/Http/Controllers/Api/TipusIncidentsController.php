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
        $tipusIncidents = TipusIncidents::find($tipusIncidents);
        return view('callCard.callCard', compact('tipusIncidents'));
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
