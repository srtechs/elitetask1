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
            <div class="col-4 d-flex flex-row justify-content-between">
                <h1 class="m-0 text-dark">Tasks in Progress
                </h1>
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
                                <th>User Name</th>
                                <th>Location</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date & Time</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> <?php echo "test user"; ?></td>
                                <td> <?php echo "test location"; ?></td>
                                <td> <?php echo "email"; ?></td>
                                <td><?php echo "03135687648" ?></td>
                                <td><?php echo date(); ?></td>
                                <td><button class="btn btn-sm bg-custom-blue rounded-pill text-white" data-toggle="modal" data-target="#modalRegular">Track</button></td>
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

                <button type="button" class="btn btn-info btn-md">Save location <i class="fas fa-map-marker-alt ml-1"></i></button>
                <button type="button" class="btn btn-outline-info btn-md" data-dismiss="modal">Close <i class="fas fa-times ml-1"></i></button>

            </div>

        </div>
        <!--/.Content-->

    </div>
</div>
<!--Modal: Name-->