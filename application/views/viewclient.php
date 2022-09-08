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
        height: 80%;
        width: 80%;
        margin-left: 10%;
        position: absolute;
    }
</style>


<!-- Required meta tags -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
<link rel="stylesheet" href=<?= base_url('assets/') . "calendar/fonts/icomoon/style.css" ?>>
<link href=<?= base_url('assets/') . 'calendar/fullcalendar/packages/core/main.css' ?> rel='stylesheet' />
<link href=<?= base_url('assets/') . 'calendar/fullcalendar/packages/daygrid/main.css' ?> rel='stylesheet' />
<!-- Bootstrap CSS -->
<link rel="stylesheet" href=<?= base_url('assets/') . "calendar/css/bootstrap.min.css" ?>>
<!-- Style -->
<link rel="stylesheet" href=<?= base_url('assets/') . "calendar/css/style.css" ?>>


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<section class="content">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><i class="fa-solid fa-user"></i> Profile</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link  active" id="cal-tab" data-bs-toggle="tab" data-bs-target="#cal" type="button" role="tab" aria-controls="cal" aria-selected="false"><i class="fa-solid fa-calendar-check"></i> Calendar</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="documents-tab" data-bs-toggle="tab" data-bs-target="#documents" type="button" role="tab" aria-controls="documents" aria-selected="true"><i class="fa-solid fa-location"></i> Track</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="preferred-tab" data-bs-toggle="tab" data-bs-target="#preferred" type="button" role="tab" aria-controls="preferred" aria-selected="true"><i class="fa-solid fa-list"></i> Preferred List</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="container-fluid">
                <form method="post" id="customer_add" class="card" action="<?php echo base_url() . "users"; ?>">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">

                        <div class="row">
                            <div class="d-flex flex-row justify-content-center align-items-center mb-3">
                                <img id="uploadphoto" src="<?= base_url('assets/Slicing/userImage.png') ?>" alt="">
                                <input type="file" id="image" name="image" style="display: none;" />
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Facility Name</label>
                                    <input type="text" required="true" class="form-control" name="facilityname" placeholder="Facility Name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Representative Full Name</label>
                                    <input type="text" required="true" class="form-control" name="representativename" placeholder="Representative Name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select class="form-select" name="status" id="">
                                        <option value="0">Inactive</option>
                                        <option value="1" selected>Active</option>
                                    </select>
                                    <!-- <input type="text" required="true" class="form-control" name="php" placeholder="Per Hr Price" value="200"> -->
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Category</label>
                                    <select class="form-select" name="category">
                                        <option value="" disabled>Category</option>
                                        <option value="1">Hospitals</option>
                                        <option value="2">Nursing Homes</option>
                                        <option value="3">Retirement Homes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" required="true" class="form-control" name="address" placeholder="Address" value="Block 21, Street J2, Capital City, UK">
                                </div>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-md selfalign-center rounded-pill bg-custom-blue text-white px-5"> Save</button>
                    </div>
                </form>
            </div>
        </div>


        <div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="documents-tab">
            <div class="container-fluid">
                <div class="h-100">
                    <div class="d-flex flex-row justify-content-center align-items-center my-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInputValue" placeholder="Location" value="70 Blue Bonnet Drive ,Brampton">
                            <label for="floatingInputValue">Caregiver Home</label>
                        </div>
                        <div class="form-floating my-3 mx-2">
                            <input type="text" class="form-control" id="floatingInputValue" placeholder="Location" value="7281, Darvel Ave, Missisauga">
                            <label for="floatingInputValue">Client Home</label>
                        </div>
                    </div>
                    <div id="map-container-google-16" class="z-depth-1-half map-container-9" style="height: 400px">
                        <iframe src="https://maps.google.com/maps?q=40.7127837,-74.0059413&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade show active" id="cal" role="tabpanel" aria-labelledby="cal-tab">
            <div class="container-fluid">
                <!-- <div class="d-flex flex-row justify-content-end">
                    <i class="fa-solid fa-circle-plus text-custom-blue fa-3x mt-2" id="addevent" style="cursor: pointer;"></i>
                </div> -->
                <div id="calendar"></div>
                <!-- </div> -->
            </div>
        </div>

        <div class="tab-pane fade" id="preferred" role="tabpanel" aria-labelledby="preferred-tab">
            <div class="container-fluid">
                <div class="d-flex flex-row justify-content-end">
                    <ol class="float-right">
                        <button type="button" class="btn btn-sm bg-custom-blue text-white text-uppercase rounded-pill mt-1 p-2" data-toggle="modal" data-target="#preferredmodal">Add Staff</button>
                    </ol>
                </div>
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table id="custtbl" class="table card-table table-vcenter text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Staff Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Documents</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> John Player</td>
                                        <td> teststaff@gmail.com</td>
                                        <td> 03322554411</td>
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
        </div>


    </div>



</section>
<!-- /.content -->

<div class="modal hide fade" id="preferredmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; z-index:1051;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body d-flex flex-column justify-content-center align-items-center">
                <h3> Add to Preferred Staff</h3>
                <label for="">Choose Staff</label>
                <select class="js-example-basic-multiple" name="staffs[]" multiple="multiple" style="width: 10rem;">
                    <option value="0">John Player</option>
                    <option value="1">Staff 1</option>
                    <option value="2">Staff 2</option>
                    <option value="3">Staff 3</option>
                </select>
                <button type="button" class="btn btn-md bg-custom-blue rounded-pill mt-4" data-dismiss="modal">Proceed</button>
            </div>
        </div>
    </div>
</div>



<div class="modal hide fade" id="sendtomodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; z-index:1051;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body d-flex flex-column justify-content-center align-items-center">
                <h3> Send To</h3>
                <div class="row">
                    <div class="col-12 my-1">
                        <select class="js-example-basic-multiple" name="sendto[]" multiple="multiple" style="width: 10rem;" aria-placeholder="send to">
                            <!-- <option value="">Staff</option> -->
                            <option value="">All of the names of Staff</option>
                            <option value="">Preferred List</option>
                            <option value="">General Pool</option>
                        </select>
                    </div>
                </div>
                <button type="button" class="btn btn-md bg-custom-blue rounded-pill mt-4" data-dismiss="modal">Proceed</button>
            </div>
        </div>
    </div>
</div>



<div class="modal" id="assignModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;z-index:1050;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body d-flex flex-column justify-content-center align-items-center">
                <h3>Assignment</h3>
                <p class="text-secondary">Saturday, 23rd July, 2022</p>
                <div class="row">
                    <div class="col-6 my-1">
                        <select class="form-select" name="staff" placeholder="Staff">
                            <option value="">Staff</option>
                            <option value="">Staff 1</option>
                            <option value="">Staff 2</option>
                            <option value="">Staff 3</option>
                        </select>
                    </div>
                    <div class="col-6 my-1">
                        <select class="form-select" name="service" placeholder="Service">
                            <option value="">Service</option>
                            <option value="">Service 1</option>
                            <option value="">Service 2</option>
                            <option value="">Service 3</option>
                        </select>
                    </div>
                    <div class="col-12 my-1">
                        <select class="form-select" name="address" id="selectaddress">
                            <option value="">Facility Address</option>
                            <option value="newAddress">New Address</option>
                        </select>
                    </div>
                    <div class="col-12 my-1" id="addressdiv" style="display: none;">
                        <input type="text" class="form-control" name="newAddress" placeholder="New Address">
                    </div>

                    <div class="col-6 my-1">
                        <button class="btn btn-sm rounded-pill bg-primary" data-toggle="modal" data-target="#sendtomodal">Send to Staff</button>
                    </div>
                </div>
                <button type="button" class="btn btn-md bg-custom-blue rounded-pill mt-4">Submit Now</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $(".fc-day-top").click(function() {
            $("#assignModal").modal("show");
        });
        // $("#addevent").click(function() {
        //     $("#assignModal").modal("show");
        // });

        $('#selectaddress').on('change', function() {
            if ($(this).val() == "newAddress") {
                $('#addressdiv').show();
            } else {
                $('#addressdiv').hide();
            }
        });

        $('.js-example-basic-multiple').select2();
    });
</script>



<!-- <script src=<?= base_url('assets/calendar/') . "js/jquery-3.3.1.min.js" ?>></script> -->
<script src=<?= base_url('assets/calendar/') . "js/popper.min.js" ?>></script>
<script src=<?= base_url('assets/calendar/') . "js/bootstrap.min.js" ?>></script>

<script src=<?= base_url('assets/calendar/') . 'fullcalendar/packages/core/main.js' ?>></script>
<script src=<?= base_url('assets/calendar/') . 'fullcalendar/packages/interaction/main.js' ?>></script>
<script src=<?= base_url('assets/calendar/') . 'fullcalendar/packages/daygrid/main.js' ?>></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['interaction', 'dayGrid'],
            defaultDate: '2020-02-12',
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [{
                    title: 'All Day Event',
                    start: '2020-02-01'
                },
                {
                    title: 'Long Event',
                    start: '2020-02-07',
                    end: '2020-02-10'
                },
                {
                    groupId: 999,
                    title: 'Repeating Event',
                    start: '2020-02-09T16:00:00'
                },
                {
                    groupId: 999,
                    title: 'Repeating Event',
                    start: '2020-02-16T16:00:00'
                },
                {
                    title: 'Conference',
                    start: '2020-02-11',
                    end: '2020-02-13'
                },
                {
                    title: 'Meeting',
                    start: '2020-02-12T10:30:00',
                    end: '2020-02-12T12:30:00'
                },
                {
                    title: 'Lunch',
                    start: '2020-02-12T12:00:00'
                },
                {
                    title: 'Meeting',
                    start: '2020-02-12T14:30:00'
                },
                {
                    title: 'Happy Hour',
                    start: '2020-02-12T17:30:00'
                },
                {
                    title: 'Dinner',
                    start: '2020-02-12T20:00:00'
                },
                {
                    title: 'Birthday Party',
                    start: '2020-02-13T07:00:00'
                },
                {
                    title: 'Click for Google',
                    url: 'http://google.com/',
                    start: '2020-02-28'
                }
            ]
        });

        calendar.render();
    });
</script>

<script src=<?= base_url('assets/calendar/') . "js/main.js" ?>></script>

<script>
    $("#uploadphoto").click(function() {
        $("input[id='image']").click();
    });
</script>