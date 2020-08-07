@extends('layouts.app')

@section('content')

<div class="login-logo">
    <h2>Clinica</h2>
    <h4> Iniciar Sesion </h4>
</div>

<div class="card">
                
    <div class="card-body login-card-body">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-12 col-form-label text-md-left">Correo: </label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-12 col-form-label text-md-left"> Contraseña </label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            
                            <div class="col-md-12 mt-2">
                                <center>
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Iniciar Sesion
                                </button>
                                </center>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection
