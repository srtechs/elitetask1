<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-6 d-flex flex-row justify-content-between">
                <h3 class="m-0 text-dark">Preferred Staff
                </h3>
                <div class="d-flex flex-row">
                    <div class="dropdown">
                        <button class="btn bg-white border rounded-pill dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Province
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">1</a></li>
                            <li><a class="dropdown-item" href="#">2</a></li>
                            <li><a class="dropdown-item" href="#">3</a></li>
                        </ul>
                    </div>
                    <div class="dropdown mx-2">
                        <button class="btn bg-white border rounded-pill dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Region
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">1</a></li>
                            <li><a class="dropdown-item" href="#">2</a></li>
                            <li><a class="dropdown-item" href="#">3</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-6">
                <ol class="breadcrumb float-sm-right">
                    <button type="button" class="btn btn-sm bg-custom-blue text-white text-uppercase rounded-pill">Add Staff</button>
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
                                <th>Staff Name</th>
                                <th>Location</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date & Time</th>
                                <th>Documents</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> John Player</td>
                                <td> 73.0000,35.254564</td>
                                <td> teststaff@gmail.com</td>
                                <td> 03322554411</td>
                                <td><?= date("Y-m-d H:i:s"); ?></td>
                                <td> sampledoc.pdf <img src="<?= base_url('assets/Slicing/Icon-feather-download.png') ?>" alt=""></td>
                                <!-- <td><a href="<?= base_url('staff/viewstaff') ?>"><i class="fa-solid fa-eye"></i></a></td> -->
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