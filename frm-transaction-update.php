<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Black Opal Ink</title>

    <!-- bootstrap css -->
    <?php include "././header/bootstrap-css.php" ?>

</head>

<!-- navbar-sidebar -->
<?php include "././navbar-sidebar.php" ?>
<?php   include "config.php"; ?>
<?php
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d:h:i a");
$date2 = date("Y-m");
  include "config.php";
if(isset($_POST['submit'])){
   
    $serial_no = isset($_POST['serial_no']) ? $_POST['serial_no'] : 'serial_no';
    $client_id = isset($_POST['customer_id']) ? $_POST['customer_id'] : '0';
    ?>
        <script>
        console.log('<?= json_encode($_POST['customer_id']) ?>');
        console.log('<?= json_encode($client_id) ?>');
        </script>
    <?php
    $tattoo_type = isset($_POST['tattoo_type']) ? $_POST['tattoo_type'] : 'tattoo_type';
    $has_customization = isset($_POST['has_customization']) ? $_POST['has_customization'] : 'has_customization';
    $has_custom_design = isset($_POST['has_custom_design']) ? $_POST['has_custom_design'] : 'has_custom_design';
    $has_laser = isset($_POST['has_laser']) ? $_POST['has_laser'] : 'has_laser';
    $contact_no = isset($_POST['contact_no']) ? $_POST['contact_no'] : 'contact_no';
    $artist_id = isset($_POST['artist_id']) ? $_POST['artist_id'] : 'artist_id';
    $customisation_charg = '0';
    $product_id = isset($_POST['product_id']) ? implode(', ', $_POST['product_id']) : '0';
    $payment_type = isset($_POST['payment_type']) ? $_POST['payment_type'] : '0';
    $cash_payment = isset($_POST['cash_payment']) ? $_POST['cash_payment'] : '0';
    $online_payment = isset($_POST['online_payment']) ? $_POST['online_payment'] : '0';
    
    $charge_custom = isset($_POST['charge_custom']) ? $_POST['charge_custom'] : '0';
    $charge_custom_design = isset($_POST['charge_custom_design']) ? $_POST['charge_custom_design'] : '0';
    $charge_product = isset($_POST['charge_product']) ? $_POST['charge_product'] : '0';
    $charge_piercing = isset($_POST['charge_piercing']) ? $_POST['charge_piercing'] : '0';
    $charge_laser = isset($_POST['charge_laser']) ? $_POST['charge_laser'] : '0';
    $total = $charge_custom + $charge_custom_design + $charge_product + $charge_piercing + $charge_laser + $online_payment + $cash_payment;
    $id = isset($_POST['id']) ? $_POST['id'] : '0';

    $user_id = 1;
    $date = date("Y-m-d h:i:sa");

    $sql = "UPDATE `transaction` set `serial_no` = $serial_no, `client_id` = $client_id, `tattoo_type`= '$tattoo_type',
    `contact_no`= $contact_no, `artist_id`= $artist_id, `customisation_charg`= $customisation_charg, `product_id`= '$product_id',
    `payment_type`= $payment_type, `total`= $total,`cash_payment`= $cash_payment, `online_payment`= $online_payment, `date`= '$date',
    `date_month`= '$date2', `has_customization`= $has_customization, `has_custom_design`= $has_custom_design, `has_laser`= $has_laser, 
    `charge_custom`= $charge_custom,`charge_custom_design`= $charge_custom_design,`charge_product`= $charge_product,`charge_piercing`= $charge_piercing,
    `charge_laser`= $charge_laser where id = $id"; 
  
    $result = mysqli_query($conn, $sql) or die("Query Failed". mysqli_error());
    ?>
    <script>
    console.log('<?= json_encode($result) ?>');
    </script>
   <?php
    if($result){
        echo "<script>window.location.href='list-transaction.php';</script>";
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
                    <h1>Transaction Registration Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Transaction Registration Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <?php
                    
                    $id = isset($_GET['id']) ? $_GET['id'] : 'id';
                    $sql = "SELECT * FROM transaction WHERE id = '{$id}'";
                       
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
                    <h3 class="card-title">Transaction Details</h3>

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
                                <label>Serial No.</label>
                                <input type="text" name="serial_no" id="" class="form-control select2" style="width: 100%;"  value="<?php echo $row2['serial_no'];?>">
                                </input>
                            </div>
                        </div>
                    </div>
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
                                             <option value="<?php echo $row['id']?>" <?php if($row2['client_id'] == $row['id']) echo"selected"; ?> ><?php echo $row['fname']?> <?php echo $row['lname']?></option>
                                            <?php
                                        }
                                    } 
                                ?>
                                </select>
                            </div>
                        </div>
                       
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Contact Info</label>
                                <input type="text" id="" name="contact_no" value="<?php echo $row2['contact_no'];?>" class="form-control select2" style="width: 100%;">
                                </input>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Artist Name</label>
                                <select class="form-control" name="artist_id">
                                <?php
                                   
                                    $sql= "SELECT * FROM artist ORDER BY id DESC";
                                    $result =mysqli_query($conn,$sql) or die("query failed". mysqli_error());
                                    if($row = mysqli_num_rows($result)>0){
                                        while($row = mysqli_fetch_assoc($result)){
                                            ?>
                                             <option value="<?php echo $row['id']?>" <?php if($row2['artist_id'] == $row['id']) echo"selected"; ?>><?php echo $row['fname']?> <?php echo $row['lname']?></option>
                                            <?php
                                        }
                                    } 
                                ?>
                                </select>
                            </div>
                        </div>
                        
                        
                    </div>
                    <hr/>
               
                    <div class="row">
                    <div class="col-md-3">
                            <div class="form-group">
                                <label>Product Name</label>
                                <?php $array = explode(' ', $row2['product_id']);?>
                                <select class="form-control" name="product_id[]" multiple>
                                <?php
                                   
                                    $sql= "SELECT * FROM product ORDER BY id DESC";
                                    $result =mysqli_query($conn,$sql) or die("query failed". mysqli_error());
                                    if($row = mysqli_num_rows($result)>0){

                                        while($row = mysqli_fetch_assoc($result)){
                                            ?>
                                            <option value="<?php echo $row['id']?>" <?php if(in_array($row['id'], $array)) echo"selected"; ?>><?php echo $row['product_name']; ?></option>
                                            <?php
                                        }
                                    } 
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                                <div class="form-group">
                                    <label>Product Cost</label>
                                    <input type="number" name="charge_product" value="<?php echo $row2['charge_product'];?>" class="form-control select2" style="width: 100%;">
                                    </input>
                                </div>
                            </div>
                
                </div>
                    <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Tattoo Type</label>
                                    <select class="form-control select2bs4" name="tattoo_type" style="width: 100%;">
                                        <option value="Tattoo" <?php if($row2['tattoo_type'] == 'Tattoo') echo"selected"; ?>>Tattoo</option>
                                        <option value="Piercing" <?php if($row2['tattoo_type'] == 'Piercing') echo"selected"; ?>>Piercing</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Has Customization</label>
                                    <select class="form-control select2bs4" name="has_customization" style="width: 100%;">
                                        <option selected="selected" value="0" <?php if($row2['has_customization'] == 0) echo"selected"; ?>>No</option>
                                        <option value="1" <?php if($row2['has_customization'] == 1) echo"selected"; ?>>Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Has Custom Design</label>
                                    <select class="form-control select2bs4" name="has_custom_design" style="width: 100%;">
                                        <option selected="selected" value="0" <?php if($row2['has_custom_design'] == 0) echo"selected"; ?>>No</option>
                                        <option value="1" <?php if($row2['has_custom_design'] == 1) echo"selected"; ?>>Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Has Laser</label>
                                    <select class="form-control select2bs4" name="has_laser" style="width: 100%;">
                                        <option selected="selected" value="0" <?php if($row2['has_laser'] == 0) echo"selected"; ?>>No</option>
                                        <option value="1" <?php if($row2['has_laser'] == 1) echo"selected"; ?>>Yes</option>
                                    </select>
                                </div>
                            </div>

                            <!-- <div class="col-md-4">
                                <div class="form-group">
                                    <label>Customisation Charges</label>
                                    <input type="number" name="customisation_charg" class="form-control select2" style="width: 100%;">
                                    </input>
                                </div>
                            </div> -->
                    </div>
                    <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Piercing Charges</label>
                                    <input type="number" name="charge_piercing" value="<?php echo $row2['charge_piercing'];?>" class="form-control select2" style="width: 100%;">
                                    </input>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Customisation Charges</label>
                                    <input type="number" name="charge_custom" value="<?php echo $row2['charge_custom'];?>" class="form-control select2" style="width: 100%;">
                                    </input>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Custome Design Charges</label>
                                    <input type="number" name="charge_custom_design"value="<?php echo $row2['charge_custom_design'];?>" class="form-control select2" style="width: 100%;">
                                    </input>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Laser Charges</label>
                                    <input type="number" name="charge_laser" value="<?php echo $row2['charge_laser'];?>" class="form-control select2" style="width: 100%;">
                                    </input>
                                </div>
                            </div>

                    </div>
                    <hr/>
                    <div class="row">
                            <!-- <div class="col-md-4">
                                <div class="form-group">
                                    <label>Payment Type</label>
                                    <select class="form-control select2bs4" name="payment_type" style="width: 100%;">
                                        <option selected="selected">Select</option>
                                        <option <?php // if($row2['payment_type'] == 'Cash') echo"selected"; ?>>Cash</option>
                                        <option <?php // if($row2['payment_type'] == 'Bank') echo"selected"; ?>>Bank</option>
                                        <option <?php // if($row2['payment_type'] == 'Credit Card') echo"selected"; ?>>Credit Card</option>
                                        <option <?php // if($row2['payment_type'] == 'UPI') echo"selected"; ?>>UPI</option>
                                    </select>
                                </div>
                            </div> -->
                        
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Cash Payment</label>
                                    <input type="number" name="cash_payment"  value="<?php echo $row2['cash_payment'];?>"  class="form-control select2" style="width: 100%;">
                                    </input>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Onilnie Payment</label>
                                    <input type="number" name="online_payment"  value="<?php echo $row2['online_payment'];?>"  class="form-control select2" style="width: 100%;">
                                    </input>
                                </div>
                            </div>
                            <!-- <div class="col-md-4">
                                <div class="form-group">
                                    <label>Total Bill</label>
                                    <input id="totalcharges" type="number" name="total"   value="<?php echo $row2['total'];?>"  class="form-control select2" style="width: 100%;">
                                    </input>
                                </div>
                            </div> -->
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