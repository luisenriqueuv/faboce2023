<div class="card border-secondary border-top-2 border-bottom-2">
    <div class="card-header bg-light header-elements-inline">
        <h5 class="card-title">
            <img class="mr-2" src="{{ asset('icon/favicon.png') }}" width="20" height="20">
            <b>Codificador de Jerarquias</b>
        </h5>
    </div>
    <div class="card-body">
        <form action="{{ route('recursoshumanos.jerarquia.update', $jerarquia) }}" method="POST" role="form"
            id="formJerarquia">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="descripcion" class='col-3 offset-1 col-form-label'>Descripci&oacute;n:</label>
                <div class="col-6">
                    <input type="text" name="descripcion" id="descripcion" required maxlength="200"
                        value="{{ $jerarquia->descripcion }}" placeholder='Ingrese la descripción de la jerarquia'
                        class='form-control'>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-2">
                        <b><i class="icon-checkmark mr-1"></i></b>
                        Actualizar Jerarquia
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(function() {
        $("#formJerarquia").validate();
    });
</script>
