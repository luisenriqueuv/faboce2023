

<?php $__env->startSection('header'); ?>
    <?php if (isset($component)) { $__componentOriginal99db13291ff287454d08b974e14dad64f9e2c6f3 = $component; } ?>
<?php $component = App\View\Components\Header::resolve(['title' => 'Boleta de Vacacion','module' => 'Recursos Humanos'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
    <div class="card" style="font-size: 11px;">
        <div class="card-header bg-transparent">
            <div class="row">
                <div class="col-sm-6">
                    <img src="<?php echo e(asset('images/faboce2.png')); ?>" alt="" style="width: 150px;">
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-right">
                        <h4 class="text-teal-800"><b>ID # <?php echo e($vacacion->ID); ?></b></h4>
                        <ul class="list list-unstyled font-size-base">
                            <li><b>Fecha : </b><?php echo e(date('d-m-Y', strtotime($vacacion->FECHA))); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <recursoshumanos-salidapersonal-vacacion-show :vacacion='<?php echo e($vacacion); ?>' />
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\faboce2023\Modules/RecursosHumanos\Resources/views/salidapersonal/vacacion/show.blade.php ENDPATH**/ ?>