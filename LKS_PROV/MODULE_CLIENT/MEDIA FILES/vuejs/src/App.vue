<template>
  <div id="app">
    <nav class="navbar navbar-expand justify-content-between navbar-dark bg-primary md-5 px-3">
      <router-link class="navbar-brand" to="/">BAMRI</router-link>

      <div class="collapse navbar-collapse" v-if="loggedIn">
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
        <div class="nav-item btn btn-danger mx-3" v-if="loggedIn">Logout</div>
        <router-link to="/auth/login" class="nav-item btn btn-primary" v-if="!loggedIn">Login</router-link>
      </div>
  </nav>
    <router-view/>
  </div>
</template>

<script>
export default {
    data(){
        return{
            loggedIn: false
        }
    },

    methods: {
        getLoggedIn(){
            this.loggedIn = localStorage.getItem("loggedIn");
        }
    },

    watch:{
        $route: {
            immediate: true,
            handler(){
                this.getLoggedIn()
            }
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
