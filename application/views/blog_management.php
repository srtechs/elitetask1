<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Blogs List
        </h1>
      </div>
      <!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
          <li class="breadcrumb-item active">Blogs List</li>
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
                <th>Title</th>
                <th>Image</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($blogslist)) {
                $count = 1;
                foreach ($blogslist as $bookingId => $booking) {
              ?>
                  <tr>
                    <td> <?php echo output($count);
                          $count++; ?></td>
                    <td> <?php echo output($booking['title']); ?></td>
                    <td> <img src="<?php echo $booking['image']; ?>" height="100px" width="auto"> </td>
                    <td><?php echo output($booking['detail']); ?></td>
                    <td>
                      <a class="icon" href="<?php echo base_url(); ?>blog/editblog/<?php echo output($bookingId); ?>">
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