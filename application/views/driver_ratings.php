    <style>
.checked {
  color: orange;
}
</style>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Driver Ratings And Reviews
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
                      <form method="post" id="user_rating">
                     
                   <input type="hidden" name="v_id" id="v_id" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_id']:'' ?>" >

                    <div class="col-12 col-md-6">
                         <h4 name="driver_name" value="">Driver Name</h4>
                        <div class="description">
                     
                     <div class="star_ratings">
                     <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    </div>
              
                          <p name="customer-desc"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad eum dolorum architecto obcaecati enim dicta praesentium, quam nobis! Neque ad aliquam facilis numquam. Veritatis, sit.</p>
                            <h4 class="text-info" name="customer-name">Customer Name</h4>    
                         </div>
            </form>
          </div>

                    
                    <div class="col-sm-6 d-none col-md-4">
                        <label class="form-label">iRide Plus</label>
                      <div class="form-group">
                        <input type="text" name="v_name" id="v_name" class="form-control" placeholder="iRide Plus" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_name']:'' ?>">
                      </div>
                    </div>
                    
                    </div>
                    
                  
                    </div>
                           
              </form>
             </div>
    </section>
    <!-- /.content -->



