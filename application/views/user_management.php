<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6 col-md-4 d-flex flex-row justify-content-between">
            <h1 class="m-0 text-dark">User's List
            </h1>
            <div class="d-flex flex-row">
               <div class="dropdown">
                  <button class="btn bg-white border rounded-pill dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                     All Users
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                     <li><a class="dropdown-item" href="#">Clients</a></li>
                     <li><a class="dropdown-item" href="#">Staff</a></li>
                  </ul>
               </div>
            </div>
         </div>
         <!-- /.col -->
         <div class="col-sm-6 col-md-8">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
               <li class="breadcrumb-item active">User's List</li>
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
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td> 1</td>
                        <td> John Player</td>
                        <td> 0332211665</td>
                        <td>johnplayer@gmail.com</td>
                        <td><span class="badge <?php echo ($userlists['u_isactive'] == '1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($userlists['u_isactive'] == '1') ? 'Active' : 'Inactive'; ?></span>
                        </td>
                        <td>
                           <a class="icon" href="<?php echo base_url(); ?>dashboard/edituser">
                              <i class="fa fa-edit"></i>
                           </a>
                        </td>
                     </tr>
                     <?php if (!empty($userlist)) {
                        $count = 1;
                        foreach ($userlist as $userlists) {
                     ?>
                           <tr>
                              <td> <?php echo output($count);
                                    $count++; ?></td>
                              <td> <?php echo output($userlists['u_name']); ?></td>
                              <td> <?php echo output($userlists['u_username']); ?></td>
                              <td><?php echo output($userlists['u_email']); ?></td>
                              <td><span class="badge <?php echo ($userlists['u_isactive'] == '1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($userlists['u_isactive'] == '1') ? 'Active' : 'Inactive'; ?></span>
                              </td>
                              <td>
                                 <a class="icon" href="<?php echo base_url(); ?>users/edituser/<?php echo output($userlists['u_id']); ?>">
                                    <i class="fa fa-edit"></i>
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