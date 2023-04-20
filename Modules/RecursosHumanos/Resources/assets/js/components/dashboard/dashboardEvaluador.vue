<!-- ----------------------------------------------------
    COMPONENTE (DASHBOARD EVALUADOR) 
----------------------------------------------------- -->
<template>
  <div class="row row-cols-1 row-cols-md-3 d-flex justify-content-around text-center">
    <div class="col-3 mb-4">
        <div class="card h-70">
            <img :src="'images/evaluacion/fabo-1.png'" alt="Faboce S.R.L." class="w-50 h-50 mx-auto pt-2">
        <div class="card-body">
            <h1 class="card-title">{{evaluaciones.length}}</h1>
            <p class="card-text">Evaluaciones Asignadas.</p>
        </div>
        </div>
    </div>
    <div class="col-3 mb-4">
        <div class="card h-70">
        <img :src="'images/evaluacion/fabo-2.png'" alt="Faboce S.R.L." class="w-50 h-50 mx-auto pt-2">
        <div class="card-body">
            <h1 class="card-title">{{evaluacionesProgreso}}</h1>
            <p class="card-text">Evaluaciones en Progreso.</p>
        </div>
        </div>
    </div>
    <div class="col-3 mb-4">
        <div class="card h-70">
        <img :src="'images/evaluacion/fabo-3.png'" alt="Faboce S.R.L." class="w-50 h-50 mx-auto pt-2">
        <div class="card-body">
            <h1 class="card-title">{{evaluaciones.length - evaluacionesProgreso}}</h1>
            <p class="card-text">Evaluaciones Terminadas.</p>
        </div>
        </div>
    </div>
</div>
  
  
</template>
 
<script>
export default {
  mounted() {
    this.obtenerEvaluaciones();
  },
  data() {
    return {
      evaluaciones: []
    };
  },
  computed: {    
    evaluacionesProgreso: function () {
            var c=0;
            var i=false;
            this.evaluaciones.forEach(evaluacion => {
                evaluacion.evaluacion1.forEach(evaluacion1 => {
                    if(evaluacion1.id_formulario != 0){
                        if(evaluacion1.calificacion1 === null){
                            i=true;
                        }
                    }
                });
                if(i){
                    c++;
                    i=false;
                }
            });
            return c;
    }
  },
  methods: {
    obtenerEvaluaciones() {
      axios.get("/recursoshumanos/evaluacion/all").then((response) => {
        console.log(response.data);
        this.evaluaciones = response.data;
      });
    },
 }
}
</script>

<style>
</style>