<template>
  <div class="table-responsive">
    <table
      id="tabla_jerarquias"
      class="table table-xs table-hover"
      style="width: 100%"
    >
      <thead>
        <tr class="bg-teal-800">
          <th class="text-center" width="10%">ID</th>
          <th width="80%">JERARQUIA</th>
          <th
            class="text-center"
            v-if="
              can(
                'recursoshumanos.jerarquia.edit | recursoshumanos.jerarquia.destroy | recursoshumanos.jerarquia.restore'
              )
            "
          >
            OPCIONES
          </th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="jerarquia in jerarquias"
          :key="jerarquia.id"
          :class="[jerarquia.deleted_id > 0 ? 'table-danger' : '']"
        >
          <td class="text-center">{{ jerarquia.id }}</td>
          <td>{{ jerarquia.descripcion }}</td>
          <td
            class="text-center"
            v-if="
              can(
                'recursoshumanos.jerarquia.edit | recursoshumanos.jerarquia.destroy | recursoshumanos.jerarquia.restore'
              )
            "
          >
            <div v-if="jerarquia.deleted_id == 0">
              <a
                v-if="can('recursoshumanos.jerarquia.edit')"
                href="javascript:;"
                @click="editarJerarquia(jerarquia.id)"
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
                v-if="can('recursoshumanos.jerarquia.destroy')"
                href="javascript:;"
                @click="eliminarJerarquia(jerarquia.id)"
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
                v-if="can('recursoshumanos.jerarquia.restore')"
                href="javascript:;"
                @click="restaurarJerarquia(jerarquia.id)"
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
    this.obtenerJerarquias();
  },
  data() {
    return {
      jerarquias: [],
    };
  },
  methods: {
    tablaJerarquias() {
      this.$nextTick(function () {
        $("#tabla_jerarquias").DataTable({
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
              messageTop: "Listado de Jerarquias",
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
              messageTop: "Listado de Jerarquias",
              exportOptions: {
                columns: [0, 1],
              },
            },
          ],
          ordering: false,
        });
      });
    },
    editarJerarquia(id) {
      showAjaxModal("/recursoshumanos/jerarquia/" + id + "/edit");
    },
    eliminarJerarquia(id) {
      confirm_modal("/recursoshumanos/jerarquia/" + id);
    },
    restaurarJerarquia(id) {
      restore_modal("/recursoshumanos/jerarquia/" + id);
    },
    obtenerJerarquias() {
      axios.get("/recursoshumanos/jerarquia/all").then((response) => {
        this.jerarquias = response.data;
        this.tablaJerarquias();
      });
    },
  },
};
</script>

<style>
</style>