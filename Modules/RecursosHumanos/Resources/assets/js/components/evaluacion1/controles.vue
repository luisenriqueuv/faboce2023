<!-- ----------------------------------------------------
    COMPONENTE (DASHBOARD EVALUADOR) 
----------------------------------------------------- -->
<template>
  <table>
    <tr>
      <td>
        <i class="fas fa-user-plus text-primary me-3 fa-2x"></i>
      </td>
      <td class="pr-lg-3">
        <h5 id="h5Controles">
          <b>{{ evalAsignadas }}</b>
        </h5>
        <p id="pControles">Asignadas.</p>
      </td>
      <td>
        <i class="fas fa-user-edit text-warning me-3 fa-2x"></i>
      </td>
      <td class="pr-lg-3">
        <h5 id="h5Controles">
          <b>{{ evalProgreso }}</b>
        </h5>
        <p id="pControles">En_Proceso.</p>
      </td>
      <td>
        <i class="fas fa-user-check text-success me-3 fa-2x"></i>
      </td>
      <td class="pr-lg-3">
        <h5 id="h5Controles">
          <b>{{ evalTerminadas }}</b>
        </h5>
        <p id="pControles">Terminadas.</p>
      </td>
    </tr>
  </table>
</template>
 
<script>
export default {
  props: ["evaluaciones"],
  mounted() {
    this.calcular();
  },
  data() {
    return {
      evalAsignadas: 0,
      evalTerminadas: 0,
      evalProgreso: 0,
    };
  },
  methods: {
    calcular() {
      var c0 = 0;
      var c1 = 0;
      var c2 = 0;

      this.evaluaciones.forEach((evaluacion) => {
        if (evaluacion.estado == 0) {
          c0++;
        }
        if (evaluacion.estado == 1) {
          c1++;
        }
        if (evaluacion.estado == 2) {
          c2++;
        }
      });
      this.evalAsignadas = c0 + c1 + c2;
      this.evalTerminadas = c1;
      this.evalProgreso = c2;
    },
  },
};
</script>

<style>
#h5Controles {
  margin-bottom: 0;
}

/* Medium devices (phones,tablets) */
@media (max-width: 991.98px) {
  #pControles {
    font-size: 0.8em;
  }
}
</style>