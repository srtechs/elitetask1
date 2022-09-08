<style>
.map-container-9,
.map-container-10,
.map-container-11 {
    overflow: hidden;
    padding-bottom: 56.25%;
    position: relative;
    height: 0;
}

.map-container-9 iframe,
.map-container-10 iframe,
.map-container-11 iframe {
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    position: absolute;
}
</style>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-6 d-flex flex-row justify-content-between">
                <h1 class="m-0 text-dark">Staff
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
                    <button type="button" onclick="window.location='<?= base_url('staff/addstaff') ?>'" class="btn btn-sm bg-custom-blue text-white text-uppercase rounded-pill">Add Staff</button>
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
                                <th>Name</th>
                                <th>Eamil</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if (!empty($staff)) {
                                $count = 1;
                                foreach ($staff as $id => $staff) {
                            ?>
                            <tr>
                                <td> <?php echo output($count);
                                                $count++; ?></td>
                                <td> <a href="<?= base_url('staff/viewstaff/' . $id) ?>"><?php echo output($staff['firstName'] . " " . $staff['lastName']); ?></a></td>
                                <td> <?php echo output($staff['email']); ?></td>
                                <td><?php echo output($staff['emergencyNumber']); ?></td>
                                <td><?php echo output($staff['address']); ?></td>
                                <td> <span class="badge <?php echo ($staff['isActive'] == '1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($staff['isActive'] == '1') ? 'Active' : 'Inactive'; ?></span> </td>
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

<!--Modal: Name-->
<div class="modal fade" id="modalRegular" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">

        <!--Content-->
        <div class="modal-content">

            <!--Body-->
            <div class="modal-body mb-0 p-0">

                <!--Google map-->
                <div id="map-container-google-16" class="z-depth-1-half map-container-9" style="height: 400px">
                    <iframe src="https://maps.google.com/maps?q=new%20delphi&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>

            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-center">

                <!-- <button type="button" class="btn btn-info btn-md">Save location <i class="fas fa-map-marker-alt ml-1"></i></button> -->
                <button type="button" class="btn btn-outline-info btn-md" data-dismiss="modal">Close <i class="fas fa-times ml-1"></i></button>

            </div>

        </div>
        <!--/.Content-->

    </div>
</div>
<!--Modal: Name-->