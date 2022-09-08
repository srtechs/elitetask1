<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add Category</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form method="post" class="card" action="<?php echo base_url('dashboard/') . "categories"; ?>">
            <div class="card-body d-flex flex-column justify-content-center align-items-center">

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" required="true" class="form-control" name="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" required="true" class="form-control" name="description" placeholder="description">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <select class="form-select" name="status" id="">
                                <option value="" disabled>Status</option>
                                <option value="0">Inactive</option>
                                <option value="1" selected>Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <select class="form-select" name="type">
                                <option value="" disabled>Type</option>
                                <option value="0">Client</option>
                                <option value="1" selected>Staff</option>
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-md selfalign-center rounded-pill bg-custom-blue text-white px-5"> Save</button>
            </div>
        </form>
    </div>
</section>
<!-- /.content -->