<template>
  <div class="table-responsive">
    <table
      id="tabla_compensacion"
      class="table table-xs table-hover"
      style="width: 100%"
    >
      <thead>
        <tr class="bg-teal-800">
          <th class="text-center" width="20%">ID</th>
          <th width="10%">CARNET</th>
          <th width="20%">NOMBRE</th>
          <th width="10%">FECHA SOLICITUD</th>
          <th width="10%">SECCION</th>
          <th width="30%">OBSERVACION</th>
          <th class="text-center">OPCIONES</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="compensacion in compensacions"
          :key="compensacion.ID"
          :class="[compensacion.DELETED_ID > 0 ? 'table-danger' : '']">
          <td class="text-center">{{ compensacion.ID}}</td>
          <td>{{ compensacion.CARNET}}</td>
          <td>{{ compensacion.NOMBRE_COMPLETO}}</td>
          <td>{{ compensacion.FECHA_SOLICITUD }}</td>
          <td>{{ compensacion.SECCION }}</td>
          <td>{{ compensacion.OBSERVACION }}</td>
          <td class="text-center">
            <div v-if="compensacion.DELETED_ID == 0">
              <a
                href="javascript:;"
                @click="editarcompensacion(compensacion.ID)"
                class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-1"
              >
                <i class="icon-pencil4"></i>
              </a>
              <a
                href="javascript:;"
                @click="eliminarcompensacion(compensacion.ID)"
                class="btn btn-outline bg-danger-400 text-danger-800 btn-icon rounded-round ml-1"
              >
                <i class="icon-trash"></i>
              </a>
              <a
                :href="
                  '/recursoshumanos/compensacion/' + compensacion.ID + '/pdf'
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
    this.obtenercompensacions();
  },
  data() {
    return {
      compensacions: [],
    };
  },
  methods: {
    tablacompensacions() {
      this.$nextTick(function () {
        $("#tabla_compensacion").DataTable({
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
              messageTop: "Listado de compensaciones",
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
              messageTop: "Listado de compensaciones",
              exportOptions: {
                columns: [0,1,2,3,4,5,6],
              },
            },
          ],
          ordering: false,
        });
      });
    },
    editarcompensacion(id) {
      showAjaxModal("/recursoshumanos/compensacion/" + id + "/edit");
    },
    eliminarcompensacion(id) {
      confirm_modal("/recursoshumanos/compensacion/" + id);
    },
    pdfcompensacion(id) {
      confirm_modal("/recursoshumanos/compensacion/" + id+ "/pdf");
//      showAjaxModal("/recursoshumanos/compensacion/" + id + "/edit");
    },
    obtenercompensacions() {
      axios.get("/recursoshumanos/compensacion/all").then((response) => {
        this.compensacions = response.data;
        this.tablacompensacions();
      });
    },
    //BUSCAR UNO A UNO O DENTRO DEL CICLO
    buscarPorCarnet() {
        axios.get('/recursoshumanos/personal/buscarcarnet', {
            params: {
                carnet: this.carnet
            }
        }).then(response => {
            this.personalNombre = response.data;
            return response.data;
        });
    }

  },
};
</script>
<style></style>