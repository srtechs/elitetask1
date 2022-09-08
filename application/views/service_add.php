<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add Service</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form method="post" class="card" action="<?php echo base_url('dashboard/') . "services"; ?>">
            <div class="card-body d-flex flex-column justify-content-center align-items-center">

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" required="true" class="form-control" name="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="number" required="true" class="form-control" name="rate" placeholder="rate">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input type="text" required="true" class="form-control" name="description" placeholder="description">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-md selfalign-center rounded-pill bg-custom-blue text-white px-5"> Add Now</button>
            </div>
        </form>
    </div>
</section>
<!-- /.content -->