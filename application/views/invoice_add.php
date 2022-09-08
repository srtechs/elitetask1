<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><?php echo (isset($invoicedetails)) ? 'Edit Invoice' : 'Add Invoice' ?>
        </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Invoice</a></li>
          <li class="breadcrumb-item active"><?php echo (isset($invoicedetails)) ? 'Edit Invoice' : 'Add Invoice' ?></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <form method="post" id="vehicle_add" class="card basicvalidation" action="<?php echo base_url('invoice/insertinvoice'); ?>" enctype="multipart/form-data">
      <div class="card-body">


        <div class="row">
          <input type="hidden" name="id" id="u_id" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['u_id'] : '' ?>">
          <input type="hidden" name="rating" value="5">

          <div class="col-sm-6 col-md-4">
            <label class="form-label">Name</label>
            <div class="form-group">
              <input type="text" name="name" id="u_name" required="true" class="form-control" placeholder="Name" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['u_name'] : '' ?>">
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <label class="form-label">Email</label>
            <div class="form-group">
              <input type="text" name="email" id="u_email" required="true" class="form-control" placeholder="Email" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['u_email'] : '' ?>">
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <label class="form-label">Phone</label>
            <div class="form-group">
              <input type="text" name="phone" id="u_username" class="form-control" placeholder="Phone number" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['u_username'] : '' ?>">
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <label class="form-label">Price</label>
            <div class="form-group">
              <input type="text" name="price" id="u_username" required="true" class="form-control" placeholder="Price" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['u_username'] : '' ?>">
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <label class="form-label">Description</label>
            <div class="form-group">
              <textarea type="text" rows="3" name="description" required="true" class="form-control" placeholder="Description"></textarea>
            </div>
          </div>
          
        </div>
        <hr>

      </div>
      <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary"> <?php echo (isset($invoicedetails)) ? 'Update Invoice' : 'Add Invoice' ?></button>
      </div>
    </form>
  </div>
</section>
<!-- /.content -->