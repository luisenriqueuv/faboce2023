<template>
    <div class="table-responsive">
      <table
        id="tabla_cambioturno"
        class="table table-xs table-hover"
        style="width: 100%"
      >
        <thead>
          <tr class="bg-teal-800">
            <th class="text-center" width="10%">ID</th>
            <th width="10%">CARNET</th>
            <th width="20%">NOMBRE COMPLETO</th>
            <th width="10%">FECHA SOLICITUD</th>
            <th width="10%">SECCION</th>
            <th width="20%">NOMBRE REEMPLAZO</th>
            <th class="text-center">OPCIONES</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="cambioturno in cambioturnos"
            :key="cambioturno.ID"
            :class="[cambioturno.DELETED_ID > 0 ? 'table-danger' : '']"
          >
            <td class="text-center">{{ cambioturno.ID }}</td>
            <td>{{ cambioturno.CARNET }}</td>
            <td>{{ cambioturno.NOMBRE_COMPLETO }}</td>
            <td>{{ cambioturno.FECHA_SOLICITUD }}</td>
            <td>{{ cambioturno.SECCION }}</td>
            <td>{{ cambioturno.NOMBRE_REEMPLAZO }}</td>
            <td class="text-center">
              <div v-if="cambioturno.DELETED_ID == 0">
                <a
                  href="javascript:;"
                  @click="editarCambioturno(cambioturno.ID)"
                  class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-1"
                >
                  <i class="icon-pencil4"></i>
                </a>
                <a
                  href="javascript:;"
                  @click="eliminarCambioturno(cambioturno.ID)"
                  class="btn btn-outline bg-danger-400 text-danger-800 btn-icon rounded-round ml-1"
                >
                  <i class="icon-trash"></i>
                </a>
                <a
                :href="
                  '/recursoshumanos/cambioturno/' + cambioturno.ID + '/pdf'
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
      this.obtenerCambioturnos();
    },
    data() {
      return {
        cambioturnos: [],
      };
    },
    methods: {
      tablaCambioturnos() {
        this.$nextTick(function () {
          $("#tabla_cambioturno").DataTable({
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
                messageTop: "Listado de Cambioturnos",
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
                messageTop: "Listado de Cambioturnos",
                exportOptions: {
                  columns: [0, 1],
                },
              },
            ],
            ordering: false,
          });
        });
      },
      editarCambioturno(id) {
        showAjaxModal("/recursoshumanos/cambioturno/" + id + "/edit");
      },
      eliminarCambioturno(id) {
        confirm_modal("/recursoshumanos/cambioturno/" + id);
      },
      obtenerCambioturnos() {
        axios.get("/recursoshumanos/cambioturno/all").then((response) => {
          this.cambioturnos = response.data;
          this.tablaCambioturnos();
        });
      },
    },
  };
  </script>
  <style></style>  