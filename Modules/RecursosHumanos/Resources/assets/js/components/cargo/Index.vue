<template>
  <div class="table-responsive">
    <table
      id="tabla_cargos"
      class="table table-xs table-hover"
      style="width: 100%"
    >
      <thead>
        <tr class="bg-teal-800">
          <th class="text-center" width="10%">ID</th>
          <th width="80%">CARGO</th>
          <th
            class="text-center"
            v-if="
              can(
                'recursoshumanos.cargo.edit | recursoshumanos.cargo.destroy | recursoshumanos.cargo.restore'
              )
            "
          >
            OPCIONES
          </th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="cargo in cargos"
          :key="cargo.ID"
          :class="[cargo.DELETED_ID > 0 ? 'table-danger' : '']"
        >
          <td class="text-center">{{ cargo.ID }}</td>
          <td>{{ cargo.DESCRIPCION }}</td>
          <td
            class="text-center"
            v-if="
              can(
                'recursoshumanos.cargo.edit | recursoshumanos.cargo.destroy | recursoshumanos.cargo.restore'
              )
            "
          >
            <div v-if="cargo.deleted_id == 0">
              <a
                v-if="can('recursoshumanos.cargo.edit')"
                href="javascript:;"
                @click="editarCargo(cargo.ID)"
                class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-1"
              >
                <i class="icon-pencil4"></i>
              </a>
              <a
                v-if="can('recursoshumanos.cargo.destroy')"
                href="javascript:;"
                @click="eliminarCargo(cargo.ID)"
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
    this.obtenerCargos();
  },
  data() {
    return {
      cargos: [],
    };
  },
  methods: {
    tablaCargos() {
      this.$nextTick(function () {
        $("#tabla_cargos").DataTable({
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
              messageTop: "Listado de Cargos",
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
              messageTop: "Listado de Cargos",
              exportOptions: {
                columns: [0, 1],
              },
            },
          ],
          ordering: false,
        });
      });
    },
    editarCargo(id) {
      showAjaxModal("/recursoshumanos/cargo/" + id + "/edit");
    },
    eliminarCargo(id) {
      confirm_modal("/recursoshumanos/cargo/" + id);
    },
    obtenerCargos() {
      axios.get("/recursoshumanos/cargo/all").then((response) => {
        this.cargos = response.data;
        this.tablaCargos();
      });
    },
  },
};
</script>

<style></style>
