import { createApp } from 'vue/dist/vue.esm-bundler.js';
import AppComponent from './components/App.vue';
const app=createApp({
    components: {
        AppComponent,
    }
});

app.mount('#app');