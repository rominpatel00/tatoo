<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pending Payment</title>

    <!-- bootstrap css -->
    <?php include "././header/bootstrap-css.php" ?>

</head>

<!-- navbar-sidebar -->
<?php include "././navbar-sidebar.php" ?>

<?php

if(isset($_POST['submit'])){
    include "config.php";
   
    $customer_id = isset($_POST['customer_id']) ? $_POST['customer_id'] : '0';
    $artist_id = isset($_POST['artist_id']) ? $_POST['artist_id'] : '0';
    $pending_amount = isset($_POST['pending_amount']) ? $_POST['pending_amount'] : '0';
    $created_date = isset($_POST['created_date']) ? $_POST['created_date'] : '0';
    $expected_date = isset($_POST['expected_date']) ? $_POST['expected_date'] : '0';
    $status = isset($_POST['status']) ? $_POST['status'] : '0';

    $sql = "INSERT INTO `pending_amount` ( `customer_id`, `artist_id`, `pending_amount`, `created_date`, `expected_date`, `status`) 
    VALUES ('".$customer_id."','".$artist_id."','".$pending_amount."','".$created_date."','".$expected_date."','".$status."') "; 

    $result = mysqli_query($conn, $sql) or die("Query Failed". mysqli_error());
    ?>
    <script>
    console.log('<?= json_encode($result) ?>');
    </script>
   <?php
    if($result){
        echo "<script>window.location.href='list-pending-payment.php';</script>";
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
                    <h1>Pending Payment Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pending Payment Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <form action="<?php echo $_SERVER['PHP_SELF']?> " method="POST">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- mentor DETAILS -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Customer Payment Details</h3>

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

                <!-- mentor DETAILS -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Client Name</label>
                                <select class="form-control" name="customer_id">
                                <?php
                                   
                                    $sql= "SELECT * FROM customer ORDER BY id DESC";
                                    $result =mysqli_query($conn,$sql) or die("query failed". mysqli_error());
                                    if($row = mysqli_num_rows($result)>0){
                                        while($row = mysqli_fetch_assoc($result)){
                                            ?>
                                             <option value="<?php echo $row['id']?>"><?php echo $row['fname']?> <?php echo $row['lname']?></option>
                                            <?php
                                        }
                                    } 
                                ?>
                                </select>
                            </div>
                            
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                    <label>Artist Name</label>
                                    <select class="form-control" name="artist_id">
                                    <?php
                                    
                                        $sql1= "SELECT * FROM artist ORDER BY id DESC";
                                        $result1 =mysqli_query($conn,$sql1) or die("query failed". mysqli_error());
                                        if($row1 = mysqli_num_rows($result1)>0){
                                            while($row1 = mysqli_fetch_assoc($result1)){
                                                ?>
                                                <option value="<?php echo $row1['id']?>"><?php echo $row1['fname']?> <?php echo $row1['lname']?></option>
                                                <?php
                                            }
                                        } 
                                    ?>
                                    </select>
                                </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Pending Amount</label>
                                <input type="number"  name="pending_amount" class="form-control select2" style="width: 100%;">
                                </input>
                            </div>
                        </div>
                    
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Created Date</label>
                                <input type="date"  name="created_date" class="form-control select2" style="width: 100%;">
                                </input>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Expected Date</label>
                                <input type="date"  name="expected_date" class="form-control select2" style="width: 100%;">
                                </input>
                            </div>
                        </div>
                        <div class="col-md-4">
                        <label>Payment Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="Pending" >Pending</option>
                                <option value="Received">Received</option>
                            </select>
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