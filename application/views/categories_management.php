<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-4 d-flex flex-row justify-content-between">
                <h1 class="m-0 text-dark">Categories
                </h1>
            </div>
            <!-- /.col -->
            <div class="col-8">
                <ol class="breadcrumb float-sm-right">
                    <button type="button" onclick="window.location='<?= base_url('dashboard/addcategory') ?>'" class="btn btn-sm bg-custom-blue text-white text-uppercase rounded-pill">Add Category</button>
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
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> Doctor</td>
                                <td> Some details here</td>
                                <td><span class="badge <?php echo ($userlists['u_isactive'] == '1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($userlists['u_isactive'] == '1') ? 'Active' : 'Inactive'; ?></span>
                                </td>
                                <td>
                                    <a class="icon" href="<?php echo base_url(); ?>dashboard/editcategory">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
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