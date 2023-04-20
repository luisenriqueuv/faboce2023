<!-- ----------------------------------------------
         VISTA (EDIT PERSONAL)
---------------------------------------------- -->
<div class="card border-secondary border-top-2 border-bottom-2">
    <div class="card-header bg-light header-elements-inline">
        <h5 class="card-title">
            <img class="mr-2" src="<?php echo e(asset('icon/favicon.png')); ?>" width="20" height="20">
            <b>Codificador de Personal</b>
        </h5>
    </div>
    <div class="card-body">
        <form action="<?php echo e(route('recursoshumanos.personal.update', $personal->CARNET)); ?>" method="POST" role="form"
            id="formPersonal">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group row">
                <label for="CARNET" class='col-3 offset-1 col-form-label'>Carnet de Identidad:</label>
                <div class="col-6">
                    <input type="text" name="CARNET" id="CARNET" required maxlength="20"
                        placeholder='Ingrese el carnet de identidad' class='form-control'
                        value="<?php echo e($personal->CARNET); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="CICIUDAD" class='col-3 offset-1 col-form-label'>Extension:</label>
                <div class="col-6">
                    <input type="text" name="CICIUDAD" id="CICIUDAD" maxlength="2"
                        placeholder='Ingrese la extension del carnet de identidad' class='form-control'
                        value="<?php echo e($personal->CICIUDAD); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="APELLIDO" class='col-3 offset-1 col-form-label'>Apellido(s):</label>
                <div class="col-6">
                    <input type="text" name="APELLIDO" id="APELLIDO" required maxlength="150"
                        placeholder='Ingrese el apellido' class='form-control' value="<?php echo e($personal->APELLIDO); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="NOMBRE" class='col-3 offset-1 col-form-label'>Nombre(s):</label>
                <div class="col-6">
                    <input type="text" name="NOMBRE" id="NOMBRE" required maxlength="150"
                        placeholder='Ingrese el nombre' class='form-control' value="<?php echo e($personal->NOMBRE); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 offset-1 col-form-label">Cargo:</label>
                <div class="col-sm-6">
                    <select width="100%" class="form-control" required id='IDCARGO' name="IDCARGO">
                        <option></option>
                        <?php $__currentLoopData = $cargos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cargo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($cargo->ID == $personal->IDCARGO): ?>
                                <option value="<?php echo e($cargo->ID); ?>" selected><?php echo e($cargo->DESCRIPCION); ?></option>
                            <?php else: ?>
                                <option value="<?php echo e($cargo->ID); ?>"><?php echo e($cargo->DESCRIPCION); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 offset-1 col-form-label">Jerarquia:</label>
                <div class="col-sm-6">
                    <select width="100%" class="form-control" required id='IDJERARQUIA' name="IDJERARQUIA">
                        <option></option>
                        <?php $__currentLoopData = $jerarquias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jerarquia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($jerarquia->ID == $personal->IDJERARQUIA): ?>
                                <option value="<?php echo e($jerarquia->ID); ?>" selected><?php echo e($jerarquia->DESCRIPCION); ?></option>
                            <?php else: ?>
                                <option value="<?php echo e($jerarquia->ID); ?>"><?php echo e($jerarquia->DESCRIPCION); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 offset-1 col-form-label">Area:</label>
                <div class="col-sm-6">
                    <select width="100%" class="form-control" required id='IDAREA' name="IDAREA">
                        <option></option>
                        <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($area->ID == $personal->IDAREA): ?>
                                <option value="<?php echo e($area->ID); ?>" selected><?php echo e($area->CODIGO); ?>

                                    <?php echo e($area->DESCRIPCION); ?></option>
                            <?php else: ?>
                                <option value="<?php echo e($area->ID); ?>"><?php echo e($area->CODIGO); ?> <?php echo e($area->DESCRIPCION); ?>

                                </option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 offset-1 col-form-label">Fabrica: </label>
                <div class="col-sm-6">
                    <select width="100%" class="form-control" required id='AGECODIGO' name="AGECODIGO">
                        <option></option>
                        <?php $__currentLoopData = $fabricas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($agencia->AGECODIGO == $personal->AGECODIGO): ?>
                                <option value="<?php echo e($agencia->AGECODIGO); ?>" selected><?php echo e($agencia->AGECODIGO); ?> -
                                    <?php echo e($agencia->AGENOMBRE); ?></option>
                            <?php else: ?>
                                <option value="<?php echo e($agencia->AGECODIGO); ?>"><?php echo e($agencia->AGECODIGO); ?> -
                                    <?php echo e($agencia->AGENOMBRE); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="CIUDAD" class='col-3 offset-1 col-form-label'>Ciudad:</label>
                <div class="col-6">
                    <input type="text" name="CIUDAD" id="CIUDAD" required maxlength="100"
                        placeholder='Ingrese la ciudad' class='form-control' value="<?php echo e($personal->CIUDAD); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="FECHAI" class='col-3 offset-1 col-form-label'>Fecha de Ingreso:</label>
                <div class="col-8 col-sm-4 col-md-3">
                    <input type="date" name="FECHAI" id="FECHAI" required value="<?php echo e(date('Y-m-d')); ?>"
                        class='form-control text-right' value="<?php echo e($personal->FECHAI); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 offset-1 col-form-label">Formulario:</label>
                <div class="col-sm-6">
                    <select width="100%" class="form-control" required id='IDFORMULARIO' name="IDFORMULARIO">
                        <option></option>
                        <?php $__currentLoopData = $formularios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formulario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($formulario->ID == $personal->IDFORMULARIO): ?>
                                <option value="<?php echo e($formulario->ID); ?>" selected><?php echo e($formulario->NOMBRE); ?></option>
                            <?php else: ?>
                                <option value="<?php echo e($formulario->ID); ?>"><?php echo e($formulario->NOMBRE); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 offset-1 col-form-label">Fabrica / Agencia: </label>
                <div class="col-sm-6">
                    <select width="100%" class="form-control" required id='AGECODIGO2' name="AGECODIGO2">
                        <option></option>
                        <?php $__currentLoopData = $fabricas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(
                                $agencia->AGECODIGO > 0 &&
                                    strlen($agencia->AGECODIGO) == 3 &&
                                    substr($agencia->AGECODIGO, -1) == 0 &&
                                    $agencia->AGECODIGO == $personal->AGECODIGO2): ?>
                                <option value="<?php echo e($agencia->AGECODIGO); ?>" selected><?php echo e($agencia->AGECODIGO); ?> -
                                    <?php echo e($agencia->AGENOMBRE); ?></option>
                            <?php else: ?>
                                <option value="<?php echo e($agencia->AGECODIGO); ?>"><?php echo e($agencia->AGECODIGO); ?> -
                                    <?php echo e($agencia->AGENOMBRE); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12 text-center">
                    <button type="submit"
                        class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-2">
                        <b><i class="icon-checkmark mr-1"></i></b>
                        Actualizar Personal
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
<?php /**PATH D:\xampp\htdocs\faboce2023\Modules/RecursosHumanos\Resources/views/personal/edit.blade.php ENDPATH**/ ?>