<div>
    <div id="modal_ajax" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-teal-400">
                    <h5 class="modal-title">
                        <img src="{{ url('/') }}/images/faboce.png" width="50%" alt="Faboce S.R.L.">
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="height:650px; overflow:auto;"></div>
                <div class="modal-footer">
                    <button class="btn btn-outline bg-danger-400 text-danger-800 btn-icon rounded-round ml-2"
                        data-dismiss="modal">
                        <b><i class="icon-cross2"></i></b>Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_delete">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top:100px;">
                <div class="modal-header bg-teal-400">
                    <h5 class="modal-title">
                        <img src="{{ url('/') }}/images/faboce.png" width="50%" alt="Faboce S.R.L.">
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h5 class="modal-title" style="text-align:center;">Esta seguro que desea eliminar la informacion
                        ?</h5>
                </div>
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <form action="" id="form_delete" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" id="delete_link"
                            class="btn btn-outline bg-danger-400 text-danger-800 btn-icon rounded-round ml-2">
                            <i class="icon-trash"></i> Borrar
                        </button>
                    </form>
                    <a href="javascript:;" data-dismiss="modal" id="delete_cancel_link"
                        class="btn btn-outline bg-teal text-info-800 btn-icon rounded-round ml-2">
                        <i class="icon-cancel-circle2"></i> Cancelar
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_restore">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top:100px;">
                <div class="modal-header bg-teal-400">
                    <h5 class="modal-title">
                        <img src="{{ url('/') }}/images/faboce.png" width="50%" alt="Faboce S.R.L.">
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h5 class="modal-title" style="text-align:center;">¿Est&aacute; seguro que desea restaurar la
                        informaci&oacute;n?</h5>
                </div>
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <form action="" id="form_restore" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" id="restore_link"
                            class="btn btn-outline bg-indigo-400 text-indigo-800 btn-icon rounded-round ml-2">
                            <i class="icon-loop3"></i> Retaurar
                        </button>
                    </form>
                    <a href="javascript:;" data-dismiss="modal" id="restore_cancel_link"
                        class="btn btn-outline bg-danger text-danger-800 btn-icon rounded-round ml-2">
                        <i class="icon-cancel-circle2"></i> Cancelar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
