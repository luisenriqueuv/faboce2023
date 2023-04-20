<!-- ----------------------------------------------------
    COMPONENTE (VISTA INDEX1 - EVALUACION1) 
----------------------------------------------------- -->
<template>
  <div class="table-responsive">
    <table
      id="tabla_evaluacion"
      class="table table-xs table-hover"
      style="width: 100%"
    >
      <thead>
        <tr class="bg-teal-800">
          <th id="thId" class="text-center">ID</th>
          <th id="thFormulario">FORMULARIO</th>
          <th id="thEvaluado">EVALUADO</th>
          <th id="thEvaluador1">1° EVALUADOR</th>
          <th id="thEvaluador2">2° EVALUADOR</th>
          <th id="thFecha">FECHA</th>
          <th
            id="thOpciones"
            v-if="
              can(
                'recursoshumanos.evaluacion1.edit | recursoshumanos.evaluacion1.destroy | recursoshumanos.evaluacion1.restore'
              )
            "
            class="text-center"
          >
            OPCIONES
          </th>
        </tr>
      </thead>
      <tbody>
        <!-- LISTA DE ASIGNACIONES POR EVALUADOR -->
        <tr
          id="trIndex"
          v-for="evaluacion in evaluaciones"
          :key="evaluacion.id"
          :class="[
            evaluacion.estado == 1
              ? 'table-success'
              : evaluacion.estado == 2
              ? 'table-danger'
              : '',
          ]"
        >
          <td id="tdId" class="text-center">{{ evaluacion.id }}</td>
          <td id="tdFormulario" class="text-center">
            {{ evaluacion.formulario.codigo }}
          </td>

          <td id="tdEvaluado" v-if="evaluacion.evaluado">
            {{ evaluacion.evaluado.nombre }}&nbsp;{{
              evaluacion.evaluado.apellido
            }}<br />
          </td>
          <td id="tdEvaluado_" v-else></td>

          <td id="tdEvaluador1" v-if="evaluacion.evaluador1">
            {{ evaluacion.evaluador1.nombre }}&nbsp;{{
              evaluacion.evaluador1.apellido
            }}
          </td>
          <td id="tdEvaluador1_" v-else></td>

          <td id="tdEvaluador2" v-if="evaluacion.evaluador2">
            {{ evaluacion.evaluador2.nombre }}&nbsp;{{
              evaluacion.evaluador2.apellido
            }}
          </td>
          <td id="tdEvaluador2_" v-else></td>
          <td id="tdFecha">
            <b>Inicio: </b> {{ evaluacion.fechaAsignacionInicio | formatDate
            }}<br />
            <b>Fin: &nbsp;&nbsp;&nbsp;&nbsp;</b
            >{{ evaluacion.fechaAsignacionFin | formatDate }}
          </td>

          <td id="tdOpciones" class="text-center">
            <!-- show(idEvaluacion) (LLAMADA A SHOW)-->
            <a
              v-if="can('recursoshumanos.evaluacion.show')"
              :href="'/recursoshumanos/evaluacion/' + evaluacion.id"
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

            <!-- reporte2(idEvaluacion) -->
            <a
              :href="
                '/recursoshumanos/reporteevaluacion/reporte2/' + evaluacion.id
              "
              target="_blank"
              class="
                btn btn-outline
                bg-grey-400
                text-grey-800
                btn-icon
                rounded-round
                ml-1
              "
            >
              <i class="icon-printer2"></i>
            </a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
 
<script>
export default {
  props: ["evaluaciones"],
  mounted() {
    this.tablaEvaluacion();
  },
  methods: {
    tablaEvaluacion() {
      this.$nextTick(function () {
        $("#tabla_evaluacion").DataTable({
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
              messageTop: "Listado de evaluaciones",
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5],
              },
            },
            {
              extend: "excelHtml5",
              className:
                "btn btn-primary btn-outline btn-icon rounded-round ml-1",
              text: '<div class="text-teal-800"><i class="far fa-file-excel m-1"></i></div>',
              titleAttr: "Excel",
              autoFilter: true,
              messageTop: "Listado de evaluaciones",
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5],
              },
            },
          ],
          ordering: false,
        });
      });
    },
  },
};
</script>

<style>
/* Medium devices (phones,tablets) */
@media (max-width: 991.98px) {
  #thId,
  #thFormulario,
  #thEvaluador1,
  #thEvaluador2,
  #thFecha,
  #tdId,
  #tdFormulario,
  #tdEvaluador1,
  #tdEvaluador2,
  #tdEvaluador1_,
  #tdEvaluador2_,
  #tdFecha {
    display: none;
  }

  #tdEvaluado,
  #tdEvaluado_ {
    width: 80%;
    font-size: 0.8em;
  }
  #tdOpciones {
    width: 20%;
  }
}
</style>