    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Upcoming Trips
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Trip Reports</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">

          <div class="card-body p-0">


            <div class="table-responsive">
              <table id="triptbl" class="table card-table table-vcenter text-nowrap">
                <thead>
                  <tr>
                    <th class="w-1">S.No</th>
                    <th>Date/Time</th>
                    <th>Customer</th>
                    <th>Type</th>
                    <th>Trip Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php if (!empty($tripsData)) {
                    $count = 1;
                    foreach ($tripsData as $tripId => $data) {

                       // echo "<pre>";
                       // print_r($data);
                       // echo "</pre>";

                  ?>
                      <tr>
                        <td> <?php echo output($count);
                              $count++; ?></td>
                        <td> <?php echo convertTime($data['bookingDetails']["bookingDate"]); ?></td>
                        <td> <?php echo $data['customerDetails']["firstName"]; ?></td>
                        
                        <td><?php if(!empty($data['bookingDetails']["rideType"]))
                        {
                          echo $data['bookingDetails']["rideType"];

                        } ?></td>
                        
                        <td> 
                          <?php
//echo $data['bookingDetails']["status"];

                              switch ($data['bookingDetails']["status"]) {
                                case 'rideStarted':
                                  $status = '<span class="badge badge-info">Ongoing</span>';
                                  break;
                                case 'rideCompleted':
                                  $status = '<span class="badge badge-success">Completed</span>';
                                  break;
                                case 'booked':
                                  $status = '<span class="badge badge-warning">Booked - Yet to start</span>';
                                  break;
                                case 'cancelled':
                                  $status = '<span class="badge badge-danger">Cancelled</span>';
                                  break;
                                case 'driverAccepted':
                                  $status = '<span class="badge badge-warning">Driver is Arriving</span>';
                                  break;
                                case 'driverDriverReached':
                                  $status = '<span class="badge badge-warning">Driver Arrived</span>';
                                  break;
                                case 'rated':

                                  $status = '<span class="badge badge-success">Rated</span>';
                                  break;
                              }

                              echo $status;
                              ?>
                        </td>
                        <td>
                          <a class="icon" href="<?php echo base_url(); ?>trips/scheduledDetails/<?php echo output($tripId); ?>">
                            <i class="fa fa-eye"></i>
                          </a>
                        </td>
                      </tr>
                  <?php }
                  } ?>
                </tbody>
              </table>

            </div>
          </div>
          <!-- /.card-body -->
        </div>

      </div>
    </section>
    <!-- /.content -->


    