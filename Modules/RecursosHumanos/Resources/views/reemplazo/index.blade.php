@extends('layouts.app')

@section('header')
    <x-header title="Reemplazo" module='Recursos Humanos' />
@endsection

@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Reemplazo</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a href="javascript:;" onClick="showAjaxModal('{{ route('recursoshumanos.reemplazo.create') }}');"
                        class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-2 float-right">
                        <b><i class="icon-folder-plus"></i></b>
                        A&ntilde;adir Reemplazo
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <recursoshumanos-reemplazo-index />
        </div>
    </div>
@endsection