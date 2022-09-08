    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Paychecks Info
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">paychecks Info</li>
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
                          <th>Amount</th>
                          <th>Completion Time</th>
                          <th>Status</th>
                          <th>Type</th>
                          <th>Action</th>

                        </tr>
                      </thead>
                      <tbody>
                      <?php if(!empty($paychecks)){  $count=1;
                           foreach($paychecks as $x=> $paycheck){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                           <td> 

                            <?php echo (getusername($paycheck['driverId'])); ?></td>
                           <td> <?php echo output($paycheck['amount']); ?></td>
                           <td><?php echo date("Y-m-d h:i",$paycheck['completionTimeStamp']/1000); ?></td>
                           <td><?php echo output($paycheck['status']); ?></td>
                           <td><?php echo output($paycheck['type']); ?></td>
                         
                           <td>

                              <?php if ($paycheck['status'] == "unpaid") {
                                ?>
                                <a class="icon" href="<?php echo base_url(); ?>paychecks/releasePaycheck/<?php echo output($x); ?>">
                              <button class="btn btn-info btn-small">Release Payment</button>
                            </a>
                                <?php
                              } elseif($paycheck['status'] == "pending"){
                                ?>
                              <button class="btn btn-warning btn-small">Pending ...</button>
                              <?php
                              } else {
                                ?>
                                <button class="btn btn-success btn-small">Released</button>
                                <?php
                              }?>   
                            
                                
                          
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



