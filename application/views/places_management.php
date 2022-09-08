<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Places List
        </h1>
      </div>
      <!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
          <li class="breadcrumb-item active">Places List</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table id="custtbl" class="table card-table table-vcenter text-nowrap">
            <thead>
              <tr>
                <th class="w-1">S.No</th>
                <th>Name</th>
                <th>Travel</th>
                <th>Email</th>
                <th>Address</th>
                <th>Price</th>
                <!-- <th>Status</th> -->
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($placeslist)) {
                $count = 1;
                foreach ($placeslist as $placeId => $place) {
              ?>
                  <tr>
                    <td> <?php echo output($count);
                          $count++; ?></td>
                    <td> <?php echo output($place['name']); ?></td>
                    <td> <?php echo gettravelname($place['travelId']); ?></td>
                    <td><?php echo output($place['email']); ?></td>
                    <td><?php echo output($place['address']); ?></td>
                    <td><?php echo output($place['price']); ?></td>
                    <!-- <td><span class="badge <?php echo ($place['u_isactive'] == '1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($place['u_isactive'] == '1') ? 'Active' : 'Inactive'; ?></span>
                    </td> -->
                    <td>
                      <a class="icon" href="<?php echo base_url(); ?>places/editplace/<?php echo output($placeId); ?>">
                        <i class="fa fa-edit"></i>
                      </a>
                    </td>
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