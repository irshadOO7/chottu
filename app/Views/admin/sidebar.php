<?php 
   $session = session();
   $login_array = $session->login_user;
   extract($login_array);
 ?>
   <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">
            <!--   <img alt="image" src="<?= base_url(); ?>/assets/img/logo.png" class="header-logo" /> -->
              <span class="logo-name text-success">Oyechhotu</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="">
              <a href="<?php echo site_url('dashboard')?>" class="nav-link "><i class="fas fa-home"></i><span>Dashboard</span></a>
            </li>
            <li class="">
              <a href="<?php echo site_url('admin/brand')?>" class="nav-link"><i class="fa fa-tag"></i><span>Brands</span></a>
            </li>
            <li class="active">
              <a href="<?php echo site_url('admin/categories') ?>" class="nav-link"><i class="fas fa-layer-group"></i><span>Categories</span></a>
            </li>
            <li class="">
              <a href="<?php echo site_url('admin/product') ?>" class="nav-link"><i class="fa fa-cubes"></i><span>Products</span><!-- <b class="fa fa-cart-arrow-down">New</b> --></a>
              <!-- <ul class="">
                <li><a class="nav-link" href="email-inbox.html">product1</a></li>
                <li><a class="nav-link" href="email-compose.html">product2</a></li>
                <li><a class="nav-link" href="email-read.html">product3</a></li></li>
              </ul> -->
            </li>
           <!--  <li class="menu-header">Components</li> -->
             <li class="">
              <a href="<?php echo site_url('admin/offer') ?>" class="nav-link "><i class="fa fa-percent"></i><span>Offers</span></a>
            </li>
             <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fa fa-user"></i><span>Customers</span></a>
               <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo site_url('admin/customers') ?>">Customer_detail</a></li>
                <li><a class="nav-link" href="<?php echo site_url('admin/customer_order') ?>">Customer_order </a></li>
              </ul>
            </li>
             <li class="">
              <a href="<?php echo site_url('admin/order') ?>" class="nav-link "><i class="fa fa-shopping-cart"></i><span>Order</span></a>
            </li>
             <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fa fa-inr"></i><span>Report</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo site_url('admin/sales_report') ?>">Sales Report</a></li>
                <li><a class="nav-link" href="#">Stock Report</a></li>
                <li><a class="nav-link" href="#">Product shortage Report</a></li>
              </ul>
            </li>
             <li class="">
              <a href="<?php echo site_url('admin/user') ?>" class="nav-link "><i class="fa fa-user-circle"></i><span>Users</span></a>
            </li> <li class="">
              <a href="<?php echo site_url('admin/change_pass') ?>" class="nav-link "><i class="fas fa-key"></i><span>Change Password</span></a>
            <a href="javascript:void(0)" data-id = "<?php echo $user_id; ?>" onclick = "logOut(this)">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
          </ul>
        </aside>
      </div>