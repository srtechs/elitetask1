<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Income and Expenses Report
            </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>reports">Report</a></li>
               <li class="breadcrumb-item active">Income and Expenses Report</li>
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
      <form method="post" id="incomeexpense_report" class="card basicvalidation" action="<?php echo base_url();?>reports/incomeexpense">
         <div class="card-body">
            <div class="row">
               <div class="col-md-3">
                  <div class="form-group row">
                     <label for="incomeexpense_from" class="col-sm-5 col-form-label">Report From</label>
                     <div class="col-sm-6 form-group">
                        <input type="text" required="true" class="form-control form-control-sm datepicker" value="<?php echo isset($_POST['incomeexpense_from']) ? $_POST['incomeexpense_from'] : ''; ?>" id="incomeexpense_from" name="incomeexpense_from" placeholder="Date From">
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="form-group row">
                     <label for="incomeexpense_to" class="col-sm-5 col-form-label">Report To</label>
                     <div class="col-sm-6 form-group">
                        <input type="text" required="true" class="form-control form-control-sm datepicker" value="<?php echo isset($_POST['incomeexpense_to']) ? $_POST['incomeexpense_to'] : ''; ?>" id="incomeexpense_to" name="incomeexpense_to" placeholder="Date To">
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group row">
                     <label for="booking_to" class="col-sm-3 col-form-label">Driver</label>
                     <div class="col-sm-8 form-group">
                        <select id="incomeexpense_vechicle" class="form-control"  name="driverId">
                             <option value=""> ALL </option>
                           <?php foreach ($drivers as $id => $driver) {
                             ?>
                             <option value="<?= $id ?>"> <?= $driver["firstName"] ?> </option>
                           <?php
                           } ?>
                        </select>
                     </div>
                  </div>
               </div>
               <input type="hidden" id="incomeexpensereport" name="incomeexpensereport" value="1">
               <div class="col-md-2">
                  <button type="submit" class="btn btn-block btn-outline-info btn-sm"> Generate Report</button>
               </div>
            </div>
         </div>
   </div>
   </form>
    <div class="card">
        <div class="card-body p-0">
            <?php if(!empty($tripsData)){
              $totalIncome = 0;
              $totalExpense = 0;
              foreach ($tripsData as $key => $data) {
                if ($data['bookingDetails']["status"] == "rideCompleted" || $data['bookingDetails']["status"] == "rated") {
                  $totalIncome = ($data['bookingDetails']["price"] * 20/100) + $totalIncome;
                  $totalExpense = ($data['bookingDetails']["price"] * 80/100) + $totalExpense;
                }
              } 
            ?>
          <div class="row">
          <div class="col-12 col-sm-6 col-md-2">
     
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Income</span>
                <span class="info-box-number"><?= round($totalIncome,2); ?> </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-thumbs-down"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Expense</span>
                <span class="info-box-number"><?= round($totalExpense,2); ?> </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          
        </div>
                 <table  class="datatableexport table card-table">
                      <thead>
                        <tr>
                          <th class="w-1">S.No</th>
                          <th>Date</th>
                          <th>Status</th>
                          <th>Amount</th>
                          <th>Income</th>
                          <th>Expense</th>
                          <th>Type</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php $count=1;
                           foreach ($tripsData as $tripId => $data) {
                              if ($data['bookingDetails']["status"] == "rideCompleted" || $data['bookingDetails']["status"] == "rated") {
                  ?>
                      <tr>
                        <td> <?php echo output($count);
                              $count++; ?></td>
                        <td> <?php echo convertTime($data['bookingDetails']["bookingDate"]); ?></td>
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
                        <td> <?php echo round($data['bookingDetails']["price"],2); ?></td>
                        <td> <?php echo round($data['bookingDetails']["price"]*20/100,2); ?></td>
                        <td> <?php echo round($data['bookingDetails']["price"]*80/100,2); ?></td>
                        
                        <td><?php if(!empty($data['bookingDetails']["rideType"]))
                        {
                          echo $data['bookingDetails']["rideType"];

                        } ?></td>
                        
                        <td>
                          <a class="icon" href="<?php echo base_url(); ?>trips/details/<?php echo output($tripId); ?>">
                            <i class="fa fa-eye"></i>
                          </a>
                        </td>
                      </tr>
                  <?php }} ?>
                      </tbody>
                    </table>
                   <?php } ?>
        </div>
      </div>
   </div>
</section>





