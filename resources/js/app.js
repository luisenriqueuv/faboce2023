/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('./app/main');

window.Vue = require('vue');

import moment from 'moment';

import LaravelPermissionToVueJS from 'laravel-permission-to-vuejs';
Vue.use(LaravelPermissionToVueJS);


var numeral = require("numeral");
Vue.filter("formatNumberReport", function (value) {
  if (value > 0) {
    return number_format(value, 2);
  } else {
    return "";
  }
});
Vue.filter("formatNumber", function (value) {
  return number_format(value, 2);
});
Vue.filter("formatNumberE", function (value) {
  return number_format(value, 5);
});
Vue.filter('formatDateShort', function (value) {
  if (value == null || value == '') {
    return value;
  } else {
    return moment(value).format('MMM-YYYY');
  }
});
Vue.filter('formatDate', function (value) {
  if (value == null || value == '') {
    return value;
  } else {
    return moment(value).format('DD-MM-YYYY');
  }
});

Vue.filter('formatDateSIN', function (value) {
  return moment(value).format('DD-MM-YYYY HH:mm:ss.SSS');
});

Vue.filter('formatDateF', function (value) {
  return moment(value).format('DD-MM-YYYY HH:mm:ss');
});


function number_format(amount, decimals) {

  amount += ''; // por si pasan un numero en vez de un string
  amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

  decimals = decimals || 0; // por si la variable no fue fue pasada

  // si no es un numero o es igual a cero retorno el mismo cero
  if (isNaN(amount) || amount === 0)
    return parseFloat(0).toFixed(decimals);

  // si es mayor o menor que cero retorno el valor formateado como numero
  amount = '' + amount.toFixed(decimals);

  var amount_parts = amount.split('.'),
    regexp = /(\d+)(\d{3})/;

  while (regexp.test(amount_parts[0]))
    amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

  return amount_parts.join('.');
}

// Error
Vue.component('error-403', require('./components/error/403').default);
/**
 * MODULES
 */
require('../../Modules/modules');


