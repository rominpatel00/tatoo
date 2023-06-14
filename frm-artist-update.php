<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artist</title>

    <!-- bootstrap css -->
    <?php include "././header/bootstrap-css.php" ?>

    <script>
$( document ).ready(function() {
$('#type').change(
    function (){
        er = $("#type").val();
        if(er == "Fixed Artist"){
      $('.fixed_salary').css('display','block');
        }
        else{
        $('.fixed_salary').css('display','none');
        }
    }
).change();
});
</script>

</head>

<!-- navbar-sidebar -->
<?php include "././navbar-sidebar.php" ?>

<?php

if(isset($_POST['submit'])){
    include "config.php";
    $id = isset($_POST['id']) ? $_POST['id'] : 'id';
    $fname = isset($_POST['fname']) ? $_POST['fname'] : 'fname';
    $mname = isset($_POST['mname']) ? $_POST['mname'] : 'mname';
    $lname = isset($_POST['lname']) ? $_POST['lname'] : 'lname';
    $contact = isset($_POST['contact']) ? $_POST['contact'] : 'contact';
    $email = isset($_POST['email']) ? $_POST['email'] : 'email';
    $address = isset($_POST['address']) ? $_POST['address'] : 'address';
    $city = isset($_POST['city']) ? $_POST['city'] : 'city';
    $district = isset($_POST['district']) ? $_POST['district'] : 'district';
    $zip = isset($_POST['zip']) ? $_POST['zip'] : 'zip';
    $type = isset($_POST['type']) ? $_POST['type'] : 'type';
    $salary = isset($_POST['fixed_salary']) ? $_POST['fixed_salary'] : '0';
  
    $sql = "UPDATE artist SET fname = '{$fname}', mname = '{$mname}', lname = '{$lname}',  
    `contact`='{$contact}', `email`='{$email}', `address`='{$address}', `city`='{$city}', `district`='{$district}', `zip`='{$zip}', `type`='{$type}', `salary`='{$salary}' WHERE id = '{$id}'";
   
    $result = mysqli_query($conn, $sql) or die("Query Failed". mysqli_error());
    ?>
   <?php
    if($result){
        echo "<script>window.location.href='list-artist.php';</script>";
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
                    <h1>Artist Resistration Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Artist Resistration Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <?php
                    include "config.php";
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM artist WHERE id = '{$id}'";
                     
                    $result = mysqli_query($conn, $sql) or die("Query Failed.");
                    if(mysqli_num_rows($result) > 0){
                      while($row = mysqli_fetch_assoc($result)){
                    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']?> " method="POST">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- mentor DETAILS -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Artist Details</h3>

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
                <input type="hidden" name="id" value="<?php echo $row['id']?>">

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
                                <label>Address</label>
                                <input type="text"  name="address" value="<?php echo $row['address'];?>" class="form-control select2" style="width: 100%;">
                                </input>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text"  name="city" value="<?php echo $row['city'];?>" class="form-control select2" style="width: 100%;">
                                </input>
                                
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>District</label>
                                <input type="text"  name="district" value="<?php echo $row['district'];?>" class="form-control select2" style="width: 100%;">
                                </input>
                               
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Zip Code</label>
                                <input type="number" name="zip" value="<?php echo $row['zip'];?>" class="form-control select2" style="width: 100%;">
                                </input>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Type of Artist</label>
                                
                                <select class="form-control" id="type" name="type">
                                    <option value="Emerging Artist"  <?=$row['type'] == 'Emerging Artist' ? ' selected="selected"' : '';?>>Emerging Artist</option>
                                    <option value="Senior Artist" <?=$row['type'] == 'Senior Artist' ? ' selected="selected"' : '';?>>Senior Artist</option>
                                    <option value="Head Artist" <?=$row['type'] == 'Head Artist' ? ' selected="selected"' : '';?>>Head Artist</option>
                                    <option value="Pro Artist" <?=$row['type'] == 'Pro Artist' ? ' selected="selected"' : '';?>>Pro Artist</option>
                                    <option value="Fixed Artist" <?=$row['type'] == 'Fixed Artist' ? ' selected="selected"' : '';?>>Fixed Artist</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 fixed_salary" style="display:none">
                            <div class="form-group">
                                <label>Fixed Salary</label>
                                <input type="number" id = "fixed_salary" name="fixed_salary" value="<?php echo $row['salary'];?>" class="form-control select2" style="width: 100%;">
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