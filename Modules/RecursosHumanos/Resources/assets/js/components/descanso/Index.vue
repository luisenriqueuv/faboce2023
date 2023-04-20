<template>
    <div class="table-responsive">
      <table
        id="tabla_descanso"
        class="table table-xs table-hover"
        style="width: 100%"
      >
        <thead>
          <tr class="bg-teal-800">
            <th class="text-center" width="15%">ID</th>
            <th width="10%">CARNET</th>
            <th width="25%">NOMBRE</th>
            <th width="10%">FECHA SOLICITUD</th>
            <th width="20%">OBSERVACION</th>
            <th width="10%">FECHA INICIO</th>
            <th width="10%">FECHA FIN</th>
            <th class="text-center">OPCIONES</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="descanso in descansos"
            :key="descanso.ID"
            :class="[descanso.DELETED_ID > 0 ? 'table-danger' : '']"
          >
            <td class="text-center">{{ descanso.ID }}</td>
            <td>{{ descanso.CARNET }}</td>
            <td>{{ descanso.NOMBRE_COMPLETO }}</td>
            <td>{{ descanso.FECHA_SOLICITUD }}</td>
            <td>{{ descanso.OBSERVACION }}</td>
            <td>{{ descanso.FECHA_INICIO_SOLICITUD }}</td>
            <td>{{ descanso.FECHA_FIN_SOLICITUD }}</td>
            <td class="text-center">
              <div v-if="descanso.DELETED_ID == 0">
                <a
                  href="javascript:;"
                  @click="editarDescanso(descanso.ID)"
                  class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-1"
                >
                  <i class="icon-pencil4"></i>
                </a>
                <a
                  href="javascript:;"
                  @click="eliminarDescanso(descanso.ID)"
                  class="btn btn-outline bg-danger-400 text-danger-800 btn-icon rounded-round ml-1"
                >
                  <i class="icon-trash"></i>
                </a>
                <a
                  :href="
                    '/recursoshumanos/descanso/' + descanso.ID + '/pdf'
                  "
                  class="btn btn-outline bg-danger-400 text-danger-800 btn-icon rounded-round ml-1"
                  target="_blank"
                >
                <i class="icon-file-pdf"></i>
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
      this.obtenerDescansos();
    },
    data() {
      return {
        descansos: [],
      };
    },
    methods: {
      tablaDescansos() {
        this.$nextTick(function () {
          $("#tabla_descanso").DataTable({
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
                messageTop: "Listado de Descansos",
                exportOptions: {
                  columns: [0, 1],
                },
              },
              {
                extend: "excelHtml5",
                className:
                  "btn btn-primary btn-outline btn-icon rounded-round ml-1",
                text: '<div class="text-teal-800"><i class="far fa-file-excel m-1"></i></div>',
                titleAttr: "Excel",
                autoFilter: true,
                messageTop: "Listado de Descansos",
                exportOptions: {
                  columns: [0, 1],
                },
              },
            ],
            ordering: false,
          });
        });
      },
      editarDescanso(id) {
        showAjaxModal("/recursoshumanos/descanso/" + id + "/edit");
      },
      eliminarDescanso(id) {
        confirm_modal("/recursoshumanos/descanso/" + id);
      },
      obtenerDescansos() {
        axios.get("/recursoshumanos/descanso/all").then((response) => {
          this.descansos = response.data;
          this.tablaDescansos();
        });
      },
    },
  };
  </script>
  <style></style>  