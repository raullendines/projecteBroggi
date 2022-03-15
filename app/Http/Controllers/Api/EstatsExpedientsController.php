<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EstatsExpedientsResource;
use App\Models\EstatsExpedients;
use Illuminate\Http\Request;

class EstatsExpedientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estatsExpedients = EstatsExpedients::all();

        return EstatsExpedientsResource::collection($estatsExpedients);
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
     * @param  \App\Models\EstatsExpedients  $estatsExpedients
     * @return \Illuminate\Http\Response
     */
    public function show(EstatsExpedients $estatsExpedients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EstatsExpedients  $estatsExpedients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EstatsExpedients $estatsExpedients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EstatsExpedients  $estatsExpedients
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstatsExpedients $estatsExpedients)
    {
        //
    }
}
