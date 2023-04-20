<template>
  <div class="table-responsive">
    <table
      id="tabla_reemplazo"
      class="table table-xs table-hover"
      style="width: 100%"
    >
      <thead>
        <tr class="bg-teal-800">
          <th class="text-center" width="10%">ID</th>
          <th width="10%">CARNET</th>
          <th width="25%">NOMBRE</th>
          <th width="10%">FECHA SOLICITUD</th>
          <th width="20%">SECCION</th>
          <th width="15%">FECHA/HORA INICIO SOLICITUD</th>
          <th width="15%">FECHA/HORA FIN SOLICITUD</th>
          <th class="text-center">OPCIONES</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="reemplazo in reemplazos"
          :key="reemplazo.ID"
          :class="[reemplazo.DELETED_ID > 0 ? 'table-danger' : '']"
        >
          <td class="text-center">{{ reemplazo.ID}}</td>
          <td>{{ reemplazo.CARNET }}</td>
          <td>{{ reemplazo.NOMBRE_COMPLETO }}</td>
          <td>{{ reemplazo.FECHA_SOLICITUD }}</td>
          <td>{{ reemplazo.SECCION }}</td>
          <td>{{ reemplazo.FECHA_INICIO_SOLICITUD+" "+reemplazo.HORA_INICIO_SOLICITUD }}</td>
          <td>{{ reemplazo.FECHA_FIN_SOLICITUD+" "+reemplazo.HORA_FIN_SOLICITUD }}</td>
          <td class="text-center">
            <div v-if="reemplazo.DELETED_ID == 0">
              <a
                href="javascript:;"
                @click="editarreemplazo(reemplazo.ID)"
                class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-1"
              >
                <i class="icon-pencil4"></i>
              </a>
              <a
                href="javascript:;"
                @click="eliminarreemplazo(reemplazo.ID)"
                class="btn btn-outline bg-danger-400 text-danger-800 btn-icon rounded-round ml-1"
              >
                <i class="icon-trash"></i>
              </a>
              <a
                :href="
                  '/recursoshumanos/reemplazo/' + reemplazo.ID + '/pdf'
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
    this.obtenerreemplazos();
  },
  data() {
    return {
      reemplazos: [],
    };
  },
  methods: {
    tablareemplazos() {
      this.$nextTick(function () {
        $("#tabla_reemplazo").DataTable({
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
              messageTop: "Listado de reemplazos",
              exportOptions: {
                columns: [0,1,2,3,4,5,6],
              },
            },
            {
              extend: "excelHtml5",
              className:
                "btn btn-primary btn-outline btn-icon rounded-round ml-1",
              text: '<div class="text-teal-800"><i class="far fa-file-excel m-1"></i></div>',
              titleAttr: "Excel",
              autoFilter: true,
              messageTop: "Listado de reemplazos",
              exportOptions: {
                columns: [0,1,2,3,4,5,6],
              },
            },
          ],
          ordering: false,
        });
      });
    },
    editarreemplazo(id) {
      showAjaxModal("/recursoshumanos/reemplazo/" + id + "/edit");
    },
    eliminarreemplazo(id) {
      confirm_modal("/recursoshumanos/reemplazo/" + id);
    },
    obtenerreemplazos() {
      axios.get("/recursoshumanos/reemplazo/all").then((response) => {
        this.reemplazos = response.data;
        this.tablareemplazos();
      });
    },
  },
};
</script>
<style></style>