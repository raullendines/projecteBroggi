@extends('plantilla.principal')

@section('title', 'callcard')

@section('contents')

<callcard-component userId={{ Auth::user()->id }}></callcard-component>

@endsection
