<?php

namespace App\Http\Controllers\Api;

use App\Clases\Utilitat;
use App\Models\CodiTrucada;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Http\Resources\CodiTrucadaResource;

class CodiTrucadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codiTrucada = CodiTrucada::all();

        return CodiTrucadaResource::collection($codiTrucada);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $codiTrucada = new CodiTrucada();
        try{
            $codiTrucada->save();

            $response = (new CodiTrucadaResource($codiTrucada))
                    ->response()
                    ->setStatusCode(201);
        }
        catch(QueryException $ex){
            $mensaje = Utilitat::errorMessage($ex);
            $response = \response()
                        ->json(
                            ['error' => $mensaje], 400
                        );
        }

        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CodiTrucada  $codiTrucada
     * @return \Illuminate\Http\Response
     */
    public function show(CodiTrucada $codiTrucada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CodiTrucada  $codiTrucada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CodiTrucada $codiTrucada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CodiTrucada  $codiTrucada
     * @return \Illuminate\Http\Response
     */
    public function destroy(CodiTrucada $codiTrucada)
    {
        //
    }
}
