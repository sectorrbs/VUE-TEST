window.Vue = require('vue').default;
window.axios = require('axios');
import { createApp,h } from 'vue'
import App from './App.vue'
import router from './router';
import store from './store/index';
import components from './views/UI'

const app  = createApp({
    render: ()=>h(App)
});

app.component('app', require('./App.vue').default)

components.forEach(component => {
    app.component(component.name, component)
})

app.use(router).use(store).mount('#app')

