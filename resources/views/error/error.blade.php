@extends('plantilla.principal')

@section('titulo', 'Error')
    
@section('contents')
<br>
<div style="display:flex; justify-content:center;">
    <h5>No puedes entrar ahi, ¿quieres <a href="{{ route('logout') }}">iniciar sesión</a> con otro usuario?</h5>
</div>

<br>

<div style="display:flex; justify-content:center;">
    <img src="{{ asset('images/perro-triste-p.jpeg') }}" alt="error" style="width: 600px;" >
</div>
@endsection
