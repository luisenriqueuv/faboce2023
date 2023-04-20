<!-- ----------------------------------------------
          COMPONENTE (VISTA INDEX FORMULARIO 1)
---------------------------------------------- -->
<template>
  <div class="table-responsive">   
    <table id="tabla_formularios1" class="table table-xs table-hover" style="width: 100%">
      
      <thead>
        <tr class="bg-teal-800">
          <th width="80%">PREGUNTA</th>
          <th v-if="can('recursoshumanos.formulario1.edit | recursoshumanos.formulario1.destroy | recursoshumanos.formulario1.restore')" class="text-center" width="20%">
            OPCIONES
          </th>
        </tr>
      </thead>
      
      <tbody>
        <tr v-for="formulario1 in formularios1" :key="formulario1.id" :class="[formulario1.deleted_id > 0 ? 'table-danger' : '']">
          <td width="70%">                        
            <span v-html="formulario1.nombre"></span> 
          </td>          
          
          <td class="text-center" width="20%">
            <div v-if="formulario1.deleted_id == 0">              
              
              <!-- >>> edit(id) -->
              <a v-if="can('recursoshumanos.formulario1.edit')" href="javascript:;" @click="editarFormulario1(formulario1.id)" class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-1">
                <i class="icon-pencil4"></i>
              </a>

              <!-- >>> destroy(id,idFormulario) -->
              <a v-if="can('recursoshumanos.formulario1.destroy')" href="javascript:;" @click="eliminarFormulario1(formulario1.id,formulario1.id_formulario)" class="btn btn-outline bg-danger-400 text-danger-800 btn-icon rounded-round ml-1">
                <i class="icon-trash"></i>
              </a>
            </div>

            <div v-else>
              <!-- >>> restore(id,idFormulario) -->
              <a v-if="can('recursoshumanos.formulario1.restore')" href="javascript:;" @click="restaurarFormulario1(formulario1.id,formulario1.id_formulario)" class="btn btn-outline bg-indigo-400 text-indigo-800 btn-icon rounded-round ml-1 ">
                <i class="icon-loop3"></i>
              </a>
            </div>
          </td>
        </tr>
      </tbody>

    </table>
  </div>
</template>
 
<script>
export default {
  
  // recibo de Formularios1
  props:['formularios1'],
  mounted() {
    this.tablaformularios1();
  },
  methods: {
    tablaformularios1() {
      this.$nextTick(function () {
        $("#tabla_formularios1").DataTable({
          language: {
            sProcessing: "Procesando...",
            sLengthMenu: "Mostrar _MENU_ registros",
            sZeroRecords: "No se encontraron resultados",
            sEmptyTable: "Ningún dato disponible en esta tabla",
            sInfo:
              "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            sInfoEmpty:
              "Mostrando registros del 0 al 0 de un total de 0 registros",
            sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
            sInfoPostFix: "",
            sSearch: "Buscar:",
            sUrl: "",
            sInfoThousands: ",",
            sLoadingRecords: "Cargando...",
            oPaginate: {
              sFirst: "Primero",
              sLast: "Último",
              sNext: "Siguiente",
              sPrevious: "Anterior",
            },
            oAria: {
              sSortAscending:
                ": Activar para ordenar la columna de manera ascendente",
              sSortDescending:
                ": Activar para ordenar la columna de manera descendente",
            },
          },
          dom: "Bfrtip",
          buttons: [
            {
              extend: "copyHtml5",
              className: "btn btn-outline btn-icon rounded-round ml-1",
              text: '<div class="text-teal-800"><i class="icon-copy4 m-1"></i></div>',
              titleAttr: "Copy",
              messageTop: "Listado de Preguntas",
              exportOptions: {
                columns: [0],
              },
            },
            {
              extend: "excelHtml5",
              className:
                "btn btn-primary btn-outline btn-icon rounded-round ml-1",
              text: '<div class="text-teal-800"><i class="far fa-file-excel m-1"></i></div>',
              titleAttr: "Excel",
              autoFilter: true,
              messageTop: "Listado de Preguntas",
              exportOptions: {
                columns: [0],
              },
            },
          ],
          ordering: false,
          bAutoWidth: false, 
          columnDefs: [
            { width: "80%", targets: 0 },
            { width: "20%", targets: 1 }
          ]
        });
      });
    },
    editarFormulario1(id) {
      showAjaxModal("/recursoshumanos/formulario1/" + id + "/edit");
    },
    eliminarFormulario1(id,idFormulario) {
      confirm_modal("/recursoshumanos/formulario1/" + id+'/'+idFormulario);
    },
    restaurarFormulario1(id,idFormulario) {
      restore_modal("/recursoshumanos/formulario1/" + id+'/'+idFormulario);
    },
  },
};
</script>

<style>
</style>