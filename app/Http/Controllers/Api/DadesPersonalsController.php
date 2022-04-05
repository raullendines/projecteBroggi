<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DadesPersonalsResource;
use App\Models\DadesPersonals;
use Illuminate\Http\Request;

class DadesPersonalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dades = DadesPersonals::all();

        return DadesPersonalsResource::collection($dades);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($cartaTrucada)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DadesPersonals  $dadesPersonals
     * @return \Illuminate\Http\Response
     */
    public function show(DadesPersonals $dadesPersonals)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DadesPersonals  $dadesPersonals
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DadesPersonals $dadesPersonals)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DadesPersonals  $dadesPersonals
     * @return \Illuminate\Http\Response
     */
    public function destroy(DadesPersonals $dadesPersonals)
    {
        //
    }
}
