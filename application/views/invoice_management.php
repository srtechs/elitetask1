<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-4 d-flex flex-row justify-content-between">
        <h1 class="m-0 text-dark">Invoices
        </h1>
      </div>
      <!-- /.col -->
      <div class="col-8">
        <ol class="breadcrumb float-sm-right">
          <button type="button" class="btn btn-sm bg-custom-blue text-white text-uppercase rounded-pill" data-toggle="modal" data-target="#invoiceModal">Share Invoice</button>
        </ol>
      </div>
    </div>
  </div>
</div>
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <div class="d-flex flex-row">
          <div class="form-floating">
            <input type="date" class="form-control" id="floatingInputValue1" placeholder="Start Date">
            <label for="floatingInputValue1">Start Date</label>
          </div>
          <div class="form-floating mx-2">
            <input type="date" class="form-control" id="floatingInputValue2" placeholder="End Date">
            <label for="floatingInputValue2">End Date</label>
          </div>
        </div>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table id="custtbl" class="table card-table table-vcenter text-nowrap">
            <thead>
              <tr>
                <th>Invoice ID</th>
                <th>Client</th>
                <th>Service Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Work Hr</th>
                <th>HST</th>
                <th>Total Price</th>
                <th>Download</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="checkbox" name="" id=""> #3321321564</td>
                <td> Derrica Anderson</td>
                <td> Nursing Home</td>
                <td> 08/12/22</td>
                <td> 08/18/22</td>
                <td> $35.00</td>
                <td> $55.00</td>
                <td> $1588.00</td>
                <td> PDF.pdf <img src="<?= base_url('assets/Slicing/Icon-feather-download.png') ?>" alt=""></td>
                <td><i class="fa-solid fa-pen-to-square"></i> <button type="button" class="btn btn-sm bg-custom-blue text-white text-uppercase rounded-pill" data-toggle="modal" data-target="#invoiceModal">Generate</button></td>
              </tr>
              <?php
              if (!empty($customerlist)) {
                $count = 1;
                foreach ($customerlist["user"] as $id => $customerlists) {
              ?>
                  <tr>
                    <td> <?php echo output($count);
                          $count++; ?></td>
                    <td> <?php echo output($customerlists['firstName']); ?></td>
                    <td> <?php echo output($customerlists['phoneNumber']); ?></td>
                    <td><?php echo output($customerlists['email']); ?></td>
                    <td><?php echo output($customerlists['homeAddress']); ?></td>
                    <td> <span class="badge <?php echo ($customerlists['isActive'] == '1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($customerlists['isActive'] == '1') ? 'Active' : 'Inactive'; ?></span> </td>
                  </tr>

              <?php }
              } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>



<div class="modal" id="invoiceModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body d-flex flex-column justify-content-center align-items-center">
        <h3>Share Generate Invoice</h3>
        <p class="text-secondary">Saturday, 23rd July, 2022</p>
        <input type="email" class="form-control mt-2" name="email" placeholder="Email Address">
        <button type="button" class="btn btn-md bg-custom-blue rounded-pill mt-4">Share Now</button>
      </div>
    </div>
  </div>
</div>
