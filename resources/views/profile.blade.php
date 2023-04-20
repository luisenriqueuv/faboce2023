@extends('layouts.app')

@section('header')
    <x-header title="Perfil" module='SAS - ERP' />
@endsection

@section('content')
    <div class="profile-cover">
        <div class="profile-cover-img" style="background-image: url({{ asset('images/texture-blue.jpg') }})"></div>
        <div class="media align-items-center text-center text-lg-left flex-column flex-lg-row m-0">
            <div class="mr-lg-3 mb-2 mb-lg-0">
                <a href="javascript:;" class="profile-thumb">
                    <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&color=FFF&background=324148&bold=true"
                        class="border-white rounded-circle" width="48" height="48" alt="{{ auth()->user()->name }}">
                </a>
            </div>
            <div class="media-body text-white">
                <h1 class="mb-0">{{ auth()->user()->name }}</h1>
                <span class="d-block"></span>
            </div>
            <div class="ml-lg-3 mt-2 mt-lg-0"> </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Perfil</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="card border-secondary border-top-2 border-bottom-2">
                <div class="card-header bg-light header-elements-inline">
                    <h5 class="card-title">
                        <img class="mr-2" src="{{ asset('icon/favicon.png') }}" width="20" height="20">
                        <b>Cambio de Contrase&ntilde;a</b>
                    </h5>
                </div>
                <div class="card-body content d-flex justify-content-center align-items-center">
                    <form action="{{ route('changepassword') }}" method="POST" role="form" id="formChangePassword">
                        @csrf
                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="password" id="password" name="password" class="form-control" required
                                placeholder="Contraseña">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>
                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="password" id="password_confirm" name="password_confirm" required minlength="7"
                                class="form-control" placeholder="Nueva Contraseña">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>
                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="password" id="password_confirm1" name="password_confirm1" required minlength="7"
                                class="form-control" placeholder="Repita Contraseña">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 text-center">
                                <button type="submit"
                                    class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-2">
                                    <b><i class="icon-checkmark"></i></b>
                                    Actualizar Contrase&ntilde;a
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
