<div class="card border-secondary border-top-2 border-bottom-2">
    <div class="card-header bg-light header-elements-inline">
        <h5 class="card-title">
            <img class="mr-2" src="<?php echo e(asset('icon/favicon.png')); ?>" width="20" height="20">
            <b>Codificador de Cambio Turno</b>
        </h5>
    </div>
    <div class="card-body">
        <form action="<?php echo e(route('recursoshumanos.cambioturno.update', $cambioturno->ID)); ?>" method="POST" role="form"
            id="formCambioturno">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group row">
                <label for="NOMBRE" class='col-3 offset-1 col-form-label'>Nombre :</label>
                <div class="col-6">
                    <input type="text" name="NOMBRE_COMPLETO" id="NOMBRE_COMPLETO" required maxlength="100"
                    value="<?php echo e($cambioturno->NOMBRE_COMPLETO); ?>" placeholder='Ingrese el Nombre del Empleado' class='form-control'>
                </div>
            </div>
            <div class="form-group row">
                <label for="FECHA_SOLICITUD" class='col-3 offset-1 col-form-label'>Fecha Solicitud :</label>
                <div class="col-6">
                    <input type="date" name="FECHA_SOLICITUD" id="FECHA_SOLICITUD" required maxlength="10"
                    value="<?php echo e($cambioturno->FECHA_SOLICITUD); ?>" placeholder='Fecha de Solicitud' class='form-control' value="<?php echo(Date('Y-m-d'))?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="SECCION" class='col-3 offset-1 col-form-label'>Seccion :</label>
                <div class="col-6">
                    <input type="text" name="SECCION" id="SECCION" required maxlength="100"
                    value="<?php echo e($cambioturno->SECCION); ?>" placeholder='Ingrese la Seccion' class='form-control'>
                </div>
            </div>
            <div class="form-group row">
                <label for="INICIO_SOLICITUD" class='col-3 offset-1 col-form-label'>Inicio Solicitud :</label>
                <div class="col-6">
                    <input type="date" name="FECHA_INICIO_SOLICITUD" id="FECHA_INICIO_SOLICITUD" required maxlength="10"
                    value="<?php echo e($cambioturno->FECHA_INICIO_SOLICITUD); ?>" placeholder='Fecha de Solicitud' class='form-control' value="<?php echo(Date('Y-m-d'))?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="FIN_SOLICITUD" class='col-3 offset-1 col-form-label'>Fin Solicitud :</label>
                <div class="col-6">
                    <input type="date" name="FECHA_FIN_SOLICITUD" id="FECHA_FIN_SOLICITUD" required maxlength="10"
                    value="<?php echo e($cambioturno->FECHA_FIN_SOLICITUD); ?>" placeholder='Fecha Fin de Solicitud' class='form-control' value="<?php echo(Date('Y-m-d'))?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="NOMBRE_REEMPLAZO" class='col-3 offset-1 col-form-label'>Nombre Cambio turno:</label>
                <div class="col-3">
                    <input type="text" name="NOMBRE_REEMPLAZO" id="NOMBRE_REEMPLAZO" required maxlength="100"
                    value="<?php echo e($cambioturno->NOMBRE_REEMPLAZO); ?>" placeholder='Nombre del Cambio turno' class='form-control'>
                </div>
                <div class="col-3">
                    <input type="text" name="TURNO_REEMPLAZO" id="TURNO_REEMPLAZO" required maxlength="100"
                    value="<?php echo e($cambioturno->TURNO_REEMPLAZO); ?>" placeholder='Turno Cambio turno' class='form-control'>
                </div>
            </div>
            <div class="form-group row">
                <label for="NOMBRE_REEMPLAZADO" class='col-3 offset-1 col-form-label'>Nombre Reemplazado:</label>
                <div class="col-3">
                    <input type="text" name="NOMBRE_REEMPLAZADO" id="NOMBRE_REEMPLAZADO" required maxlength="100"
                    value="<?php echo e($cambioturno->NOMBRE_REEMPLAZADO); ?>" placeholder='Nombre del Reemplazado' class='form-control'>
                </div>
                <div class="col-3">
                    <input type="text" name="TURNO_REEMPLAZADO" id="TURNO_REEMPLAZADO" required maxlength="100"
                    value="<?php echo e($cambioturno->TURNO_REEMPLAZADO); ?>" placeholder='Turno Reemplazado' class='form-control'>
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
</script><?php /**PATH C:\xampp\htdocs\faboce2023\Modules/RecursosHumanos\Resources/views/cambioturno/edit.blade.php ENDPATH**/ ?>