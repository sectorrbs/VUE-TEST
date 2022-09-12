window.Vue = require('vue').default;
window.axios = require('axios');
import {createApp} from 'vue';
import router from './router';
import store from './store/index';



console.log(123)
const app = createApp({});

app.component('admin', require('./Admin.vue').default)

app.use(router).use(store).mount('#admin')

