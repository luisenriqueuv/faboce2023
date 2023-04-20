<div class="card border-secondary border-top-2 border-bottom-2">
    <div class="card-header bg-light header-elements-inline">
        <h5 class="card-title">
            <img class="mr-2" src="<?php echo e(asset('icon/favicon.png')); ?>" width="20" height="20">
            <b>Boleta de Vacaci&oacute;n</b>
        </h5>
    </div>
    <div class="card-body">
        <form action="<?php echo e(route('recursoshumanos.salidapersonal.vacacion.store')); ?>" method="POST" role="form"
            id="formVacacion">
            <?php echo csrf_field(); ?>
            <div class="form-group row">
                <label for="OBSERVACION" class='col-3 offset-1 col-form-label'><b>Observacion :</b></label>
                <div class="col-8 col-sm-4 col-md-6">
                    <input type="text" name="OBSERVACION" id="OBSERVACION" required
                        class='form-control text-left'>
                </div>
            </div>
            <div class="form-group row">
                <label for="FECHA" class='col-3 offset-1 col-form-label'><b>Fecha:</b></label>
                <div class="col-8 col-sm-4 col-md-6">
                    <input type="date" name="FECHA" id="FECHA" required value="<?php echo e(date('Y-m-d')); ?>"
                        class='form-control text-left'>
                </div>
            </div>
            <div class="form-group row">
                <label for="SECCION"  class="col-sm-3 offset-1 col-form-label"><b>Seccion :</b></label>
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
                <label for="AGECODIGO" class="col-sm-3 offset-1 col-form-label"><b>Agencia:</b></label>
                <div class="col-sm-6">
                    <select width="100%" class="form-control" required id='AGECODIGO' name="AGECODIGO">
                        <option></option>
                        <?php $__currentLoopData = $agencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($agencia->AGECODIGO); ?>">
                                <?php echo e($agencia->AGECODIGO); ?> - <?php echo e($agencia->AGENOMBRE); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="CARNET" class="col-sm-3 offset-1 col-form-label"><b>Personal:</b></label>
                <div class="col-sm-6">
                    <select width="100%" class="form-control" required id='CARNET' name="CARNET">
                        <option></option>
                        <?php $__currentLoopData = $nombrespersonas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nombrepersona): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($nombrepersona->CARNET); ?>">
                                <?php echo e($nombrepersona->CARNET); ?> | <?php echo e($nombrepersona->NOMBRE); ?> <?php echo e($nombrepersona->APELLIDO); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="IDDOCUMENTO" class="col-sm-3 offset-1 col-form-label"><b>Documento:</b></label>
                <div class="col-sm-6">
                    <select width="100%" class="form-control" required id='IDDOCUMENTO' name="IDDOCUMENTO">
                        <option></option>
                        <?php $__currentLoopData = $documentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $documento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($documento->ID); ?>">
                                <?php echo e($documento->AGECODIGO); ?> - <?php echo e($documento->INITIAL); ?> - <?php echo e($documento->TITLE); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12 text-center">
                    <button type="submit"
                        class="btn btn-lg btn-outline bg-teal text-teal-800 btn-icon rounded-round ml-2">
                        <b><i class="icon-checkmark mr-1"></i></b>
                        A&ntilde;adir
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(function() {
        $("#formVacacion").validate();
        $('#SECCION').select2({
            tags: true,
            placeholder: "Seleccione una Agencia",
            allowClear: true,
            dropdownParent: $("#modal_ajax"),
            width: 'resolve',
        }).on('change', function() {
            $(this).trigger('blur');
        });
        $('#AGECODIGO').select2({
            tags: true,
            placeholder: "Seleccione una Agencia",
            allowClear: true,
            dropdownParent: $("#modal_ajax"),
            width: 'resolve',
        }).on('change', function() {
            $(this).trigger('blur');
        });
        $('#IDDOCUMENTO').select2({
            tags: true,
            placeholder: "Seleccione un documento",
            allowClear: true,
            dropdownParent: $("#modal_ajax"),
            width: 'resolve',
        }).on('change', function() {
            $(this).trigger('blur');
        });
        $("#CARNET").select2({
            language: "es",
            tags: true,
            placeholder: "Seleccione al personal",
            allowClear: true,
            dropdownParent: $("#modal_ajax"),
            width: 'resolve',
            ajax: {
                url: "<?php echo e(route('recursoshumanos.personal.like')); ?>",
                type: "post",
                delay: 250,
                dataType: 'json',
                data: function(params) {
                    return {
                        query: params.term,
                        "_token": "<?php echo e(csrf_token()); ?>",
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
    });
</script>
<?php /**PATH D:\xampp\htdocs\faboce2023\Modules/RecursosHumanos\Resources/views/salidapersonal/vacacion/create.blade.php ENDPATH**/ ?>