<!-- ----------------------------------------------
             VISTA (INDEX FORMUARIO)
---------------------------------------------- -->
@extends('layouts.app')

@section('header')
<x-header title="Formularios" module='Recursos Humanos' />
@endsection

@section('content')
<div class="card">
    @can('recursoshumanos.formulario.index')
    <!-- CABECERA -->
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Formularios</h5>
        <div class="header-elements">
            <div class="list-icons">
                @can('recursoshumanos.formulario.create')

                <!-- >>> create() -->
                <a href="javascript:;" onClick="showAjaxModal('{{ route('recursoshumanos.formulario.create') }}');" class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-2 float-right">
                    <b><i class="icon-folder-plus"></i></b>
                    A&ntilde;adir Formulario
                </a>
                @endcan
            </div>
        </div>
    </div>

    <!-- DETALLE -->
    <div class="card-body">
        <recursoshumanos-formularios-index />
    </div>
    @endcan
</div>
@endsection