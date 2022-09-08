<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-4 d-flex flex-row justify-content-between">
                <h1 class="m-0 text-dark">Staff Documents
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
                                <th>Staff Name</th>
                                <th>Location</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date & Time</th>
                                <th>Document</th>
                            </tr>
                        </thead>
                        <tbody>
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