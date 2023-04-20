<!-- ----------------------------------------------
             VISTA (INDEX PERSONAL)
---------------------------------------------- -->
@extends('layouts.app')

@section('header')
    <x-header title="Personal" module='Recursos Humanos' />
@endsection

@section('content')
    <div class="card">
<!--        @can('recursoshumanos.personal.index')  -->
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Personal</h5>
                <div class="header-elements">
                    <div class="list-icons">
<!--                          @can('recursoshumanos.personal.create') -->
                            <a href="javascript:;" onClick="showAjaxModal('{{ route('recursoshumanos.personal.create') }}');"
                                class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-2 float-right">
                                <b><i class="icon-folder-plus"></i></b>
                                A&ntilde;adir Personal
                            </a>
<!--                          @endcan  -->
                    </div>
                </div>
            </div>
            <div class="card-body">
                <recursoshumanos-personal-index />
            </div>
<!--          @endcan  -->
    </div>
@endsection
