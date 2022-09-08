  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Change User Credentials
          </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Change User Credentials</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <div class="card">

        <div class="card-header">

          <h3 class="card-title">Change User Credentials</h3>

        </div>

        <form id="addnewservice" role="form" action="<?php echo base_url() . "customer/resetCustomer"; ?>" method="post" class="basicvalidation col-md-6">
          <div class="card-body">

            <div class="form-group">
              <label>Old Username</label>
              <input type="text" class="form-control" required="true" id="oldusername" name="oldemail" placeholder="Enter Old username">
            </div>

            <div class="form-group">
              <label>New Username</label>
              <input type="text" class="form-control" required="true" id="username" name="newemail" placeholder="Enter New username">
            </div>

            <div class="form-group">
              <label>Old Password</label>
              <input type="password" class="form-control" required="true" id="oldpassword" name="oldpassword" placeholder="Enter Old Password">
            </div>

            <div class="form-group">
              <label>New Password</label>
              <input type="password" class="form-control" required="true" id="password" name="newpassword" placeholder="Enter New Password">
            </div>
            <div class="form-group">
              <label>Confirm Password</label>
              <input type="password" class="form-control" required="true" id="cnfpassword" name="cnfpassword" placeholder="Confirm Password">
            </div>

            <div id="password_submit" class="btn-block text-right mt-3">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>