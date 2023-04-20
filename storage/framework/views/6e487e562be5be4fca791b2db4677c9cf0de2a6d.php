<?php $__env->startSection('content'); ?>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 animate__animated animate__zoomIn">

                <div class="login100-form-title">
                    <span class="login100-form-title-1">
                        <img src="images/faboce.png">
                    </span>
                </div>
                
                <form method="POST" action="<?php echo e(route('login')); ?>" class="login100-form">
                    <?php echo csrf_field(); ?>
                    INICIO DE SESION
                    <div class="wrap-input100 m-b-26">
                        <span class="label-input100">Correo Electr&oacute;nico</span>
                        <input id="email" type="email" class="input100 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus
                            placeholder="Ingrese su correo electr&oacute;nico">
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    
                    <div class="wrap-input100 m-b-18">
                        <span class="label-input100">Contrase&ntilde;a</span>
                        <input class="input100 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="password" id="password"
                            name="password" placeholder="Ingrese la Contrase&ntilde;a" required
                            autocomplete="current-password">
                        <span class="focus-input100"></span>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Iniciar Sesi&oacute;n &nbsp; &nbsp; <i class="fa fa-sign-in"></i>
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.applogin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\faboce2023\resources\views/auth/login.blade.php ENDPATH**/ ?>