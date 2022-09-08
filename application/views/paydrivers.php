    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Pay Driver
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Pay Driver</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
              <form method="post" id="paymentToDriver" class="card" action="<?php echo base_url();?>paydrivers/addPayment">  
        
     <div class="row">              
 <div class="col-sm-3"></div>
 <div class="col-sm-6 col-md-offset-2 ">



    <div class="card-body">
                         <input type="hidden" name="stripeCustid" data-name="stripeCustid">
                         <input type="hidden" name="stripeaccount_id" data-name="stripeaccount_id">
                         <input type="hidden" name="stripeStatus" data-name="stripeStatus">
                         <input type="hidden" name="email" data-name="email">

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                             <label class="form-label">Driver<span class="form-required">*</span></label>
                             <select data-name="id"  class="form-control selectized"   name="id" onchange="fetchDriverData(this.value)">
                                <option value="">Select Driver</option>
                                <?php  foreach ($drivers as $key => $driver) { 
                                  ?>
                                <option value="<?php echo $key ?>"><?php echo output($driver['firstName']).' '. output($driver['lastName']); ?></option>
                                <?php  } ?>
                             </select>
                          </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" disabled data-name="email" placeholder="" autocomplete="off">
                          </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Stripe Customer ID</label>
                            <input type="text" class="form-control" disabled data-name="stripeCustid" placeholder="" autocomplete="off">
                          </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Stripe Account ID</label>
                            <input type="text" class="form-control" disabled id="stripeaccount_id" data-name="stripeaccount_id" placeholder="" autocomplete="off">
                          </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Stripe Status</label>
                            <input type="text" class="form-control" disabled data-name="stripeStatus" autocomplete="off">
                          </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="number" step="0.01" class="form-control" data-name="amount" id="amount" name="amount" placeholder="Amount" autocomplete="off">
                          </div>
                    </div>
                </div>
                  
                  
                  


                   <div class="form-group">
                    <label>Note</label>
                   <textarea class="form-control" autocomplete="off" placeholder="Add Note"  name="message"></textarea>
                  </div>
                  <div class="form-group">
                    <p id="error_text" style="color:red"></p>
                  </div>

               
                   <div class="modal-footer">

                  <button type="submit" class="btn btn-primary paybutton">Pay</button>
                 </div>

                </div>
              </div>
</div>
    </form>
             </div>
    </section>
    <!-- /.content -->


<script>
    function fetchDriverData(id) {
        $.ajax({
          url: "<?php echo base_url('paydrivers/fetchDriverData'); ?>",
          method: 'post',
          data: {
            id: id
          },
          dataType: 'json',
          cache: false,
          success: function(result) {
            console.log(result);
            if (result.success == 1) {
              if (result.data != null) {
                $('[data-name="stripeCustid"]').val(result.data.stripeCustid);
                $('[data-name="stripeaccount_id"]').val(result.data.stripeaccount_id);
                $('[data-name="stripeStatus"]').val(result.data.stripeStatus);
                $('[data-name="email"]').val(result.data.email);
              } else {
                $('[data-name="rainfall"]').text('-');
              }
            } else {
              console.log('Error occured');
            }
          },
          error: function(err) {
            alert("Something went wrong. Check console");
            console.log(err["responseText"]);
            $('.loader').hide();
          }
        });    
    
    }
    $(".paybutton").click(function(){
 // alert("The paragraph was clicked.");
  var seleteduser=$(".selectized").val();
  var amount=$("#amount").val();
  if(seleteduser ==""){
    $("#error_text").text("please select user");
  }
else if(amount ==""){
    $("#error_text").text("please select amount");
  }
  else if(parseInt(amount) <=0 ){
   $("#error_text").text("amount must be grether then zeto"); 
  }



  else{
        var settings = {
  "url": "https://us-central1-myclientsapp-16171.cloudfunctions.net/widgets/paymenttransfer",
  "method": "POST",
  "timeout": 0,
  "headers": {
    "Content-Type": "application/json"
  },
  "data": JSON.stringify({
    "accountno": $("#stripeaccount_id").val(),
    "amount": parseInt($("#amount").val())*100
  }),
};

$.ajax(settings).done(function (response) {
  console.log(response);
console.log(response.success)
    
if(response.success==1){
  $("#error_text").text("Transfer Suceess").delay(5000).fadeOut('slow');;
  $("#error_text").css("color","green");
$("#paymentToDriver").trigger("reset");

}else{
  $("#error_text").text("Transfer Fail").delay(5000).fadeOut('slow');;
}





});



  }






  return false;

});





    
</script>
