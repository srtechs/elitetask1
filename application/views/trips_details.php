    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Booking Details
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Booking Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    <div class="card">
      <?php
      ?>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Total Amount</span>
                      <span class="info-box-number text-center text-muted mb-0"><?= $tripData['price']; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Paid Amount</span>
                      <span class="info-box-number text-center text-muted mb-0"><?= $tripData["price"]; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Overview:</h4>
                    <div class="post">
                      <div class="row">
                      <div class="col-lg-5">
                      <div class="user-block">
                        <span class="username">
                          <?= $customerData["firstName"]; ?>
                        </span>
                        <span class="description"><?= $tripData["tripDetail"]["pickUp"]["address"]; ?></span>
                      </div>
                    </div> to
                     <div class="col-lg-5">
                      <div class="user-block">
                        <span class="username">
                          <?= $tripData["tripDetail"]["destinations"][0]["address"]; ?>
                        </span>
                      </div>
                       </div>
                        <div class="col-lg-4"></div>
                     </div>
                    </div>

               

                     <h5>Payment Activity:</h5>
                    <div class="post clearfix">
                      <?php if(!empty($tripData["status"]) && ($tripData["status"] == "rideCompleted" || $tripData["status"] == "rated")) { ?>
                   <table class="table table-bordered table-sm">
                  <thead>                  
                    <tr>
                      <th>#</th>
                      <th>Amount</th>
                      <th>Comments</th>
                      <th>Paid On</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php $count=1;
                           ?>
                      <tr>
                      <td><?php echo output($count); $count++; ?></td>
                      <td><?php echo output($tripData['price']); ?></td>
                      <td><?php echo output($tripData['rideType']); ?></td>
                      <td><?php echo convertTime($tripData['bookingDate']); ?></td>
                    </tr>
                  </tbody>
                </table>
                 <?php 
                     }  
                     else
                     {
                     echo '<div class="alert alert-warning">No payment details found !.</div><div style="padding-bottom:240px"></div>';
                     }
                     ?>
                </div>
                </div>

              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2"> 
              <br>
              <div class="text-muted">
                <p class="text-sm">Customer Info
                  <b class="d-block"><?= $customerData['firstName']; ?></b>
                  <b class="d-block"><?= $customerData['phoneNumber']; ?></b>
                  <b class="d-block"><?= $customerData['email']; ?></b>
                  <b class="d-block"><?= $customerData['homeAddress']; ?></b>
                </p>
                <p class="text-sm">Driver Info
                  <?php if(isset($driverData)) { ?>
                  <b class="d-block"><?= $driverData['firstName']; ?></b>
                  <b class="d-block"><?= $driverData['phoneNumber']; ?></b>
                  <b class="d-block"><a href="<?= $vehicleData['licenseUrl']; ?>">license Picture</a></b>
                  <?php  } else { echo '<b class="d-block"><span class="badge badge-danger">Yet to Assign</span></b>'; } ?>
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      </div>
    </section>
<div class="modal fade show" id="modal-AddPayment" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Make Payment</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="trippayments" action="<?= base_url() ?>trips/trippayment" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="totalamount" class="col-sm-4 col-form-label">Total Amount</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" name="totalamount" value="<?= $tripdetails['t_trip_amount']; ?>" id="totalamount" placeholder="Enter totalamount" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="paidamount" class="col-sm-4 col-form-label">Pending Amount</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="pendingamount" value="<?= $tripdetails['t_trip_amount']-$totalpaidamt; ?>" id="pendingamount" placeholder="Paid Amount" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tp_amount" class="col-sm-4 col-form-label">Pay</label>
                    <div class="form-group col-sm-8">
                       <input type="text" class="form-control" name="tp_amount" id="tp_amount" placeholder="Pay">
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="tp_notes" class="col-sm-4 col-form-label">Notes</label>
                    <div class="form-group col-sm-8">
                      <textarea class="form-control" id="tp_notes" name="tp_notes" rows="2" placeholder="Enter Notes"></textarea>
                    </div>
                  </div>
                </div>
                 
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Payment</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>

<div class="modal fade show" id="modal-tripexpense" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Trip Expense</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="addtripexpense" action="<?= base_url() ?>trips/addtripexpense" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="ie_amount" class="col-sm-4 col-form-label">Amount</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" pattern="^[0-9]*$" required="true" name="ie_amount" id="ie_amount" placeholder="Enter amount">
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="ie_description" class="col-sm-4 col-form-label">Notes</label>
                    <div class="form-group col-sm-8">
                      <textarea class="form-control" required="true" id="ie_description" name="ie_description" rows="2" placeholder="Enter Notes"></textarea>
                    </div>
                  </div>
                </div>
        <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Expense</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>