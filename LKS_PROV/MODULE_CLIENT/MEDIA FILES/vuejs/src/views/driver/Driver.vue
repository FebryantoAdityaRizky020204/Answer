<template>
  <div class="container">
    <div class="card mt-4">
        <div class="card-header">
            Driver
        </div>
        <div class="card-body">
            <a href="create-driver.html" class="btn btn-primary">Add Driver</a>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>ID Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Budi</td>
                        <td>20</td>
                        <td>abcd1234abcd1234</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-info">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jono</td>
                        <td>19</td>
                        <td>1111222233334444</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-info">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
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