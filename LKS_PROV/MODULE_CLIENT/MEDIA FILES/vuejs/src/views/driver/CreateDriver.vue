<template>
  <div class="container">
    <div class="card mt-4">
        <div class="card-header">
            Create Driver
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                           placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="text" class="form-control" id="age" name="age"
                           placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="id-number">ID Number</label>
                    <input type="text" class="form-control" id="id-number" name="id_number"
                           placeholder="Enter id number">
                </div>
                <button type="submit" class="btn btn-primary">Add Driver</button>
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