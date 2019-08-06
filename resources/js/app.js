require('./bootstrap');

window.Vue = require('vue');

Vue.component('donaciones-component', require('./components/DonacionesComponent.vue').default);
Vue.component('registro-donador-component', require('./components/RegistroDonadorComponent.vue').default);

const app = new Vue({
    el: '#app',
});
