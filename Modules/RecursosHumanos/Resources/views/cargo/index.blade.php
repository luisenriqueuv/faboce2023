@extends('layouts.app')

@section('header')
    <x-header title="Cargos" module='Recursos Humanos' />
@endsection

@section('content')
    <div class="card">
        @can('recursoshumanos.cargo.index')
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Cargos</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        @can('recursoshumanos.cargo.create')
                            <a href="javascript:;" onClick="showAjaxModal('{{ route('recursoshumanos.cargo.create') }}');"
                                class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-2 float-right">
                                <b><i class="icon-folder-plus"></i></b>
                                A&ntilde;adir Cargo
                            </a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="card-body">
                <recursoshumanos-cargos-index />
            </div>
        @endcan
    </div>
@endsection
