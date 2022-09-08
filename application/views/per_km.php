    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Per Kilometer
            </h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form method="post" id="vehicle_add" class="card" action="<?php echo base_url();?>vehicle/<?php echo (isset($vehicledetails))?'updatevehicle':'insertvehicle'; ?>">
                <div class="card-body">


                  <div class="row">
                   <input type="hidden" name="v_id" id="v_id" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_id']:'' ?>" >

                    <div class="col-sm-6 col-md-4">
                        <label class="form-label">iRide</label>
                      <div class="form-group">
                        <input type="text" name="v_registration_no" id="v_registration_no" class="form-control" placeholder="iRide" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_registration_no']:'' ?>">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label class="form-label">iRide Plus</label>
                      <div class="form-group">
                        <input type="text" name="v_name" id="v_name" class="form-control" placeholder="iRide Plus" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_name']:'' ?>">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">iRide Lux</label>
                        <input type="text" name="v_model" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_model']:'' ?>" class="form-control" placeholder="iRide Lux">
                      </div>
                    </div>
                    
                    
                  
                    </div>
                           
              </form>
             </div>
    </section>
    <!-- /.content -->



