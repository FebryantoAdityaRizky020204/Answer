<template>
  <div class="container">
    <div class="card mt-4">
        <div class="card-header">
            Create Bus
        </div>
        <div class="card-body">
            <form>
                <div class="form-group mt-4">
                    <label for="plate-number">Plate Number</label>
                    <input type="text" class="form-control" id="plate-number" name="plate_number"
                           placeholder="Enter plate number">
                </div>
                <div class="form-group mt-4">
                    <label for="brand">Brand</label>
                    <select id="brand" class="form-control" name="brand">
                        <option value="mercedes">Mercedes</option>
                        <option value="fuso">Fuso</option>
                        <option value="scania">Scania</option>
                    </select>
                </div>
                <div class="form-group mt-4">
                    <label for="seat">Seat</label>
                    <input type="text" class="form-control" id="seat" name="seat"
                           placeholder="Enter seat capacity">
                </div>
                <div class="form-group mt-4">
                    <label for="price-per-day">Price per day</label>
                    <input type="text" class="form-control" id="price-per-day" name="price_per_day"
                           placeholder="Enter price per day">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Add Bus</button>
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