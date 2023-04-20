<div class="card border-secondary border-top-2 border-bottom-2">
    <div class="card-header bg-light header-elements-inline">
        <h5 class="card-title">
            <img class="mr-2" src="<?php echo e(asset('icon/favicon.png')); ?>" width="20" height="20">
            <b>Codificador de Reemplazo</b>
        </h5>
    </div>
    <div class="card-body">
        <form action="<?php echo e(route('recursoshumanos.reemplazo.store')); ?>" method="POST" role="form" id="formPrueba">
            <?php echo csrf_field(); ?>
            <div class="form-group row">
                <label class="col-sm-3 offset-1 col-form-label"><b>Nombre :</b></label>
                <div class="col-sm-6">
                    <select width="100%" class="form-control" required id='NOMBRE_COMPLETO' name="NOMBRE_COMPLETO">
                        <option></option>
                        <?php $__currentLoopData = $nombrespersonas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nombrepersona): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($nombrepersona->NOMBRE.' '.$nombrepersona->APELLIDO.' |'.$nombrepersona->CARNET); ?>"><?php echo e($nombrepersona->NOMBRE.' '.$nombrepersona->APELLIDO.' | '.$nombrepersona->CARNET); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="FECHA_SOLICITUD" class='col-3 offset-1 col-form-label'><b>Fecha Solicitud :</b></label>
                <div class="col-6">
                    <input type="date" name="FECHA_SOLICITUD" id="FECHA_SOLICITUD" required maxlength="10"
                        placeholder='Fecha de Solicitud' class='form-control' value="<?php echo(Date('Y-m-d'))?>">
                </div>
            </div>            
            <div class="form-group row">
                <label for="SECCION"  class="col-sm-3 offset-1 col-form-label">Seccion :</label>
                <div class="col-sm-6">
                    <select width="100%" class="form-control" required id='SECCION' name="SECCION">
                        <option></option>
                        <?php $__currentLoopData = $secciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seccion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($seccion->ID); ?>"><?php echo e($seccion->DESCRIPCION); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>  
            </div>
            <div class="form-group row">
                <label for="FECHA_INICIO_SOLICITUD" class='col-3 offset-1 col-form-label'><b>Inicio Solicitud :</b></label>
                <div class="col-3">
                    <input type="date" name="FECHA_INICIO_SOLICITUD" id="FECHA_INICIO_SOLICITUD" required maxlength="10"
                        placeholder='Fecha de Solicitud' class='form-control' value="<?php echo(Date('Y-m-d'))?>" onclick="calcularDias()" onchange="calcularDias()">
                </div>
                <div class="col-3">
                    <input type="time" name="HORA_INICIO_SOLICITUD" id="HORA_INICIO_SOLICITUD" maxlength="8"
                    placeholder='Hora de Solicitud' class='form-control' value="<?php echo(Date('H:m:s'))?>" onclick="calcularHoras()" onchange="calcularHoras()">
                </div>
            </div>
            <div class="form-group row">
                <label for="FECHA_FIN_SOLICITUD" class='col-3 offset-1 col-form-label'><b>Fin Solicitud :</b></label>
                <div class="col-3">
                    <input type="date" name="FECHA_FIN_SOLICITUD" id="FECHA_FIN_SOLICITUD" required maxlength="10"
                        placeholder='Fecha Fin de Solicitud' class='form-control' value="<?php echo(Date('Y-m-d'))?>" onclick="calcularDias()" onchange="calcularDias()">
                </div>
                <div class="col-3">
                    <input type="time" name="HORA_FIN_SOLICITUD" id="HORA_FIN_SOLICITUD" maxlength="8"
                    placeholder='Hora Fin de Solicitud' class='form-control' value="<?php echo(Date('H:m:s'))?>" onclick="calcularHoras()" onchange="calcularHoras()">
                </div>
            </div>
            <div class="form-group row">
                <label for="TOTAL_DIAS" class='col-3 offset-1 col-form-label'><b>Total Dias/Horas:</b></label>
                <div class="col-3">
                    <input type="text" name="TOTAL_DIAS" id="TOTAL_DIAS" required maxlength="10"
                        placeholder='Total Dias' class='form-control' readonly>
                </div>
                <div class="col-3">
                    <input type="text" name="TOTAL_HORAS" id="TOTAL_HORAS" required maxlength="8"
                        placeholder='Total Horas' class='form-control' readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="OBSERVACION" class='col-3 offset-1 col-form-label'><b>Observaciones :</b></label>
                <div class="col-6">
                    <textarea type="text" name="OBSERVACION" id="OBSERVACION" required maxlength="255"
                        placeholder='Ingrese las Observaciones' class='form-control'></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12 text-center">
                    <button type="submit"
                        class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-2">
                        <b><i class="icon-checkmark mr-1"></i></b>
                        A&ntilde;adir Reemplazo
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(function() {
        $("#formReemplazo").validate();
    });
    $('#SECCION').select2({
        tags: true,
        placeholder: 'seleccione una Seccion',
        allowClear: true,
        dropdownParent: $("#modal_ajax"),
        width: 'resolve',
    }).on('change', function() {
        $(this).trigger('blur');
    });
    $("#NOMBRE_COMPLETO").select2({
            language: "es",
            tags: true,
            placeholder: "Haga Click y Busque la persona.",
            allowClear: true,
            dropdownParent: $("#modal_ajax"),
            width: 'resolve',
            ajax: {
                url: "<?php echo e(route('recursoshumanos.personal.like')); ?>",
                type: "post",
                delay: 250,
                dataType: 'json',
                data: function(params) {
                    return {
                        query: params.term,
                        "_token": "<?php echo e(csrf_token()); ?>",
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
</script>
<script>
    function  calcularDias(){
        // Obtenemos las fechas de inicio y fin desde los elementos input
        let fechaInicio = new Date($('#FECHA_INICIO_SOLICITUD').val());
        let fechaFin    = new Date($('#FECHA_FIN_SOLICITUD').val());
        // Calculamos la diferencia en milisegundos entre las dos fechas
        let diferenciaTiempo = fechaFin.getTime() - fechaInicio.getTime();
        // Convertimos la diferencia en días
        let dias = Math.round(diferenciaTiempo / (1000 * 60 * 60 * 24));
        // Mostramos el resultado en el elemento HTML correspondiente
        $('#TOTAL_DIAS').val(dias);
        document.getElementById('TOTAL_DIAS').innerHTML = dias;
    }
    function  calcularHoras(){
        // Definimos las horas, minutos y segundos iniciales y finales
        let horaInicio = $('#HORA_INICIO_SOLICITUD').val();
        let horaFin    = $('#HORA_FIN_SOLICITUD').val();
        // Separamos las horas, minutos y segundos en arrays
        let inicioArray = horaInicio.split(":");
        let finArray = horaFin.split(":");
        // Restamos los tiempos y guardamos el resultado en nuevas variables
        let horas    = finArray[0] - inicioArray[0];
        let minutos  = finArray[1] - inicioArray[1];
        let segundos = finArray[2] - inicioArray[2];
        // Concatenamos un cero delante de los valores menores a 10
        if (horas < 10) {
        horas = horas.toString().padStart(2, "0");
        }
        if (minutos < 10) {
        minutos = minutos.toString().padStart(2, "0");
        }
        if (segundos < 10) {
        segundos = segundos.toString().padStart(2, "0");
        }
        // Unimos los resultados en una cadena de tiempo
        let tiempoDiferencia = horas + ":" + minutos + ":" + segundos;
        console.log(tiempoDiferencia); // Mostramos el resultado
        //INSERTAMOS LOS VALORES CALCULADOS
        document.getElementById('TOTAL_HORAS').innerHTML = tiempoDiferencia; 
        $('#TOTAL_HORAS').val(tiempoDiferencia);
    }
</script>
<?php /**PATH D:\xampp\htdocs\faboce2023\Modules/RecursosHumanos\Resources/views/reemplazo/create.blade.php ENDPATH**/ ?>