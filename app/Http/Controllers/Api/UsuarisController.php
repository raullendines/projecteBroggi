<?php

namespace App\Http\Controllers\Api;

use App\Models\Usuaris;
use App\Clases\Utilitat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UsuarisResource;
use Illuminate\Database\QueryException;

class UsuarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
/*         $profiles = Perfils::all();

        return view('plantilla.principal', compact('profiles'));
    } */
        $usuaris = Usuaris::all();

        return UsuarisResource::collection($usuaris);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuari =  new Usuaris();
        $usuari->nom = $request->input('nom');
        $usuari->cognoms = $request->input('cognoms');
        $usuari->correu = $request->input('correu');
        $usuari->contrasenya = $request->input('contrasenya');
        $usuari->rols_id = $request->input('rols_id');
        $usuari->actiu = ($request->input('actiu') == 'actiu');

        try {
            $usuari->save();
            $response = (new UsuarisResource($usuari))
                ->response()
                ->setStatusCode(201);
        } catch (QueryException $ex) {
            $mensaje = Utilitat::errorMessage($ex);
            $response = \response()
                ->json(["error" => $mensaje], 400);
        }

        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuaris  $usuaris
     * @return \Illuminate\Http\Response
     */
    public function show(Usuaris $usuaris)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuaris  $usuaris
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuaris $usuari)
    {

        $usuari->nom = $request->input('nom');
        $usuari->cognoms = $request->input('cognoms');
        $usuari->correu = $request->input('correu');
        $usuari->contrasenya = $request->input('contrasenya');
        $usuari->rols_id = $request->input('rols_id');
        $usuari->actiu = ($request->input('actiu') == 'actiu');

        try {
            $usuari->save();
            $response = (new UsuarisResource($usuari))
            ->response()
            ->setStatusCode(201);
        } catch (QueryException $ex) {
            $mensaje = Utilitat::errorMessage($ex);
            $response = \response()
            ->json(["error" => $mensaje], 400);
        }

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuaris  $usuaris
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuaris $usuaris)
    {
        //
    }
}
