<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Settings
            </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Home</a></li>
               <li class="breadcrumb-item active">Settings</li>
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
      <div class="card">
         <div class="card-header">
            <h3 class="card-title">Vehicle Type</h3>
         </div>

         <form action="updateSettings" method="post">

            <div class="card-body">
               <div class="row">
                  <div class="col-sm-6 col-md-4">
                     <label class="form-label">iRide</label>
                     <div class="form-group">
                        <input type="text" name="iRide_name" id="v_registration_no" class="form-control" placeholder="iRide" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_registration_no'] : '' ?>">
                     </div>
                     <div class="row">
                        <div class="col-sm-4">
                           <label>Initial Fee</label>
                           <input type="text" name="iRide_initialFee" value="<?php echo $iRide["initialFee"]; ?>" class="form-control" placeholder="$2" />
                        </div>
                        <div class="col-sm-4">
                           <label>Per Mile</label>
                           <input type="text" name="iRide_pricePerMile" value="<?php echo $iRide["pricePerMile"]; ?>" class="form-control" placeholder="20" />
                        </div>
                        <div class="col-sm-4">
                           <label>Per Minutes</label>
                           <input type="text" name="iRide_pricePerMin" value="<?php echo $iRide["pricePerMin"]; ?>" class="form-control" placeholder="1H" />
                        </div>

                        <div class="col-sm-6 mt-2">
                           <label>Cost of vehicle</label>
                           <input type="text" name="iRide_costOfVehicle" value="<?php echo $iRide["costOfVehicle"]; ?>" class="form-control" placeholder="Cost" />
                        </div>
                        <span class="border-top my-3 d-block w-100 text-dark"></span>

                     </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                     <label class="form-label">iRide Plus</label>
                     <div class="form-group">
                        <input type="text" name="iRidePlus_name" id="v_name" class="form-control" placeholder="iRide Plus" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_name'] : '' ?>">
                     </div>
                     <div class="row">
                        <div class="col-sm-4">
                           <label>Initial Fee</label>
                           <input type="text" class="form-control" name="iRidePlus_initialFee" value="<?php echo $iRidePlus["initialFee"]; ?>" placeholder="$2" />
                        </div>
                        <div class="col-sm-4">
                           <label>Per Mile</label>
                           <input type="text" class="form-control" name="iRidePlus_pricePerMile" value="<?php echo $iRidePlus["pricePerMile"]; ?>" placeholder="20" />
                        </div>
                        <div class="col-sm-4">
                           <label>Per Minutes</label>
                           <input type="text" class="form-control" name="iRidePlus_pricePerMin" value="<?php echo $iRidePlus["pricePerMin"]; ?>" placeholder="1H" />
                        </div>

                        <div class="col-sm-6 mt-2">
                           <label>Cost of vehicle</label>
                           <input type="text" class="form-control" name="iRidePlus_costOfVehicle" value="<?php echo $iRidePlus["costOfVehicle"]; ?>" placeholder="Cost" />
                        </div>

                        <span class="border-top my-3 d-block w-100 text-dark"></span>

                     </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                     <div class="form-group">
                        <label class="form-label">iRide Lux</label>
                        <input type="text" name="iRideLux_name" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_model'] : '' ?>" class="form-control" placeholder="iRide Lux">
                     </div>
                     <div class="row">
                        <div class="col-sm-4">
                           <label>Initial Fee</label>
                           <input type="text" class="form-control" name="iRideLux_initialFee" value="<?php echo $iRideLux["initialFee"]; ?>" placeholder="$2" />
                        </div>
                        <div class="col-sm-4">
                           <label>Per Mile</label>
                           <input type="text" class="form-control" name="iRideLux_pricePerMile" value="<?php echo $iRideLux["pricePerMile"]; ?>" placeholder="20" />
                        </div>
                        <div class="col-sm-4">
                           <label>Per Minutes</label>
                           <input type="text" class="form-control" name="iRideLux_pricePerMin" value="<?php echo $iRideLux["pricePerMin"]; ?>" placeholder="1H" />
                        </div>

                        <div class="col-sm-6 mt-2">
                           <label>Cost of vehicle</label>
                           <input type="text" class="form-control" name="iRideLux_costOfVehicle" value="<?php echo $iRideLux["costOfVehicle"]; ?>" placeholder="Cost" />
                        </div>

                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-4 mt-2">
                     <label>Driver Share (%)</label>
                     <input type="text" class="form-control" placeholder="Cost" name="driverShare" value="<?php echo $driverShare ?>" />
                  </div>
                  <div class="col-sm-4 mt-2"></div>
                  <div class="col-sm-2 mt-2">
                     <label>Update your fields</label>
                     <button class="btn btn-success" type="submit">Update</button>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</section>


<form id="addnewcategory" class="basicvalidation" role="form" action="websitesetting_save" method="post" class="col-md-6 d-none" enctype='multipart/form-data'>
   <div class="card-body d-none">
      <div class="row">
         <div class="col-sm-6 col-md-4">
            <div class="form-group">
               <label>Company Name</label>
               <input type="text" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['s_companyname']) ? $website_setting[0]['s_companyname'] : ''); ?>" id="s_companyname" name="s_companyname" placeholder="Enter Company Name">
            </div>
         </div>
         <div class="col-sm-6 col-md-4">
            <div class="form-group">
               <label>Address</label>
               <input type="text" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['s_address']) ? $website_setting[0]['s_address'] : ''); ?>" id="s_address" name="s_address" placeholder="Enter Address">
            </div>
         </div>
         <div class="col-sm-6 col-md-4">
            <div class="form-group">
               <label>Googel API Key</label>
               <input type="text" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['s_googel_api_key']) ? $website_setting[0]['s_googel_api_key'] : ''); ?>" id="s_googel_api_key" name="s_googel_api_key" placeholder="Enter Address">
            </div>
         </div>
         <div class="col-sm-6 col-md-4">
            <div class="form-group">
               <label>Invoice Prefix</label>
               <input type="text" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['s_inovice_prefix']) ? $website_setting[0]['s_inovice_prefix'] : ''); ?>" id="s_inovice_prefix" name="s_inovice_prefix" placeholder="Enter Invoice Prefix">
            </div>
         </div>
         <div class="col-sm-6 col-md-4">
            <div class="form-group">
               <label>Currency Prefix</label>
               <input type="text" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['s_price_prefix']) ? $website_setting[0]['s_price_prefix'] : ''); ?>" id="s_price_prefix" name="s_price_prefix" placeholder="Enter Currency Prefix">
            </div>
         </div>
         <div class="col-sm-6 col-md-4">
            <div class="form-group">
               <label>Inovice Terms and condition</label>
               <textarea id="s_inovice_termsandcondition" name="s_inovice_termsandcondition" rows="4" cols="50" class="form-control" required="true" placeholder="Enter Currency Prefix"><?php echo output(isset($website_setting[0]['s_inovice_termsandcondition']) ? $website_setting[0]['s_inovice_termsandcondition'] : ''); ?>
                        </textarea>
            </div>
         </div>
         <div class="col-sm-6 col-md-4">
            <div class="form-group">
               <label>Inovice Service Name</label>
               <input type="text" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['s_inovice_servicename']) ? $website_setting[0]['s_inovice_servicename'] : ''); ?>" id="s_inovice_servicename" name="s_inovice_servicename" placeholder="Inovice Service Name">
            </div>
         </div>
         <div class="col-sm-6 col-md-4">
            <div class="form-group">
               <label for="exampleInputFile">Logo</label>
               <div class="input-group">
                  <input type="file" class="form-control" id="file" name="file" <?php echo output(($website_setting[0]['s_logo'] != '') ? 'disabled=true' : ''); ?>>
               </div>
               <span class="bg-gradient-success btn-xs">Image sholud be in 50 X 50px and png format</span>
            </div>
            <?php if ($website_setting[0]['s_logo'] != '') { ?>
               <img src="<?= base_url() . 'assets/uploads/' . $website_setting[0]['s_logo']; ?>" alt="Logo" height="50" width="50" />
               <button type="button" class="logodelete btn btn-primary">Delete</button>
            <?php } ?>
         </div>
         <div id="addnewcategory_submit" class="btn-block text-right mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
         </div>
      </div>
   </div>
</form>