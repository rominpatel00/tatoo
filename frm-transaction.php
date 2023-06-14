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
    $total = isset($_POST['total']) ? $_POST['total'] : '0';
    $cash_payment = isset($_POST['cash_payment']) ? $_POST['cash_payment'] : '0';
    $online_payment = isset($_POST['online_payment']) ? $_POST['online_payment'] : '0';

    $charge_custom = isset($_POST['charge_custom']) ? $_POST['charge_custom'] : '0';
    $charge_custom_design = isset($_POST['charge_custom_design']) ? $_POST['charge_custom_design'] : '0';
    $charge_product = isset($_POST['charge_product']) ? $_POST['charge_product'] : '0';
    $charge_piercing = isset($_POST['charge_piercing']) ? $_POST['charge_piercing'] : '0';
    $charge_laser = isset($_POST['charge_laser']) ? $_POST['charge_laser'] : '0';

    $user_id = 1;
    $date = isset($_POST['date']) ? date($_POST['date']) : date("Y-m-d h:i:sa");
   
    $date2 = date("Y-m");
    $sql = "INSERT INTO `transaction` ( `serial_no`, `client_id`, `tattoo_type`, `contact_no`, `artist_id`,
     `customisation_charg`, `product_id`, `payment_type`, `total`,`cash_payment`, `online_payment`, `date`, `date_month`, `has_customization`, 
     `has_custom_design`, `has_laser`, `charge_custom`,`charge_custom_design`,`charge_product`,`charge_piercing`,`charge_laser`) 
    VALUES ('".$serial_no."','".$client_id."','".$tattoo_type."','".$contact_no."','".$artist_id."',
    '".$customisation_charg."','".$product_id."','".$payment_type."','".$total."','".$cash_payment."','".$online_payment."','".$date."',
    '".$date2."','".$has_customization."','".$has_custom_design."','".$has_laser."',
    '".$charge_custom."','".$charge_custom_design."','".$charge_product."','".$charge_piercing."','".$charge_laser."') "; 
    
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
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Serial No.</label>
                                <input type="text" name="serial_no" id="" class="form-control select2" style="width: 100%;">
                                </input>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="date" id="" class="form-control select2" style="width: 100%;">
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
                                <label>Contact Info</label>
                                <input type="text" id="" name="contact_no" class="form-control select2" style="width: 100%;">
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
                                             <option value="<?php echo $row['id']?>"><?php echo $row['fname']?> <?php echo $row['lname']?></option>
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
                                        <select class="form-control" name="product_id[]" multiple>
                               
                                <?php
                                   
                                    $sql= "SELECT * FROM product ORDER BY id DESC";
                                    $result =mysqli_query($conn,$sql) or die("query failed". mysqli_error());
                                    if($row = mysqli_num_rows($result)>0){
                                        while($row = mysqli_fetch_assoc($result)){
                                            ?>
                                             <option value="<?php echo $row['id']?>"><?php echo $row['product_name']?></option>
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
                                    <input type="number" name="charge_product"  onblur="calculateTotal()" id="charge_product" class="form-control select2" style="width: 100%;">
                                    </input>
                                </div>
                            </div>
                
                </div>
                    <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Tattoo Type</label>
                                    <select class="form-control select2bs4" name="tattoo_type" style="width: 100%;">
                                        <option value="Tattoo">Tattoo</option>
                                        <option value="Piercing">Piercing</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Has Customization</label>
                                    <select class="form-control select2bs4" name="has_customization" style="width: 100%;">
                                        <option selected="selected" value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Has Custom Design</label>
                                    <select class="form-control select2bs4" name="has_custom_design" style="width: 100%;">
                                        <option selected="selected" value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Has Laser</label>
                                    <select class="form-control select2bs4" name="has_laser" style="width: 100%;">
                                        <option selected="selected" value="0">No</option>
                                        <option value="1">Yes</option>
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
                                    <input type="number" name="charge_piercing"  onblur="calculateTotal()" id="charge_piercing" class="form-control select2" style="width: 100%;">
                                    </input>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Customisation Charges</label>
                                    <input type="number" name="charge_custom"  onblur="calculateTotal()" id="charge_custom" class="form-control select2" style="width: 100%;">
                                    </input>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Custome Design Charges</label>
                                    <input type="number" name="charge_custom_design"  onblur="calculateTotal()" id="charge_custom_design" class="form-control select2" style="width: 100%;">
                                    </input>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Laser Charges</label>
                                    <input type="number" name="charge_laser"   onblur="calculateTotal()" id="charge_laser" class="form-control select2" style="width: 100%;">
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
                                        <option>Cash</option>
                                        <option>Bank</option>
                                        <option>Credit Card</option>
                                        <option>UPI</option>
                                    </select>
                                </div>
                            </div> -->
                            <input type="hidden" name="total" class="totalcharges form-control select2" style="width: 100%;">
                                    </input>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Cash Payment</label>
                                    <input type="number" name="cash_payment" id="cash_payment" class="form-control select2" style="width: 100%;" onblur="calculateTotal()">
                                    </input>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Online payment</label>
                                    <input type="number" name="online_payment" id="online_payment" class="form-control select2" style="width: 100%;" onblur="calculateTotal()">
                                    </input>
                                </div>
                            </div>
                            <!-- <div class="col-md-4">
                                <div class="form-group">
                                    <label>Other Charges</label>
                                    <input type="number" name="total" id="total" class="form-control select2" style="width: 100%;" onblur="calculateTotal()">
                                    </input>
                                </div>
                            </div> -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Total Bill</label>
                                    <div id="totalcharges" class="form-control select2" style="width: 100%;     background-color: #ececec;" >
                                 
                                    </div>
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

<script>
    function calculateTotal () {
        console.log("wertyui");
        
        var charge_piercing = document.getElementById("charge_piercing").value; 
        var charge_custom = document.getElementById("charge_custom").value; 
        var charge_custom_design = document.getElementById("charge_custom_design").value; 
        var charge_laser = document.getElementById("charge_laser").value; 
        var charge_product = document.getElementById("charge_product").value; 
        var cash_payment = document.getElementById("cash_payment").value; 
        var online_payment = document.getElementById("online_payment").value; 
        // var total = document.getElementById("total").value; 
    
        if(!charge_piercing) charge_piercing= 0;
        if(!charge_custom) charge_custom= 0;
        if(!charge_custom_design) charge_custom_design= 0;
        if(!charge_laser) charge_laser= 0;
        if(!charge_product) charge_product= 0;
        if(!cash_payment) cash_payment= 0;
        if(!online_payment) online_payment= 0;
        // if(!total) total= 0;
        let makeTotal = parseFloat(charge_piercing) + parseFloat(charge_custom) + parseFloat(charge_custom_design) + parseFloat(charge_laser) + parseFloat(charge_product) + parseFloat(cash_payment) + parseFloat(online_payment);
        console.log(makeTotal);
        document.getElementById("totalcharges").innerHTML = makeTotal;
        $(".totalcharges").val(makeTotal);
    }

    </script>
<!-- footer -->
<?php include "././footer/footer.php" ?>

<!-- footer pluggins-->
<?php include "././footer/footer-plugins.php" ?>