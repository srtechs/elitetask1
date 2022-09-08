    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <div class="img-profile ml-3">

 <?php 
         
            ?>
              <?php if(empty(trim($driverdetails['image']))){ ?>
              <img src="https://via.placeholder.com/150" class="img-circle img-fluid">
              
            <?php } else{?>
              <img src="<?= $driverdetails['image'] ?>" class="img-circle img-fluid">
           <?php } ?>
            </div>
            <h1 class="m-0 text-dark">Edit Driver/Vehicle Details
            </h1>

           

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Vehicle</a></li>
              <li class="breadcrumb-item active">Edit Driver</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <form method="post" id="add_driver" class="card" action="<?php echo base_url() . "drivers/updatedriver"; ?>" enctype="multipart/form-data">
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="card-body">


            <div class="row">
              <input type="hidden" name="d_id" id="d_id" value="<?php echo $driverId ?>">

              <div class="col-sm-6 col-md-3">
                <label class="form-label">Frist Name<span class="form-required">*</span></label>
                <div class="form-group">
                  <input type="text" name="d_firstName" id="firstName" class="form-control" placeholder="Frist Name" value="<?php echo $driverdetails["firstName"] ?>">
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Last Name<span class="form-required">*</span></label>
                  <input type="text" name="d_lastName" value="<?php echo $driverdetails["lastName"] ?>" class="form-control" placeholder="Last Name">
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Email<span class="form-required">*</span></label>
                  <input type="email" name="d_email" value="<?php echo $driverdetails["email"] ?>" class="form-control" placeholder="Email">
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Phone Number<span class="form-required">*</span></label>
                  <input type="tel" name="d_phoneNumber" value="<?php echo $driverdetails["phoneNumber"] ?>" class="form-control" placeholder="Phone Number">
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Address<span class="form-required">*</span></label>
                  <input type="text" name="d_homeAddress" value="<?php echo $driverdetails["homeAddress"] ?>" class="form-control" placeholder="Address">
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">City<span class="form-required">*</span></label>
                  <input type="text" name="d_city" value="<?php echo $driverdetails["city"] ?>" class="form-control" placeholder="City">
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">State<span class="form-required">*</span></label>
                  <input type="text" name="d_state" value="<?php echo $driverdetails["state"] ?>" class="form-control" placeholder="State">
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Zip Code</label>
                  <input type="text" name="d_zipcode" value="<?php echo $driverdetails["zipCode"] ?>" class="form-control" placeholder="Zip Code">
                </div>
              </div>
              <div class="col-sm-6 col-md-6">
                <div class="form-group">
                  <label class="form-label">Password<span class="form-required">*<span style="color:red;">if you fill this field password will b changed</span></span></label>
                  <!--
                  <input type="password" name="d_password" value="<?php echo $driverdetails["password"] ?>" class="form-control" placeholder="Password">
                  -->
                  <input class="form-control"  id="d_newpassword" autocomplete="off" type="password" placeholder="Password" name="d_newpassword" minlength="6">
                <input type="text" name="d_password" value ="<?php echo $driverdetails['password'] ?>" />

                </div>
              </div>
              <div class="col-sm-6 col-md-3 d-none">
                
              </div>
            </div>

          </div>

        </div>
      </section>
      <!-- /.content -->

      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Edit Vehicle Details
              </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Vehicle</a></li>
                <li class="breadcrumb-item active">Edit Vehicle</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="card-body">


            <div class="row">
              <input type="hidden" name="v_id" id="v_id" value="<?php echo $vehicleId ?>">

              <div class="col-sm-6 col-md-4">
                <label class="form-label">Model</label>
                <div class="form-group">
                  <input type="text" name="v_model" id="model" class="form-control" placeholder="Model" value="<?php echo $vehicledetails["model"] ?>">
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <label class="form-label">Year</label>
                <div class="form-group">
                  <input type="text" name="v_year" id="year" class="form-control" placeholder="Year" value="<?php echo $vehicledetails["year"] ?>">
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="form-group">
                  <label class="form-label">Tag number</label>
                  <input type="text" name="v_tagNumber" value="<?php echo $vehicledetails["tagNumber"] ?>" class="form-control" placeholder="Tag number">
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="form-group">
                  <label class="form-label">Number of doors</label>
                  <input type="text" name="v_noofDoors" value="<?php echo $vehicledetails["noOfDoors"] ?>" class="form-control" placeholder="Number of doors">
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="form-group">
                  <label class="form-label">Number of seatbelts</label>
                  <input type="text" name="v_noofSeatbelts" value="<?php echo $vehicledetails["noofSeatbelts"] ?>" class="form-control" placeholder="Number of seatbelts">
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="form-group">
                  <label class="form-label">Proof of insurance</label>
                  <input type="file" name="v_proofOfInsurance" class="form-control" placeholder="Proof of insurance">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-md-4">
                <div class="form-group">
                  <label class="form-label">proof of registration</label>
                  <input type="file" name="v_proofOfRegistration" class="form-control" placeholder="Proof of insurance">
                </div>
              </div>
              <?php if (isset($vehicledetails[0]['is_active'])) { ?>
                <div class="col-sm-6 col-md-4">
                  <div class="form-group">
                    <label for="is_active" class="form-label">Driver License</label>
                  </div>
                </div>
              <?php } ?>
              <div class="col-sm-6 col-md-4">
                <div class="form-group">
                  <label class="form-label">Front picture of car</label>
                  <input type="file" name="v_frontPicture" class="form-control" placeholder="Proof of insurance">
                </div>
              </div>


              <div class="col-sm-6 col-md-4">
                <div class="form-group">
                  <label class="form-label">Left side picture of car</label>
                  <input type="file" name="v_leftPicture" class="form-control" placeholder="Proof of insurance">
                </div>
              </div>

              <div class="col-sm-6 col-md-4">
                <div class="form-group">
                  <label class="form-label">License</label>
                  <input type="file" name="v_license" class="form-control" placeholder="Proof of insurance">
                </div>
              </div>

            </div>
            <hr>
            <div class="row">
              <div class="col-sm-6 col-md-4">
                <div class="form-group">
                  <label class="form-label">Right side picture of car</label>
                  <input type="file" name="v_rightPicture" class="form-control" placeholder="Proof of insurance">
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="form-group">
                  <label class="form-label">Rear picture of car</label>
                  <input type="file" name="v_rearPicture" class="form-control" placeholder="Proof of insurance">
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="form-group">
                  <label class="form-label">Front interior picture of car</label>
                  <input type="file" name="v_frontInterior" class="form-control" placeholder="Proof of insurance">
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="form-group">
                  <label class="form-label">Back interior picture of car</label>
                  <input type="file" name="v_backInterior" class="form-control" placeholder="Proof of insurance">
                </div>
              </div>
            </div>
          </div>
          <input type="hidden" id="created_by" name="v_createdBy" value="<?php echo output($this->session->userdata['session_data']['u_id']); ?>">
          <input type="hidden" id="created_date" name="v_createdDate" value="<?php echo date('Y-m-d h:i:s'); ?>">
          <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary"> Proceed</button>
          </div>
        </div>
      </section>
      <!-- /.content -->
    </form>