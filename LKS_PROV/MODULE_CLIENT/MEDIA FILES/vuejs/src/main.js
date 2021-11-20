import Vue from 'vue'
import App from './App.vue'
import router from './router'

import axios from 'axios'
Vue.config.productionTip = false

import 'popper.js/dist/popper.min'
import 'jquery/dist/jquery.min'
import 'bootstrap/dist/js/bootstrap.min'
import 'bootstrap/dist/css/bootstrap.css'

new Vue({
  axios,
  router,
  render: h => h(App)
}).$mount('#app')
