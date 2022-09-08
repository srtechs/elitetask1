    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Employee Information
            </h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <button type="button" class="btn btn-primary float-right mb-4" data-toggle="modal" data-target="#exampleModal">Add Employee</button>

        <div class="promotion-form-data mt-4">

          <table class="table">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Position</th>
                <th scope="col">ID No.</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Address</th>
                <th scope="col">City</th>
                <th scope="col">Action</th>

              </tr>
            </thead>
            <tbody class="promotion-form-table-body">
              <?php if (!empty($employs)) {
                foreach ($employs as $id => $employee) {
                  ?>
              <tr>
                <td scope="col"><?= $employee["firstName"] . " " . $employee["lastName"] ?></td>
                <td scope="col"><?= $employee["position"] ?></td>
                <td scope="col"><?= $employee["idNo"] ?></td>
                <td scope="col"><?= $employee["email"] ?></td>
                <td scope="col"><?= $employee["phoneNumber"] ?></td>
                <td scope="col"><?= $employee["address"] ?></td>
                <td scope="col"><?= $employee["city"] ?></td>
                <td scope="col"><a href="<?php echo base_url().'Employee/delete_employee/'.$id; ?>">Delete</a></td>
              </tr>
              <?php
                }
              } else {
                ?>
                <tr>
                  <span>No Employs to show</span>
                </tr>
              <?php
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
      <form action="employee/addEmployee" id="promotion-form" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
                  
                  <div class="row">
                    
                    <div class="col-sm-6 col-md-3">
                        <label class="form-label">Frist Name<span class="form-required">*</span></label>
                      <div class="form-group">
                        <input type="text" name="firstName" id="d_name" class="form-control" placeholder="Frist Name" >
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Last Name<span class="form-required">*</span></label>
                        <input type="text" name="lastName" class="form-control" placeholder="Last Name" >
                      </div>
                    </div>
                    
                     <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Position<span class="form-required">*</span></label>
                        <input type="text" name="position" class="form-control" placeholder="Position" >
                      </div>
                    </div>
                    
                     <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Employee ID number<span class="form-required">*</span></label>
                        <input type="text" name="idNo" class="form-control" placeholder="Employee ID number" >
                      </div>
                    </div>
                    
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Email<span class="form-required">*</span></label>
                        <input type="email" name="email" class="form-control" placeholder="Email" >
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Phone Number<span class="form-required">*</span></label>
                        <input type="tel" name="phoneNumber" class="form-control" placeholder="Phone Number" >
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Address<span class="form-required">*</span></label>
                        <input type="text" name="address" class="form-control " placeholder="Address" >
                      </div>
                    </div>
                    
                     <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">City<span class="form-required">*</span></label>
                        <input type="text" name="city" class="form-control " placeholder="City" >
                      </div>
                    </div>
                    
                     <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">State<span class="form-required">*</span></label>
                        <input type="text" name="state" class="form-control " placeholder="State" >
                      </div>
                    </div>
                    
                      <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Zip Code<span class="form-required">*</span></label>
                        <input type="text" name="zipCode" class="form-control " placeholder="Zip Code" >
                      </div>
                    </div>
                    
                    
                
                   
                </div>
                  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Proceed</button>
      </div>
      </form>
    </div>
  </div>
</div>


