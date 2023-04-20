<!-- ----------------------------------------------
              VISTA (EDIT FORMULARIO 1)
---------------------------------------------- -->
<div class="card border-secondary border-top-2 border-bottom-2">
    <div class="card-header bg-light header-elements-inline">
        <h5 class="card-title">
            <img class="mr-2" src="{{ asset('icon/favicon.png') }}" width="20" height="20">
            <b>Codificador de Pregunta</b>
        </h5>
    </div>
    <div class="card-body">
        
        <form action="{{ route('recursoshumanos.formulario1.update', $formulario1->id) }}" method="POST" role="form"
            id="formFormulario1">
            @csrf
            @method('PUT')            
            <!-- nombre -->
            <div class="form-group row">
                <label for="nombre" class='col-3 offset-1 col-form-label'>Pregunta:</label>
                <div class="col-6">
                    <textarea name="nombre" id="nombre" cols="30" rows="10" required maxlength="1000" 
                    placeholder='Ingrese la pregunta' class='form-control'>{{ $formulario1->nombre }}</textarea>
                </div>
            </div>
            
            <!-- idFormulario -->
            <input type="hidden" name="id_formulario" value="{{$formulario1->id_formulario}}">
            
            <!-- >>> update(datos,id) -->
            <div class="form-group row">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-2">
                        <b><i class="icon-checkmark mr-1"></i></b>
                        Actualizar Pregunta
                    </button>
                </div>
            </div>            

        </form>
    </div>
</div>
<script>
    $(function() {
        $("#formFormulario1").validate();
    });
</script>
