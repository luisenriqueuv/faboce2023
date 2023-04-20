<!-- ----------------------------------------------
             COMPONENTE (VISTA INDEX PERSONAL)
---------------------------------------------- -->
<template>
  <div class="table-responsive">
    <table
      id="tabla_personal"
      class="table table-xs table-hover"
      style="width: 100%"
    >
      <thead>
        <tr class="bg-teal-800">
          <th>CARNET</th>
          <th>APELLIDO(S) Y NOMBRE(S)</th>
          <th>CARGO</th>
          <th>JERARQUIA</th>
          <th>AREA</th>
          <th>FABRICA</th>
          <th>CIUDAD</th>
          <th>F.INGRESO</th>
          <th>FORMULARIO</th>
          <th>FABRICA/AGENCIA</th>
          <th
            class="text-center"
            v-if="
              can(
                'recursoshumanos.personal.edit | recursoshumanos.personal.destroy | recursoshumanos.personal.restore'
              )
            "
          >
            OPCIONES
          </th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="personal in trabajadores"
          :key="personal.ID"
          :class="[personal.DELETED_ID > 0 ? 'table-danger' : '']"
        >
          <td>{{ personal.CARNET }} {{ personal.CICIUDAD }}</td>
          <td>{{ personal.APELLIDO }} {{ personal.NOMBRE }}</td>
          <td>{{ personal.cargo ? personal.cargo.DESCRIPCION : "" }}</td>
          <td>
            {{ personal.jerarquia ? personal.jerarquia.DESCRIPCION : "" }}
          </td>
          <td>
            {{ personal.area ? personal.area.CODIGO : "" }}
          </td>
          <td>
            {{
              personal.fabrica
                ? personal.fabrica.AGECODIGO + " " + personal.fabrica.AGENOMBRE
                : ""
            }}
          </td>
          <td>{{ personal.CIUDAD }}</td>
          <td>{{ personal.FECHAI | formatDate }}</td>
          <td>{{ personal.formulario ? personal.formulario.NOMBRE : "" }}</td>
          <td>
            {{
              personal.agencia
                ? personal.agencia.AGECODIGO + " " + personal.agencia.AGENOMBRE
                : ""
            }}
          </td>
          <td
            class="text-center"
            v-if="
              can(
                'recursoshumanos.personal.edit | recursoshumanos.personal.destroy | recursoshumanos.personal.restore'
              )
            "
          >
            <div v-if="personal.DELETED_ID == 0">
              <a
                v-if="can('recursoshumanos.personal.edit')"
                href="javascript:;"
                @click="editarPersonal(personal.CARNET)"
                class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-1"
              >
                <i class="icon-pencil4"></i>
              </a>
              <a
                v-if="can('recursoshumanos.personal.destroy')"
                href="javascript:;"
                @click="eliminarPersonal(personal.CARNET)"
                class="btn btn-outline bg-danger-400 text-danger-800 btn-icon rounded-round ml-1"
              >
                <i class="icon-trash"></i>
              </a>
            </div>
            <div v-else>
              <a
                v-if="can('recursoshumanos.personal.restore')"
                href="javascript:;"
                @click="restaurarPersonal(personal.CARNET)"
                class="btn btn-outline bg-indigo-400 text-indigo-800 btn-icon rounded-round ml-1"
              >
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
    this.obtenerTrabajadores();
  },
  data() {
    return {
      trabajadores: [],
    };
  },
  methods: {
    tablaPersonal() {
      this.$nextTick(function () {
        $("#tabla_personal").DataTable({
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
              messageTop: "Listado de Personal",
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
              messageTop: "Listado de Personal",
              exportOptions: {
                columns: [0, 1, 2],
              },
            },
          ],
          ordering: false,
        });
      });
    },
    editarPersonal(id) {
      showAjaxModal("/recursoshumanos/personal/" + id + "/edit");
    },
    eliminarPersonal(id) {
      confirm_modal("/recursoshumanos/personal/" + id);
    },
    restaurarPersonal(id) {
      restore_modal("/recursoshumanos/personal/" + id);
    },
    obtenerTrabajadores() {
      axios.get("/recursoshumanos/personal/all").then((response) => {
        this.trabajadores = response.data;
        this.tablaPersonal();
      });
    },
  },
};
</script>

<style></style>
