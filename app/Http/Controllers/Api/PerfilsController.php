<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PerfilsResources;
use App\Models\Perfils;
use Illuminate\Http\Request;

class PerfilsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Perfils::all();

        return PerfilsResources::collection($profiles);
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
     * @param  \App\Models\Perfils  $perfils
     * @return \Illuminate\Http\Response
     */
    public function show(Perfils $perfil)
    {
        $perfils = Perfils::find($perfil);
        return new PerfilsResources($perfils);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perfils  $perfils
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfils $perfils)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perfils  $perfils
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfils $perfils)
    {
        //
    }
}
