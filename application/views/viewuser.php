<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">User Info</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form method="post" id="customer_add" class="card" action="<?php echo base_url() . "users"; ?>">
            <div class="card-body d-flex flex-column justify-content-center align-items-center">

                <div class="row">

                    <div class="col-6">
                        <div class="form-group">
                            <input type="email" required="true" class="form-control" name="email" placeholder="Email" value="johnplayer@gmail.com">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" required="true" class="form-control" name="password" placeholder="password" value="password">
                        </div>
                    </div>

                </div>

                <button type="submit" class="btn btn-md selfalign-center rounded-pill bg-custom-blue text-white px-5"> Update</button>
            </div>
        </form>
    </div>
</section>
<!-- /.content -->