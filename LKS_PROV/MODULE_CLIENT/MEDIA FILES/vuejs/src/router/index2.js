import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'

// bus
import Bus from './../views/bus/Bus.vue'
import CreateBus from './../views/bus/CreateBus.vue'
// driver
import Driver from './../views/driver/Driver.vue'
import CreateDriver from './../views/driver/CreateDriver.vue'
// order
import Order from './../views/order/Order.vue'
import CreateOrder from './../views/order/CreateOrder.vue'
// login
import Login from './../views/auth/Login.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/auth/login',
    name: 'login',
    component: Login
  },
  {
    path: '/bus',
    name: 'bus',
    component: Bus
  },
  {
    path: '/bus/create',
    name: 'bus.create',
    component: CreateBus
  },
  {
    path: '/order',
    name: 'order',
    component: Order
  },
  {
    path: '/order/create',
    name: 'order.create',
    component: CreateOrder
  },
  {
    path: '/driver',
    name: 'driver',
    component: Driver
  },
  {
    path: '/driver/create',
    name: 'driver.create',
    component: CreateDriver
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
