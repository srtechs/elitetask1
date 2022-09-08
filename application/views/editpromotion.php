<style>

  .promtion-form-wrapper form{
    width:500px;
  }

  .promtion-form-wrapper form .input-title{
    margin-bottom:4px;
  }

  .promtion-form-wrapper .form-control{
    background-color: #F5F6F7;
    border: 2px solid #ccd0d5;
    font-size:18px;
  }

  .promtion-form-wrapper .form-control:focus{
    border-color:#ccd0d5;
  }

  .promtion-form-wrapper form .form-btns .btn{
    background-color:#343a40;
    color:#c2c7d0;
    font-size:18px;
    font-weight:600;
  }

</style>

<?php
// echo "<pre>";
// print_r($promotions);
// echo "</pre>";

 ?>

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

        <div class="col-offset-2 col-8 promtion-form-wrapper">
        <form  enctype="multipart/form-data" action="<?php echo base_url(); ?>promotion/updatepermotiondata/<?php echo $id ?>" id="" method="post">
<div class="form-group">
  <label class="input-title">Title</label>
  <input type="text" class="form-control" name="title" value="<?php echo $promotions['title']; ?>" id="title">
  <input type="hidden" class="form-control" name="id"  value="<?php echo $promotions['id']; ?>">
  
</div>

<div class="form-group">
  <label class="input-title">Start Date <?php echo ($promotions['startTime']); ?></label>
  <input type="date" class="form-control" name="startTime" value="<?php echo convertTimeinMonth($promotions['startTime']); ?>" id="startdate">
</div>

<div class="form-group">
  <label class="input-title">End Date</label>
  <input type="date" class="form-control" name="endTime" value="<?php echo convertTimeinMonth($promotions['endTime']); ?>" id="enddate">
</div>

<div class="form-group">
  <label class="input-title">Amount</label>
  <input type="text" class="form-control" name="amount" value="<?php echo $promotions['amount']; ?>" id="amount" >
</div>

<div class="form-group">
  <label class="input-title">Number of Rides</label>
  <input type="text" class="form-control" name="noOfTrips" value="<?php echo $promotions['noOfTrips']; ?>" id="noofrides">
</div>

<div class="form-group">
  <label class="input-title">Message</label>
  <textarea class="form-control d-block"  rows="3" name="message" id="message"><?php echo $promotions['message']; ?></textarea>
</div>

 <div class="form-group">
                    <label>Image</label>
                    <?php if((isset($promotions['url'])) && $promotions['url']!="" ){?>
                      <img src="<?php echo $promotions['url']; ?>" class="img-thumbnail"/>

                    <?php } ?>
                   
                  </div>

<div class="form-group">
                    <label>File</label>
                    <input type="file" class="form-control "  id="file" name="file" placeholder="Enter Date" autocomplete="off">
                  </div>
               

<button type="submit" class="btn btn-primary">Proceed</button>
</div><!-- /.promtion-form-wrapper -->
</form>      

</div>


    </div>
</div>