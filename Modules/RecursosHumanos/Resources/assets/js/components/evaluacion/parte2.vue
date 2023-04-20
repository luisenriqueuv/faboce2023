<!-- ----------------------------------------------------
    COMPONENTE (PARTE-2 EVALUACION1) 
----------------------------------------------------- -->
<template> 
  <div class="table-responsive">
    <table id="tabla_parte2" class="table table-xs table-hove col-12">
      <thead id="theadParte2" class="text-center bg-teal-800">
          <th width="40%">FORTALEZAS</th>
          <th width="40%">ASPECTOS A MEJORAR</th>                                    
          <th width="20%">OPCIONES</th>                                    
      </thead>
      <tbody>
          <tr id="trParte2">
              <td id="tdP2-1" width="45%">                                            
                  <label for="">1° EVAL.</label>
                  <textarea name="fortaleza1" id="fortaleza1" cols="30" rows="3" class="form-control" required readonly >{{evaluacion1.fortaleza1}}</textarea>
              </td>
              <td id="tdP2-2" width="45%">                       
                  <label for="">1° EVAL.</label>                     
                  <textarea name="recomendacion1" id="recomendacion1" cols="30" rows="3" class="form-control" required readonly >{{evaluacion1.recomendacion1}}</textarea>
              </td>
              <td id="tdP2-Opc" v-if="evaluacion.fechaPreguntaInicio <= date && date <= evaluacion.fechaPreguntaFin && rol == 1" width="10%">
                <a href="javascript:;" @click="editCalificacion(evaluacion1.id,21)" class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-1">
                  <i class="icon-pencil4"></i>
                </a>  
              </td>
          </tr>                                                                      
          <tr id="trParte2">
              <td id="tdP2-1" width="45%">                                            
                  <label for="">2° EVAL.</label>
                  <textarea name="fortaleza2" id="fortaleza2" cols="30" rows="3" class="form-control" readonly>{{evaluacion1.fortaleza2}}</textarea>
              </td>                                                                                    
              
              <td id="tdP2-2" width="45%">  
                  <label for="">2° EVAL.</label>                                          
                  <textarea name="recomendacion2" id="recomendacion2" cols="30" rows="3" class="form-control" readonly >{{evaluacion1.recomendacion2}}</textarea>
              </td>
              <td id="tdP2-Opc" v-if="evaluacion.fechaPreguntaInicio <= date && date <= evaluacion.fechaPreguntaFin && rol == 2" width="10%">
                <a href="javascript:;" @click="editCalificacion(evaluacion1.id,22)" class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-1">
                  <i class="icon-pencil4"></i>
                </a>  
              </td>            
          </tr>                                                                      
      </tbody>
    </table>
  </div>
</template>

<script>
  import moment from 'moment';  
  export default {
      props: ['evaluacion','evaluacion1','rol'],
      data() {
        return {
          date: moment().format('YYYY-MM-DD')
        };
      },
      
      methods: {       
          editCalificacion(id,segmento) {
          showAjaxModal("/recursoshumanos/evaluacion1/"+id+"/"+segmento+"/edit");
          }
      },
  };
</script>

<style>
        
    /* Medium devices (phones,tablets) */
    @media (max-width: 991.98px) { 
        #theadParte2{            
            display: none;
        }
        #trParte2{
          display: flex;
          flex-wrap: wrap;
        }
        
        #tdP2-1,#tdP2-2 {
            width: 100%;
        }
        #tdP2-Opc {
            width: 100%;
            text-align: right;
        }
        
    }   
    
</style>