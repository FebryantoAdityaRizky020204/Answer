<template>
  <div class="container">
    <div class="card mt-4">
        <div class="card-header">
            Order
        </div>
        <div class="card-body">
            <a href="create-order.html" class="btn btn-primary">Add Order</a>
            <table class="table mt-4">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Bus Plate Number</th>
                    <th>Driver Name</th>
                    <th>Contact Name</th>
                    <th>Contact Phone</th>
                    <th>Start Rent Date</th>
                    <th>Total Rent Days</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>B 1234 AA</td>
                    <td>Budi</td>
                    <td>Santi</td>
                    <td>6281299933344</td>
                    <td>2019-02-26 06:00:00</td>
                    <td>2</td>
                    <td><a href="#" class="btn btn-sm btn-danger">Hapus</a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>B 3322 BZ</td>
                    <td>Jono</td>
                    <td>Andre</td>
                    <td>6281297633344</td>
                    <td>2019-02-27 06:00:00</td>
                    <td>3</td>
                    <td><a href="#" class="btn btn-sm btn-danger">Hapus</a></td>
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