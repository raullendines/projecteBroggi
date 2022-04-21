<?php

namespace App\Http\Controllers\Api;

use App\Clases\Utilitat;
use App\Models\Expedients;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Http\Resources\ExpedientsResource;

class ExpedientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expedients = Expedients::all();

        return ExpedientsResource::collection($expedients);
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
     * @param  \App\Models\Expedients  $expedients
     * @return \Illuminate\Http\Response
     */
    public function show(Expedients $expedient)
    {
        $expedient = Expedients::find($expedient);
        return new ExpedientsResource($expedient);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expedients  $expedients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expedients $expedient)
    {
        $id = $request->input('estats_id');
        /* $find = Expedients::find($id); */
        $find = Expedients::where('id', $id);

        if ($find) {
            $expedient->data_ultima_modificacio = $request->input("data_ultima_modificacio");
            $expedient->estats_expedients_id = $request->input("estats_expedients_id");
            try {
                $expedient->save();
                $response = (new ExpedientsResource($expedient))
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
     * @param  \App\Models\Expedients  $expedients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expedients $expedients)
    {
        //
    }
}
