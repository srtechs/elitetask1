<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add Client</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form method="post" id="customer_add" class="card" action="<?php echo base_url() . "users/insertcustomer"; ?>">
            <div class="card-body d-flex flex-column justify-content-center align-items-center">

                <div class="row">
                    <div class="d-flex flex-row justify-content-center align-items-center mb-3">
                        <img id="uploadphoto" src="<?= base_url('assets/Slicing/addPhoto.png') ?>" alt="">
                        <input type="file" id="image" name="image" style="display: none;" />
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" required="true" class="form-control" name="facilityName" placeholder="Facility Name">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" required="true" class="form-control" name="representativeName" placeholder="Representative Full Name">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="email" required="true" class="form-control" name="email" placeholder="Representative Full Name">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="password" required="true" class="form-control" name="password" placeholder="Representative Full Name">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <select class="form-select" name="isActive" id="">
                                <option value="" selected disabled>Status</option>
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <select class="form-select" name="category">
                                <option value="" disabled selected>Category</option>
                                <option value="Hospitals">Hospitals</option>
                                <option value="Nursing Homes">Nursing Homes</option>
                                <option value="Retirement Homes">Retirement Homes</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <select class="form-control form-select" required="true" name="province">
                                <option value="" disabled selected>Province</option>
                                <option value="Alberta">Alberta</option>
                                <option value="British Columbia">British Columbia</option>
                                <option value="Manitoba">Manitoba</option>
                                <option value="New Brunswick">New Brunswick</option>
                                <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
                                <option value="Nova Scotia">Nova Scotia</option>
                                <option value="Ontario">Ontario</option>
                                <option value="Prince Edward Island">Prince Edward Island</option>
                                <option value="Quebec">Quebec</option>
                                <option value="Saskatchewan">Saskatchewan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" required="true" class="form-control" name="address" placeholder="Address">
                        </div>
                    </div>

                </div>

                <button type="submit" class="btn btn-md selfalign-center rounded-pill bg-custom-blue text-white px-5"> Save</button>
            </div>
        </form>
    </div>
</section>
<!-- /.content -->

<script>
$("#uploadphoto").click(function() {
    $("input[id='image']").click();
});
</script>