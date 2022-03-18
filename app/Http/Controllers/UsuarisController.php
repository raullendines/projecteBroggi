<?php

namespace App\Http\Controllers;

use App\Models\Usuaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\PseudoTypes\True_;

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
            $response = redirect('/trucades');
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
    public function create()
    {
        /* 
        $user = new Usuaris();

        $user->correu = 'prueba@cep.net';
        $user->nom = 'prueba';
        $user->cognoms = 'prueba';
        $user->contrasenya = \bcrypt('prueba');
        $user->actiu = false;
        $user->rols_id = 3;

        $user->save();  
        */
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
    public function update(Request $request, Usuaris $usuaris)
    {
        //
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
