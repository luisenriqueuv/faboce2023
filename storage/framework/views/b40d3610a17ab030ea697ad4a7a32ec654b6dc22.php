

<?php $__env->startSection('header'); ?>
    <?php if (isset($component)) { $__componentOriginal99db13291ff287454d08b974e14dad64f9e2c6f3 = $component; } ?>
<?php $component = App\View\Components\Header::resolve(['title' => 'Vacacion Calculo','module' => 'Recursos Humanos'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Vacacion Calculo</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a href="javascript:;" onClick="showAjaxModal('<?php echo e(route('recursoshumanos.vacacioncalculo.create')); ?>');"
                        class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-2 float-right">
                        <b><i class="icon-folder-plus"></i></b>
                        A&ntilde;adir Vacacion Calculo
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <recursoshumanos-vacacioncalculo-index />
            <div class="">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Tabla de Calculo de Vacaciones</h5>
                    </div>
                
                    <div class="card-body">
                        Tabla de valores de Vacaciones Calculadas.
                    </div>
                
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nº</th>
                                    <th>CARNET</th>
                                    <th>FECHA INGRESO</th>
                                    <th>FECHA HOY</th>
                                    <th>AÑOS TRANSCURRIDO</th>
                                    <th>MESES TRANSCURRIDO</th>
                                    <th>DIAS TRANSCURRIDO</th>
                                    <th>TIEMPO DIAS VACACION</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $valorColor = 2;
                                $tipoColorVacacion = array(0=>'table-primary',1=>'table-success',2=>'table-warning',3=>'table-light');
                                $contador =1;
                                $posArray =0;
                                ?>
                                <?php $__currentLoopData = $registrosPersonal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registroPersonal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="<?php echo e($tipoColorVacacion[$valorColor]); ?> ">
                                        <?php
                                            $fIngreso   = $registroPersonal->FECHA_INGRESO;
                                        ?>
                                        <?php if(Str::length($fIngreso)==10): ?>
                                            <?php
                                                $fIngreso    = $registroPersonal->FECHA_INGRESO;
                                                $fIngresoC   = new DateTime($fIngreso);
                                                $ahora       = new DateTime(date("Y-m-d"));
                                                $aniosT      = $ahora->diff($fIngresoC);
                                                $diasVacacion='';
                                                $aniosTrabajados = $aniosT->y;
                                                if ($aniosTrabajados >= 1 && $aniosTrabajados <= 5) {
                                                    $diasVacaciones = 15;
                                                    $valorColor     = 0;
                                                } elseif ($aniosTrabajados >= 5 && $aniosTrabajados < 10) {
                                                    $diasVacaciones = 20;
                                                    $valorColor     = 1;
                                                } elseif ($aniosTrabajados >= 10) {
                                                    $diasVacaciones = 30;
                                                    $valorColor     = 2;
                                                } else {
                                                    // caso de error, puedes lanzar una excepción o asignar un valor por defecto
                                                    //throw new Exception('Años trabajados inválidos');
                                                    $diasVacaciones = 0;
                                                    $valorColor     = 3;
                                                }
                                                ?>
                                        <?php else: ?>
                                            <?php
                                            $fIngreso     = 'Fecha no Valida';
                                            $ahora        = 'Fecha no Valida';
                                            $aniosT       = 'Fecha no Valida';
                                            $diasVacacion = '0';
                                            ?>
                                        <?php endif; ?>
                                        <td><?php echo e($contador); ?>.-</td>
                                        <td><?php echo e($registroPersonal->CARNET); ?></td>
                                        <td><?php echo e($fIngreso); ?></td>
                                        <td><?php echo e($ahora->format('Y-m-d')); ?></td>
                                        <td><?php echo e($aniosT->y); ?></td>
                                        <td><?php echo e($aniosT->m); ?></td>
                                        <td><?php echo e($aniosT->d); ?></td>
                                        <td><?php echo e($diasVacaciones); ?></td>
                                        <?php
                                        if ($diasVacaciones>365) {
                                            # code...
                                            $aniosVacaciones=1;
                                        } else {
                                            # code...
                                            $aniosVacaciones=0;
                                        }
                                        //ASIGNAMOS VALORES AL ARRAY PARA MANDAR A REGISTRAR
                                        $valoresRegistro[$posArray]= array( 'CARNET'             =>$registroPersonal->CARNET,
                                                                            'FECHA_INGRESO'      =>$fIngreso,
                                                                            'FECHA_CALCULO'      =>$ahora->format('Y-m-d'),
                                                                            'DIAS_TRANSCURRIDOS' =>$aniosT->d,
                                                                            'MESES_TRANSCURRIDOS'=>$aniosT->m,
                                                                            'ANIOS_TRANSCURRIDOS'=>$aniosT->y,
                                                                            'DIAS_VACACION'      =>$diasVacaciones,
                                                                            'ANIOS_VACACION'     =>$aniosVacaciones
                                                                            );
                                        $posArray++;
                                        $contador++;
                                        ?>
                                    </tr>                                                        
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\faboce2023\Modules/RecursosHumanos\Resources/views/vacacioncalculo/index.blade.php ENDPATH**/ ?>