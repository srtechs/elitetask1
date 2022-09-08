<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Upload Guideline</h1>
            </div><!-- /.col -->
            <div class="col-6">
                <ol class="breadcrumb float-sm-right">
                    <button type="button" class="btn btn-sm bg-custom-blue text-white text-uppercase rounded-pill" data-toggle="modal" data-target="#guideModal">Add Guideline</button>
                </ol>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table id="custtbl" class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Size</th>
                                <th>Date Uploaded</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> <i class="fa-solid fa-file-lines"></i> Test Document</td>
                                <td> pdf</td>
                                <td> 82 kb</td>
                                <td> 22/02/15</td>
                            </tr>
                            <!-- <?php
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
                              <td><a href="<?= base_url('users/viewclient') ?>"><i class="fa-solid fa-eye"></i></a></td>
                           </tr>

                     <?php }
                                    } ?> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

<div class="modal hide fade" id="guideModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body d-flex flex-column justify-content-center align-items-center">
                <h3> Add Guideline</h3>
                <div class="row">
                    <div class="col-12 my-1">
                        <input type="text" class="form-control" name="name" placeholder="Guide Name">
                    </div>
                    <div class="col-12 my-1">
                        <input type="file" class="form-control" name="file" placeholder="Choose Document">
                    </div>
                </div>
                <button type="button" class="btn btn-md bg-custom-blue rounded-pill mt-4">Save</button>
            </div>
        </div>
    </div>
</div>