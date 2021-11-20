<template>
  <div class="container md-5">
    <div class="card mt-4">
        <div class="card-header h4">
            Login
        </div>
        <div class="card-body">
            <form>
                <div class="form-group py-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username"
                           placeholder="Enter username">
                </div>
                <div class="form-group py-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                           placeholder="Enter Password">
                </div>
                <button type="submit" class="btn btn-primary py-2">Login</button>
            </form>
        </div>
    </div>
</div>
</template>

<script>
export default {
}
</script>

<style>

</style>