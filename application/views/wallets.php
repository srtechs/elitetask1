    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Wallet
            </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form method="post" id="add_driver" class="card" action="<?php echo base_url();?>drivers/<?php echo (isset($driverdetails))?'updatedriver':'insertdriver'; ?>">
                <div class="card-body">

                  
                  <div class="row">
                   <input type="hidden" name="d_id" id="d_id" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_id']:'' ?>" >
                   
                    <div class="col-sm-6 col-md-3">
                        <label class="form-label">Driver Name<span class="form-required">*</span></label>
                      <div class="form-group">
                        <input type="text" name="d_name" id="d_name" class="form-control" placeholder="Driver name" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_name']:'' ?>" >
                      </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <label class="form-label">Bank Name<span class="form-required">*</span></label>
                      <div class="form-group">
                        <input type="text" name="d_name" id="d_name" class="form-control" placeholder="Bank Name" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_name']:'' ?>" >
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Account Number <span class="form-required">*</span></label>
                        <input type="number" name="d_mobile" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_mobile']:'' ?>" class="form-control" placeholder="Account number" >
                      </div>
                    </div>
                    
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Routing Number <span class="form-required">*</span></label>
                        <input type="number" name="d_mobile" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_mobile']:'' ?>" class="form-control" placeholder="Routing number" >
                      </div>
                    </div>
                    
                      <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Country<span class="form-required">*</span></label>
                        <select class="form-control" id="contry">
                            <option>USA</option>
                        </select>
                      </div>
                    </div>
                   
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Account Number<span class="form-required">*</span></label>
                        <input type="text" name="d_licenseno" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_licenseno']:'' ?>" class="form-control" placeholder="Account Number" >
                      </div>
                    </div>
                    
                     <div class="col-sm-6 col-md-3">
                        <label class="form-label">Balance<span class="form-required">*</span></label>
                      <div class="form-group">
                        <input type="text" name="d_name" id="d_name" class="form-control" placeholder="Balance" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_name']:'' ?>" >
                      </div>
                    </div>
                   
                </div>
                  <input type="hidden" id="d_created_by" name="d_created_by" value="<?php echo output($this->session->userdata['session_data']['u_id']); ?>">
                   <input type="hidden" id="d_created_date" name="d_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-success">Edit</button>
                   <button type="submit" class="btn btn-primary">Send Payment</button>
                  <button type="submit" class="btn btn-info">Add Balance</button>
                </div>
                
              </form>
             </div>
    </section>
    <!-- /.content -->