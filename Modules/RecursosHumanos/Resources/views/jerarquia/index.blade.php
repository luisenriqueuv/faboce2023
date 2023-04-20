@extends('layouts.app')

@section('header')
    <x-header title="Jerarquias" module='Recursos Humanos' />
@endsection

@section('content')
    <div class="card">
        @can('recursoshumanos.jerarquia.index')
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Jerarquias</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        @can('recursoshumanos.jerarquia.create')
                            <a href="javascript:;" onClick="showAjaxModal('{{ route('recursoshumanos.jerarquia.create') }}');"
                                class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-2 float-right">
                                <b><i class="icon-folder-plus"></i></b>
                                A&ntilde;adir Jerarquia
                            </a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="card-body">
                <recursoshumanos-jerarquias-index />
            </div>
        @endcan
    </div>
@endsection
