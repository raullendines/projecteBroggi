@extends('plantilla.principal')

@section('contents')
<landingpage-component userInfo={{ Auth::user()}}></landingpage-component>
@endsection
