<div class="card border-secondary border-top-2 border-bottom-2">
    <div class="card-header bg-light header-elements-inline">
        <h5 class="card-title">
            <img class="mr-2" src="{{ asset('icon/favicon.png') }}" width="20" height="20">
            <b>Codificador de Cambio Turno</b>
        </h5>
    </div>
    <div class="card-body">
        <form action="{{ route('recursoshumanos.cambioturno.update', $cambioturno->ID) }}" method="POST" role="form"
            id="formCambioturno">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label class="col-sm-3 offset-1 col-form-label"><b>Nombre :</b></label>
                <div class="col-sm-6">
                    <input type="text" name="UPDATE" id="UPDATE" readonly="true" placeholder='UPDATE' class='form-control' value="UPDATE" hidden>
                    <select width="100%" class="form-control" required id='NOMBRE_COMPLETO' name="NOMBRE_COMPLETO">
                        <option></option>
                        @foreach ($nombrespersonas as $nombrepersona)
                            <option value="{{ $nombrepersona->NOMBRE.' '.$nombrepersona->APELLIDO.' |'.$nombrepersona->CARNET }}"
                                @if ($cambioturno->CARNET==$nombrepersona->CARNET)
                                    selected
                                @endif
                            >{{ $nombrepersona->NOMBRE.' '.$nombrepersona->APELLIDO.' | '.$nombrepersona->CARNET }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="FECHA_SOLICITUD" class='col-3 offset-1 col-form-label'><b>Fecha Solicitud :</b></label>
                <div class="col-6">
                    <input type="date" name="FECHA_SOLICITUD" id="FECHA_SOLICITUD" required maxlength="10"
                    value="{{ $cambioturno->FECHA_SOLICITUD }}" placeholder='Fecha de Solicitud' class='form-control' value="<?php echo(Date('Y-m-d'))?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="SECCION" class='col-3 offset-1 col-form-label'><b>Seccion :</b></label>
                <div class="col-sm-6">
                    <select width="100%" class="form-control" required id='SECCION' name="SECCION">
                        <option></option>
                        @foreach ($secciones as $seccion)
                            <option value="{{ $seccion->ID }}"
                                @if ($cambioturno->SECCION==$seccion->ID)
                                    selected
                                @endif    
                            >{{ $seccion->DESCRIPCION }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="INICIO_SOLICITUD" class='col-3 offset-1 col-form-label'><b>Inicio Solicitud :</b></label>
                <div class="col-6">
                    <input type="date" name="FECHA_INICIO_SOLICITUD" id="FECHA_INICIO_SOLICITUD" required maxlength="10"
                    value="{{ $cambioturno->FECHA_INICIO_SOLICITUD }}" placeholder='Fecha de Solicitud' class='form-control' value="<?php echo(Date('Y-m-d'))?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="FIN_SOLICITUD" class='col-3 offset-1 col-form-label'><b>Fin Solicitud :</b></label>
                <div class="col-6">
                    <input type="date" name="FECHA_FIN_SOLICITUD" id="FECHA_FIN_SOLICITUD" required maxlength="10"
                    value="{{ $cambioturno->FECHA_FIN_SOLICITUD }}" placeholder='Fecha Fin de Solicitud' class='form-control' value="<?php echo(Date('Y-m-d'))?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="NOMBRE_REEMPLAZO" class='col-3 offset-1 col-form-label'><b>Nombre Reemplazo/Turno:</b></label>
                <div class="col-5">
                    <select width="100%" class="form-control" required id='NOMBRE_REEMPLAZO' name="NOMBRE_REEMPLAZO">
                        <option></option>
                        @foreach ($nombrespersonas as $nombrepersona)
                            <option value="{{ $nombrepersona->NOMBRE.' '.$nombrepersona->APELLIDO.' |'.$nombrepersona->CARNET }}"
                                @if ($cambioturno->CARNET==$nombrepersona->CARNET)
                                    selected
                                @endif
                            >{{ $nombrepersona->NOMBRE.' '.$nombrepersona->APELLIDO.' | '.$nombrepersona->CARNET }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-1">
                    <input type="text" name="TURNO_REEMPLAZO" id="TURNO_REEMPLAZO" required maxlength="100"
                    value="{{ $cambioturno->TURNO_REEMPLAZO }}" placeholder='Turno Cambio turno' class='form-control'>
                </div>
            </div>
            <div class="form-group row">
                <label for="NOMBRE_REEMPLAZADO" class='col-3 offset-1 col-form-label'><b>Nombre Reemplazado/Turno:</b></label>
                <div class="col-5">
                    <select width="100%" class="form-control" required id='NOMBRE_REEMPLAZADO' name="NOMBRE_REEMPLAZADO">
                        <option></option>
                        @foreach ($nombrespersonas as $nombrepersona)
                            <option value="{{ $nombrepersona->NOMBRE.' '.$nombrepersona->APELLIDO.' |'.$nombrepersona->CARNET }}"
                                @if ($cambioturno->CARNET==$nombrepersona->CARNET)
                                    selected
                                @endif
                            >{{ $nombrepersona->NOMBRE.' '.$nombrepersona->APELLIDO.' | '.$nombrepersona->CARNET }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-1">
                    <input type="text" name="TURNO_REEMPLAZADO" id="TURNO_REEMPLAZADO" required maxlength="100"
                    value="{{ $cambioturno->TURNO_REEMPLAZADO }}" placeholder='Turno Reemplazado' class='form-control'>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12 text-center">
                    <button type="submit"
                        class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-2">
                        <b><i class="icon-checkmark mr-1"></i></b>
                        Actualizar Cambio de Turno
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(function() {
        $("#formCambioturno").validate();
    });
    $("#NOMBRE_COMPLETO").select2({
            language: "es",
            tags: true,
            placeholder: "Haga Click y Busque la persona.",
            allowClear: true,
            dropdownParent: $("#modal_ajax"),
            width: 'resolve',
            ajax: {
                url: "{{ route('recursoshumanos.personal.like') }}",
                type: "post",
                delay: 250,
                dataType: 'json',
                data: function(params) {
                    return {
                        query: params.term,
                        "_token": "{{ csrf_token() }}",
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
    });
    $("#NOMBRE_REEMPLAZO").select2({
            language: "es",
            tags: true,
            placeholder: "Haga Click y Busque la persona.",
            allowClear: true,
            dropdownParent: $("#modal_ajax"),
            width: 'resolve',
            ajax: {
                url: "{{ route('recursoshumanos.personal.like') }}",
                type: "post",
                delay: 250,
                dataType: 'json',
                data: function(params) {
                    return {
                        query: params.term,
                        "_token": "{{ csrf_token() }}",
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
    });
    $("#NOMBRE_REEMPLAZADO").select2({
            language: "es",
            tags: true,
            placeholder: "Haga Click y Busque la persona.",
            allowClear: true,
            dropdownParent: $("#modal_ajax"),
            width: 'resolve',
            ajax: {
                url: "{{ route('recursoshumanos.personal.like') }}",
                type: "post",
                delay: 250,
                dataType: 'json',
                data: function(params) {
                    return {
                        query: params.term,
                        "_token": "{{ csrf_token() }}",
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
    });
</script>