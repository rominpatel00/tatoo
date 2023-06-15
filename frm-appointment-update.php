<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Appointment</title>

    <!-- bootstrap css -->
    <?php include "././header/bootstrap-css.php" ?>

</head>

<!-- navbar-sidebar -->
<?php include "././navbar-sidebar.php" ?>

<?php

if(isset($_POST['submit'])){
    include "config.php";
   
    $fname = isset($_POST['fname']) ? $_POST['fname'] : 'fname';
    $mname = isset($_POST['mname']) ? $_POST['mname'] : 'mname';
    $lname = isset($_POST['lname']) ? $_POST['lname'] : 'lname';
    $contact = isset($_POST['contact']) ? $_POST['contact'] : 'contact';
    $email = isset($_POST['email']) ? $_POST['email'] : 'email';
    $artist_id = isset($_POST['artist_id']) ? $_POST['artist_id'] : '0';
    $appointment_date = isset($_POST['appointment_date']) ? $_POST['appointment_date'] : '0';
    $cash_payment = isset($_POST['cash_payment']) ? $_POST['cash_payment'] : '0';
    $online_payment = isset($_POST['online_payment']) ? $_POST['online_payment'] : '0';
    $status = isset($_POST['status']) ? $_POST['status'] : '0';

    $id = isset($_POST['id']) ? $_POST['id'] : '0';

    $sql = "UPDATE `advance_appointment` set fname='{$fname}',mname='{$mname}', lname='{$lname}' ,`contact`='{$contact}', `email`='{$email}', `artist_id` = $artist_id, `appointment_date` = '$appointment_date', `cash_payment`= '$cash_payment', `online_payment`= '$online_payment', `status`= '$status' where id = $id"; 

    $result = mysqli_query($conn, $sql) or die("Query Failed". mysqli_error());
    ?>
    <script>
    console.log('<?= json_encode($result) ?>');
    </script>
   <?php
    if($result){
        echo "<script>window.location.href='list-appointment.php';</script>";
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
                    <h1>Appointment update</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Appointment Update</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <?php
                    
                    $id = isset($_GET['id']) ? $_GET['id'] : 'id';
                    $sql = "SELECT * FROM advance_appointment WHERE id = '{$id}'";
                       
                    $result = mysqli_query($conn, $sql) or die("Query Failed.");
                    if(mysqli_num_rows($result) > 0){
                      while($row2 = mysqli_fetch_assoc($result)){
                    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']?> " method="POST">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- mentor DETAILS -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Pending amount Details</h3>

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
                <input type="hidden" name="id" value="<?php echo $row2['id'];?>">
                <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="fname" value="<?php echo $row['fname'];?>" class="form-control select2" style="width: 100%;">
                                </input>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Middle Name</label>
                                <input type="text"  name="mname" value="<?php echo $row['mname'];?>" class="form-control select2" style="width: 100%;">
                                </input>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text"  name="lname" value="<?php echo $row['lname'];?>" class="form-control select2" style="width: 100%;">
                                </input>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Contact No.</label>
                                <input type="tel" name="contact" value="<?php echo $row['contact'];?>" class="form-control select2" style="width: 100%;">
                                </input>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>E Mail</label>
                                <input type="email" name="email" value="<?php echo $row['email'];?>" class="form-control select2" style="width: 100%;">
                                </input>
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
                                             <option value="<?php echo $row1['id']?>" <?php if($row2['artist_id'] == $row1['id']) echo"selected"; ?> ><?php echo $row1['fname']?> <?php echo $row1['lname']?></option>
                                            <?php
                                        }
                                    } 
                                ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Appointment Date</label>
                                <input type="datetime-local"  name="appointment_date"  value="<?php echo $row2['appointment_date'];?>" class="form-control select2" style="width: 100%;">
                                </input>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Cash Payment</label>
                                <input type="number"  name="cash_payment"  value="<?php echo $row2['cash_payment'];?>" class="form-control select2" style="width: 100%;">
                                </input>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Online Payment</label>
                                <input type="number"  name="online_payment"  value="<?php echo $row2['online_payment'];?>" class="form-control select2" style="width: 100%;">
                                </input>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Appointment Status</label>
                                <select class="form-control" id="type" name="status">
                                    <option value="Pending"  <?=$row2['status'] == 'Pending' ? ' selected="selected"' : '';?>>Pending</option>
                                    <option value="Completed" <?=$row2['status'] == 'Completed' ? ' selected="selected"' : '';?>>Completed</option>
                                    <option value="Cancelled" <?=$row2['status'] == 'Cancelled' ? ' selected="selected"' : '';?>>Cancelled</option>
                                </select>
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
                      }}
                      ?>
    <!-- /.content -->
</div>


<!-- footer -->
<?php include "././footer/footer.php" ?>

<!-- footer pluggins-->
<?php include "././footer/footer-plugins.php" ?>