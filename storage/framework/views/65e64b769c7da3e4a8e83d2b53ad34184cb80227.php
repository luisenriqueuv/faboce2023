<div class="card border-secondary border-top-2 border-bottom-2">
    <div class="card-header bg-light header-elements-inline">
        <h5 class="card-title">
            <img class="mr-2" src="<?php echo e(asset('icon/favicon.png')); ?>" width="20" height="20">
            <b>Codificador de Prueba</b>
        </h5>
    </div>
    <div class="card-body">
        <form action="<?php echo e(route('recursoshumanos.prueba.update', $prueba->ID)); ?>" method="POST" role="form"
            id="formPrueba">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group row">
                <label for="DETALLE" class='col-3 offset-1 col-form-label'>Detalle:</label>
                <div class="col-6">
                    <input type="text" name="DETALLE" id="DETALLE" required maxlength="20"
                        value="<?php echo e($prueba->DETALLE); ?>" placeholder='Ingrese el detalle' class='form-control'>
                </div>
            </div>
            <div class="form-group row">
                <label for="DETALLE_1" class='col-3 offset-1 col-form-label'>DETALLE 1 :</label>
                <div class="col-6">
                    <input type="text" name="DETALLE_1" id="DETALLE_1" required maxlength="20"
                        value="<?php echo e($prueba->DETALLE_1); ?>" placeholder='Ingrese el Detalle' class='form-control'>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12 text-center">
                    <button type="submit"
                        class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-2">
                        <b><i class="icon-checkmark mr-1"></i></b>
                        Actualizar prueba
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(function() {
        $("#formPrueba").validate();
    });
</script><?php /**PATH D:\xampp\htdocs\faboce2023\Modules/RecursosHumanos\Resources/views/prueba/edit.blade.php ENDPATH**/ ?>