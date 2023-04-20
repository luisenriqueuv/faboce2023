<!-- ----------------------------------------------
             VISTA (INDEX FORMUARIO)
---------------------------------------------- -->


<?php $__env->startSection('header'); ?>
<?php if (isset($component)) { $__componentOriginal99db13291ff287454d08b974e14dad64f9e2c6f3 = $component; } ?>
<?php $component = App\View\Components\Header::resolve(['title' => 'Formularios','module' => 'Recursos Humanos'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Header::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal99db13291ff287454d08b974e14dad64f9e2c6f3)): ?>
<?php $component = $__componentOriginal99db13291ff287454d08b974e14dad64f9e2c6f3; ?>
<?php unset($__componentOriginal99db13291ff287454d08b974e14dad64f9e2c6f3); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('recursoshumanos.formulario.index')): ?>
    <!-- CABECERA -->
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Formularios</h5>
        <div class="header-elements">
            <div class="list-icons">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('recursoshumanos.formulario.create')): ?>

                <!-- >>> create() -->
                <a href="javascript:;" onClick="showAjaxModal('<?php echo e(route('recursoshumanos.formulario.create')); ?>');" class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-2 float-right">
                    <b><i class="icon-folder-plus"></i></b>
                    A&ntilde;adir Formulario
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- DETALLE -->
    <div class="card-body">
        <recursoshumanos-formularios-index />
    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\faboce2023\Modules/RecursosHumanos\Resources/views/formulario/index.blade.php ENDPATH**/ ?>