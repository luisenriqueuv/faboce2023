<template>
  <div class="table-responsive">
    <table
      id="tabla_prueba"
      class="table table-xs table-hover"
      style="width: 100%"
    >
      <thead>
        <tr class="bg-teal-800">
          <th class="text-center" width="10%">ID</th>
          <th width="70%">DETALLE</th>
          <th width="70%">FECHA CREACION</th>
          <th class="text-center">OPCIONES</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="prueba in pruebas"
          :key="prueba.ID"
          :class="[prueba.DELETED_ID > 0 ? 'table-danger' : '']"
        >
          <td class="text-center">{{ prueba.ID }}</td>
          <td>{{ prueba.DETALLE }}</td>
          <td>{{ prueba.CREATED_AT }}</td>
          <td class="text-center">
            <div v-if="prueba.DELETED_ID == 0">
              <a
                href="javascript:;"
                @click="editarPrueba(prueba.ID)"
                class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-1"
              >
                <i class="icon-pencil4"></i>
              </a>
              <a
                href="javascript:;"
                @click="eliminarPrueba(prueba.ID)"
                class="btn btn-outline bg-danger-400 text-danger-800 btn-icon rounded-round ml-1"
              >
                <i class="icon-trash"></i>
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
    this.obtenerPruebas();
  },
  data() {
    return {
      pruebas: [],
    };
  },
  methods: {
    tablaPruebas() {
      this.$nextTick(function () {
        $("#tabla_prueba").DataTable({
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
              messageTop: "Listado de Pruebas",
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
              messageTop: "Listado de Pruebas",
              exportOptions: {
                columns: [0, 1],
              },
            },
          ],
          ordering: false,
        });
      });
    },
    editarPrueba(id) {
      showAjaxModal("/recursoshumanos/prueba/" + id + "/edit");
    },
    eliminarPrueba(id) {
      confirm_modal("/recursoshumanos/prueba/" + id);
    },
    obtenerPruebas() {
      axios.get("/recursoshumanos/prueba/all").then((response) => {
        this.pruebas = response.data;
        this.tablaPruebas();
      });
    },
  },
};
</script>

<style></style>
