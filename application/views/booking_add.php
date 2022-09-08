<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><?php echo (isset($bookingdetails)) ? 'Edit Booking' : 'Add Booking' ?>
        </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Booking</a></li>
          <li class="breadcrumb-item active"><?php echo (isset($bookingdetails)) ? 'Edit Booking' : 'Add Booking' ?></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <form method="post" id="vehicle_add" class="card basicvalidation" action="<?php echo base_url('booking/insertbooking'); ?>">
      <div class="card-body">


        <div class="row">
          <input type="hidden" name="id" id="u_id" value="<?php echo (isset($bookingdetails)) ? $bookingdetails[0]['u_id'] : '' ?>">

          <div class="col-sm-6 col-md-4">
            <label class="form-label">Member</label>
            <div class="form-group">
              <select name="userId" required="true" class="form-control">
                <option value="">Select</option>
                <?php
                foreach ($users as $userId => $user) {
                ?>
                  <option value="<?= $userId ?>"><?= $user['firstName'] . " " . $user['lastName'] ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <label class="form-label">Hotel</label>
            <div class="form-group">
              <select name="hotelId" required="true" class="form-control">
                <option value="">Select</option>
                <?php
                foreach ($hotels as $hotelId => $hotel) {
                ?>
                  <option value="<?= $hotelId ?>"><?= $hotel['name'] ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <label class="form-label">Phone</label>
            <div class="form-group">
              <input type="text" name="phone" id="u_username" class="form-control" placeholder="Phone number" value="<?php echo (isset($bookingdetails)) ? $bookingdetails[0]['u_username'] : '' ?>">
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <label class="form-label">Start Date</label>
            <div class="form-group">
              <input type="date" name="startDate" id="startDate" class="form-control" placeholder="00-00-0000" value="<?php echo (isset($bookingdetails)) ? $bookingdetails[0]['u_username'] : '' ?>">
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <label class="form-label">End Date</label>
            <div class="form-group">
              <input type="date" name="endDate" id="endDate" class="form-control" placeholder="00-00-0000" value="<?php echo (isset($bookingdetails)) ? $bookingdetails[0]['u_username'] : '' ?>">
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <label class="form-label">Nights</label>
            <div class="form-group">
              <input type="number" name="nights" id="nights" class="form-control" placeholder="0">
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <label class="form-label">Rate</label>
            <div class="form-group">
              <input type="number" name="rate" id="rate" class="form-control" placeholder="$0" value="<?php echo (isset($bookingdetails)) ? $bookingdetails[0]['u_username'] : '' ?>">
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <label class="form-label">Total</label>
            <div class="form-group">
              <input type="number" name="total" id="total" class="form-control" placeholder="$0" value="<?php echo (isset($bookingdetails)) ? $bookingdetails[0]['u_username'] : '' ?>">
            </div>
          </div>
        </div>
        <hr>

      </div>
      <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary"> <?php echo (isset($bookingdetails)) ? 'Update Booking' : 'Add Booking' ?></button>
      </div>
    </form>
  </div>
</section>
<!-- /.content -->