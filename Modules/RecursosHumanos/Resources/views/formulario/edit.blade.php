<!-- ----------------------------------------------
              VISTA (EDIT FORMULARIO)
---------------------------------------------- -->
<div class="card border-secondary border-top-2 border-bottom-2">
    <div class="card-header bg-light header-elements-inline">
        <h5 class="card-title">
            <img class="mr-2" src="{{ asset('icon/favicon.png') }}" width="20" height="20">
            <b>Codificador de Formularios</b>
        </h5>
    </div>
    <div class="card-body">
        
        <form action="{{ route('recursoshumanos.formulario.update', $formulario->id) }}" method="POST" role="form"
            id="formFormulario">
            @csrf
            @method('PUT')            
            
            <!-- codigo -->
            <div class="form-group row">
                <label for="codigo" class='col-3 offset-1 col-form-label'>C&oacute;digo:</label>
                <div class="col-6">
                    <input type="text" name="codigo" id="codigo" 
                        value="{{ $formulario->codigo }}" required maxlength="10" placeholder='Ingrese el codigo del area'
                        class='form-control'>
                </div>
            </div>
            
            <!-- nombre -->
            <div class="form-group row">
                <label for="nombre" class='col-3 offset-1 col-form-label'>Nombre:</label>
                <div class="col-6">
                    <input type="text" name="nombre" id="nombre" 
                        value="{{$formulario->nombre}}" required maxlength="50" placeholder='Ingrese la descripción del area'
                        class='form-control'>
                </div>
            </div>
            
            <!-- descripcion -->
            <div class="form-group row">
                <label for="descripcion" class='col-3 offset-1 col-form-label'>Descripci&oacute;n:</label>
                <div class="col-6">
                    <input type="text" name="descripcion" id="descripcion" 
                        value="{{$formulario->descripcion}}" maxlength="100" placeholder='Ingrese la descripción del area'
                        class='form-control'>
                </div>
            </div>
            
            <!-- >>> update(datos,id) -->
            <div class="form-group row">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-2">
                        <b><i class="icon-checkmark mr-1"></i></b>
                        Actualizar Formulario
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(function() {
        $("#formFormulario").validate();
    });
</script>
