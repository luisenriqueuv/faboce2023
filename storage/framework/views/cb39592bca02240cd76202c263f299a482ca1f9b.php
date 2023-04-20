<div class="card border-secondary border-top-2 border-bottom-2">
    <div class="card-header bg-light header-elements-inline">
        <h5 class="card-title">
            <img class="mr-2" src="<?php echo e(asset('icon/favicon.png')); ?>" width="20" height="20">
            <b>Boleta de Vacaci&oacute;n</b>
        </h5>
    </div>
    <div class="card-body">
        <form action="<?php echo e(route('recursoshumanos.salidapersonal.vacacion.store1')); ?>" method="POST" role="form"
            id="formVacacion1">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="IDVACACION" value="<?php echo e($idVacacion); ?>">

            <div class="form-group row">
                <label class="col-sm-3 offset-1 col-form-label"><b>¿Horario de trabajo por turno?</b></label>
                <div class="offset-2 col-sm-4">
                    <input type="checkbox" onclick="calculoDias()" class="form-check-input-styled" id="TURNO"
                        name="TURNO" data-fouc>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-1 col-11">
                    <table style="width:100%">
                        <tr>
                            <th style="width:30%">Fecha y Hora Inicial</th>
                            <td style="width:10%"><input type="date" name="FECHAI" id="FECHAI" required
                                    value="<?php echo e(date('Y-m-d')); ?>" class='form-control text-right'></td>
                            <th style="width:15%" class="text-center">1/2 Dia</th>
                            <td style="width:5%"><input type="checkbox" class="form-check-input-styled" name="MEDIODIAI"
                                    id="MEDIODIAI" data-fouc></td>
                            <td id="fi1">
                                <input type="time" name="HORAI1" class='form-control text-right' list="inicial">
                            </td>
                            <td id="fi2">
                                <input type="time" name="HORAI2" class='form-control text-right' list="inicial">
                            </td>
                        </tr>
                        <tr>
                            <th style="width:30%">Fecha y Hora Final</th>
                            <td style="width:10%"><input type="date" name="FECHAF" id="FECHAF" required
                                    value="<?php echo e(date('Y-m-d')); ?>" class='form-control text-right'></td>
                            <th style="width:15%" class="text-center">1/2 Dia</th>
                            <td style="width:5%"><input type="checkbox" class="form-check-input-styled" name="MEDIODIAF"
                                    id="MEDIODIAF" data-fouc></td>
                            <td id="ff1">
                                <input type="time" name="HORAF1" class='form-control text-right' list="inicial">
                            </td>
                            <td id="ff2">
                                <input type="time" name="HORAF2" class='form-control text-right' list="inicial">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="form-group row">
                <label for="DIAS" class='col-3 offset-1 col-form-label'><b>Dias de Vacacion:</b></label>
                <div class="col-8 col-sm-4 col-md-3">
                    <input type="number" name="DIAS" id="DIAS" required readonly value="0"
                        class='form-control text-right'>
                </div>
            </div>
            <div class="form-group row">
                <label for="FECHARETORNO" class='col-3 offset-1 col-form-label'><b>Fecha Retorno:</b></label>
                <div class="col-8 col-sm-4 col-md-3">
                    <input type="date" name="FECHARETORNO" id="FECHARETORNO" required value="<?php echo e(date('Y-m-d')); ?>"
                        class='form-control text-right'>
                </div>
            </div>
            <div class="form-group row">
                <label for="OBSERVACION" class='col-3 offset-1 col-form-label'><b>Observaci&oacute;n:</b></label>
                <div class="col-12 col-sm-8 col-md-6">
                    <textarea class='form-control maxlength-custom' required maxlength="150" name="OBSERVACION" id="OBSERVACION" cols="30"
                        rows="5">Vacaci&oacute;n</textarea>
                </div>
            </div>
            <datalist id="inicial">
                <?php for($h = 0; $h < 24; $h++): ?>
                    <option value="<?php echo e(($h < 10 ? '0' . $h : $h) . ':00'); ?>">
                <?php endfor; ?>
            </datalist>
            <div class="form-group row">
                <div class="col-12 text-center">
                    <button type="submit"
                        class="btn btn-lg btn-outline bg-teal text-teal-800 btn-icon rounded-round ml-2">
                        <b><i class="icon-checkmark mr-1"></i></b>
                        A&ntilde;adir
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(function() {
        $('.form-check-input-styled').uniform();
        $('.maxlength-custom').maxlength({
            threshold: 30,
            warningClass: 'badge badge-primary form-text',
            limitReachedClass: 'badge badge-danger form-text',
            placement: $('html').attr('dir') == 'rtl' ? 'bottom-left-inside' : 'bottom-right-inside'
        });
        $("#formVacacion1").validate();
        $('#fi1').hide();
        $('#fi2').hide();
        $('#ff1').hide();
        $('#ff2').hide();

        $('#MEDIODIAI').on('click', function() {
            if ($('#MEDIODIAI:checked').val() == 'on') {
                $('#fi1').show();
                $('#fi2').show();
            } else {
                $('#fi1').hide();
                $('#fi2').hide();
            }
            calculoDias();
        });
        $('#MEDIODIAF').on('click', function() {
            if ($('#MEDIODIAF:checked').val() == 'on') {
                $('#ff1').show();
                $('#ff2').show();
            } else {
                $('#ff1').hide();
                $('#ff2').hide();
            }
            calculoDias();
        });

        $('#FECHAF').on('change', function() {
            calculoDias();
        });

        calculoDias();
    });

    function calculoDias() {

        let date_1 = new Date($('#FECHAI').val());
        let date_2 = new Date($('#FECHAF').val());
        let result = 0;
        if (date_1 <= date_2) {
            let currentDate = date_1;
            while (currentDate <= date_2) {
                let weekDay = currentDate.getDay();
                switch (weekDay) {
                    case 0: // LUNES
                    case 1: // MARTES
                    case 2: // MIERCOLES
                    case 3: // JUEVES
                    case 4: // VIERNES
                        result = result + 1;
                        break;
                    case 5: // SABADO
                        result = result + ($('#TURNO:checked').val() == 'on' ? 1 : 0.5);
                        break;
                    case 6: // DOMINGO
                        break;
                    default: // CUALQUIER VALOR FUERA DEL RANGO
                        break;
                }
                currentDate.setDate(currentDate.getDate() + 1);
            }
            if ($('#MEDIODIAI:checked').val() == 'on') {
                result = result - 0.5;
            }
            if ($('#MEDIODIAF:checked').val() == 'on') {
                result = result - 0.5;
            }
        } else {
            new Noty({
                text: "La fecha final es menor a la fecha inicial.",
                type: 'error'
            }).show();
        }
        $('#DIAS').val(result);

    }
</script>
<?php /**PATH D:\xampp\htdocs\faboce2023\Modules/RecursosHumanos\Resources/views/salidapersonal/vacacion/create1.blade.php ENDPATH**/ ?>