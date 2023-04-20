<?php $__env->startSection('content'); ?>
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: <?php echo config('recursoshumanos.name'); ?>

    </p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('recursoshumanos::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\faboce2023\Modules/RecursosHumanos\Resources/views/index.blade.php ENDPATH**/ ?>