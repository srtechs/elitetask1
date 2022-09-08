    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($reminderdetails))?'Edit Reminder':'Add Reminder' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Reminder</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($reminderdetails))?'Edit Reminder':'Add Reminder' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	      <form  enctype="multipart/form-data" method="post" id="reminder_add" class="card" action="<?php echo base_url();?>reminder/<?php echo (isset($reminderdetails))?'updatereminder':'insertreminder'; ?>/<?php echo $id; ?>">  
        
     <div class="row">              
 <div class="col-sm-3"></div>
 <div class="col-sm-6 col-md-offset-2 ">



    <div class="card-body">
                         

                
                  <div class="form-group">
                     <label class="form-label">Driver<span class="form-required">*</span></label>
                     <select id="r_v_id"  class="form-control selectized"  name="r_v_id" >
                        <option value="">Select Driver</option>
                        <?php  foreach ($vechiclelist as $key => $vechiclelists) { 


                          ?>
               


                        <option <?php if((isset($reminderdetails)) && $reminderdetails['r_v_id'] == $key){ echo 'selected';} ?> value="<?php echo $key ?>"><?php echo output($vechiclelists['firstName']).' - '. output($vechiclelists['lastName']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
                  

                  <div class="form-group">
                    <label>Date</label>
                    <input type="text" class="form-control datepickerpastdisable" required="true" value="<?php echo (isset($reminderdetails)) ? $reminderdetails['r_date']:'' ?>" id="r_date" name="r_date" placeholder="Enter Date" autocomplete="off">
                  </div>


                   <div class="form-group">
                    <label>Message</label>
                   <textarea class="form-control" id="r_message" autocomplete="off" placeholder="Message"  name="r_message"><?php echo (isset($reminderdetails)) ? $reminderdetails['r_message']:'' ?></textarea>
                  </div>

                   <div class="form-group">
                    <label>Image</label>
                    <?php if((isset($reminderdetails['url'])) && $reminderdetails['url']!="" ){?>
                      <img src="<?php echo $reminderdetails['url']; ?>" class="img-thumbnail"/>

                    <?php } ?>
                   
                  </div>

<div class="form-group">
                    <label>File</label>
                    <input type="file" class="form-control "  id="file" name="file" placeholder="Enter Date" autocomplete="off">
                  </div>
               
                   <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($reminderdetails))?'Update reminder':'Add reminder' ?></button>
                 </div>

                </div>
              </div>
</div>
    </form>
             </div>
    </section>
    <!-- /.content -->



