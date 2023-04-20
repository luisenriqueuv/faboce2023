<!-- ----------------------------------------------------
    COMPONENTE (PARTE-3 EVALUACION1) 
----------------------------------------------------- -->
<template> 
  <div class="table-responsive">
    <table id="tabla_parte3" class="table table-xs table-hove">
      <thead id="theadParte3" class="text-center bg-teal-800">
          <th width="50%">OBJETIVOS</th>
          <th width="10%">META</th>
          <th width="10%">EVAL-INICIAL</th>
          <th width="10%">SEGUIMIENTO</th>                                    
          <th width="10%">EVAL-FINAL</th>
          <th width="10%">OPCIONES</th>
      </thead>
      <tbody>
            
          <!-- FECHAS DE OBJETIVOS Y METAS -->
          <tr id="trParte3" class="text-center">
            <td id="tdv" width="50%"></td>
            <td id="tdv" width="10%"></td>                                    
            <td id="tdP3-fecha" class="p-0" width="10%">   
                <label class="form-Control p-0 mt-2">{{evaluacion.fechaSeguimiento1Fin | formatDateShort}}</label>
            </td>
            <td id="tdP3-fecha" class="p-0" width="10%">
                <label class="form-Control p-0 mt-2">{{evaluacion.fechaSeguimiento2Fin | formatDateShort}}</label>
            </td>
            <td id="tdP3-fecha" class="p-0" width="10%">            
                <label class="form-Control p-0 mt-2">{{evaluacion.fechaSeguimiento3Fin | formatDateShort}}</label>
            </td>               
            <td width="10%" v-if="evaluacion.fechaSeguimientoInicio <= date && date <= evaluacion.fechaSeguimientoFin && rol == 1">
                <!-- <a href="javascript:;" @click="editCalificacion(evaluacion1.id,31)" class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-1">
                <i class="icon-pencil4"></i>
                </a> -->
            </td>

          </tr>

          <!-- PRIMER OBJETIVO -->
          <tr id="trParte3" class="text-center">                                        
              <td id="tdP3-Objetivo" width="50%" class="p-0 py-1 align-top">                                                                                        
                  <textarea name="objetivo1" id="objetivo1" cols="30" rows="2" class="form-control" required readonly>{{evaluacion1.objetivo1}}</textarea>
              </td>
              <td id="tdP3-Meta" class="p-0 align-top" width="10%">  
                  <label id="lbP3-Meta" for="" class="form-control p-0 m-1 tdAlto">{{evaluacion1.meta1 ? evaluacion1.meta1+' '+evaluacion1.unidadMedida:''}}</label>
              </td>                                    
              <td id="tdP3-Eval" class="p-0 align-top tex-right" width="10%">
                  <label for="" class="form-control p-0 m-1 tdAlto">{{evaluacion1.evaluacion1_1 ? evaluacion1.evaluacion1_1+' '+evaluacion1.unidadMedida:''}}</label>
              </td>
              <td id="tdP3-Eval" class="p-0 align-top" width="10%">
                  <label for="" class="form-control p-0 m-1 tdAlto">{{evaluacion1.evaluacion1_2 ? evaluacion1.evaluacion1_2+' '+evaluacion1.unidadMedida:''}}</label>
              </td>
              <td id="tdP3-Eval" class="p-0 align-top" width="10%">            
                  <label for="" class="form-control p-0 m-1 tdAlto">{{evaluacion1.evaluacion1_3 ? evaluacion1.evaluacion1_3+' '+evaluacion1.unidadMedida:''}}</label>
              </td> 
              
              <td id="tdP3-Opc" width="10%" v-if="
                  ((evaluacion.fechaSeguimiento1Inicio <= date && date <= evaluacion.fechaSeguimiento1Fin) ||
                  (evaluacion.fechaSeguimiento2Inicio <= date && date <= evaluacion.fechaSeguimiento2Fin) ||
                  (evaluacion.fechaSeguimiento3Inicio <= date && date <= evaluacion.fechaSeguimiento3Fin) )
                   && rol == 1">
              
                  <a href="javascript:;" @click="editCalificacion(evaluacion1.id,32)" class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-1">
                       <i class="icon-pencil4"></i>
                   </a>
              </td>
              
          </tr>  
          
          <!-- SEGUNDO OBJETIVO -->                                                                    
          <tr id="trParte3" class="text-center">                                        
              <td id="tdP3-Objetivo" width="50%" class="p-0 py-1 align-top">                                                                                        
                  <textarea name="objetivo2" id="objetivo2" cols="30" rows="2" class="form-control" readonly>{{evaluacion1.objetivo2}}</textarea>
              </td>
              <td id="tdP3-Meta" class="p-0 align-top" width="10%">                                                                   
                  <label id="lbP3-Meta" for="" class="form-control p-0 m-1 tdAlto">{{evaluacion1.meta2 ? evaluacion1.meta2+' '+evaluacion1.unidadMedida : ''}}</label>    
              </td>                                    
              <td id="tdP3-Eval" class="p-0 align-top" width="10%">
                  <label for="" class="form-control p-0 m-1 tdAlto">{{evaluacion1.evaluacion2_1 ? evaluacion1.evaluacion2_1+' '+evaluacion1.unidadMedida:''}}</label>
              </td>
              <td id="tdP3-Eval" class="p-0 align-top" width="10%">
                  <label for="" class="form-control p-0 m-1 tdAlto">{{evaluacion1.evaluacion2_2 ? evaluacion1.evaluacion2_2+' '+evaluacion1.unidadMedida:''}}</label>
              </td>
              <td id="tdP3-Eval" class="p-0 align-top" width="10%">
                  <label for="" class="form-control p-0 m-1 tdAlto">{{evaluacion1.evaluacion2_3 ? evaluacion1.evaluacion2_3+' '+evaluacion1.unidadMedida:''}}</label>
              </td>
             
              <td id="tdP3-Opc" width="10%" v-if="
                    ((evaluacion.fechaSeguimiento1Inicio <= date && date <= evaluacion.fechaSeguimiento1Fin) ||
                    (evaluacion.fechaSeguimiento2Inicio <= date && date <= evaluacion.fechaSeguimiento2Fin) ||
                    (evaluacion.fechaSeguimiento3Inicio <= date && date <= evaluacion.fechaSeguimiento3Fin) )
                    && rol == 1">
                    <a href="javascript:;" @click="editCalificacion(evaluacion1.id,33)" class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-1">
                        <i class="icon-pencil4"></i>
                    </a>
              </td>
              
          </tr> 
          
          <!-- TERCER OBJETIVO -->
          <tr id="trParte3" class="text-center">                                        
              <td id="tdP3-Objetivo" width="50%" class="p-0 py-1 align-top">                                                                                        
                  <textarea name="objetivo3" id="objetivo3" cols="30" rows="2" class="form-control" readonly>{{evaluacion1.objetivo3}}</textarea>
              </td>
              <td id="tdP3-Meta" class="p-0 align-top" width="10%">                                                                   
                  <label id="lbP3-Meta" for="" class="form-control p-0 m-1 tdAlto">{{evaluacion1.meta3 ? evaluacion1.meta3+' '+evaluacion1.unidadMedida:'' }}</label>    
              </td>                                    
              <td id="tdP3-Eval" class="p-0 align-top" width="10%">
                  <label for="" class="form-control p-0 m-1 tdAlto">{{evaluacion1.evaluacion3_1 ? evaluacion1.evaluacion3_1+' '+evaluacion1.unidadMedida : ''}}</label>
              </td>
              <td id="tdP3-Eval" class="p-0 align-top" width="10%">
                  <label for="" class="form-control p-0 m-1 tdAlto">{{evaluacion1.evaluacion3_2 ? evaluacion1.evaluacion3_2+' '+evaluacion1.unidadMedida : ''}}</label>
              </td>
              <td id="tdP3-Eval" class="p-0 align-top" width="10%">
                  <label for="" class="form-control p-0 m-1 tdAlto">{{evaluacion1.evaluacion3_3 ? evaluacion1.evaluacion3_3+' '+evaluacion1.unidadMedida : ''}}</label>
              </td>
              <td id="tdP3-Opc" width="10%" v-if="
                ((evaluacion.fechaSeguimiento1Inicio <= date && date <= evaluacion.fechaSeguimiento1Fin) ||
                 (evaluacion.fechaSeguimiento2Inicio <= date && date <= evaluacion.fechaSeguimiento2Fin) ||
                 (evaluacion.fechaSeguimiento3Inicio <= date && date <= evaluacion.fechaSeguimiento3Fin) )
                 && rol == 1">
                <a href="javascript:;" @click="editCalificacion(evaluacion1.id,34)" class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-1">
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
          },
          fechaFormat(value) {
            if (value) {
                return moment(String(value)).format('DD/MM/YYYY')
            }
          }
      },
  };
</script>

<style>
    .tdAlto{
        height: 4em;
    }
        
    /* Medium devices (phones,tablets) */
    @media (max-width: 991.98px) { 
        #theadParte3, #tdv{
            display: none;
        }

        #trParte3{
            
            display: flex;
            flex-wrap: wrap;                       
        }        
        
        #tdP3-fecha, #tdP3-Eval {
            width: 33%;
            font-size: .8em;
            text-align: center;
        }
        
        #tdP3-Eval,#tdP3-Meta,#tdP3-Objetivo {
            padding: 2px;
        }
        #lbP3-Meta {
            /* height: 6em; */
            text-align: center;
        }

        #tdP3-Objetivo {
            width: 60%;
        }
        #tdP3-Meta {
            width: 40%;
        }
        #tdP3-Opc{
            width: 100%;
            text-align: right;
        }
        
        
    }   
    
</style>