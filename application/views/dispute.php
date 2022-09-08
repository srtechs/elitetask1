    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dispute
            </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Button trigger modal -->
    <div class="row">
<button type="button" class="btn btn-primary float-right m-4" data-toggle="modal" data-target="#exampleModal">
  Add Dispute
</button>
</div>

<div class="container-fluid">
  <div class="card">
    <div class="card-body p-0">
      <?php if(!empty($disputesData)){
      ?>
    
       <table  class="datatableexport table card-table">
            <thead>
              <tr>
                <th class="w-1">Ticket.No</th>
                <th>Customer Name</th>
                <th>Driver Name</th>
                <th>Reason</th>
                <th>Date Opened</th>
                <th>User Email</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

            <?php $count=1;
                 foreach ($disputesData as $disputeId => $data) {
        ?>
            <tr>
              <td> <?php echo $data["ticketNo"] ?></td>
              <td> <?php echo $data["userName"]; ?></td>
              <td> <?php echo $data["driverName"]; ?></td>
              <td> <?php echo $data["reason"]; ?></td>
              <td> <?php echo $data["dateOpened"]; ?></td>                        
              <td> <?php echo $data["userEmail"]; ?></td>
              <td>
                <?php if($data["status"]){
                  ?>
                  <a class="icon" href="<?php echo base_url() . "dispute/resolveDispute/" . $disputeId; ?>">
                  <button class="btn btn-warning">Mark As Resolved</button>
                </a>
                  <?php
                }else{
                  ?>
                  <button class="btn btn-success">Resolved</button>
                  <?php
                } ?>
                
<a href="<?= base_url() . "dispute/editDispute/" . $disputeId ?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                <a class="icon" href="<?php echo base_url(); ?>dispute/deletedispute/<?php echo output($disputeId); ?>">
                              <i class="fa fa-trash text-danger"></i>
                            </a>
                          




              </td>                        
            </tr>
        <?php } ?>
            </tbody>
          </table>
         <?php } ?>
      </div>
    </div>
 </div>
    
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" class="card" action="<?php echo base_url() . "dispute/addDispute"; ?>">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Dispute</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
                <div class="card-body">

                  <div class="row">                    
                    <div class="col-sm-8 col-md-8">
                      <div class="form-group">
                        <label class="form-label">Ticket No<span class="form-required">*</span></label>
                        <input type="text" class="form-control" disabled value="<?php echo time(); ?>" >
                        <input type="text" name="ticketNo" id="ticketNo" class="form-control" hidden value="<?php echo time(); ?>" >
                        <input type="text" name="status" class="form-control" hidden value="<?php echo TRUE; ?>" >
                      </div>
                    </div>    
                    
                    <div class="col-sm-6 col-md-6">
                        <label class="form-label">Name<span class="form-required">*</span></label>
                      <div class="form-group">
                        <input type="text" name="userName" id="userName" class="form-control" placeholder="Frist Name" >
                      </div>
                    </div>
                    
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Email<span class="form-required">*</span></label>
                        <input type="email" name="userEmail" class="form-control" placeholder="Email" >
                      </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Phone<span class="form-required">*</span></label>
                        <input type="tel" name="phoneNumber" class="form-control" placeholder="Phone Number" >
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Address<span class="form-required">*</span></label>
                        <input type="text" name="Address" value="" class="form-control " placeholder="Address" >
                      </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Driver Name<span class="form-required">*</span></label>
                        <input type="text" name="driverName" class="form-control" placeholder="Email" >
                      </div>
                    </div>

                     <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Reason<span class="form-required">*</span></label>
                        <input type="text" name="reason" value="" class="form-control " placeholder="Reason" >
                      </div>
                    </div>
                    
                     <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Date opened<span class="form-required">*</span></label>
                        <input type="date" name="dateOpened" value="" class="form-control " placeholder="Reason" >
                      </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                         <label class="form-label">Date Closed<span class="form-required">*</span></label>
                        <input type="date" name="dateClosed" value="" class="form-control " placeholder="Reason" >
                      </div>
                    </div>
                    
                     <div class="col-sm-6 col-md-9">
                      <div class="form-group">
                        <label class="form-label">Staff Member Name handling Ticket<span class="form-required">*</span></label>
                        <div class="form-group">
                        <input type="text" name="staffName" id="staffName" class="form-control" placeholder="Staff Member Name handling Ticket" >
                      </div>
                      </div>
                    </div>
                   
                </div>
                
             </div>
    </section>
    <!-- /.content -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Confirm</button>
      </div>
      </form>
    </div>
  </div>
</div>