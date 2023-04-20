<!-- ----------------------------------------------
             VISTA (INDEX PERSONAL)
---------------------------------------------- -->
@extends('layouts.app')

@section('header')
    <x-header title="Seccion" module='Recursos Humanos' />
@endsection

@section('content')
    <div class="card">
<!--        @can('recursoshumanos.seccion.index')  -->
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Seccion</h5>
                <div class="header-elements">
                    <div class="list-icons">
<!--                          @can('recursoshumanos.seccion.create') -->
                            <a href="javascript:;" onClick="showAjaxModal('{{ route('recursoshumanos.seccion.create') }}');"
                                class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-2 float-right">
                                <b><i class="icon-folder-plus"></i></b>
                                A&ntilde;adir Seccion
                            </a>
<!--                          @endcan  -->
                    </div>
                </div>
            </div>
            <div class="card-body">
                <recursoshumanos-seccion-index />
            </div>
<!--          @endcan  -->
    </div>
@endsection
