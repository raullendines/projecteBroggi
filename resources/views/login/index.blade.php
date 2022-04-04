@extends('plantilla.form')

@section('titulo', 'Login')

@section('contents')

<div class="container border border-dark rounded bg-light">
    <div class="row d-flex align-items-center">
        <div class="col-xl-5 col-12">
            <img src="{{ asset('images/broggi_bg.png') }}" class="mx-auto d-block"/>
        </div>
            <div class="col-xl-6 container mb-3">
                <form needs-validation action="{{ action([App\Http\Controllers\UsuarisController::class, 'login']) }}" method="GET">
                    @csrf
                    <div class="row">
                    @include('partials.mensajes')
                    <h1>Login</h1>

                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Adreça electrònica" value="{{ old('email') }}"/>
                                <label for="email">Adreça electrònica</label>
                             </div>
                        </div>

                        <div class="input-group">
                            <div class="form-floating col-11 p-0">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Contrassenya"/>
                                <label for="password">Contrassenya</label>
                            </div>
                                <button  class="btn input-group-text col-1 btn-outline-info" type="button" onclick="viewPassword()"> <i class="fa fa-eye"></i> </button>
                        </div>

                        <div class="d-grid gap-2 col-12 mt-3">
                            <button class="btn rounded-pill" type="submit" style="background-color: #00b0c8; color: white">
                                Accedir
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
