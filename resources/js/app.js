require('./bootstrap');

window.Vue = require('vue');

Vue.component('donaciones-component', require('./components/DonacionesComponent.vue').default);
Vue.component('mis-donaciones-component', require('./components/MisDonacionesComponent.vue').default);
Vue.component('registro-donador-component', require('./components/RegistroDonadorComponent.vue').default);

import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';

Vue.use(ElementUI);

const app = new Vue({
    el: '#app',
});
