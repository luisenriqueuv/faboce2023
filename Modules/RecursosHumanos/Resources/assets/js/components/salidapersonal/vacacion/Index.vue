<template>
  <div>
    <div
      class="row h-100 align-items-center justify-content-center p-5"
      v-show="spinner"
    >
      <div
        style="color: #009688"
        class="col-auto la-square-jelly-box la-dark la-2x"
      >
        <div></div>
        <div></div>
      </div>
    </div>
    <div class="table-responsive" v-show="!spinner">
      <table
        id="tabla_registro"
        class="table display compact"
        style="width: 100%"
      >
        <thead>
          <tr class="bg-teal-800">
            <th width="10%" class="text-center">NUMERO</th>
            <th>FECHA</th>
            <th>PERSONAL</th>
            <th>ESTADO</th>
            <th>OBSERVACION</th>
            <th class="text-center">OPCIONES</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="(registro, index) in registros"
            :key="index"
            :class="[registro.ANULADA == 'A' ? 'bg-danger' : '']"
          >
            <td class="text-center">{{ registro.ID }}</td>
            <td>{{ registro.FECHA | formatDate }}</td>
            <td>
              {{ registro.CARNET }} -
              {{
                registro.personal
                  ? registro.personal.APELLIDO + " " + registro.personal.NOMBRE
                  : ""
              }}
            </td>
            <td>
              <i class="icon-file-empty me-3 text-warning"></i>
              <i class="icon-file-check me-3 text-teal"></i>
            </td>
            <td>{{ registro.OBSERVACION }}</td>
            <td class="text-center">
              <a
                :href="
                  '/recursoshumanos/salidapersonal/vacacion/' + registro.ID
                "
                class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-1"
                data-toggle="tooltip"
                data-placement="top"
                title="Editar Boleta"
              >
                <i class="icon-pencil4"></i>
              </a>
              <a
                v-if="registro.ANULADA != 'A'"
                :href="
                  '/recursoshumanos/salidapersonal/vacacion/' +
                  registro.ID +
                  '/pdf'
                "
                class="btn btn-outline bg-grey-400 text-grey-800 btn-icon rounded-round ml-1"
                target="_blank"
              >
                <i class="icon-printer2"></i>
              </a>
              <a
                v-if="registro.ANULADA != 'A'"
                href="javascript:;"
                @click="anularRegistro(registro.ID)"
                class="btn btn-outline bg-danger-400 text-danger-800 btn-icon rounded-round ml-1"
              >
                <i class="icon-trash"></i>
              </a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import moment from "moment";
export default {
  mounted() {
    this.obtenerRegistros();
  },
  data() {
    return {
      registros: [],
      spinner: true,
      hoy: moment(),
    };
  },
  methods: {
    tablaRegistros() {
      this.$nextTick(function () {
        $("#tabla_registro").DataTable({
          processing: true,
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
          ordering: false,
        });
      });
    },
    obtenerRegistros() {
      axios
        .get("/recursoshumanos/salidapersonal/vacacion/all")
        .then((response) => {
          this.registros = response.data;
          this.tablaRegistros();
          this.spinner = false;
        });
    },
    anularRegistro(id) {
      confirm_modal("/recursoshumanos/salidapersonal/vacacion/" + id);
    },
  },
};
</script>

<style></style>
