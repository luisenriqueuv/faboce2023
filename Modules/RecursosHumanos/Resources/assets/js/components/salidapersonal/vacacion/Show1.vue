<template>
  <div class="table-responsive">
    <table class="table table-striped table-xs" id="table_vacacion_detalle">
      <thead class="font-weight-semibold font-size-base text-teal-800">
        <tr class="text-center">
          <th colspan="4" class="table-primary">INICIAL</th>
          <th colspan="4" class="table-warning">FINAL</th>
          <th rowspan="2" class="table-secondary">DIAS</th>
          <th rowspan="2" class="table-secondary">FECHA RETORNO</th>
          <th rowspan="2" class="table-secondary">OBSERVACI&Oacute;N</th>
          <th rowspan="2" class="table-secondary">OPCIONES</th>
        </tr>
        <tr class="text-center">
          <th class="table-primary">FECHA</th>
          <th class="table-primary">MEDIO DIA</th>
          <th class="table-primary">HORA INICIAL</th>
          <th class="table-primary">HORA FINAL</th>
          <th class="table-warning">FECHA</th>
          <th class="table-warning">MEDIO DIA</th>
          <th class="table-warning">HORA INICIAL</th>
          <th class="table-warning">HORA FINAL</th>
        </tr>
      </thead>
      <tbody class="font-weight-semibold font-size-base">
        <tr v-for="item in vacacion1" :key="item.ORDEN">
          <td class="text-center">{{ item.FECHAI | formatDate }}</td>
          <td class="text-center">
            <i class="icon-checkmark2" v-if="item.MEDIODIAI == 'on'"></i>
          </td>
          <td class="text-center">{{ item.HORAI1 }}</td>
          <td class="text-center">{{ item.HORAI2 }}</td>
          <td class="text-center">{{ item.FECHAF | formatDate }}</td>
          <td class="text-center">
            <i class="icon-checkmark2" v-if="item.MEDIODIAF == 'on'"></i>
          </td>
          <td class="text-center">{{ item.HORAF1 }}</td>
          <td class="text-center">{{ item.HORAF2 }}</td>
          <td class="text-right">{{ item.DIAS | formatNumber }}</td>
          <td class="text-center">{{ item.FECHARETORNO | formatDate }}</td>
          <td>{{ item.OBSERVACION }}</td>
          <td class="text-center">
            <a
              href="javascript:;"
              @click="eliminarFecha(item.ID, item.IDVACACION)"
              class="btn btn-outline bg-danger-400 text-danger-800 btn-icon rounded-round ml-1"
            >
              <i class="icon-trash"></i>
            </a>
          </td>
        </tr>
      </tbody>
      <tfoot class="font-weight-semibold font-size-base">
        <tr>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th class="text-right">TOTALES:</th>
          <th class="text-right"></th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </tfoot>
    </table>
  </div>
</template>

<script>
export default {
  props: ["vacacion1"],
  mounted() {
    this.tablaVacacionDetalle();
  },
  methods: {
    tablaVacacionDetalle() {
      this.$nextTick(function () {
        $("#table_vacacion_detalle").DataTable({
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
          paging: false,
          ordering: false,
          info: false,
          footerCallback: function (row, data, start, end, display) {
            var api = this.api(),
              data;
            // Remove the formatting to get integer data for summation
            var intVal = function (i) {
              return typeof i === "string"
                ? i.replace(/[\$,]/g, "") * 1
                : typeof i === "number"
                ? i
                : 0;
            };
            // Totales ENTREGADO
            let totala = api
              .column(8)
              .data()
              .reduce(function (a, b) {
                return intVal(a) + intVal(b);
              }, 0);

            // Update footer
            $(api.column(8).footer()).html(number_format(totala, 2));
          },
        });
      });
    },
    eliminarFecha(id, idvacacion) {
      confirm_modal(
        "/recursoshumanos/salidapersonal/vacacion/destroy1/" +
          id +
          "/" +
          idvacacion
      );
    },
  },
};
function number_format(amount, decimals) {
  amount += ""; // por si pasan un numero en vez de un string
  amount = parseFloat(amount.replace(/[^0-9\.]/g, "")); // elimino cualquier cosa que no sea numero o punto

  decimals = decimals || 0; // por si la variable no fue fue pasada

  // si no es un numero o es igual a cero retorno el mismo cero
  if (isNaN(amount) || amount === 0) return parseFloat(0).toFixed(decimals);

  // si es mayor o menor que cero retorno el valor formateado como numero
  amount = "" + amount.toFixed(decimals);

  var amount_parts = amount.split("."),
    regexp = /(\d+)(\d{3})/;

  while (regexp.test(amount_parts[0]))
    amount_parts[0] = amount_parts[0].replace(regexp, "$1" + "," + "$2");

  return amount_parts.join(".");
}
</script>
