@extends('plantilla.principal')

@section('title', 'callcard')

@section('contents')

<callcard-component :tipus-incident = {{ $tipusIncidents }}></callcard-component>

@endsection
