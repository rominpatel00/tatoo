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
    $id = isset($_POST['id']) ? $_POST['id'] : 'id';
    $product_name = isset($_POST['product_name']) ? $_POST['product_name'] : 'item1';
    $type = isset($_POST['type']) ? $_POST['type'] : 'other';
    $description = isset($_POST['description']) ? $_POST['description'] : 'description';
    $minimum_quantity = isset($_POST['minimum_quantity']) ? $_POST['minimum_quantity'] : 0;


    $sql = "UPDATE product SET product_name='{$product_name}', type='{$type}', description='{$description}' , minimum_quantity={$minimum_quantity} WHERE id = '{$id}' ";

    $result = mysqli_query($conn, $sql) or die("Query Failed". mysqli_error());
    ?>
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

                    <?php
                    include "config.php";
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM product WHERE id = '{$id}'";
                      
                    $result = mysqli_query($conn, $sql) or die("Query Failed.");
                    if(mysqli_num_rows($result) > 0){
                      while($row = mysqli_fetch_assoc($result)){
                    ?>

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
                <input type="hidden" name="id" value="<?php echo $row['id']?>">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text"  id="" class="form-control select2" value="<?php echo $row['product_name'];?>" name="product_name" style="width: 100%;">
                                </input>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Product Type</label>
                                <select class="form-control" value="<?php echo $row['type'];?>" name="type">
                                    <option value="before-care" 
                                    <?php if ($row['type'] == 'before-care') echo ' selected="selected"'; ?>
                                    >Before Care</option>
                                    <option value="after-care"
                                    <?php if ($row['type'] == 'after-care') echo ' selected="selected"'; ?>
                                    >After Care</option>
                                    <option value="other"
                                    <?php if ($row['type'] == 'other') echo ' selected="selected"'; ?>
                                    >Other</option>
                                </select>
                                </input>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Minimum Product Quantity</label>
                                <input type="number"  id="" class="form-control select2" value="<?php echo $row['minimum_quantity'];?>" name="minimum_quantity" style="width: 100%;">
                                </input>
                            </div>
                        </div>
                       
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control"  name="description" rows="3"><?php echo $row['description'];?></textarea>
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
    <?php
                      }
                    }
    ?>
    <!-- /.content -->
</div>


<!-- footer -->
<?php include "././footer/footer.php" ?>

<!-- footer pluggins-->
<?php include "././footer/footer-plugins.php" ?>