@extends('layouts.app')

@section('header')
    <x-header title="Descanso" module='Recursos Humanos' />
@endsection

@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Descanso</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a href="javascript:;" onClick="showAjaxModal('{{ route('recursoshumanos.descanso.create') }}');"
                        class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-2 float-right">
                        <b><i class="icon-folder-plus"></i></b>
                        A&ntilde;adir Descanso
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <recursoshumanos-descanso-index />
        </div>
    </div>
@endsection