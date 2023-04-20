@extends('layouts.app')

@section('header')
    <x-header title="Boleta de Vacacion" module='Recursos Humanos' />
@endsection

@section('content')
    <div class="card" style="font-size: 11px;">
        <div class="card-header bg-transparent">
            <div class="row">
                <div class="col-sm-6">
                    <img src="{{ asset('images/faboce2.png') }}" alt="" style="width: 150px;">
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-right">
                        <h4 class="text-teal-800"><b>ID # {{ $vacacion->ID }}</b></h4>
                        <ul class="list list-unstyled font-size-base">
                            <li><b>Fecha : </b>{{ date('d-m-Y', strtotime($vacacion->FECHA)) }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <recursoshumanos-salidapersonal-vacacion-show :vacacion='{{ $vacacion }}' />
    </div>
@endsection