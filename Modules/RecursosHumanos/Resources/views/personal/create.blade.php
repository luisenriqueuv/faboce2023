<!-- ----------------------------------------------
         VISTA (CREATE PERSONAL)
---------------------------------------------- -->
<div class="card border-secondary border-top-2 border-bottom-2">
    <div class="card-header bg-light header-elements-inline">
        <h5 class="card-title">
            <img class="mr-2" src="{{ asset('icon/favicon.png') }}" width="20" height="20">
            <b>Codificador de Personal</b>
        </h5>
    </div>
    <div class="card-body">
        <form action="{{ route('recursoshumanos.personal.store') }}" method="POST" role="form" id="formPersonal">
            @csrf
            <div class="form-group row">
                <label for="CARNET" class='col-3 offset-1 col-form-label'>Carnet de Identidad:</label>
                <div class="col-6">
                    <input type="text" name="CARNET" id="CARNET" required maxlength="20"
                        placeholder='Ingrese el carnet de identidad' class='form-control'>
                </div>
            </div>
            <div class="form-group row">
                <label for="CICIUDAD" class='col-3 offset-1 col-form-label'>Extension:</label>
                <div class="col-6">
                    <input type="text" name="CICIUDAD" id="CICIUDAD" maxlength="2"
                        placeholder='Ingrese la extension del carnet de identidad' class='form-control'>
                </div>
            </div>
            <div class="form-group row">
                <label for="APELLIDO" class='col-3 offset-1 col-form-label'>Apellido(s):</label>
                <div class="col-6">
                    <input type="text" name="APELLIDO" id="APELLIDO" required maxlength="150"
                        placeholder='Ingrese el apellido' class='form-control'>
                </div>
            </div>
            <div class="form-group row">
                <label for="NOMBRE" class='col-3 offset-1 col-form-label'>Nombre(s):</label>
                <div class="col-6">
                    <input type="text" name="NOMBRE" id="NOMBRE" required maxlength="150"
                        placeholder='Ingrese el nombre' class='form-control'>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 offset-1 col-form-label">Cargo:</label>
                <div class="col-sm-6">
                    <select width="100%" class="form-control" required id='IDCARGO' name="IDCARGO">
                        <option></option>
                        @foreach ($nombrespersonas as $nombrepersona)
                            <option value="{{ $nombrepersona->CI }}">{{ $cargo->NOMBRE.' '.$cargo->APELLIDO }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 offset-1 col-form-label">Jerarquia:</label>
                <div class="col-sm-6">
                    <select width="100%" class="form-control" required id='IDJERARQUIA' name="IDJERARQUIA">
                        <option></option>
                        @foreach ($jerarquias as $jerarquia)
                            <option value="{{ $jerarquia->ID }}">{{ $jerarquia->DESCRIPCION }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 offset-1 col-form-label">Area:</label>
                <div class="col-sm-6">
                    <select width="100%" class="form-control" required id='IDAREA' name="IDAREA">
                        <option></option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->ID }}">{{ $area->CODIGO }} {{ $area->DESCRIPCION }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 offset-1 col-form-label">Fabrica: </label>
                <div class="col-sm-6">
                    <select width="100%" class="form-control" required id='AGECODIGO' name="AGECODIGO">
                        <option></option>
                        @foreach ($fabricas as $agencia)
                            @if (
                                $agencia->AGECODIGO == '110' ||
                                    $agencia->AGECODIGO == '240' ||
                                    $agencia->AGECODIGO == '250' ||
                                    $agencia->AGECODIGO == '440')
                                <option value="{{ $agencia->AGECODIGO }}">{{ $agencia->AGECODIGO }} -
                                    {{ $agencia->AGENOMBRE }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="CIUDAD" class='col-3 offset-1 col-form-label'>Ciudad:</label>
                <div class="col-6">
                    <input type="text" name="CIUDAD" id="CIUDAD" required maxlength="100"
                        placeholder='Ingrese la ciudad' class='form-control'>
                </div>
            </div>
            <div class="form-group row">
                <label for="FECHAI" class='col-3 offset-1 col-form-label'>Fecha de Ingreso:</label>
                <div class="col-8 col-sm-4 col-md-3">
                    <input type="date" name="FECHAI" id="FECHAI" required value="{{ date('Y-m-d') }}"
                        class='form-control text-right'>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 offset-1 col-form-label">Formulario:</label>
                <div class="col-sm-6">
                    <select width="100%" class="form-control" required id='IDFORMULARIO' name="IDFORMULARIO">
                        <option></option>
                        @foreach ($formularios as $formulario)
                            <option value="{{ $formulario->ID }}">{{ $formulario->NOMBRE }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 offset-1 col-form-label">Fabrica / Agencia: </label>
                <div class="col-sm-6">
                    <select width="100%" class="form-control" required id='AGECODIGO2' name="AGECODIGO2">
                        <option></option>
                        @foreach ($fabricas as $agencia)
                            @if ($agencia->AGECODIGO > 0 && strlen($agencia->AGECODIGO) == 3 && substr($agencia->AGECODIGO, -1) == 0)
                                <option value="{{ $agencia->AGECODIGO }}">{{ $agencia->AGECODIGO }} -
                                    {{ $agencia->AGENOMBRE }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12 text-center">
                    <button type="submit"
                        class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-2">
                        <b><i class="icon-checkmark mr-1"></i></b>
                        A&ntilde;adir Personal
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(function() {
        $("#formPersonal").validate();
        $('#IDCARGO').select2({
            tags: true,
            placeholder: 'seleccione un cargo',
            allowClear: true,
            dropdownParent: $("#modal_ajax"),
            width: 'resolve',
        }).on('change', function() {
            $(this).trigger('blur');
        });
        $('#IDJERARQUIA').select2({
            tags: true,
            placeholder: 'seleccione una jerarquia',
            allowClear: true,
            dropdownParent: $("#modal_ajax"),
            width: 'resolve',
        }).on('change', function() {
            $(this).trigger('blur');
        });
        $('#IDAREA').select2({
            tags: true,
            placeholder: 'seleccione un area',
            allowClear: true,
            dropdownParent: $("#modal_ajax"),
            width: 'resolve',
        }).on('change', function() {
            $(this).trigger('blur');
        });
        $('#IDFORMULARIO').select2({
            tags: true,
            placeholder: 'seleccione un formulario',
            allowClear: true,
            dropdownParent: $("#modal_ajax"),
            width: 'resolve',
        }).on('change', function() {
            $(this).trigger('blur');
        });
        $('#AGECODIGO').select2({
            tags: true,
            placeholder: 'seleccione una fabrica',
            allowClear: true,
            dropdownParent: $("#modal_ajax"),
            width: 'resolve',
        }).on('change', function() {
            $(this).trigger('blur');
        });
        $('#AGECODIGO2').select2({
            tags: true,
            placeholder: 'seleccione una fabrica o agencia',
            allowClear: true,
            dropdownParent: $("#modal_ajax"),
            width: 'resolve',
        }).on('change', function() {
            $(this).trigger('blur');
        });
    });
</script>
