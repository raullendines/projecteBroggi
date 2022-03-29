<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartesTrucadesResource;
use App\Models\CartesTrucades;
use Illuminate\Http\Request;

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
        $cartaTrucada = new CartesTrucades();

        //$cartaTrucada->sigles = $request->input('sigles');
        $cartaTrucada->codi_trucada = $request->input('');      //---> FALTA SABER QUIN CODI APLIQUEM
        $cartaTrucada->temps_trucada = $request->input('tempsTrucada');


        $cartaTrucada->telefon = $request->input('');
        $cartaTrucada->procedencia_trucada = $request->input('procedenciaInput');
        $cartaTrucada->nom_trucada = $request->input('');
        $cartaTrucada->municipis_id_trucada = $request->input('selectMunicipi');
        $cartaTrucada->adreca_trucada = $request->input('');
        //AQUI ES TE QUE FER UN INSERT I OBTENIR EL ID

        $cartaTrucada->dades_personals_id = $request->input('');
        
        //--------------------------------------------
        $cartaTrucada->fora_catalunya = $request->input('localitzacio');
        $cartaTrucada->provincies_id = $request->input('provincia');
        $cartaTrucada->municipis_id = $request->input('selectMunicipi');

        $cartaTrucada->tipus_localitzacions_id = $request->input('tipusLoc');
        if($request->input('localitzacio') == 1){

            if($request->input('tipusLoc') == 1){
                $cartaTrucada->descripcio_localitzacio = $request->input('');
                $cartaTrucada->detall_localitzacio = $request->input('');
                $cartaTrucada->altres_ref_localitzacio = $request->input('');
            }
            else if($request->input('tipusLoc') == 2){
                $cartaTrucada->descripcio_localitzacio = $request->input('');
                $cartaTrucada->detall_localitzacio = $request->input('');
                $cartaTrucada->altres_ref_localitzacio = $request->input('');
            }
            else if($request->input('tipusLoc') == 3){
                $cartaTrucada->descripcio_localitzacio = $request->input('');
                $cartaTrucada->detall_localitzacio = $request->input('');
                $cartaTrucada->altres_ref_localitzacio = $request->input('');
            }
            else if($request->input('tipusLoc') == 4){
                $cartaTrucada->descripcio_localitzacio = $request->input('');
                $cartaTrucada->detall_localitzacio = $request->input('');
                $cartaTrucada->altres_ref_localitzacio = $request->input('');
            }
            else if($request->input('tipusLoc') == 5){
                $cartaTrucada->descripcio_localitzacio = $request->input('');
                $cartaTrucada->detall_localitzacio = $request->input('');
                $cartaTrucada->altres_ref_localitzacio = $request->input('');
            }
        }else{

        }

        $cartaTrucada->incidents_id = $request->input('');
        $cartaTrucada->nota_comuna = $request->input('');
        $cartaTrucada->expedients_id = $request->input('');
        $cartaTrucada->usuaris_id = $request->input('');
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
}
