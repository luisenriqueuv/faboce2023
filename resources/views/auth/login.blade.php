@extends('layouts.applogin')

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 animate__animated animate__zoomIn">

                <div class="login100-form-title">
                    <span class="login100-form-title-1">
                        <img src="images/faboce.png">
                    </span>
                </div>
                
                <form method="POST" action="{{ route('login') }}" class="login100-form">
                    @csrf
                    INICIO DE SESION
                    <div class="wrap-input100 m-b-26">
                        <span class="label-input100">Correo Electr&oacute;nico</span>
                        <input id="email" type="email" class="input100 @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            placeholder="Ingrese su correo electr&oacute;nico">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="wrap-input100 m-b-18">
                        <span class="label-input100">Contrase&ntilde;a</span>
                        <input class="input100 @error('password') is-invalid @enderror" type="password" id="password"
                            name="password" placeholder="Ingrese la Contrase&ntilde;a" required
                            autocomplete="current-password">
                        <span class="focus-input100"></span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Iniciar Sesi&oacute;n &nbsp; &nbsp; <i class="fa fa-sign-in"></i>
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
