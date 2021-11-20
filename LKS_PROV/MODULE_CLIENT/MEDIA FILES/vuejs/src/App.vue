<template>
  <div id="app">
    <nav class="navbar navbar-expand navbar-dark bg-primary md-5 px-3">
      <a class="navbar-brand" href="#">BAMRI</a>

      <div class="collapse navbar-collapse">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                  <a class="nav-link" href="bus.html">Bus</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="driver.html">Driver</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="order.html">Order</a>
              </li>
          </ul>
      </div>
  </nav>
    <router-view/>
  </div>
</template>

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
