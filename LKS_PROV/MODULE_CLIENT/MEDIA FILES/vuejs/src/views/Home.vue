<template>
  <!-- <div class="container md-8 shadow py-5 mt-4">
    <h1 class="text-gray h1">Dashboard Page</h1>
  </div> -->
  <div class="card text-center mt-6 md-10">
    <div class="card-header">
      <div class="text-gray h1">Dashboard Page</div>
    </div>
    <div class="card-body">
      <h5 class="card-title h4">BAMRI</h5>
      <div class="d-flex justify-content-around md-10 py-4">
        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
        <router-link to="/bus" class="btn btn-primary">Bus</router-link>
        <router-link to="/driver" class="btn btn-primary">Driver</router-link>
        <router-link to="/order" class="btn btn-primary">Order</router-link>
      </div>
    </div>
    <div class="card-footer text-muted">
      bamri&copy;2021 - All Rights Reserved
    </div>
  </div>
</template>

<script>
export default {
}
</script>
