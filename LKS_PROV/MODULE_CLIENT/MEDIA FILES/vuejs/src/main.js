import { createApp } from 'vue'
import App from './App.vue'
import './registerServiceWorker'
import router from './router'

// import bootstrap popper and jquery
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.min'
import 'popper.js/dist/popper.min'
import 'jquery/dist/jquery.min'

createApp(App).use(router).mount('#app')
