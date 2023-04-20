@extends('layouts.app')

@section('header')
    <x-header title="" module='Tablero' />
@endsection

@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Tablero</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center animate__animated animate__zoomIn">
                        <img src="{{ asset('images/faboce2.png') }}" alt="Faboce S.R.L.">
                    </div>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection
