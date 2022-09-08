<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <div class="img-profile ml-4">
          <img src="<?= base_url() ?>assets/uploads/newlogo1.png" class="img-circle img-fluid" style="height: 100px;width: 100px;">
        </div>
        <h1 class="m-0 text-dark"><?php echo (isset($customerdetails)) ? 'Edit Customer' : 'Add Customer' ?>
        </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Customer</a></li>
          <li class="breadcrumb-item active"><?php echo (isset($customerdetails)) ? 'Edit Customer' : 'Add Customer' ?></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <form method="post" id="customer_add" class="card" action="<?php echo base_url() . "customer/updatecustomerdata/".$id; ?>">
      <div class="card-body">

        <div class="row">
          <?php
          //  echo "<pre>";
          //  print_r($customerdetails);
          // echo "</pre>";
           ?>

          <div class="col-sm-6 col-md-3">
            <div class="form-group">
              <label class="form-label">First Name<span class="form-required">*</span></label>
              <input type="text" required="true" class="form-control" value="<?php echo (isset($customerdetails)) ? $customerdetails['firstName'] : '' ?>" id="c_name" name="firstName" placeholder="Customer Name">
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="form-group">
              <label class="form-label">Last Name<span class="form-required">*</span></label>
              <input type="text" required="true" value="<?php echo (isset($customerdetails)) ? $customerdetails['lastName'] : '' ?>" class="form-control" name="lastName" placeholder="Customer Name">
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="form-group">
              <label class="form-label">Mobile<span class="form-required">*</span></label>
              <input type="text" required="true" class="form-control" value="<?php echo (isset($customerdetails)) ? $customerdetails['phoneNumber'] : '' ?>" id="c_mobile" name="phoneNumber" placeholder="Customer Mobile">
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <div class="form-group">
              <label class="form-label">Email</label>
              <input type="text" readonly required="true" class="form-control" value="<?php echo (isset($customerdetails)) ? $customerdetails['email'] : '' ?>" id="c_email"  placeholder="Customer Email">

            </div>
          </div>
       

            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Password<span class="form-required">* <span style="color:red;">if you fill this field password will b changed</span></span></label>
                <input class="form-control"  id="c_password" autocomplete="off" type="password" placeholder="Password" name="newpassword" minlength="6">
                <input type="hidden" name="password" value ="<?php echo $customerdetails['password'] ?>" />
              </div>
            </div>


            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Address<span class="form-required">*</span></label>
                <textarea class="form-control" required="true" id="c_address" autocomplete="off" placeholder="Address" name="homeAddress"><?php echo (isset($customerdetails)) ? $customerdetails['homeAddress'] : '' ?></textarea>
              </div>
            </div>




        </div>
        
        <div class="modal-footer">

          <button type="submit" class="btn btn-primary"> <?php echo (isset($customerdetails)) ? 'Update Customer' : 'Add Customer' ?></button>
        </div>
      </div>
    </form>
  </div>
</section>
<!-- /.content -->