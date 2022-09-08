<style type="text/css">
  .custom-img{
    height: 100px;
    width: auto;
  }
</style>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Vehicle Details
        </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Vehicle Details</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3" style="display: none;">

      </div>
      <!-- /.col -->
      <div class="col-md-10">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <!-- <li class="nav-item"><a class="nav-link active" href="#basicinfo" data-toggle="tab">Basic Info</a></li> -->
              <!--  <li class="nav-item"><a class="nav-link " href="#bookings" data-toggle="tab">Bookings</a></li>-->
              <!--  <li class="nav-item"><a class="nav-link" href="#vechicle_geofence" data-toggle="tab">Geofence</a></li>-->
              <!--<li class="nav-item"><a class="nav-link" href="#vechicle_incomexpense" data-toggle="tab">Income & Expense</a></li>-->
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane " id="bookings">
                <table id="bookingstbl" class="table table-striped projects">
                  <thead>
                    <tr>
                      <th class="percent1">
                        #
                      </th>
                      <th class="percent25">
                        Driver
                      </th>
                      <th class="percent25">
                        Customer
                      </th>
                      <th class="percent25">
                        From & To
                      </th>
                      <th class="percent25">
                        Booking Value
                      </th>

                      <th class="percent25">
                        Trip Status
                      </th>
                      <th class="percent25">
                        Action
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (!empty($bookings)) {
                      $count = 1;
                      foreach ($bookings as $bookingsdata) {
                    ?>
                        <tr>
                          <td>
                            <?php echo output($count);
                            $count++; ?>
                          </td>
                          <td><?= (isset($bookingsdata['t_driver_details']->d_name)) ? $bookingsdata['t_driver_details']->d_name : '<span class="badge badge-danger">Yet to Assign</span>'; ?></td>
                          <td>
                            <?php echo output($bookingsdata['t_customer_details']->c_name); ?>
                          </td>
                          <td>
                            <?php echo '<small>' . output($bookingsdata['t_trip_fromlocation']) . '</small>';
                            echo '<br><span class="badge badge-success">to</span><br>'; ?>
                            <?php echo '<small>' . output($bookingsdata['t_trip_tolocation']) . '</small>'; ?>
                          </td>
                          <td>
                            <?php echo output($bookingsdata['t_trip_amount']); ?>
                          </td>

                          <td>
                            <?php
                            switch ($bookingsdata['t_trip_status']) {
                              case 'ongoing':
                                $status = '<span class="badge badge-info">Ongoing</span>';
                                break;
                              case 'completed':
                                $status = '<span class="badge badge-success">Completed</span>';
                                break;
                              case 'yettostart':
                                $status = '<span class="badge badge-warning">Yet to start</span>';
                                break;
                              case 'cancelled':
                                $status = '<span class="badge badge-danger">Cancelled</span>';
                                break;
                              case 'yettoconfirm':
                                $status = '<span class="badge badge-danger">Yet to Confirm</span>';
                                break;
                            }

                            ?>
                            <?= $status ?>
                          </td>
                          <td> <a class="icon" target="_blank" href="<?php echo base_url(); ?>trips/details/<?php echo output($bookingsdata['t_id']); ?>">
                              <i class="fa fa-eye"></i>
                            </a>
                          </td>
                        </tr>
                    <?php }
                    } ?>
                  </tbody>
                </table>

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="vechicle_geofence">
                <!-- The timeline -->
                <table id="vgeofencetbl" class="table table-striped projects">
                  <thead>
                    <tr>
                      <th class="percent1">
                        #
                      </th>
                      <th class="percent25">
                        Name
                      </th>
                      <th class="percent25">
                        Description
                      </th>
                      <th class="percent25">
                        Action
                      </th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php if (!empty($vechicle_geofence)) {
                      $count = 1;
                      foreach ($vechicle_geofence as $vechicle_geofence) {
                    ?>
                        <tr>
                          <td>
                            <?php echo output($count);
                            $count++; ?>
                          </td>
                          <td>
                            <?php echo output($vechicle_geofence['geo_name']); ?>
                          </td>
                          <td>
                            <?php echo output($vechicle_geofence['geo_description']); ?>
                          </td>
                          <td> <a class="icon" href="<?php echo base_url(); ?>geofence">
                              <i class="fa fa-eye"></i>
                            </a>
                          </td>
                        </tr>
                    <?php }
                    } ?>
                  </tbody>
                </table>
              </div>

              <div class="tab-pane" id="vechicle_incomexpense">
                <table id="incomexpenstbl" class="table table-striped projects">
                  <thead>
                    <tr>
                      <th class="percent1">
                        #
                      </th>
                      <th class="percent25">
                        Date
                      </th>
                      <th class="percent25">
                        Description
                      </th>
                      <th class="percent25">
                        Amount
                      </th>
                      <th class="percent25">
                        Type
                      </th>
                      <th class="percent25">
                        Action
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (!empty($vechicle_incomexpense)) {
                      $count = 1;
                      foreach ($vechicle_incomexpense as $incomexpensdata) {
                    ?>
                        <tr>
                          <td>
                            <?php echo output($count);
                            $count++; ?>
                          </td>
                          <td>
                            <?php echo output($incomexpensdata['ie_date']); ?>
                          </td>
                          <td>
                            <?php echo output($incomexpensdata['ie_description']); ?>
                          </td>
                          <td>
                            <?php echo output($incomexpensdata['ie_amount']); ?>
                          </td>
                          <td>
                            <?php echo ($incomexpensdata['ie_type'] == 'income') ? '<span class="right badge badge-success">Income</span>' : '<span class="right badge badge-danger">Expense</span>'; ?>
                          </td>
                          <td> <a class="icon" href="<?php echo base_url(); ?>incomexpense">
                              <i class="fa fa-eye"></i>
                            </a>
                          </td>
                        </tr>
                    <?php }
                    } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane active" id="basicinfo">
                <table class="table table-sm table-bordered">
                  <tbody>

                    <tr>
                      <td>First Name</td>
                      <td><?php echo $driverdetails["firstName"]; ?></td>
                    </tr>

                    <tr>
                      <td>Last Name</td>
                      <td><?php echo $driverdetails["lastName"]; ?></td>
                    </tr>

                    <tr>
                      <td>Phone Number</td>
                      <td><?php echo $driverdetails["phoneNumber"]; ?></td>
                    </tr>

                    <tr>
                      <td>Email</td>
                      <td><?php echo $driverdetails["email"]; ?></td>
                    </tr>

                    <tr>
                      <td>Address</td>
                      <td><?php echo $driverdetails["homeAddress"]; ?></td>
                    </tr>

                    <tr>
                      <td>City</td>
                      <td><?php echo $driverdetails["city"]; ?></td>
                    </tr>

                    <tr>
                      <td>State</td>
                      <td><?php echo $driverdetails["state"]; ?></td>
                    </tr>

                    <tr>
                      <td>Zip Code</td>
                      <td><?php echo $driverdetails["zipcode"]; ?></td>
                    </tr>

                    <tr>
                      <td>Model</td>
                      <td><?php echo $vehicledetails["model"]; ?></td>
                    </tr>

                    <tr>
                      <td>Year.</td>
                      <td><?php echo $vehicledetails["year"]; ?></td>
                    </tr>

                    <tr>
                      <td>Register Work Vehicle Name and Type</td>
                      <td><?php echo $vehicledetails["name"]; ?></td>
                    </tr>

                    <tr>
                      <td>Tag number.</td>
                      <td><?php echo $vehicledetails["tagNumber"]; ?></td>
                    </tr>
                    <tr>
                      <td>Number of doors.</td>
                      <td><?php echo $vehicledetails["noOfDoors"]; ?></td>
                    </tr>
                    <tr>
                      <td>Number of seatbelts.</td>
                      <td><?php echo $vehicledetails["noOfSeatBelts"]; ?></td>
                    </tr>

                    <tr>
                      <td>Photo of Drivers License</td>
                      <td><a href="<?= $vehicledetails["licenseUrl"] ?>" target="_blank"><img class="custom-img" src="<?php echo $vehicledetails["licenseUrl"]; ?>" alt=""></a></td>
                    </tr>

                    <tr>
                      <td>Proof of insurance.</td>
                      <td><a href="<?= $vehicledetails["insuranceUrl"] ?>" target="_blank"><img class="custom-img" src="<?php echo $vehicledetails["insuranceUrl"]; ?>" alt=""></a></td>
                    </tr>
                    <tr>
                      <td>Proof of registration.</td>
                      <td><a href="<?= $vehicledetails["registrationUrl"] ?>" target="_blank"><img class="custom-img" src="<?php echo $vehicledetails["registrationUrl"]; ?>" alt=""></a></td>
                    </tr>
                    <tr>
                      <td>Front picture of car</td>
                      <td><a href="<?= $vehicledetails["frontCarUrl"] ?>" target="_blank"><img class="custom-img" src="<?php echo $vehicledetails["frontCarUrl"]; ?>" alt=""></a></td>
                    </tr>

                    <tr>
                      <td>Left side picture of car</td>
                      <td><a href="<?= $vehicledetails["leftCarUrl"] ?>" target="_blank"><img class="custom-img" src="<?php echo $vehicledetails["leftCarUrl"]; ?>" alt=""></a></td>
                    </tr>

                    <tr>
                      <td>Right side picture of car</td>
                      <td><a href="<?= $vehicledetails["rightCarUrl"] ?>" target="_blank"><img class="custom-img" src="<?php echo $vehicledetails["rightCarUrl"]; ?>" alt=""></a></td>
                    </tr>

                    <tr>
                      <td>Rear picture of car</td>
                      <td><a href="<?= $vehicledetails["rearCarUrl"] ?>" target="_blank"><img class="custom-img" src="<?php echo $vehicledetails["rearCarUrl"]; ?>" alt=""></a></td>
                    </tr>

                    <tr>
                      <td>Front interior picture of car</td>
                      <td><a href="<?= $vehicledetails["frontInCarUrl"] ?>" target="_blank"><img class="custom-img" src="<?php echo $vehicledetails["frontInCarUrl"]; ?>" alt=""></a></td>
                    </tr>

                    <tr>
                      <td>Back interior picture of car</td>
                      <td><a href="<?= $vehicledetails["backInCarUrl"] ?>" target="_blank"><img class="custom-img" src="<?php echo $vehicledetails["backInCarUrl"]; ?>" alt=""></a></td>
                    </tr>

                    <tr>
                      <td>Mobile Number</td>
                      <td><?php echo $driverdetails["phoneNumber"]; ?></td>
                    </tr>


                  </tbody>
                </table>
                <div class="col-sm-3">
                  <a href="<?php echo base_url(); ?>drivers/edit_driver_info/<?php echo output($driverId); ?>">
                    <button type="button" class="btn btn-block btn-success btn-sm">Edit Info</button>
                  </a>
                </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->