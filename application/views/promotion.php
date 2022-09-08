    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Send Promotions to Drivers or Clients
            </h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <button type="button" class="btn btn-primary float-right mb-4" data-toggle="modal" data-target="#exampleModal">Add Promotion</button>

        <div class="promotion-form-data mt-4">

          <table class="table">
            <thead>
              <tr>
                <th scope="col">Title</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Amount</th>
                <th scope="col">No of Rides</th>
                <th scope="col">Message</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody class="promotion-form-table-body">
              <?php if (!empty($promotions)) {
                foreach ($promotions as $id => $promotion) {
                  ?>
              <tr>
                <td scope="col"><?= $promotion["title"] ?></td>
                <td scope="col"><?= date("Y-m-d H:i",$promotion["startTime"]/1000) ?></td>
                <td scope="col"><?= date("Y-m-d H:i",$promotion["endTime"]/1000) ?></td>
                <td scope="col"><?= $promotion["amount"] ?></td>
                <td scope="col"><?= $promotion["noOfTrips"] ?></td>
                <td scope="col"><?= $promotion["message"] ?></td>
                <td scope="col">
                  <a href="<?= base_url() . "promotion/editPromotion/" . $id ?>"><i class="fa fa-edit" aria-hidden="true"></i></a><a href="<?= base_url() . "promotion/deletePromotion/" . $id ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
              </tr>
              <?php
                }
              } ?>
            </tbody>
          </table>

        </div><!-- /.promotion-form-data -->

      </div>
    </section>
    <!-- /.content -->

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="promotion/addPromotion" enctype="multipart/form-data"  id="promotion-form" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="promtion-form-wrapper">

            <div class="form-group">
              <label class="input-title">Title</label>
              <input type="text" class="form-control" name="title" id="title">
            </div>

            <div class="form-group">
              <label class="input-title">Start Date</label>
              <input type="date" class="form-control" name="startTime" id="startdate">
            </div>

            <div class="form-group">
              <label class="input-title">End Date</label>
              <input type="date" class="form-control" name="endTime" id="enddate">
            </div>

            <div class="form-group">
              <label class="input-title">Amount</label>
              <input type="text" class="form-control" name="amount" id="amount" >
            </div>

            <div class="form-group">
              <label class="input-title">Number of Rides</label>
              <input type="text" class="form-control" name="noOfTrips" id="noofrides">
            </div>

            <div class="form-group">
              <label class="input-title">Message</label>
              <textarea class="form-control d-block"  rows="3" name="message" id="message"></textarea>
            </div>
            <div class="form-group">
                    <label>File</label>
                    <input type="file" class="form-control "  id="file" name="file" placeholder="Enter Date" autocomplete="off">
                  </div>
               

        </div><!-- /.promtion-form-wrapper -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Proceed</button>
      </div>
      </form>
    </div>
  </div>
</div>


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

<script>

  $("#promotion-form").submit(function(e){

    // getting all data from form

    var title = $("#title").val();
    var startdate = $("#startdate").val();
    var enddate = $("#enddate").val();
    var amount = $("#amount").val();
    var noofrides = $("#noofrides").val();
    var message = $("#message").val();

    // getting table body 

    var tableBody=$(".promotion-form-table-body");

    // checking if any field is null or not?

    if(title=="")
    {
      document.getElementById('title').style.border='2px solid red';
    }else{
      document.getElementById('title').style.border='2px solid #ccd0d5';
    }

    if(startdate=="")
    {
      document.getElementById('startdate').style.border='2px solid red';
    }else{
      document.getElementById('startdate').style.border='2px solid #ccd0d5';
    }

    if(enddate=="")
    {
      document.getElementById('enddate').style.border='2px solid red';
    }else{
      document.getElementById('enddate').style.border='2px solid #ccd0d5';
    }

    if(amount=="")
    {
      document.getElementById('amount').style.border='2px solid red';
    }else{
      document.getElementById('amount').style.border='2px solid #ccd0d5';
    }

    if(noofrides=="")
    {
      document.getElementById('noofrides').style.border='2px solid red';
    }else{
      document.getElementById('noofrides').style.border='2px solid #ccd0d5';
    }

    if(message=="")
    {
      document.getElementById('message').style.border='2px solid red';
    }else{
      document.getElementById('message').style.border='2px solid #ccd0d5';
    }

    // setting data into the table
    if(title!=="" && startdate!=="" && enddate!=="" && amount!=="" && noofrides!=="" && message!=="")
    {
      $('#promotion-form').submit();
    } else {
          e.preventDefault();
    }

  })


</script>


