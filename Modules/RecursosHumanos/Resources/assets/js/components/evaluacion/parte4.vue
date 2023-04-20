<!-- ----------------------------------------------------
    COMPONENTE (PARTE-4 EVALUACION1) 
----------------------------------------------------- -->
<template> 
  <div class="table-responsive">
    <table id="tabla_parte4" class="table table-xs table-hove">
        <thead id="theadParte4" class="text-center bg-teal-800">
            <th width="80%">NOMBRE DEL CURSO</th>
            <th width="10%">FECHA ESTIMADA</th>
            <th width="10%">OPCIONES</th>
        </thead>
        <tbody>
            <tr id="trParte4">
                <td id="tdP4" width="70%">   
                    <label for="" class="form-control">1) {{evaluacion1.capacitacion.split('|')[0]}}</label>  
                </td>
                <td id="tdP4" width="20%">   
                    <label for="" class="form-control text-center">{{evaluacion1.fechaCapacitacion.split('|')[0]|formatDate}}</label>  
                </td>                                
                
                <td id="tdP4-Opc" width="10%" v-if="                    
                    ((evaluacion.fechaSeguimiento1Inicio <= date && date <= evaluacion.fechaSeguimiento1Fin) ||
                    (evaluacion.fechaSeguimiento2Inicio <= date && date <= evaluacion.fechaSeguimiento2Fin) ||
                    (evaluacion.fechaSeguimiento3Inicio <= date && date <= evaluacion.fechaSeguimiento3Fin) )
                    && rol == 1">
                    <a href="javascript:;" @click="editCalificacion(evaluacion1.id,41)" class="btn btn-outline bg-teal-400 text-teal-800 btn-icon rounded-round ml-1">
                        <i class="icon-pencil4"></i>
                    </a>  
                </td>
                
            </tr>
            <tr id="trParte4">
                <td id="tdP4" width="70%">   
                    <label for="" class="form-control">2) {{evaluacion1.capacitacion.split('|')[1]}}</label>  
                </td>
                <td id="tdP4" width="20%">   
                    <label for="" class="form-control text-center">{{evaluacion1.fechaCapacitacion.split('|')[1]|formatDate}}</label>  
                </td>
                <td id="tdP4v" width="10%">
                </td>
            </tr> 
            <tr id="trParte4">
                <td id="tdP4" width="70%">   
                    <label for="" class="form-control">3) {{evaluacion1.capacitacion.split('|')[2]}}</label>  
                </td>
                <td id="tdP4" width="20%" >   
                    <label for="" class="form-control text-center">{{evaluacion1.fechaCapacitacion.split('|')[2]|formatDate}}</label>  
                </td>
                <td id="tdP4v" width="10%">
                </td>
            </tr> 
            <tr id="trParte4">
                <td id="tdP4" width="70%">   
                    <label for="" class="form-control">4) {{evaluacion1.capacitacion.split('|')[3]}}</label>  
                </td>
                <td id="tdP4" width="20%">   
                    <label for="" class="form-control text-center">{{evaluacion1.fechaCapacitacion.split('|')[3]|formatDate}}</label>  
                </td>
                <td id="tdP4v" width="10%">
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
                }else{
                    return value;
                }
            }
        },
    };
</script>


<style>
        
    /* Medium devices (phones,tablets) */
    @media (max-width: 991.98px) { 
        #theadParte4,#tdP4v{
            display: none;
        }

        #trParte4{            
            display: flex;
            flex-direction: column-reverse;
            flex-wrap: wrap;                     
        }        
        
        #tdP4{
            width: 100%;
        }
        #tdP4-Opc{
            width: 100%;
            text-align: right;
        }
    }   
    
</style>