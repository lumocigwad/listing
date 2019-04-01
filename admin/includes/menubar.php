<style type="text/css">
  li{
    color: #ffffff;
  }
</style>
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar" >
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($admin['photo'])) ? '../images/'.$admin['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p style="color:#ffffff;"><?php echo $admin['firstname'].' '.$admin['lastname']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <div style="color: #ffffff;">
    <ul class="sidebar-menu "  data-widget="tree">
      <li class="header">REPORTS</li>
      <li><a href="home.php"><i class="fa fa-dashboard"></i> <span style="color:#ffffff;">Dashboard</span></a></li>
     <!--  <li><a href="sales.php"><i class="fa fa-money"></i> <span>Sales</span></a></li>-->
      <li class="header">MANAGE</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i>
          <span style="color:#ffffff;">Users</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-down pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="users.php" style="color:#ffffff;"><i class="fa fa-circle-o"></i> Users</a></li>
          <li><a href="land.php" style="color:#ffffff;"><i class="fa fa-circle-o"></i> Landlords</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-barcode"></i>
          <span style="color:#ffffff;">Hostels</span>
          <span class="pull-right-container" >
            <i class="fa fa-angle-down pull-right" ></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="products.php" style="color:#ffffff;"><i class="fa fa-circle-o"></i> Hostel list</a></li>
          <li><a href="category.php" style="color:#ffffff;"><i class="fa fa-circle-o"></i> Category</a></li>
        </ul>
      </li>
    </ul>
    </div>
  </section>
  <!-- /.sidebar -->
</aside>