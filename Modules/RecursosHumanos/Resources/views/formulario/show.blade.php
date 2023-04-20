<!-- ----------------------------------------------
              VISTA (SHOW FORMULARIO)
---------------------------------------------- -->
@extends('layouts.app')

@section('header')
    <x-header title="Pregunta" module='Recursos Humanos' />
@endsection

@section('content')
    <div class="card">
        @can('recursoshumanos.formulario1.index')

            <!-- CABECERA -->
            <div class="card-header header-elements-inline">
                
                <!-- datos formulario -->
                <h5 class="card-title">            
                    <input type="text" id="id_form" value="{{$formulario->id}}" hidden><br>
                    <b>FORMULARIO: </b>{{$formulario->codigo}}<br>
                    <small><b>DESCRIPCION: </b>{{$formulario->descripcion}}</small>                        
                </h5>
                
                <!-- >>> create(idFormulario) "En Formulario1" -->
                <div class="header-elements">
                    <div class="list-icons">
                        @can('recursoshumanos.formulario1.create')
                            <a href="javascript:;" onClick="showAjaxModal('{{ route('recursoshumanos.formulario1.create',$formulario->id) }}');"
                                class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-2 float-right">
                                <b><i class="icon-folder-plus"></i></b>
                                A&ntilde;adir Pregunta
                            </a>
                        @endcan
                    </div>
                </div>
            </div>        
            
            <!-- DETALLE (Datos del Formularios1)-->
            <div class="card-body">
                <recursoshumanos-formularios1-index :formularios1="{{ $formulario->formulario1 }}" />
            </div>
        @endcan        
    </div>           

@endsection

