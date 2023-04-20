<!-- ----------------------------------------------------
        COMPONENTE (VISTA INDEX EVALUACION) 
----------------------------------------------------- -->
<template>
  <div class="table-responsive">
    <table id="tabla_evaluacion" class="table table-xs table-hover" style="width: 100%">
      
      <thead>
        <tr class="bg-teal-800">
          <th class="text-center">ID</th>
          <th>FORMULARIO</th>
          <th>EVALUADO</th>
          <th>1° EVALUADOR</th>
          <th>2° EVALUADOR</th>
          <th>FECHA PRINCIPAL</th>
          <th>FECHA COMPETENCIAS</th>          
          <th>FECHA EVAL-INICIAL</th>
          <th>FECHA SEGUIMIENTO</th>
          <th>FECHA EVAL-FINAL</th>
          <th
            v-if="can('recursoshumanos.evaluacion.edit | recursoshumanos.evaluacion.destroy | recursoshumanos.evaluacion.restore')"
            class="text-center">
            OPCIONES
          </th>
        </tr>
      </thead>
      
      <tbody>        
        <tr v-for="evaluacion in evaluaciones" :key="evaluacion.id" :class="[evaluacion.deleted_id > 0 ? 'table-danger' : '', evaluacion.estado > 0 ? 'table-success' : '']">
          
          <td class="text-center">{{ evaluacion.id }}</td>
          <td class="text-center">{{ evaluacion.formulario.codigo }}</td>
          
          <!-- EVALUADO -->
          <td v-if="evaluacion.evaluado">
            <b>CI: </b>{{ evaluacion.evaluado.carnet? evaluacion.evaluado.carnet:'' }}<br>
            <b>NOMBRE: </b>{{ evaluacion.evaluado.nombre }}&nbsp;{{ evaluacion.evaluado.apellido }}
          </td>
          <td v-else></td>
          
          <!-- EVALUADOR 1 -->
          <td v-if="evaluacion.evaluador1">
            <b>CI: </b>{{ evaluacion.evaluador1.carnet }}<br>
            <b>NOMBRE: </b>{{ evaluacion.evaluador1.nombre }}&nbsp;{{ evaluacion.evaluador1.apellido }}
          </td>
          <td v-else></td>

          <!-- EVALUADOR 2 -->
          <td v-if="evaluacion.evaluador2">
            <b>CI: </b>{{ evaluacion.evaluador2.carnet?evaluacion.evaluador2.carnet:'' }}<br>
            <b>NOMBRE: </b>{{ evaluacion.evaluador2.nombre?evaluacion.evaluador2.nombre:'' }}&nbsp;{{ evaluacion.evaluador2.apellido?evaluacion.evaluador2.apellido:''}}
          </td>
          <td v-else></td>
          
          <!-- FECHA PRINCIPAL -->
          <td>
              <b>Inicio: </b> {{ evaluacion.fechaAsignacionInicio|formatDate}}<br>
              <b>Fin: &nbsp;&nbsp;&nbsp;&nbsp;</b>{{ evaluacion.fechaAsignacionFin|formatDate }}
          </td>
          
          <!-- FECHA COMPETENCIA (PREGUNTAS)-->
          <td>
              <b>Inicio: </b> {{ evaluacion.fechaPreguntaInicio|formatDate }}<br>
              <b>Fin: &nbsp;&nbsp;&nbsp;&nbsp;</b>{{ evaluacion.fechaPreguntaFin|formatDate }}
          </td>
          
          <!-- FECHA EVALUACION INICIAL -->
          <td>
              <b>Inicio: </b> {{ evaluacion.fechaSeguimiento1Inicio|formatDate }}<br>
              <b>Fin: &nbsp;&nbsp;&nbsp;&nbsp;</b>{{ evaluacion.fechaSeguimiento1Fin|formatDate }}
          </td>

          <!-- FECHA EVALUACION SEGUIMIENTO -->
          <td>
              <b>Inicio: </b> {{ evaluacion.fechaSeguimiento2Inicio|formatDate }}<br>
              <b>Fin: &nbsp;&nbsp;&nbsp;&nbsp;</b>{{ evaluacion.fechaSeguimiento2Fin|formatDate }}
          </td>

          <!-- FECHA EVALUACION FINAL -->
          <td>
              <b>Inicio: </b> {{ evaluacion.fechaSeguimiento3Inicio|formatDate }}<br>
              <b>Fin: &nbsp;&nbsp;&nbsp;&nbsp;</b>{{ evaluacion.fechaSeguimiento3Fin|formatDate }}
          </td>
          <td
            v-if="can('recursoshumanos.evaluacion.edit | recursoshumanos.evaluacion.destroy | recursoshumanos.evaluacion.restore')"
            class="text-center">
            
            <div v-if="evaluacion.deleted_id == 0">
              
                            
              <!-- >>> edit(id) -->
              <a v-if="can('recursoshumanos.evaluacion.edit')" href="javascript:;" @click="editarEvaluacion(evaluacion.id)" class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-1">
                <i class="icon-pencil4"></i>
              </a>
              
              <!-- >>> reporte2() -->
              <a :href="'reporteevaluacion/reporte2/'+evaluacion.id" target="_blank" class="btn btn-outline bg-grey-400 text-grey-800 btn-icon rounded-round ml-1">
                <i class="icon-printer2"></i>
              </a>
              
              <!-- >>> destroy(id) -->
              <a v-if="can('recursoshumanos.evaluacion.destroy') && evaluacion.estado == 0" href="javascript:;" @click="eliminarEvaluacion(evaluacion.id)"               class="btn btn-outline bg-danger-400 text-danger-800 btn-icon rounded-round ml-1">
                <i class="icon-trash"></i>
              </a>
            </div>            

            <div v-else>
              <!-- >>> restore(id) -->
              <a v-if="can('recursoshumanos.evaluacion.restore')" href="javascript:;" @click="restaurarEvaluacion(evaluacion.id)" class=" btn btn-outline bg-indigo-400 text-indigo-800 btn-icon rounded-round ml-1">
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
    this.obtenerEvaluaciones();
  },
  data() {
    return {
      evaluaciones: [],
    };
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
                columns: [0,1,2,3,4,5,6,7,8,9],
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
                columns: [0,1,2,3,4,5,6,7,8,9],
              },
            },
          ],
          ordering: false,
        });
      });
    },

    editarEvaluacion(id) {
      showAjaxModal("/recursoshumanos/evaluacion/" + id + "/edit");
    },    
    eliminarEvaluacion(id) {
      confirm_modal("/recursoshumanos/evaluacion/" + id);
    },
    restaurarEvaluacion(id) {
      restore_modal("/recursoshumanos/evaluacion/" + id);
    },
    obtenerEvaluaciones() {
      axios.get("/recursoshumanos/evaluacion/all").then((response) => {        
        this.evaluaciones = response.data;
        this.tablaEvaluacion();
      });
    },
  },
};
</script>

<style>

</style>