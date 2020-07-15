
require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
Vue.use(VueRouter);


//vform
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);


//moment js
import moment from "moment";

import VueFilterDateFormat from '@vuejs-community/vue-filter-date-format';

Vue.use(VueFilterDateFormat);


import VueProgressBar from 'vue-progressbar'

Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '3px'
});

import swal from 'sweetalert2';
window.swal = swal;

const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
window.toast = toast;

window.Fire = new Vue();

//Rutas para los componentes de vue js
let routes = [
    { path: '/', component: require('./components/Dashboard').default },
    { path: '/dashboard', component: require('./components/Dashboard').default },
    { path: '/profile', component: require('./components/Profile').default },
    { path: '/users', component: require('./components/User').default },
    { path: '/enfermedades', component: require('./components/Enfermedades').default },
    { path: '/pacientes', component: require('./components/Pacientes').default}
];



Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const router = new VueRouter({
    mode :'history',
    routes 
});


Vue.filter('fecha_espaniol',function (created) {
   return moment(created).format('MMM Do YY');
});



const app = new Vue({
    el: '#app',
    router
});
