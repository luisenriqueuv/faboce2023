<!-- ----------------------------------------------
        COMPONENTE (VISTA INDEX FORMULARIO)
---------------------------------------------- -->
<template>
  <div class="table-responsive">
    <table id="tabla_formularios" class="table table-xs table-hover" style="width: 100%">
      <thead>
        <tr class="bg-teal-800">          
          <th width="10%">CODIGO</th>
          <th width="20%">FORMULARIO</th>
          <th width="50%">DESCRIPCION</th>
          <th v-if=" can('recursoshumanos.formulario.edit | recursoshumanos.formulario.destroy | recursoshumanos.formulario.restore')" class="text-center">
            OPCIONES
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="formulario in formularios" :key="formulario.id" :class="[formulario.deleted_id > 0 ? 'table-danger' : '']">
          <td>{{ formulario.codigo }}</td>          
          <td>{{ formulario.nombre }}</td>
          <td>{{ formulario.descripcion }}</td>
          <td v-if=" can('recursoshumanos.formulario.edit | recursoshumanos.formulario.destroy | recursoshumanos.formulario.restore')" class="text-center">
            
            <div v-if="formulario.deleted_id == 0">              
              
              <!-- >>> show(id) -->
              <a v-if="can('recursoshumanos.formulario1.create')" :href="'/recursoshumanos/formulario/'+formulario.id" class="btn btn-outline bg-warning-400 text-warning-800 btn-icon rounded-round ml-1">
                <b><i class="icon-folder-plus"></i></b>
              </a>
              
              <!-- >>> edit(id) -->
              <a v-if="can('recursoshumanos.formulario.edit')" href="javascript:;" 
                @click="editarFormulario(formulario.id)" class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-1">
                <i class="icon-pencil4"></i>
              </a>
              
              <!-- >>> destroy(id) -->
              <a v-if="can('recursoshumanos.formulario.destroy')" href="javascript:;" @click="eliminarFormulario(formulario.id)" class="btn btn-outline bg-danger-400 text-danger-800 btn-icon rounded-round ml-1">
                <i class="icon-trash"></i>
              </a>
            </div>
            
            <div v-else>
              <!-- >>> restaurar(id) -->
              <a v-if="can('recursoshumanos.formulario.restore')" href="javascript:;" @click="restaurarFormulario(formulario.id)" class="btn btn-outline bg-indigo-400 text-indigo-800 btn-icon rounded-round ml-1">
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
  mounted() {
    this.obtenerFormularios();
  },
  data() {
    return {
      formularios: [],
    };
  },
  methods: {
    tablaFormularios() {
      this.$nextTick(function () {
        $("#tabla_formularios").DataTable({
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
              messageTop: "Listado de Formularios",
              exportOptions: {
                columns: [0, 1, 2],
              },
            },
            {
              extend: "excelHtml5",
              className:
                "btn btn-primary btn-outline btn-icon rounded-round ml-1",
              text: '<div class="text-teal-800"><i class="far fa-file-excel m-1"></i></div>',
              titleAttr: "Excel",
              autoFilter: true,
              messageTop: "Listado de Formularios",
              exportOptions: {
                columns: [0, 1, 2],
              },
            },
          ],
          ordering: false,
        });
      });
    },
    showFormulario(id) {
      showAjaxModal("/recursoshumanos/formulario/" + id);
    },
    editarFormulario(id) {
      showAjaxModal("/recursoshumanos/formulario/" + id + "/edit");
    },
    eliminarFormulario(id) {
      confirm_modal("/recursoshumanos/formulario/" + id);
    },
    restaurarFormulario(id) {
      restore_modal("/recursoshumanos/formulario/" + id);
    },
    obtenerFormularios() {
      axios.get("/recursoshumanos/formulario/all").then((response) => {
        this.formularios = response.data;
        this.tablaFormularios();
      });
    },
  },
};
</script>

<style>
</style>