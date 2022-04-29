<?php

namespace App\Http\Controllers\Api;


use App\Clases\Utilitat;

use App\Models\Agencies;


use App\Models\Expedients;


// use App\Clases\Utilitat;
use App\Models\CodiTrucada;
use Illuminate\Http\Request;
use App\Models\CartesTrucades;
use App\Models\DadesPersonals;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
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

        try {
            DB::beginTransaction();
            $cartaTrucada = new CartesTrucades();
            $dadesPersonals = new DadesPersonals();
            $expedient = new Expedients();


            //--------------EXPEDIENT----------------------
            $expedient->estats_expedients_id = 1;
            $expedient->save();

            $cartaTrucada->expedients_id = $expedient->id;
            //---------------------------------------------
            //----------------DADES PERSONALS------------------
            $dadesPersonals->telefon = $request->input('phoneInput');
            $dadesPersonals->adreca = $request->input('adreca');
            $dadesPersonals->antecedents = $request->input('antecedents');

            $dadesPersonals->save();
            $cartaTrucada->dades_personals_id = $dadesPersonals->id;    //UN COP FET EL INSERT AGAFEM EL ID

            //------------------------------------------------

            //--------------COMUNES-----------------
            $cartaTrucada->temps_trucada = $request->input('tempsTrucada');
            $cartaTrucada->codi_trucada = "TRUC-" . $request->input('codiTrucada');
            $cartaTrucada->telefon = $request->input('phoneInput');
            $cartaTrucada->fora_catalunya = $request->input('localitzacio');
            //-------------------------------------

            //--------------CATALUNYA-------------------
            if ($request->input('localitzacio') == 1) {
                $cartaTrucada->procedencia_trucada = $request->input('procedenciaInput');
                $cartaTrucada->nom_trucada = $request->input('nomIntelocutor');
                $cartaTrucada->municipis_id_trucada = $request->input('selectMunicipi');
                $cartaTrucada->adreca_trucada = $request->input('adreca');



                //--------------------------------------------
                $cartaTrucada->provincies_id = $request->input('selectProvincia');
                $cartaTrucada->municipis_id = $request->input('selectMunicipi'); //Preguntar entre municipis id i municipis id trucada diferencia

                $cartaTrucada->tipus_localitzacions_id = $request->input('tipusLoc');


                if ($request->input('tipusLoc') == 1) {
                    $carrerDescrip = $request->input('tipusVia') . ' ' . $request->input('nomVia') . ' ' . $request->input('numVia');
                    $detallLoc = $request->input('escala') . ' ' . $request->input('pis') . ' ' . $request->input('porta');

                    $cartaTrucada->descripcio_localitzacio = $carrerDescrip;
                    $cartaTrucada->detall_localitzacio = $detallLoc;
                    $cartaTrucada->altres_ref_localitzacio = $request->input('referenciesLoc1');
                } else if ($request->input('tipusLoc') == 2) {
                    $cartaTrucada->descripcio_localitzacio = $request->input('nomPunt');
                    $cartaTrucada->altres_ref_localitzacio = $request->input('referenciesLoc2');
                } else if ($request->input('tipusLoc') == 3) {
                    $cartaTrucada->descripcio_localitzacio = $request->input('selectMunicipi');
                    $cartaTrucada->altres_ref_localitzacio = $request->input('referenciesLoc3');
                } else if ($request->input('tipusLoc') == 4) {
                    $descripCarretera = $request->input('nomCarretera') . ' ' . $request->input('puntKilometric');

                    $cartaTrucada->descripcio_localitzacio = $descripCarretera;
                    $cartaTrucada->detall_localitzacio = $request->input('sentitCarretera');
                    $cartaTrucada->altres_ref_localitzacio = $request->input('referenciesLoc4');
                } else if ($request->input('tipusLoc') == 5) {
                    $cartaTrucada->descripcio_localitzacio = $request->input('selectProvincia');
                    $cartaTrucada->altres_ref_localitzacio = $request->input('referenciesLoc5');
                }
            }
            //------------------------------------------------------
            //---------------ALTRES (LOCALITZACÓ)-------------------
            else {
                $cartaTrucada->procedencia_trucada = $request->input('procedenciaInput');
                $cartaTrucada->nom_trucada = $request->input('nomIntelocutor');
                $cartaTrucada->municipis_id_trucada = $request->input('municipioInput');
                $cartaTrucada->adreca_trucada = $request->input('adreca');
                $cartaTrucada->provincies_id = $request->input('provinciaInput');
            }
            //--------------------------------------------------

            //-------------------MES COMUNES--------------------
            $cartaTrucada->incidents_id = $request->input('incident');
            $cartaTrucada->nota_comuna = $request->input('notaComunaInput');




            $cartaTrucada->usuaris_id = $request->input("usuariId");
            //---------------------------------------

            $cartaTrucada->save();

            $response = (new CartesTrucadesResource($cartaTrucada))
                ->response()
                ->setStatusCode(201);
            DB::commit();
        } catch (QueryException $ex) {
            DB::rollBack();
            $mensaje = Utilitat::errorMessage($ex);
            $response = \response()
                ->json(
                    ['error' => $mensaje],
                    400
                );
        }

        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CartesTrucades  $cartesTrucades
     * @return \Illuminate\Http\Response
     */
    public function show(CartesTrucades $call_card)
    {
        $call_card = CartesTrucades::find($call_card);
        return new CartesTrucadesResource($call_card);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CartesTrucades  $cartesTrucades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartesTrucades $call_card)
    {
        $id = $request->input('id');

        $find = CartesTrucades::find($id);

        if ($find) {
            $call_card->nom_trucada = $request->input('nom_trucada');
            $call_card->nota_comuna = $request->input('nota_comuna');
            $call_card->telefon = $request->input('telefon');
            try {
                $call_card->save();
                $response = (new CartesTrucadesResource($call_card))
                    ->response()
                    ->setStatusCode(201);
            } catch (QueryException $ex) {
                $mensaje = Utilitat::errorMessage($ex);
                $response = \response()
                    ->json(["error" => $mensaje], 400);
            }

            return $response;
        } else {
            var_dump("not exist");
        }
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

    public function agencies($comarca)
    {
        $contador = DB::table("agencies")
            ->select("agencies.*", "municipis.nom as municipi_nom", "municipis.comarques_id")
            ->leftJoin("municipis", "municipis.id", "=", "agencies.municipis_id")
            ->where('comarques_id', '=', $comarca)
            ->get();

        return $contador->toJson(JSON_PRETTY_PRINT);
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

    public function comarques()
    {
        $comarca = DB::table("cartes_trucades")
            ->join("municipis", "municipis.id", "=", "cartes_trucades.municipis_id")
            ->join("comarques", "comarques.id", "=", "municipis.comarques_id")
            ->select("comarques.nom", DB::raw("count(*) as contador"))
            ->groupBy("comarques.nom")
            ->get();

        return $comarca->toJson(JSON_PRETTY_PRINT);
    }
}