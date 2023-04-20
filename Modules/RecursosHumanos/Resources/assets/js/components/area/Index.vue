<template>
  <div class="table-responsive">
    <table
      id="tabla_areas"
      class="table table-xs table-hover"
      style="width: 100%"
    >
      <thead>
        <tr class="bg-teal-800">
          <th class="text-center" width="10%">ID</th>
          <th width="20%">CODIGO</th>
          <th width="60%">AREA</th>
          <th
            class="text-center"
            v-if="
              can(
                'recursoshumanos.area.edit | recursoshumanos.area.destroy | recursoshumanos.area.restore'
              )
            "
          >
            OPCIONES
          </th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="area in areas"
          :key="area.id"
          :class="[area.deleted_id > 0 ? 'table-danger' : '']"
        >
          <td class="text-center">{{ area.id }}</td>
          <td>{{ area.codigo }}</td>
          <td>{{ area.descripcion }}</td>
          <td
            class="text-center"
            v-if="
              can(
                'recursoshumanos.area.edit | recursoshumanos.area.destroy | recursoshumanos.area.restore'
              )
            "
          >
            <div v-if="area.deleted_id == 0">
              <a
                v-if="can('recursoshumanos.area.edit')"
                href="javascript:;"
                @click="editarArea(area.id)"
                class="
                  btn btn-outline
                  bg-teal-400
                  text-teal-800
                  btn-icon
                  rounded-round
                  ml-1
                "
              >
                <i class="icon-pencil4"></i>
              </a>
              <a
                v-if="can('recursoshumanos.area.destroy')"
                href="javascript:;"
                @click="eliminarArea(area.id)"
                class="
                  btn btn-outline
                  bg-danger-400
                  text-danger-800
                  btn-icon
                  rounded-round
                  ml-1
                "
              >
                <i class="icon-trash"></i>
              </a>
            </div>
            <div v-else>
              <a
                v-if="can('recursoshumanos.area.restore')"
                href="javascript:;"
                @click="restaurarArea(area.id)"
                class="
                  btn btn-outline
                  bg-indigo-400
                  text-indigo-800
                  btn-icon
                  rounded-round
                  ml-1
                "
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
    this.obtenerAreas();
  },
  data() {
    return {
      areas: [],
    };
  },
  methods: {
    tablaAreas() {
      this.$nextTick(function () {
        $("#tabla_areas").DataTable({
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
              messageTop: "Listado de Areas",
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
              messageTop: "Listado de Areas",
              exportOptions: {
                columns: [0, 1, 2],
              },
            },
          ],
          ordering: false,
        });
      });
    },
    editarArea(id) {
      showAjaxModal("/recursoshumanos/area/" + id + "/edit");
    },
    eliminarArea(id) {
      confirm_modal("/recursoshumanos/area/" + id);
    },
    restaurarArea(id) {
      restore_modal("/recursoshumanos/area/" + id);
    },
    obtenerAreas() {
      axios.get("/recursoshumanos/area/all").then((response) => {
        this.areas = response.data;
        this.tablaAreas();
      });
    },
  },
};
</script>

<style>
</style>