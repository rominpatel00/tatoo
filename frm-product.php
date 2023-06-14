<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Product</title>

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
   
    $product_name = isset($_POST['product_name']) ? $_POST['product_name'] : 'item1';
    $type = isset($_POST['type']) ? $_POST['type'] : 'other';
    $description = isset($_POST['description']) ? $_POST['description'] : 'description';

    $sql = "INSERT INTO `product` ( `product_name`, `type`, `description`) 
    VALUES ('".$product_name."','".$type."','".$description."') "; 
  
    $result = mysqli_query($conn, $sql) or die("Query Failed". mysqli_error());
    ?>
    <script>
    console.log('<?= json_encode($result) ?>');
    </script>
   <?php
    if($result){
        echo "<script>window.location.href='products.php';</script>";
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
                        <li class="breadcrumb-item active">Create Product</li>
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
                    <h3 class="card-title">Product Details</h3>

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
                                <label>Product Name</label>
                                <input type="text"  id="" class="form-control select2" name="product_name" style="width: 100%;">
                                </input>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Product Type</label>
                                <select class="form-control" name="type">
                                    <option value="before-care">Before Care</option>
                                    <option value="after-care">After Care</option>
                                    <option value="other">Other</option>
                                </select>
                                </input>
                            </div>
                        </div>
                       
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" name="description" rows="3"></textarea>
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