<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>

    <title>Faboce S.R.L.</title>

    <meta charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="base-url" content="<?php echo e(url('/')); ?>">

    <!-- ******************************************************************************************* -->
    <!-- Icon -->
    <link rel="icon" type="image/png" href="<?php echo e(asset('icon/favicon.png')); ?>" />
    <!-- ******************************************************************************************* -->

    <!-- ******************************************************************************************* -->
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <!-- ******************************************************************************************* -->

    <!-- ******************************************************************************************* -->
    <!-- Styles -->
    <link href="<?php echo e(mix('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/animate.min.css')); ?>" rel="stylesheet">
    <?php echo \Livewire\Livewire::styles(); ?>


    <script src="<?php echo e(mix('js/app.js')); ?>"></script>

    <script src="<?php echo e(asset('js/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/buttons.colVis.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/buttons.flash.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/buttons.html5.styles.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/buttons.html5.styles.templates.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/steps.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/fixed_columns.min.js')); ?>"></script>

    <script src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jgrowl.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/noty.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/uniform.min.js')); ?>"></script>

    <script src="<?php echo e(asset('js/jquery.validate.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/additional-methods.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.makedinput.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.inputmask.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('js/maxlength.min.js')); ?>"></script>

    <script src="<?php echo e(asset('js/fileinput.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/daterangepicker.js')); ?>"></script>

    <script src="<?php echo e(asset('js/script.js')); ?>"></script>

    <!-- ******************************************************************************************* -->

</head>

<body>

    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="<?php echo e(asset('images/faboce2.png')); ?>" alt="Faboce S.R.L."></div>
            <p>Cargando...</p>
        </div>
    </div>

    <?php if (isset($component)) { $__componentOriginal08d9d46900ea68d5dc06d8728734a2fd47ca153c = $component; } ?>
<?php $component = App\View\Components\Navbar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Navbar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal08d9d46900ea68d5dc06d8728734a2fd47ca153c)): ?>
<?php $component = $__componentOriginal08d9d46900ea68d5dc06d8728734a2fd47ca153c; ?>
<?php unset($__componentOriginal08d9d46900ea68d5dc06d8728734a2fd47ca153c); ?>
<?php endif; ?>

    <!-- Page content -->
    <div class="page-content">

        <?php if (isset($component)) { $__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa = $component; } ?>
<?php $component = App\View\Components\Sidebar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Sidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa)): ?>
<?php $component = $__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa; ?>
<?php unset($__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa); ?>
<?php endif; ?>

        <!-- Main content -->
        <div class="content-wrapper">

            <?php echo $__env->yieldContent('header'); ?>

            <!-- Content area -->
            <div class="content">

                <!-- App -->
                <div id="app">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
                <!-- App -->

            </div>
            <!-- /content area -->

            <?php if (isset($component)) { $__componentOriginal2bcebcb49cbd37095816ed3d3b22a3f8992f805c = $component; } ?>
<?php $component = App\View\Components\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2bcebcb49cbd37095816ed3d3b22a3f8992f805c)): ?>
<?php $component = $__componentOriginal2bcebcb49cbd37095816ed3d3b22a3f8992f805c; ?>
<?php unset($__componentOriginal2bcebcb49cbd37095816ed3d3b22a3f8992f805c); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginal88b1957f21f7f49b400717e8d0a27189798132bf = $component; } ?>
<?php $component = App\View\Components\Footer::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Footer::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal88b1957f21f7f49b400717e8d0a27189798132bf)): ?>
<?php $component = $__componentOriginal88b1957f21f7f49b400717e8d0a27189798132bf; ?>
<?php unset($__componentOriginal88b1957f21f7f49b400717e8d0a27189798132bf); ?>
<?php endif; ?>
        </div>
        <!-- Main content -->

    </div>
    <!-- Page content -->

    <!-- ******************************************************************************************* -->
    <!-- Scripts -->
    <script type="text/javascript">
        window.Laravel = {
            csrfToken: "<?php echo e(csrf_token()); ?>",
            jsPermissions: <?php echo auth()->check()
                ? auth()->user()->jsPermissions()
                : null; ?>

        }
    </script>
    <script>
        setTimeout(function() {
            $(".page-loader-wrapper").fadeOut();
        }, 100);
        const app = new Vue({
            el: '#app',
        });
        Noty.overrideDefaults({
            theme: 'limitless',
            layout: 'topRight',
            type: 'alert',
            timeout: 2500
        });
    </script>
    <?php echo \Livewire\Livewire::scripts(); ?>

    <?php if(session('success')): ?>
        <script>
            new Noty({
                text: "<?php echo e(session('success')); ?>.",
                type: 'success'
            }).show();
        </script>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <script>
            new Noty({
                text: "<?php echo e(session('error')); ?>.",
                type: 'error'
            }).show();
        </script>
    <?php endif; ?>
    <?php if($errors->any()): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <script>
                new Noty({
                    text: "<?php echo e($error); ?>.",
                    type: 'error'
                }).show();
            </script>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <!-- ******************************************************************************************* -->

</body>

</html>
<?php /**PATH D:\xampp\htdocs\faboce2023\resources\views/layouts/app.blade.php ENDPATH**/ ?>