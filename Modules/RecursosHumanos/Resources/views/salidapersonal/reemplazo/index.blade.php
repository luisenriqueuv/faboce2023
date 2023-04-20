@extends('layouts.app')

@section('header')
    <x-header title="Salida de Personal" module='Recursos Humanos' />
@endsection

@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Reemplazo</h5>
            <div class="header-elements">
<!--                @can('recursoshumanos.salidapersonal.reemplazo.create') -->
                    <div class="list-icons">
                        <a href="javascript:;"
                            onClick="showAjaxModal('{{ route('recursoshumanos.salidapersonal.replacement.create') }}');"
                            class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-2 float-right">
                            <b><i class="icon-folder-plus"></i></b>
                            A&ntilde;adir Reemplazo
                        </a>
                    </div>
                @else
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
<!--                @endcan -->
            </div>
        </div>
        <div class="card-body">
            <hr>
            @can('recursoshumanos.salidapersonal.replacement.index')
                <recursoshumanos-salidapersonal-replacement-index />
            @else
                <error-403 />
            @endcan
        </div>
    </div>
@endsection
