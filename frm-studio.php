<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Studio</title>

    <!-- bootstrap css -->
    <?php include "././header/bootstrap-css.php" ?>

</head>

<!-- navbar-sidebar -->
<?php include "././navbar-sidebar.php" ?>

       
    <?php
 $me =  "qwertyu";
 ?>
 <script>
 console.log('<?= json_encode($me) ?>');
 </script>
<?php

if(isset($_POST['submit'])){
    include "config.php";
   
    $studio_name = isset($_POST['studio_name']) ? $_POST['studio_name'] : 'studio_name';
    $address = isset($_POST['address']) ? $_POST['address'] : 'address';
    $city = isset($_POST['city']) ? $_POST['city'] : 'city';

    $sql = "INSERT INTO `studio` ( `name`, `address`, `city`) 
    VALUES ('".$studio_name."','".$address."','".$city."') "; 
  
    $result = mysqli_query($conn, $sql) or die("Query Failed". mysqli_error());
    ?>
    <script>
    console.log('<?= json_encode($result) ?>');
    </script>
   <?php
    if($result){
        echo "<script>window.location.href='list-studio.php';</script>";
        exit;
    }else{
        echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Insert product.</p>";
    }
 }
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Studio</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>



    <form action="<?php echo $_SERVER['PHP_SELF']?> " method="POST">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- users DETAILS -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Studio Details</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->

                <!-- users DETAILS -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Studio Name</label>
                                <input type="text"  class="form-control select2" name="studio_name" style="width: 100%;">
                                </input>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text"   class="form-control select2" name="address" style="width: 100%;">
                                </input>
                            </div>
                        </div>
                       <div class="col-md-4">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text"   class="form-control select2" name="city" style="width: 100%;">
                                </input>
                            </div>
                        </div>
                       
                    </div>  
                    <div class="d-flex justify-content-center"><input type="submit"name="submit" value="submit" class="btn btn-secondary"></input></div>
                    <!-- /.row -->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    </form>
    <!-- /.content -->
</div>
<!-- footer -->
<?php include "././footer/footer.php" ?>

<!-- footer pluggins-->
<?php include "././footer/footer-plugins.php" ?>