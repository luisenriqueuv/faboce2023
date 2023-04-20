@extends('layouts.app')

@section('header')
    <x-header title="Areas" module='Recursos Humanos' />
@endsection

@section('content')
    <div class="card">
        @can('recursoshumanos.area.index')
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Areas</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        @can('recursoshumanos.area.create')
                            <a href="javascript:;" onClick="showAjaxModal('{{ route('recursoshumanos.area.create') }}');"
                                class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-2 float-right">
                                <b><i class="icon-folder-plus"></i></b>
                                A&ntilde;adir Area
                            </a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="card-body">
                <recursoshumanos-areas-index />
            </div>
        @endcan
    </div>
@endsection
