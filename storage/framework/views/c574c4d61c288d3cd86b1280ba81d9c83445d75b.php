<div class="navbar navbar-expand-md navbar-dark">
    <div class="text-center">
        <a href="/" class="d-inline-block mt-1">
            <img src="<?php echo e(asset('images/faboce.png')); ?>" width="60%" alt="Faboce S.R.L.">
        </a>
    </div>
    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>
        <h5 class="mt-2 ml-md-3 mr-md-auto">Gesti&oacute;n 2023</h5>
        <ul class="navbar-nav">
            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle"
                    data-toggle="dropdown">
                    <img src="https://ui-avatars.com/api/?name=<?php echo e(auth()->user()->name); ?>&color=FFF&background=324148&bold=true"
                        width="36" height="36" class="rounded-circle" alt="<?php echo e(auth()->user()->name); ?>">
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="<?php echo e(route('profile')); ?>" class="dropdown-item"><i class="icon-user-plus"></i>Perfil</a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button class="dropdown-item" type="submit">
                            <i class="icon-switch2"></i><?php echo e(__('Logout')); ?>

                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\faboce2023\resources\views/components/navbar.blade.php ENDPATH**/ ?>