<aside class="main-sidebar elevation-1 sidebar-dark-warning">
   <a href="<?= base_url(); ?>/dashboard" class="brand-link">
      <img src="<?= base_url() ?>assets/Slicing/Logo.png" class="brand-imag" style="float: left; max-height: 30px; width: auto; ">
      <!-- <span class="brand-text  font-weight-light">Travel Club</span> -->
   </a>
   <div class="sidebar">
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
               <a href="<?= base_url(); ?>dashboard" class="nav-link <?php echo activate_menu('dashboard'); ?>">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                     Dashboard
                  </p>
               </a>
            </li>
            <?php if (userpermission('lr_cust_list') || userpermission('lr_cust_add')) { ?>
               <li class="nav-item  has-treeview <?php echo ((activate_menu('customer')) == 'active') ? 'menu-open' : '' ?>
               <?php echo ((activate_menu('addcustomer')) == 'active') ? 'menu-open' : '' ?><?php echo ((activate_menu('editcustomer')) == 'active') ? 'menu-open' : '' ?>">
                  <a href="<?= base_url(); ?>users" class="nav-link <?php echo activate_menu('customer'); ?> <?php echo activate_menu('addcustomer'); ?><?php echo activate_menu('editcustomer'); ?>">
                     <i class="nav-icon fas fa-user"></i>
                     <p>
                        Client
                     </p>
                  </a>
               </li>
            <?php } ?>
            <?php if (userpermission('lr_cust_list') || userpermission('lr_cust_add')) { ?>
               <li class="nav-item  has-treeview <?php echo ((activate_menu('hotel')) == 'active') ? 'menu-open' : '' ?>
               <?php echo ((activate_menu('addhotel')) == 'active') ? 'menu-open' : '' ?><?php echo ((activate_menu('edithotel')) == 'active') ? 'menu-open' : '' ?>">
                  <a href="<?= base_url(); ?>staff" class="nav-link <?php echo activate_menu('hotel'); ?> <?php echo activate_menu('addhotel'); ?><?php echo activate_menu('edithotel'); ?>">
                     <!-- <i class="nav-icon fas fa-bed"></i> -->
                     <i class="nav-icon fa-solid fa-clipboard-user"></i>
                     <p>
                        Staff
                     </p>
                  </a>
               </li>
            <?php } ?>
            <?php if (userpermission('lr_cust_list') || userpermission('lr_cust_add')) { ?>
               <li class="nav-item  has-treeview <?php echo ((activate_menu('travel')) == 'active') ? 'menu-open' : '' ?>
               <?php echo ((activate_menu('addtravel')) == 'active') ? 'menu-open' : '' ?><?php echo ((activate_menu('edittravel')) == 'active') ? 'menu-open' : '' ?>">
                  <a href="#" class="nav-link <?php echo activate_menu('travel'); ?> <?php echo activate_menu('addtravel'); ?><?php echo activate_menu('edittravel'); ?>">
                     <i class="nav-icon fas fa-cog"></i>
                     <p>
                        Settings
                        <i class="right fas fa-angle-left"></i>
                     </p>
                  </a>
                  <ul class="nav nav-treeview">
                     <?php if (userpermission('lr_cust_list')) { ?>
                        <li class="nav-item">
                           <a href="<?= base_url('dashboard/'); ?>users" class="nav-link <?php echo activate_menu('users'); ?><?php echo activate_menu('edittravel'); ?>">
                              <i class="nav-icon fas faa-list"></i>
                              <p>Users</p>
                           </a>
                        </li>
                     <?php }
                     if (userpermission('lr_cust_add')) { ?>
                        <li class="nav-item">
                           <a href="<?= base_url(); ?>dashboard/services" class="nav-link <?php echo activate_menu('services'); ?>">
                              <i class="nav-icon fas faa-plus"></i>
                              <p>Services And Rates</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="<?= base_url(); ?>dashboard/categories" class="nav-link <?php echo activate_menu('categories'); ?>">
                              <i class="nav-icon fas faa-plus"></i>
                              <p>Categories</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="<?= base_url(); ?>dashboard/company" class="nav-link <?php echo activate_menu('companycontact'); ?>">
                              <i class="nav-icon fas faa-plus"></i>
                              <p>Company Contact</p>
                           </a>
                        </li>
                        <!-- <li class="nav-item">
                           <a href="<?= base_url(); ?>staff/preferredstaff" class="nav-link <?php echo activate_menu('preferredstaff'); ?>">
                              <i class="nav-icon fas faa-plus"></i>
                              <p>Preferred Staff List</p>
                           </a>
                        </li> -->

                     <?php } ?>
                  </ul>
               </li>
            <?php } ?>
            <?php if (userpermission('lr_cust_list') || userpermission('lr_cust_add')) { ?>
               <li class="nav-item  has-treeview <?php echo ((activate_menu('chatbox')) == 'active') ? 'menu-open' : '' ?>
               <?php echo ((activate_menu('addplace')) == 'active') ? 'menu-open' : '' ?><?php echo ((activate_menu('editplace')) == 'active') ? 'menu-open' : '' ?>">
                  <a href="#" class="nav-link <?php echo activate_menu('chatbox'); ?> <?php echo activate_menu('addplace'); ?><?php echo activate_menu('editplace'); ?>">
                     <i class="nav-icon fas fa-comment"></i>
                     <p>
                        Chat Box
                        <i class="right fas fa-angle-left"></i>
                     </p>
                  </a>
                  <ul class="nav nav-treeview">
                     <?php if (userpermission('lr_cust_list')) { ?>
                        <li class="nav-item">
                           <a href="<?= base_url(); ?>Chat" class="nav-link <?php echo activate_menu('inbox'); ?>">
                              <i class="nav-icon fas faa-list"></i>
                              <p>Inbox</p>
                           </a>
                        </li>
                     <?php }
                     if (userpermission('lr_cust_add')) { ?>
                        <li class="nav-item">
                           <a href="<?= base_url(); ?>Chat" class="nav-link <?php echo activate_menu('message'); ?>">
                              <i class="nav-icon fas faa-plus"></i>
                              <p>Individual Message</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="<?= base_url(); ?>Chat/groupchat" class="nav-link <?php echo activate_menu('groupchats'); ?>">
                              <i class="nav-icon fas faa-plus"></i>
                              <p>Group Chats</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="<?= base_url(); ?>Chat/teamchat" class="nav-link <?php echo activate_menu('teamchats'); ?>">
                              <i class="nav-icon fas faa-plus"></i>
                              <p>Team Chats</p>
                           </a>
                        </li>

                     <?php } ?>
                  </ul>
               </li>
            <?php } ?>
            <?php if (userpermission('lr_cust_list') || userpermission('lr_cust_add')) { ?>
               <li class="nav-item  has-treeview <?php echo ((activate_menu('invoice')) == 'active') ? 'menu-open' : '' ?>
               <?php echo ((activate_menu('addinvoice')) == 'active') ? 'menu-open' : '' ?><?php echo ((activate_menu('editinvoice')) == 'active') ? 'menu-open' : '' ?>">
                  <a href="<?= base_url(); ?>invoice" class="nav-link <?php echo activate_menu('invoice'); ?> <?php echo activate_menu('addinvoice'); ?><?php echo activate_menu('editinvoice'); ?>">
                     <i class="nav-icon fas fa-credit-card"></i>
                     <p>
                        Invoices
                     </p>
                  </a>
               </li>
            <?php } ?>
            <li class="nav-item">
               <a href="<?= base_url('dashboard/'); ?>geofence" class="nav-link <?php echo activate_menu('geofence'); ?>">
                  <i class="nav-icon fa-solid fa-map-location-dot"></i>
                  <p>
                     Geofence
                  </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="<?= base_url('dashboard/'); ?>faq" class="nav-link <?php echo activate_menu('faq'); ?>">
                  <i class="nav-icon fa-solid fa-book-open-reader"></i>
                  <p>
                     Guidelines
                  </p>
               </a>
            </li>

            <!-- <li class="nav-item">
               <a href="<?= base_url(); ?>Chat" class="nav-link">
                  <i class="nav-icon fa fa-comment"></i>
                  <p>
                     Chat
                  </p>
               </a>
            </li>

            <li class="nav-item">
               <a href="<?= base_url(); ?>resetpassword" class="nav-link <?php echo activate_menu('resetpassword'); ?>">
                  <i class="nav-icon fa fa-key"></i>
                  <p>
                     Change Password
                  </p>
               </a>
            </li -->>
         </ul>
      </nav>
   </div>
</aside>
<div class="content-wrapper pb-2 mb-0">