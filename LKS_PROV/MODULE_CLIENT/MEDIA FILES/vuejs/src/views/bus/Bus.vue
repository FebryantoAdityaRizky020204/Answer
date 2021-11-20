<template>
  <div class="container">
    <div class="card mt-4">
        <div class="card-header">
            Bus
        </div>
        <div class="card-body">
            <router-link class="btn btn-primary" to="bus/create">Add Bus</router-link>
            <table class="table mt-4">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Plate Number</th>
                    <th>Brand</th>
                    <th>Seat</th>
                    <th>Price Per Day</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>B 1234 AA</td>
                    <td>mercedes</td>
                    <td>25</td>
                    <td>150000</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-info">Edit</a>
                        <a href="#" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>B 3322 BZ</td>
                    <td>scania</td>
                    <td>40</td>
                    <td>200000</td>
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