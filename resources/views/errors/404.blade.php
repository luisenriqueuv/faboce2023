@extends('layouts.app')

@section('header')
    <x-header title="404" module='Sistemas' />
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <img src="/images/faboce2.png" alt="Faboce S.R.L.">
        </div>
        <div class="card-body">
            <div class="text-center">
                <img src="/images/404.png" alt="Sin Acceso">
                <h1>Esta P&aacute;gina no est&aacute; disponible</h1>
            </div>
        </div>
    </div>
@endsection
