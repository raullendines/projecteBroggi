<?php

namespace App\Http\Controllers;

use App\Models\Usuaris;
use App\Clases\Utilitat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UsuarisResource;
use Illuminate\Database\QueryException;

class UsuarisController extends Controller
{

    public function showLogin()
    {
        return view('login.index');
    }

    public function login(Request $request){
        $mail = $request->input('email');
        $contrasenya = $request->input('password');

        $user = Usuaris::where('correu', $mail)->first();

        if ($user != null && $user->actiu == true && Hash::check($contrasenya, $user->contrasenya)) {
            Auth::login($user);
            $response = redirect('/');
        }
        else{
            $request->session()->flash('error', 'Usuari o contrasenya incorrectes');
            $response = redirect('/login')->withInput();
        }

           return $response;
     }

    public function logout(Request $request){
        $request->session()->flash('mensajes', 'Has tancat sessió correctament.');
        Auth::logout();
        return redirect('/login');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        /* $user = new Usuaris();

        $user->correu = 'prueba@cep.net';
        $user->nom = 'prueba';
        $user->cognoms = 'prueba';
        $user->contrasenya = \bcrypt('prueba');
        $user->actiu = false;
        $user->rols_id = 3;

        $user->save(); */

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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuaris  $usuaris
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuaris $usuaris)
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
