<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>

    <title>Faboce S.R.L.</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- ******************************************************************************************* -->
    <!-- Icon -->
    <link rel="icon" type="image/png" href="icon/favicon.png">
    <!-- ******************************************************************************************* -->

    <!-- ******************************************************************************************* -->
    <!-- Styles -->
    <link href="<?php echo e(asset('css/login.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/animate.min.css')); ?>" rel="stylesheet">
    <!-- ******************************************************************************************* -->

</head>

<body>
    <?php echo $__env->yieldContent('content'); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\faboce2023\resources\views/layouts/applogin.blade.php ENDPATH**/ ?>