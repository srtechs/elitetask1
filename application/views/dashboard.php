<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard
            </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Home</a></li>
               <li class="breadcrumb-item active">Dashboard</li>
            </ol>
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
         <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
               <img src="<?= base_url('assets/Slicing/User.png') ?>" alt="">
               <!-- <span class="info-box-icon bg-success elevation-1"><a href="<?= base_url('Customer'); ?>"><i class="fa fa-user-secret"></i></a></span> -->
               <div class="info-box-content">
                  <span class="info-box-text">User</span>
                  <span class="info-box-number"><?= $usersCount ?> </span>
               </div>
               <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
         </div>
         <!-- /.col -->
         <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
               <img src="<?= base_url('assets/Slicing/StaffMember.png') ?>" alt="">
               <!-- <span class="info-box-icon bg-success elevation-1"><a href="<?= base_url('Hotel'); ?>"><i class="fa fa-bed"></i></a></span> -->
               <div class="info-box-content">
                  <span class="info-box-text">Staff Member</span>
                  <span class="info-box-number"><?= $hotelsCount ?> </span>
               </div>
               <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
         </div>
         <!-- /.col -->
         <!-- fix for small devices only -->
         <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
               <img src="<?= base_url('assets/Slicing/PreferredStaff.png') ?>" alt="">
               <!-- <span class="info-box-icon bg-warning elevation-1"><a href="<?= base_url('Booking'); ?>"><i class="fa fa-id-card text-white"></a></i></span> -->
               <div class="info-box-content">
                  <span class="info-box-text">Preferred Staff</span>
                  <span class="info-box-number"><?= $bookingsCount ?> </span>
               </div>
               <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
         </div>
         <!-- /.col -->
         <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
               <img src="<?= base_url('assets/Slicing/AssignedJobs.png') ?>" alt="">
               <!-- <span class="info-box-icon bg-danger elevation-1"><a href="<?= base_url('Booking/today'); ?>"><i class="fas fa-id-card"></a></i></span> -->
               <div class="info-box-content">
                  <span class="info-box-text">Assigned Jobs</span>
                  <span class="info-box-number"><?= $bookingsTodayCount ?></span>
               </div>
               <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- /.row -->
      <!-- <div class="row">-->
      <div class="row col-md-12">
         <div class="col-md-6">
            <div class="card">
               <div class="card-header">
                  <h2 class="card-title">Income and Expenses</h2>
               </div>
               <div class="card-header border-transparent">
                  <div class="card-body">
                     <div class="d-flex">
                        <p class="d-flex flex-column">
                        </p>
                        <p class="ml-auto d-flex flex-column text-right">
                           <span class="text-success">
                           </span>
                        </p>
                     </div>
                     <div class="position-relative mb-4">
                        <div class="chartjs-size-monitor">
                           <div class="chartjs-size-monitor-expand">
                              <div class=""></div>
                           </div>
                           <div class="chartjs-size-monitor-shrink">
                              <div class=""></div>
                           </div>
                        </div>
                        <canvas id="ie-chart" height="200" width="487" class="chartjs-render-monitor" style="display: block; width: 487px; height: 286px;"></canvas>
                     </div>
                     <div class="d-flex flex-row justify-content-end">
                        <span class="mr-2">
                           <i class="fas fa-square text-success"></i> Income
                        </span>
                        <span>
                           <i class="fas fa-square text-danger"></i> Expense
                        </span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="card">
               <div class="card-header ui-sortable-handle" style="cursor: move;">
                  <h3 class="card-title">
                     <i class="ion ion-clipboard mr-1"></i>
                     Calendar
                  </h3>
                  <div class="card-tools">
                  </div>
               </div>
               <div class="card-body">
                  <div class="container-calendar">
                     <div class="calendar">
                        <div class="front">
                           <div class="current-month">
                              <ul class="week-days">
                                 <li>MON</li>
                                 <li>TUE</li>
                                 <li>WED</li>
                                 <li>THU</li>
                                 <li>FRI</li>
                                 <li>SAT</li>
                                 <li>SUN</li>
                              </ul>

                              <div class="weeks">
                                 <div class="first">
                                    <span class="last-month">28</span>
                                    <span class="last-month">29</span>
                                    <span class="last-month">30</span>
                                    <span class="last-month">31</span>
                                    <span>01</span>
                                    <span>02</span>
                                    <span>03</span>
                                 </div>

                                 <div class="second">
                                    <span>04</span>
                                    <span>05</span>
                                    <span class="event">06</span>
                                    <span>07</span>
                                    <span>08</span>
                                    <span>09</span>
                                    <span>10</span>
                                 </div>

                                 <div class="third">
                                    <span>11</span>
                                    <span>12</span>
                                    <span>13</span>
                                    <span>14</span>
                                    <span class="active">15</span>
                                    <span>16</span>
                                    <span>17</span>
                                 </div>

                                 <div class="fourth">
                                    <span>18</span>
                                    <span>19</span>
                                    <span>20</span>
                                    <span>21</span>
                                    <span>22</span>
                                    <span>23</span>
                                    <span>24</span>
                                 </div>

                                 <div class="fifth">
                                    <span>25</span>
                                    <span>26</span>
                                    <span>27</span>
                                    <span>28</span>
                                    <span>29</span>
                                    <span>30</span>
                                    <span>31</span>
                                 </div>
                              </div>
                           </div>
                        </div>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col">
            <div class="card">
               <div class="card-header ui-sortable-handle" style="cursor: move;">
                  <h3 class="card-title">
                     <i class="ion ion-clipboard mr-1"></i>
                     Assigned Jobs
                  </h3>
                  <div class="card-tools">
                  </div>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table id="custtbl" class="table card-table table-vcenter ">
                        <thead>
                           <tr>
                              <th class="w-1">Staff Name</th>
                              <th>Location</th>
                              <th>User</th>
                              <th>Date & Time</th>
                              <th>Price</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if (!empty($reminderlist)) {
                              $count = 1;
                              foreach ($reminderlist as $x => $reminderlists) {
                           ?>
                                 <tr>
                                    <td> <?php echo output($count);
                                          $count++; ?></td>
                                    <td>

                                       <?php echo (getusername($reminderlists['r_v_id'])); ?></td>
                                    <td> <?php echo output($reminderlists['r_date']); ?></td>
                                    <td><?php echo output($reminderlists['r_message']); ?></td>

                                    <td>

                                       <a class="icon" href="<?php echo base_url(); ?>reminder/deletereminder/<?php echo output($x); ?>">
                                          <i class="fa fa-trash text-danger"></i>
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
      </div>

   </div>
   </div>
</section>
</div>
<script src="<?php echo base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>

<?php if (userpermission('lr_ie_list')) { ?>
   <script>
      var ticksStyle = {
         fontColor: '#495057',
         fontStyle: 'bold'
      }
      var mode = 'index';
      var intersect = true;
      var $visitorsChart = $('#ie-chart')
      var visitorsChart = new Chart($visitorsChart, {
         data: {
            labels: <?= "['" . implode("', '", array_keys($iechart)) . "']" ?>,
            datasets: [{
                  type: 'bar',
                  data: <?= "['" . implode("', '", array_column($iechart, 'income')) . "']" ?>,
                  backgroundColor: '#28a745',
                  borderColor: '#28a745',
                  pointBorderColor: '#28a745',
                  pointBackgroundColor: '#28a745',
                  fill: false
                  // pointHoverBackgroundColor: '#007bff',
                  // pointHoverBorderColor    : '#007bff'
               },
               {
                  type: 'bar',
                  data: <?= "['" . implode("', '", array_column($iechart, 'expense')) . "']" ?>,
                  backgroundColor: '#dc3545',
                  borderColor: '#dc3545',
                  pointBorderColor: '#dc3545',
                  pointBackgroundColor: '#dc3545',
                  fill: false
                  // pointHoverBackgroundColor: '#ced4da',
                  // pointHoverBorderColor    : '#ced4da'
               }
            ]
         },
         options: {
            maintainAspectRatio: false,
            tooltips: {
               mode: mode,
               intersect: intersect
            },
            hover: {
               mode: mode,
               intersect: intersect
            },
            legend: {
               display: false
            },
            scales: {
               yAxes: [{
                  // display: false,
                  gridLines: {
                     display: true,
                     lineWidth: '4px',
                     color: 'rgba(0, 0, 0, .2)',
                     zeroLineColor: 'transparent'
                  },
                  ticks: $.extend({
                     beginAtZero: true,
                     suggestedMax: 200
                  }, ticksStyle)
               }],
               xAxes: [{
                  display: true,
                  gridLines: {
                     display: false
                  },
                  ticks: ticksStyle
               }]
            }
         }
      })
   </script> <?php } ?>