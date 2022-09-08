<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Booking Report
            </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>reports">Report</a></li>
               <li class="breadcrumb-item active">Booking Report</li>
            </ol>
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <form method="post" id="booking_report" class="card basicvalidation" action="<?php echo base_url();?>reports/booking">
         <div class="card-body">
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group row">
                     <label for="booking_from" class="col-sm-5 col-form-label">Report From</label>
                     <div class="col-sm-6 form-group">
                        <input type="text" required="true" class="form-control form-control-sm datepicker" value="<?php echo isset($_POST['booking_from']) ? $_POST['booking_from'] : ''; ?>" id="booking_from" name="booking_from" placeholder="Date From">
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group row">
                     <label for="booking_to" class="col-sm-5 col-form-label">Report To</label>
                     <div class="col-sm-6 form-group">
                        <input type="text" required="true" class="form-control form-control-sm datepicker" value="<?php echo isset($_POST['booking_to']) ? $_POST['booking_to'] : ''; ?>" id="booking_to" name="booking_to" placeholder="Date To">
                     </div>
                  </div>
               </div>
               <input type="hidden" id="bookingreport" name="bookingreport" value="1">
               <div class="col-md-2 ml-auto">
                  <button type="submit" class="btn btn-block btn-outline-info btn-sm"> Generate Report</button>
               </div>
            </div>
         </div>
   </div>
   </form>
    <div class="card">

        <div class="card-body p-0">
           <?php if(!empty($tripsData)){ ?>
         <div class="table-responsive">
                    <table  class="datatableexport table card-table table-vcenter">
                      <thead>
                        <tr>
                          <th class="w-1">S.No</th>
                          <th>Date/Time</th>
                          <th>Customer</th>
                          <th>Type</th>
                          <th>Driver</th>
                          <th>Trip Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                     <?php
                           $count=1;
                           foreach ($tripsData as $tripId => $data) {
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
                        <td> <?php

                          if($data['bookingDetails']["status"]=="booked" || $data['bookingDetails']["status"]=="cancelled"){

                          }else{
                            echo (getusername($data['bookingDetails']['driverId']));
                          }
                         //echo (getusername($data['driverId']));


                          ?></td>
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
                          <a class="icon" href="<?php echo base_url(); ?>trips/details/<?php echo output($tripId); ?>">
                            <i class="fa fa-eye"></i>
                          </a>
                        </td>
                      </tr>
                  <?php } ?>
                      </tbody>
                    </table>
                   <?php } ?>
        </div>         
        </div>
        <!-- /.card-body -->
      </div>


   </div>
</section>
<!-- /.content -->