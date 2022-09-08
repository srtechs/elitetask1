<style>

  .promtion-form-wrapper form{
    width:500px;
  }

  .promtion-form-wrapper form .input-title{
    margin-bottom:4px;
  }

  .promtion-form-wrapper .form-control{
    background-color: #F5F6F7;
    border: 2px solid #ccd0d5;
    font-size:18px;
  }

  .promtion-form-wrapper .form-control:focus{
    border-color:#ccd0d5;
  }

  .promtion-form-wrapper form .form-btns .btn{
    background-color:#343a40;
    color:#c2c7d0;
    font-size:18px;
    font-weight:600;
  }

</style>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

        <div class="col-offset-2 col-8 promtion-form-wrapper">
        <form action="<?php echo base_url(); ?>dispute/updatedisputedata/<?php echo $id ?>" id="" method="post">
    <div class="row">                    
                    <div class="col-sm-8 col-md-8">
                      <div class="form-group">
                        <label class="form-label">Ticket No<span class="form-required">*</span></label>
                        <input type="text" class="form-control" disabled value="<?php echo $reminderdetails['ticketNo']; ?>" >
                        <input type="text" name="ticketNo" id="ticketNo" class="form-control" hidden value="<?php echo $reminderdetails['ticketNo']; ?>" >
                        <input type="text" name="status" class="form-control" hidden value="<?php echo $reminderdetails['status']; ?>" >
                      </div>
                    </div>    
                    
                    <div class="col-sm-6 col-md-6">
                        <label class="form-label">Name<span class="form-required">*</span></label>
                      <div class="form-group">
                        <input type="text" name="userName" id="userName" value="<?php echo $reminderdetails['userName']; ?>" class="form-control" placeholder="Frist Name" >
                      </div>
                    </div>
                    
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Email<span class="form-required">*</span></label>
                        <input type="email" value="<?php echo $reminderdetails['userEmail']; ?>"   name="userEmail" class="form-control" placeholder="Email" >
                      </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Phone<span class="form-required">*</span></label>
                        <input type="tel" name="phoneNumber" value="<?php echo $reminderdetails['phoneNumber']; ?>" class="form-control" placeholder="Phone Number" >
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Address<span class="form-required">*</span></label>
                        <input type="text" name="Address" value="<?php echo $reminderdetails['Address']; ?>"  value="" class="form-control " placeholder="Address" >
                      </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Driver Name<span class="form-required">*</span></label>
                        <input type="text" name="driverName" value="<?php echo $reminderdetails['driverName']; ?>" class="form-control" placeholder="Email" >
                      </div>
                    </div>

                     <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Reason<span class="form-required">*</span></label>
                        <input type="text" name="reason" value="<?php echo $reminderdetails['reason']; ?>"  class="form-control " placeholder="Reason" >
                      </div>
                    </div>
                    
                     <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Date opened<span class="form-required">*</span></label>
                        <input type="date" name="dateOpened" value="<?php echo $reminderdetails['dateOpened']; ?>" class="form-control " placeholder="Reason" >
                      </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                         <label class="form-label">Date Closed<span class="form-required">*</span></label>
                        <input type="date" name="dateClosed" value="<?php echo $reminderdetails['dateClosed']; ?>" class="form-control " placeholder="Reason" >
                      </div>
                    </div>
                    
                     <div class="col-sm-6 col-md-9">
                      <div class="form-group">
                        <label class="form-label">Staff Member Name handling Ticket<span class="form-required">*</span></label>
                        <div class="form-group">
                        <input type="text" name="staffName" value="<?php echo $reminderdetails['staffName']; ?>" id="staffName" class="form-control" placeholder="Staff Member Name handling Ticket" >
                      </div>
                      </div>
                    </div>
                   
                </div>
<button type="submit" class="btn btn-primary">Update</button>
</div><!-- /.promtion-form-wrapper -->
</form>      

</div>


    </div>
</div>