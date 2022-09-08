<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <div class="img-profile ml-4">
          <img src="<?= base_url() ?>assets/uploads/newlogo1.png" class="img-circle img-fluid" style="height: 100px;width: 100px;">
        </div>
        <h1 class="m-0 text-dark"><?php echo (isset($blogdetails)) ? 'Edit Blog' : 'Edit Blog' ?>
        </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Blog</a></li>
          <li class="breadcrumb-item active"><?php echo (isset($blogdetails)) ? 'Edit Blog' : 'Edit Blog' ?></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <form method="post" id="Blog_add" class="card" action="<?php echo base_url() . "blog/updateblogdata/".$id; ?>" enctype="multipart/form-data">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Title" value="<?= $blogdetails['title'] ?>" required>
          </div>
        </div>
        <div class="row my-4">
          <div class="col">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" name="image">
          </div>
        </div>
        <div class="row my-4">
          <div class="col">
            <label class="form-label">Description</label>
            <div class="form-group">
              <textarea rows="4" name="description" class="form-control" placeholder="description"><?= $blogdetails['detail'] ?></textarea>
            </div>
          </div>
          
        </div>
        <hr>

        </div>
        
        <div class="modal-footer">

          <button type="submit" class="btn btn-primary"> <?php echo (isset($blogdetails)) ? 'Update Blog' : 'Update Blog' ?></button>
        </div>
      </div>
    </form>
  </div>
</section>
<!-- /.content -->