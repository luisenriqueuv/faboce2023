<template>
  <div class="card-body">
    <div class="d-lg-flex flex-lg-wrap">
      <div class="d-flex flex-wrap wmin-lg-400">
        <ul class="list list-unstyled mb-0">
          <li class="font-weight-semibold font-size-base">Nombre:</li>
          <li class="font-weight-semibold font-size-base">Secci&oacute;n:</li>
          <li class="font-weight-semibold font-size-base">Almac&eacute;n:</li>
        </ul>
        <ul class="list list-unstyled text-right ml-auto">
          <li class="font-size-base">
            {{ vacacion.CARNET }} -
            {{
              vacacion.personal
                ? vacacion.personal.APELLIDO + " " + vacacion.personal.NOMBRE
                : ""
            }}
          </li>
          <li class="font-size-base">
            {{ vacacion.SECCION }}
            {{ vacacion.SECCION ? vacacion.SECCION : "" }}
          </li>
          <li class="font-size-base">
            {{ vacacion.AGECODIGO }}
            {{ vacacion.agencia ? vacacion.agencia.AGENOMBRE : "" }}
          </li>
        </ul>
      </div>
    </div>

    <div class="row justify-content-between mb-2">
      <div class="col">
        <a
          :href="
            '/recursoshumanos/salidapersonal/vacacion/' + vacacion.ID + '/pdf'
          "
          class="btn btn-outline border-warning bg-warning-400 text-warning-800 rounded-round btn-labeled btn-labeled-left"
          target="_blank"
        >
          <b><i class="icon-printer"></i></b> Imprimir
        </a>
      </div>
      <div class="col text-right">
        <button
          type="button"
          class="btn btn-outline border-indigo bg-indigo-400 text-indigo-800 rounded-round btn-labeled btn-labeled-left"
          @click="AgregarFecha(vacacion.ID)"
        >
          <b><i class="icon-envelop3"></i></b> Añadir Fechas
        </button>
      </div>
    </div>

    <recursoshumanos-salidapersonal-vacacion-show1
      :vacacion1="vacacion.vacacion1"
    />

    <div class="mt-5">
      <div class="d-lg-flex flex-lg-wrap">
        <div class="d-flex flex-wrap wmin-lg-400">
          <ul class="list list-unstyled mb-0 text-right">
            <li class="font-weight-semibold font-size-lg">Saldo de Dias:</li>
          </ul>
          <ul class="list list-unstyled text-left ml-auto">
            <li
              class="alert alert-success alert-dismissible fade show border-2 p-2"
            >
              <span class="ml-4 mr-4 font-weight-bold font-size-lg">
                {{ vacacion.kardex ? vacacion.kardex.SALDO : 0 }}
              </span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["vacacion"],
  methods: {
    AgregarFecha(id) {
      showAjaxModal("/recursoshumanos/salidapersonal/vacacion/create1/" + id);
    },
  },
};
</script>
