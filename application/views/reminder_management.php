    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">reminder Info
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">reminder Info</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <div class="card">

        <div class="card-body p-0">
          

         <div class="table-responsive">
                    <table id="custtbl" class="table card-table table-vcenter ">
                      <thead>
                        <tr>
                          <th class="w-1">S.No</th>
                          <th>Driver</th>
                          <th>Date</th>
                          <th >Message</th>

                          <th>Action</th>

                        </tr>
                      </thead>
                      <tbody>
                      <?php if(!empty($reminderlist)){  $count=1;
                           foreach($reminderlist as $x=> $reminderlists){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                           <td> 

                            <?php echo (getusername($reminderlists['r_v_id'])); ?></td>
                           <td> <?php echo output($reminderlists['r_date']); ?></td>
                           <td><?php echo output($reminderlists['r_message']); ?></td>
                         
                           <td>
                            <a href="<?= base_url() . "reminder/editReminder/" . $x ?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                <a class="icon" href="<?php echo base_url(); ?>reminder/deletereminder/<?php echo output($x); ?>">
                              <i class="fa fa-trash text-danger"></i>
                            </a>
                          
                          </td>
                         
                        </tr>
                        <?php } } ?>
                      </tbody>
                    </table>
                   
        </div>         
        </div>
        <!-- /.card-body -->
      </div>
      
             </div>
    </section>
    <!-- /.content -->



