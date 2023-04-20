<!-- ----------------------------------------------------
    COMPONENTE (PARTE-1 SHOW EVALUACION) 
----------------------------------------------------- -->
<template class="tabla-movil">  
  <div class="table-responsive row">
    <table id="tabla_parte1" class="table table-xs table-hove col-12">
        <thead id="theadParte1" class="text-center bg-teal-800">            
            <th width="85%">COMPETENCIAS</th>
            <th width="5%" class="text-center">1° EVAL</th>
            <th width="5%" class="text-center">2° EVAL</th>
            <th width="5%">OPCIONES</th>
        </thead>
        <tbody>
            <tr class="bg-light">
              <td colspan="4"><h3 id="h3Parte1"><b>HABILIDADES PARA DAR RESPUESTA A LAS RELACIONES LABORALES</b></h3></td>
            </tr>            
            <tr id="trParte1" v-for="eva,i in evaluacion.evaluacion1" v-if="eva.id_formulario !=0 && i<=5" :key="eva.id">
                <td id="tdP1-1" width="85%" class="text-justify"><span v-html="eva.formulario1.nombre"></span></td>                
                <td id="tdP1-2" width="5%" class="text-center"><label class="form-control">{{eva.calificacion1}}</label></td>                
                <td id="tdP1-3" width="5%" class="text-center"><label class="form-control">{{eva.calificacion2}}</label></td>
                <td id="tdP1-4" width="5%" v-if="evaluacion.fechaPreguntaInicio <= date && date <= evaluacion.fechaPreguntaFin">
                    <a href="javascript:;" @click="editCalificacion(eva.id,11)" class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round">
                        <i class="icon-pencil4"></i>
                    </a>
                </td>
            </tr>
            <tr class="bg-light">
              <td colspan="4"><h3 id="h3Parte1"><b>COMPETENCIAS ESPECIFICAS DEL PUESTO</b></h3></td>
            </tr>            
            <tr id="trParte1" v-for="eva,i in evaluacion.evaluacion1" v-if="eva.id_formulario !=0 && i>5" :key="eva.id">
                <td id="tdP1-1" width="85%" class="text-justify"><span v-html="eva.formulario1.nombre"></span></td>
                <td id="tdP1-2" width="5%" class="text-center"><label class="form-control">{{eva.calificacion1}}</label></td>
                <td id="tdP1-3" width="5%" class="text-center"><label class="form-control">{{eva.calificacion2}}</label></td>
                <td id="tdP1-4" width="15%" v-if="evaluacion.fechaPreguntaInicio <= date && date <= evaluacion.fechaPreguntaFin">
                    <a href="javascript:;" @click="editCalificacion(eva.id,11)" class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-1">
                        <i class="icon-pencil4"></i>
                    </a>
                </td>
            </tr>
            <tr id="trParte1">
                <td id="tdP1-Total1" width="80%" align="right"><b>PROMEDIO FINAL</b></td> 
                <td id="tdP1-Total2" width="20%" align="center" colspan="2"><b>{{total}}</b></td>
            </tr>
        </tbody>
    </table>
    <table class="table font-italic">
      <tr id="trParte1" class="row">
        <td id="tdRango" class="bg-light col-lg-6 col-sm-12">
          <b>RANGO DE REFERENCIA:</b><br>
          1 – 1.9 No cumple con lo requerido en el puesto. <br>
          2 – 2.9 Cumple medianamente con lo requerido en el puesto.<br>
          3 – 3.5 Cumple con la mayoría de los requisitos del puesto.<br>
          3.6 – 4 Excede con los requisitos del puesto.<br>
        </td>
        <td class="text-center col-lg-6 col-sm-12">
          <h3 id="h3Parte1" v-if="0 < total && total < 2" class="text-danger">"NO CUMPLE CON LO REQUERIDO EN EL PUESTO"</h3>
          <h3 id="h3Parte1" v-else-if="2 <= total && total < 3">"CUMPLE MEDIANAMENTE CON LO REQUERIDO EN EL PUESTO"</h3>
          <h3 id="h3Parte1" v-else-if="3 <= total && total < 3.6">"CUMPLE CON LA MAYORÍA DE LOS REQUISITOS DEL PUESTO"</h3>
          <h3 id="h3Parte1" v-else-if="3.6 <= total && total <=4.00" class="text-teal-800">"EXCEDE CON LOS REQUISITOS DEL PUESTO"</h3>
          <h3 id="h3Parte1" v-else>AÚN NO CALIFICÓ...</h3>          
        </td>
      </tr>
    </table>    
  </div>
</template>

<script>
  import moment from 'moment';  
  export default {    
      props: ['evaluacion'],
      data() {
        return {
          date: moment().format('YYYY-MM-DD'),
          total:this.calcularTotal()
        };
      },

      methods: {       
          editCalificacion(id,segmento) {
            showAjaxModal("/recursoshumanos/evaluacion1/"+id+"/"+segmento+"/edit");
          }, 
          calcularTotal() {
            let s=0;
            this.evaluacion.evaluacion1.forEach(element => {
                s=s+element.calificacion1+element.calificacion2;
            });
            if(this.evaluacion.carnet_evaluador2>0){
                return Math.round((s/(20))*10)/10;
            }else{
                return Math.round((s/(10))*10)/10;
            }
            
        }         
      },
  };
</script>


<style>
        
    /* Medium devices (phones,tablets) */
    @media (max-width: 991.98px) { 
        
        /* TITULOS TABLA */
        #theadParte1{
            display: none;
        }        
        #h3Parte1{
            font-size: 1em;
        }        
        
        /* FILAS Y COLUMNAS */
        #trParte1{
            display: flex;
            flex-wrap: wrap;              
        }
        #tdP1-1 {
            width: 100%;
            font-size: .8em;
        }
        #tdP1-2, #tdP1-3 {
            width: 40%;
        }
        #tdP1-4 {
            width: 20%;         
        }        
        
        /* RESULTADO */
        #tdRango{
          font-size: .7em;
        }
        #tdP1-Total1{
            width: 70%;            
        }
        #tdP1-Total2{
            width: 30%;            
        }
    }   
    
</style>