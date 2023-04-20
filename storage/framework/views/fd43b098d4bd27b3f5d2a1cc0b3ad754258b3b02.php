<div class="card border-secondary border-top-2 border-bottom-2">
    <div class="card-header bg-light header-elements-inline">
        <h5 class="card-title">
            <img class="mr-2" src="<?php echo e(asset('icon/favicon.png')); ?>" width="20" height="20">
            <b>Codificador de Descanso</b>
        </h5>
    </div>
    <div class="card-body">
        <form action="<?php echo e(route('recursoshumanos.descanso.store')); ?>" method="POST" role="form" id="formDescanso">
            <?php echo csrf_field(); ?>
            <div class="form-group row">
                <label class="col-sm-3 offset-1 col-form-label">Nombre :</label>
                <div class="col-sm-6">
                    <select width="100%" class="form-control" required id='NOMBRE_COMPLETO' name="NOMBRE_COMPLETO">
                        <option></option>
                        <?php $__currentLoopData = $nombrespersonas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nombrepersona): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($nombrepersona->NOMBRE.' '.$nombrepersona->APELLIDO.' |'.$nombrepersona->CARNET); ?>"><?php echo e($nombrepersona->NOMBRE.' '.$nombrepersona->APELLIDO.' | '.$nombrepersona->CARNET); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="FECHA_SOLICITUD" class='col-3 offset-1 col-form-label'>Fecha Solicitud :</label>
                <div class="col-6">
                    <input type="date" name="FECHA_SOLICITUD" id="FECHA_SOLICITUD" required maxlength="10"
                        placeholder='Fecha de Solicitud' class='form-control' value="<?php echo(Date('Y-m-d'))?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="SECCION"  class="col-sm-3 offset-1 col-form-label">Seccion :</label>
                <div class="col-sm-6">
                    <select width="100%" class="form-control" required id='SECCION' name="SECCION">
                        <option></option>
                        <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($area->DESCRIPCION); ?>"><?php echo e($area->DESCRIPCION); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="FECHA_INICIO_SOLICITUD" class='col-3 offset-1 col-form-label'>Inicio Solicitud :</label>
                <div class="col-6">
                    <input type="date" name="FECHA_INICIO_SOLICITUD" id="FECHA_INICIO_SOLICITUD" required maxlength="10"
                        placeholder='Fecha de Solicitud' class='form-control' value="<?php echo(Date('Y-m-d'))?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="FECHA_FIN_SOLICITUD" class='col-3 offset-1 col-form-label'>Fin Solicitud :</label>
                <div class="col-6">
                    <input type="date" name="FECHA_FIN_SOLICITUD" id="FECHA_FIN_SOLICITUD" required maxlength="10"
                        placeholder='Fecha Fin de Solicitud' class='form-control' value="<?php echo(Date('Y-m-d'))?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="OBSERVACION" class='col-3 offset-1 col-form-label'>Observaciones :</label>
                <div class="col-6">
                    <textarea type="text" name="OBSERVACION" id="OBSERVACION" required maxlength="255"
                        placeholder='Ingrese las Observaciones' class='form-control'></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="FECHA_RETORNO" class='col-3 offset-1 col-form-label'>Fin Solicitud :</label>
                <div class="col-6">
                    <input type="date" name="FECHA_RETORNO" id="FECHA_RETORNO" required maxlength="10"
                        placeholder='Fecha Fin de Solicitud' class='form-control' value="<?php echo(Date('Y-m-d'))?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12 text-center">
                    <button type="submit"
                        class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-2">
                        <b><i class="icon-checkmark mr-1"></i></b>
                        A&ntilde;adir descanso
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(function() {
        $("#formDescanso").validate();
        $('#NOMBRE_COMPLETO').select2({
            tags: true,
            placeholder: 'seleccione una Persona',
            allowClear: true,
            dropdownParent: $("#modal_ajax"),
            width: 'resolve',
        }).on('change', function() {
            $(this).trigger('blur');
        });
        $('#SECCION').select2({
            tags: true,
            placeholder: 'seleccione una Seccion',
            allowClear: true,
            dropdownParent: $("#modal_ajax"),
            width: 'resolve',
        }).on('change', function() {
            $(this).trigger('blur');
        });
    });
</script>
<?php /**PATH C:\xampp\htdocs\faboce2023\Modules/RecursosHumanos\Resources/views/descanso/create.blade.php ENDPATH**/ ?>