<template>
  <div class="container">
    <div class="card mt-4">
        <div class="card-header">
            Create Order
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="bus">Bus</label>
                    <select id="bus" class="form-control" name="bus_id">
                        <option value="1">B 1234 AA</option>
                        <option value="2">B 3322 BZ</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="driver">Driver</label>
                    <select id="driver" class="form-control" name="driver_id">
                        <option value="1">Budi</option>
                        <option value="2">Jono</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="contact-name">Contact Name</label>
                    <input type="text" class="form-control" id="contact-name" name="contact_name"
                           placeholder="Enter contact name">
                </div>
                <div class="form-group">
                    <label for="contact-phone">Contact Phone</label>
                    <input type="text" class="form-control" id="contact-phone" name="contact_phone"
                           placeholder="Enter contact phone">
                </div>
                <div class="form-group">
                    <label for="start">Start Rent Date</label>
                    <input type="date" class="form-control" id="start" name="start_rent_date"
                           placeholder="Enter start rent date">
                </div>
                <div class="form-group">
                    <label for="total">Total Rent Days</label>
                    <input type="text" class="form-control" id="total" name="total_rent_days"
                           placeholder="Enter total rent days">
                </div>
                <button type="submit" class="btn btn-primary">Add Order</button>
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