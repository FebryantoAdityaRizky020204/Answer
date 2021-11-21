<template>
  <nav class="navbar navbar-expand justify-content-between navbar-dark bg-primary md-5 px-3" @click="checkTokenTest()">
    {{checkToken()}}
      <router-link class="navbar-brand" to="/">BAMRI</router-link>

      <div class="collapse navbar-collapse" v-if="isLoggedIn">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                  <router-link to="/bus" class="nav-link">Bus</router-link>
              </li>
              <li class="nav-item">
                  <router-link to="/driver" class="nav-link">Driver</router-link>
              </li>
              <li class="nav-item">
                  <router-link to="/order" class="nav-link">Order</router-link>
              </li>
          </ul>
      </div>

      <div class="d-flex right">
        <button type="button" @click.prevent="logout" class="nav-item btn btn-danger mx-3" v-if="isLoggedIn">Logout</button>
        <router-link to="/auth/login" class="nav-item btn btn-primary" v-if="!isLoggedIn">Login</router-link>
      </div>
  </nav>
  <router-view :check-token="checkToken" :is-logged-in="isLoggedIn" />
</template>

<script>
import axios from 'axios'
import {useRouter} from 'vue-router'
import { onMounted } from '@vue/runtime-core'
export default {
  data(){
    return{
      isLoggedIn: false,
      token: null
    }
  },
  methods:{
    checkToken(){
      this.isLoggedIn = false
      if(localStorage.getItem('token')){
        this.token = localStorage.getItem('token')
        this.isLoggedIn = true
      }
    }
  },
  setup(){
    const router = useRouter()
    const myToken = localStorage.getItem('token')

    function logout(){
      axios.defaults.headers.common.Authorization = `Bearer ${myToken}`
      console.log(myToken)
      axios.post(`http://127.0.0.1:8000/api/v1/logout`)
        .then(res => {
          localStorage.removeItem('token')
          localStorage.removeItem('userId')

          console.log(res.data)
          
          router.push({
            name: 'Home'
          })
        }).catch(err => {
          console.log(err)
        })
    }

    onMounted(() => {
      if(!myToken){
        return router.push({
          name: 'login'
        })
      }
    })

    function checkTokenTest(){
      if(!myToken){
        return router.push({
          name: 'login'
        })
      }
    }

    return {
      logout,
      checkTokenTest
    }
  }
}
</script>


<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

#nav {
  padding: 30px;
}

#nav a {
  font-weight: bold;
  color: #2c3e50;
}

#nav a.router-link-exact-active {
  color: #42b983;
}
</style>
