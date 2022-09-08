<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">EMERGENCY  Info
            </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
               <li class="breadcrumb-item active">EMERGENCY  Info</li>
            </ol>
         </div>
      </div>
   </div>
</div>
<section class="content">
   <div class="container-fluid">
      <div class="card">
         <div class="card-body p-0">
            <div class="table-responsive">
               <table id="custtbl" class="table card-table table-vcenter text-nowrap">
                  <thead>
                     <tr>
                        <th class="w-1">S.No</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Vehicle Make</th>
                        <th>Vehicle Model</th>
                        <th>License Plate Number</th>
                        <th>User  Name</th>
                        <th>Phone Number</th>
                        <th>Pickup location</th>
                        <th>Drop off location</th>
                        <th>Action</th>
                       
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     if (!empty($customerlist)) {
                        $count = 1;
                        foreach ($customerlist as $id => $customerlists) {
                          // echo $id;
                          $id= str_replace("ncy/","",$id);
                     ?>
                           <tr>
                              <td> <?php echo output($count);
                                    $count++; ?></td>
                              <td> <?php echo output($customerlists['driverName']); ?></td>
                              <td> <?php echo output($customerlists['driverPhoneNumber']); ?></td>
                              
                              <td><?php echo output($customerlists['homeAddress']); ?></td>
                              <td><?php echo output($customerlists['make']); ?></td>
                              <td><?php echo output($customerlists['model']); ?></td>
                              <td><?php echo output($customerlists['year']); ?></td>
                              <td><?php echo output($customerlists['tagNumber']);?>
                                 <br>
                                   <?php if((isset($customerlists['licenseUrl'])) && $customerlists['licenseUrl']!="" ){?>
                      <img src="<?php echo $customerlists['licenseUrl']; ?>" class="img-thumbnail"/>

                    <?php } ?>


                              </td>
                              <td><?php echo output($customerlists['userName']); ?></td>
                              <td><?php echo output($customerlists['userPhoneNumber']); ?></td>
                               <td><?php echo output($customerlists['tripDetail']['pickUp']['address']); ?></td>
                              <td><?php 
                                    for($i=0;$i<count($customerlists['tripDetail']['destinations']);$i++){
                              echo output($customerlists['tripDetail']['destinations'][$i]['address']); 
                                 echo "<br>";
                           }
                           ?></td>

                              

                               
                                 <td>
                                       
                                    <a class="icon" href="<?php echo base_url(); ?>trips/deleteEmergency/<?php echo output($id); ?>">
                                       <button class="btn btn-danger btn-block mt-2" >Delete</button>
                                    </a>
                                 </td>

                           </tr>

                     <?php }
                     } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</section>