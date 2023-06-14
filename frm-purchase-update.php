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
  include "config.php";
if(isset($_POST['submit'])){
    $id = isset($_GET['id']) ? $_GET['id'] : 'id';
    $studio_id = isset($_POST['studio_id']) ? $_POST['studio_id'] : 'studio_id';
    $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : 'product';
    $stock = isset($_POST['stock']) ? $_POST['stock'] : 'stock';
    $user_id = 1;
    $date = date("Y-m-d h:i:sa");

    $sql = "UPDATE `purchase` SET `product_id`='{$product_id}', `quantity`='{$stock}', `date`='{$date}', `user_id`='{$user_id}', `studio_id`='{$studio_id}' WHERE id='{$d}'";

    $result = mysqli_query($conn, $sql) or die("Query Failed". mysqli_error());
    ?>
    <script>
    console.log('<?= json_encode($result) ?>');
    </script>
   <?php
    if($result){
        echo "<script>window.location.href='list-purchase.php';</script>";
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
                    <h1>Update Inventory</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Update Inventory</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


        <?php
        $id = isset($_GET['id']) ? $_GET['id'] :'id';
        $sql = "SELECT * FROM purchase WHERE id='{$id}'";
        $result = mysqli_query($conn, $sql) or die("Query Failed". mysqli_error());
        if(mysqli_num_rows($result)>0){
            while($row =  mysqli_fetch_assoc($result)){
        ?>

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
                    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Studio Name</label>
                                <select class="form-control" value="<?php echo $row['studio_id']?>" name="studio_id">
                                <?php
                                   
                                    $sql= "SELECT * FROM studio ORDER BY id DESC";
                                    $result =mysqli_query($conn,$sql) or die("query failed". mysqli_error());
                                    if($row1 = mysqli_num_rows($result)>0){
                                        while($row1 = mysqli_fetch_assoc($result)){
                                            ?>
                                             <option value="<?php echo $row1['id']?><"><?php echo $row1['name']?></option>
                                            <?php
                                        }
                                    } 
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Product</label>
                                <select class="form-control" value="<?php echo $row['product_id']?>" name="product_id">
                                <?php
                                   
                                    $sql= "SELECT * FROM product ORDER BY id DESC";
                                    $result =mysqli_query($conn,$sql) or die("query failed". mysqli_error());
                                    if($row2 = mysqli_num_rows($result)>0){
                                        while($row2 = mysqli_fetch_assoc($result)){
                                            ?>
                                             <option value="<?php echo $row2['id']?><"><?php echo $row2['product_name']?></option>
                                            <?php
                                        }
                                    } 
                                ?>
                                </select>
                            </div>
                        </div>
                       <div class="col-md-4">
                            <div class="form-group">
                                <label>Purchess Quantity</label>
                                <input type="number"   class="form-control select2" value="<?php echo $row['quantity']?>" name="stock" style="width: 100%;">
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