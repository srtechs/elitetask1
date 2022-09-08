<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-6 d-flex flex-row justify-content-between">
                <h1 class="m-0 text-dark">Client
                </h1>
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
                    <div class="dropdown mx-2">
                        <button class="btn bg-white border rounded-pill dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Category
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Hospitals</a></li>
                            <li><a class="dropdown-item" href="#">Nursing Homes</a></li>
                            <li><a class="dropdown-item" href="#">Retirement Homes</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-6">
                <ol class="breadcrumb float-sm-right">
                    <button type="button" onclick="window.location='<?= base_url('users/adduser') ?>'" class="btn btn-sm bg-custom-blue text-white text-uppercase rounded-pill">Add Client</button>
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
                                <th>No.</th>
                                <th>Facility Name</th>
                                <th>Email</th>
                                <th>Provice</th>

                                <th>Address</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                     if (!empty($clients)) {
                        $count = 1;
                        foreach ($clients as $id => $client) {
                     ?>
                            <tr>
                                <td> <?php echo output($count);
                                    $count++; ?></td>
                                <td> <a href="<?= base_url('users/viewclient/' . $id) ?>"><?php echo output($client['facilityName']); ?></a></td>
                                <td> <?php echo output($client['email']); ?></td>
                                <td><?php echo output($client['province']); ?></td>
                                <td><?php echo output($client['address']); ?></td>
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