<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <div class="img-profile ml-4">
          <img src="<?= base_url() ?>assets/uploads/newlogo1.png" class="img-circle img-fluid" style="height: 100px;width: 100px;">
        </div>
        <h1 class="m-0 text-dark"><?php echo (isset($bookingdetails)) ? 'Edit Booking' : 'Edit Booking' ?>
        </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Booking</a></li>
          <li class="breadcrumb-item active"><?php echo (isset($bookingdetails)) ? 'Edit Booking' : 'Edit Booking' ?></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <form method="post" id="booking_add" class="card" action="<?php echo base_url() . "booking/updatebookingdata/".$id; ?>">
      <div class="card-body">

        <div class="row">
          <?php
          //  echo "<pre>";
          //  print_r($bookingdetails);
          // echo "</pre>";
           ?>

          <div class="col-sm-6 col-md-4">
            <label class="form-label">Member</label>
            <div class="form-group">
              <select name="userId" required="true" class="form-control">
                <option value="">Select</option>
                <?php
                foreach ($users as $userId => $user) {
                ?>
                  <option value="<?= $userId ?>" <?php if($userId == $bookingdetails['userId']) echo "selected"; ?>><?php if(!empty($user['userName']) && $user['userName'] != "")
                echo $user['userName'];
            else
                echo $user['firstName'] . " " . $user['lastName']; ?></option>
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
                  <option value="<?= $hotelId ?>" <?php if($hotelId == $bookingdetails['hotelId']) echo "selected"; ?> ><?= $hotel['name'] ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <label class="form-label">Phone</label>
            <div class="form-group">
              <input type="text" name="phone" id="u_username" required="true" class="form-control" placeholder="Phone number" value="<?php echo (isset($bookingdetails)) ? $bookingdetails['phone'] : '' ?>">
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <label class="form-label">Start Date</label>
            <div class="form-group">
              <input type="date" name="startDate" id="startDate" required="true" class="form-control" placeholder="00-00-0000" value="<?php echo (isset($bookingdetails)) ? $bookingdetails['startDate'] : '' ?>">
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <label class="form-label">End Date</label>
            <div class="form-group">
              <input type="date" name="endDate" id="endDate" required="true" class="form-control" placeholder="00-00-0000" value="<?php echo (isset($bookingdetails)) ? $bookingdetails['endDate'] : '' ?>">
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <label class="form-label">Nights</label>
            <div class="form-group">
              <input type="number" name="nights" id="nights" required="true" class="form-control" placeholder="0" value="<?php echo (isset($bookingdetails)) ? $bookingdetails['nights'] : '' ?>">
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <label class="form-label">Rate</label>
            <div class="form-group">
              <input type="number" name="rate" id="rate" required="true" class="form-control" placeholder="$0" value="<?php echo (isset($bookingdetails)) ? $bookingdetails['rate'] : '' ?>">
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <label class="form-label">Total</label>
            <div class="form-group">
              <input type="number" name="total" id="total" required="true" class="form-control" placeholder="$0" value="<?php echo (isset($bookingdetails)) ? $bookingdetails['total'] : '' ?>">
            </div>
          </div>




        </div>
        
        <div class="modal-footer">

          <button type="submit" class="btn btn-primary"> <?php echo (isset($bookingdetails)) ? 'Update Booking' : 'Update Booking' ?></button>
        </div>
      </div>
    </form>
  </div>
</section>
<!-- /.content -->