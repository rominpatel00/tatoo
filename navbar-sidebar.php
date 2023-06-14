  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
<?php 
  session_start();
    if(isset($_POST['logout'])){
      session_unset();
      session_destroy();
      header("Location: index.php");
    }
  
    if(!isset($_SESSION["login_user"])){
      echo "<script>window.location.href='index.php';</script>";
    }
    $role = $_SESSION["user_type"];
?>
     

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
        </ul>
        <div class="alert alert-danger  p-1 mb-0" role="alert">
        <?php
                        include "config.php";
                        $id = 0;
                        $sql= "SELECT product.product_name,purchase.id, product.description, product.type, product.minimum_quantity, studio.name, purchase.quantity FROM studio, product, purchase WHERE purchase.product_id = product.id AND purchase.studio_id = studio.id AND purchase.quantity < product.minimum_quantity ORDER BY 1,2";
                        $result =mysqli_query($conn,$sql) or die("query failed". mysqli_error());
                        if($row = mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $id + 1;
                            ?>
                            <a href="frm-purchase-update.php?id=<?php echo $row['id']?>" style="color:yellow;"><?php echo $row['product_name']; ?></a>
                            <?php
                            if( mysqli_num_rows($result) > $id){
                              ?>, <?php
                            }
                            }
                        }
                        ?>
          Product Running OUT OF STOCK!
        </div>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
              <i class="fas fa-th-large"></i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
          <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Admin</span>
         
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">
                <?php  print_r($_SESSION['login_user']); ?> </a>
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                  <button class="btn btn-default btn-sm" type="submit" name="logout">Logout</button>
                </form>
            </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <?php 
               if($role === 'super_admin') {
                ?>
                  <li class="nav-item menu-open">
                    <a  href="list-studio.php" class="nav-link">
                        <p>Studio</p>
                    </a>                
                  </li>
                <?php
               }
               ?>
               
             
              <li class="nav-item menu-open">
                <a  href="list-artist.php" class="nav-link">
                  <p>
                    Artist
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="list-customer.php" class="nav-link">
                  <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
                  <p>
                    Customers
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="list-pending-payment.php" class="nav-link">
                  <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
                  <p>
                    Pending Payment
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="list-appointment.php" class="nav-link">
                  <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
                  <p>
                    Appointment
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="list-transaction.php" class="nav-link">                 
                  <!-- <i class="nav-icon fas fa-money"></i> -->
                  <p>
                    Transaction
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="list-transaction.php" class="nav-link">
                      <i class="fas fa-angle-right nav-icon"></i>
                      <p>Transaction List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="frm-transaction.php" class="nav-link">
                      <i class="fas fa-angle-right nav-icon"></i>
                      <p>Create Transaction</p>
                    </a>
                  </li>
                </ul>
              </li>
             

              <li class="nav-item menu-open">
                <a href="products.php" class="nav-link">                 
                  <!-- <i class="nav-icon fas fa-money"></i> -->
                  <p>
                    Products
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="products.php" class="nav-link">
                      <i class="fas fa-angle-right nav-icon"></i>
                      <p>Products List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="list-purchase.php" class="nav-link">
                      <i class="fas fa-angle-right nav-icon"></i>
                      <p>Inventory</p>
                    </a>
                  </li>
                  
                </ul>
              </li>
              <li class="nav-item menu-open">
                <a  href="frm-salary-calulater.php" class="nav-link">
                  <p>
                  Salary of artist
                  </p>
                </a>
              </li>
               
              <li class="nav-item menu-open">
                <a href="list-salary-criteria.php" class="nav-link">
                  <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
                  <p>
                  Salary Criteria
                  </p>
                </a>
              </li>
              <?php 
               if($role === 'super_admin') {
                ?>
                  <li class="nav-item menu-open">
                      <a href="list-users.php" class="nav-link">
                        <p> Users</p>
                      </a>
                  </li>
                <?php
               }
               ?>
              
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
 