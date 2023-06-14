<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Salary Calculator- Black Opal Ink</title>

    <!-- bootstrap css -->
    <?php include "./header/bootstrap-css.php" ?>

    <!-- datatable css -->
    <?php include "./data-tabel-css.php" ?>
</head>

<!-- navbar-sidebar -->
<?php include "./navbar-sidebar.php" ?>
<?php

  $salary = 0;
  include "config.php";

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2>Salary Calculator</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Salary Calculator</li>
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
                    <h3 class="card-title">Artist Details</h3>
                </div>
                <!-- /.card-header -->

                <!-- users DETAILS -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Artist Name</label>
                                <select class="form-control" name="artist_id">
                                <?php
                                   
                                    $sql= "SELECT * FROM artist ORDER BY id DESC";
                                    $result =mysqli_query($conn,$sql) or die("query failed". mysqli_error());
                                    if($row = mysqli_num_rows($result)>0){
                                        while($row = mysqli_fetch_assoc($result)){
                                            ?>
                                             <option value="<?php echo $row['id']?>" <?php echo $_POST['artist_id'] == $row['id'] ? 'selected' : '' ?>><?php echo $row['fname']?> <?php echo $row['lname']?></option>
                                            <?php
                                        }
                                    } 
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Select Month</label>
                                <input type="month" value="<?php echo $_POST['month'];?>" class="form-control" name="month" >
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Number of Leaves</label>
                                <input type="number" value="<?php echo $_POST['leave'];?>" class="form-control" name="leave" >
                            </div>
                        </div>
                        <div class="col-md-3 " style="    padding-top: 30px;">
                            <input type="submit" name="submit" value="Submit" class="btn btn-secondary" require></input>
                        </div>
                      
                    </div>  

                    <!-- /.row -->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    </form>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Create button -->
                        
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        
                                        <th></th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Client Name</th>
                                        <th>Tatto Type</th>
                                        <th>Piercing Charge</th>
                                        <th>Customization</th>
                                        <th>Custom Design</th>
                                        <th>Laser</th>
                                        <th>Product Charge</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                     $salary = 0;
                                     $type = '';
                                     $artistName = '';
                                        if(isset($_POST['submit'])){
                                            $artist_id = isset($_POST['artist_id']) ? $_POST["artist_id"] : '0';
                                            $month = isset($_POST['month']) ? $_POST['month'] : '2022-09';
                                            $leave = isset($_POST['leave']) ? $_POST['leave'] : '0';
                                            $stock = isset($_POST['stock']) ? $_POST['stock'] : 'stock';
                                            $totalSale = 0;
                                            $totalCustomisation = 0;
                                            $totaCustom_design = 0;
                                            $totalLaser = 0;
                                            $totalPiercing = 0;
                                            $totalProduct = 0;
                                  
                                           
                                           
                                            $id = 1;
                                            $sql= "SELECT transaction.serial_no, transaction.id, transaction.contact_no, transaction.tattoo_type,
                                             transaction.customisation_charg, transaction.total, transaction.payment_type, 
                                             transaction.tattoo_type, transaction.payment_type, transaction.date, 
                                             transaction.charge_custom, transaction.charge_custom_design, transaction.charge_product, 
                                             transaction.charge_piercing, transaction.charge_laser, 
                                             transaction.has_customization, transaction.has_custom_design, transaction.has_laser, 
                                             product.product_name, 
                                             CONCAT_WS(' ', customer.fname, customer.lname ) AS `customer_name` , 
                                             CONCAT_WS(' ', artist.fname, artist.lname ) AS `artist_name`
                                                    
                                             FROM transaction, customer, artist, product
                                             WHERE transaction.client_id = customer.id 
                                             AND transaction.artist_id = artist.id 
                                             AND transaction.product_id = product.id 
                                             AND transaction.artist_id = '". $artist_id. "' 
                                             AND transaction.date_month = '". $month. "'
                                             ORDER BY 1,2";      

                                            $result =mysqli_query($conn,$sql) or die("query failed". mysqli_error());
                                            if($row = mysqli_num_rows($result)>0){
                                                while($row = mysqli_fetch_assoc($result)){
                                                    $totalSale = $totalSale + $row['total'];
                                                   if($row['has_customization']) {
                                                    $totalCustomisation =  $totalCustomisation + $row['charge_custom'];
                                                   }
                                                   if($row['has_custom_design']) {
                                                    $totaCustom_design =  $totaCustom_design + $row['charge_custom_design'];
                                                   }
                                                   if($row['has_laser']) {
                                                    $totalLaser =  $totalLaser + $row['charge_laser'];
                                                   }
                                                   if($row['tattoo_type'] == 'Piercing') {
                                                    $totalPiercing =  $totalPiercing + $row['charge_piercing'];
                                                   }
                                                   $totalProduct = $totalProduct +  $row['charge_product']
                                                   
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $id ?></td>
                                                        <td><?php echo $row['artist_name'] ?></td>
                                                        <td><?php echo $row['date'] ;  ?></td>
                                                        <td><?php echo $row['customer_name'] ?></td>
                                                        <td><?php echo $row['tattoo_type'] ?></td>
                                                        <td><?php echo $row['charge_piercing'] ?></td>
                                                        <td><?php echo $row['charge_custom'] ?></td>
                                                        <td><?php echo $row['charge_custom_design'] ?></td>
                                                        <td><?php echo $row['charge_laser'] ?></td>
                                                        <td><?php echo $row['charge_product'] ?></td>
                                                        <td><?php echo $row['total'] ?></td>
                                                    </tr>
                                                <?php
                                                $id= $id +1;
                                                }
                                            }
                                            $sql1= "SELECT * FROM artist 
                                            WHERE  id = '". $artist_id. "'
                                            ORDER BY 1,2;";
                                                $result1 = mysqli_query($conn,$sql1) or die("query 1 failed". mysqli_error());
                                                if($row1 = mysqli_num_rows($result1)>0){
                                                    while($row1 = mysqli_fetch_assoc($result1)){
                                                        $artistName = $row1['fname'] . " " .  $row1['lname'];
                                                        $salary = $row1['salary'];
                                                        $type = $row1['type'];
    
                                                    }
                                                }
                                        }
                                    ?>
                                </tbody>
                            </table>

                            <hr/>
                            <div>
                              Artist Name:   <strong><?php echo $artistName; ?> </strong> ( <?php echo $type ?>)
                            </div>
                           
                            <table id="example3" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Total Sale</th>
                                        <th>Comission</th>
                                        <th>Incentive</th>
                                        <th>Customization</th>
                                        <th>Custom Design</th>
                                        <th>Laser</th>
                                        <th>Piercing</th>
                                        <th>Product Sale</th>
                                        <th>Total Salary</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                
                                 $incentiveP = 0;
                                 $incentiveE = 0;
                                    if(isset($_POST['submit'])){
                                       
                                

                                        
                                        // $sql2= "SELECT type, sale FROM salary_criteria_ 
                                        // WHERE type = '". $type. "'
                                        // ORDER BY 1,2;";
                                        // $salaryCriteria = array();

                                        //     $result2 = mysqli_query($conn,$sql2) or die("query 2 failed". mysqli_error());
                                        //     if($row2 = mysqli_num_rows($result2)>0){
                                        //         while($row2 = mysqli_fetch_assoc($result2)){
                                        //             array_push($salaryCriteria,$row2['sale']);
                                                        
                                        //         }
                                        //     }
                                            
                                        //     $minSal = 0;
                                        //     $maxSal = 0;
                                        //     for($i = 0 ; $i < count($salaryCriteria); $i++) {
                                        //         // echo $salaryCriteria[$i];
                                        //         // echo '</br>';
                                        //         if($totalSale >= $salaryCriteria[$i] ){
                                        //             $minSal = $salaryCriteria[$i];
                                        //         } else {
                                        //             $maxSal = $salaryCriteria[$i];
                                        //             break;
                                        //         }
                                        //         $count = count($salaryCriteria)-1;
                                        //         $maxSal = $salaryCriteria[$count];
                                        //     }
                                            // echo '</br>';
                                            // echo '----------------';
                                            // echo $minSal;
                                            // echo $maxSal;
                                            // // for($i = 0; $i < count($salaryCriteria) - 1 ; $i++) {
                                            // //     $p = $i + 1;
                                            
                                            // // }
                                            $sql3= "SELECT * FROM `salary_rule` WHERE type = '". $type. "'";
                                           
                                            $result3 = mysqli_query($conn,$sql3) or die("query 3 failed". mysqli_error());
                                            
                                            $your_incentive_p = 0;
                                            $your_incentive_e = 0;
                                            if($row3 = mysqli_num_rows($result3)>0){
                                                while($row3 = mysqli_fetch_assoc($result3)){
                                                   $your_incentive_p = $row3['incentive_p'];
                                                   $your_incentive_e = $row3['incentive_e'];
                                                   $your_customization = $row3['customization'];
                                                   $your_custom_design = $row3['custom_design'];
                                                   $your_laser = $row3['laser'];
                                                   $your_product = $row3['product'];
                                                   $your_piercing = $row3['piercing'];
                                                   $no_of_leaves = $row3['no_of_leaves'];
                                                   $leave_deduaction = $row3['leave_deduaction'];
                                                   $leave_award = $row3['leave_award'];
                                                }
                                             }
                                            
                                          
                                             $totalSalaryCommission =  ($totalSale * $your_incentive_p/100);
                                             $totalSalaryIncentive =  ($totalSale * $your_incentive_e/100) ;
                                             $totalSalaryCustomization =  ($totalCustomisation * $your_customization/100);
                                             $totalSalaryCustom_design =  ($totaCustom_design * $your_custom_design/100) ;
                                             $totalSalaryLaser =  ($totalLaser * $your_incentive_p/100);
                                             $totalSalaryPiercing =  ($totalPiercing * $your_piercing/100);
                                             $totalSalaryProduct =  ($totalProduct * $your_product/100);

                                             $totalSalaryToGiven =  $totalSalaryCommission +  $totalSalaryIncentive + 
                                             $totalSalaryCustomization + $totalSalaryCustom_design + $totalSalaryLaser + 
                                             $totalSalaryPiercing ;
                                   
                                             if($leave > $no_of_leaves ){
                                                $totalSalaryToGivenAfterLeave  = $totalSalaryToGiven - $leave_deduaction;
                                             } else {
                                                $totalSalaryToGivenAfterLeave  = $totalSalaryToGiven + $leave_award;
                                             }
                                            }
                                ?>
                              
                                    <script>
                                 
                                    </script>
                                     <tr>
                                           
                                            <td></td>
                                            <td><?php echo $your_incentive_p?>%</td>
                                            <td><?php echo $your_incentive_e ?>%</td>
                                            <td><?php echo $your_customization ?>%</td>
                                            <td><?php echo $your_custom_design ?>%</td>
                                            <td><?php echo $your_laser ?>%</td>
                                            <td><?php echo $your_piercing ?>%</td>
                                            <td></td>
                                            <td></td>
                                    </tr>
                                   
                                     <tr>
                                          
                                            <td><?php echo $totalSale ?></td>
                                            <td><?php echo $totalSale?></td>
                                            <td><?php echo $totalSale ?></td>
                                            <td><?php echo $totalCustomisation ?></td>
                                            <td><?php echo $totaCustom_design ?></td>
                                            <td><?php echo $totalLaser ?></td>
                                            <td><?php echo $totalPiercing ?></td>
                                            <td><?php echo $totalProduct ?></td>
                                            <td></td>
                                    </tr>
                                     <tr>
                                            
                                            <td><?php echo $totalSale ?></td>
                                            <td><?php echo $totalSalaryCommission ?></td>
                                            <td><?php echo $totalSalaryIncentive?></td>
                                            <td><?php echo $totalSalaryCustomization ?></td>
                                            <td><?php echo $totalSalaryCustom_design ?></td>
                                            <td><?php echo $totalSalaryLaser ?></td>
                                            <td><?php echo $totalSalaryPiercing ?></td>
                                            <td></td>
                                            <td><?php echo $totalSalaryToGiven ?></td>
                                    </tr> 
                                    <tr>
                                           
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            
                                            <td>
                                                Allowded Leaves
                                                <div><?php echo $no_of_leaves; ?></div>
                                            </td>
                                            <td>
                                                Leaves Deduction
                                                <div><?php echo $leave_deduaction; ?></div>
                                            </td>
                                            <td>
                                                Leaves Allowance
                                            <div><?php echo $leave_award; ?></div>
                                            </td>
                                            <td>
                                                 Leaves Taken
                                                <div><?php echo $leave; ?></div>
                                            </td>
                                            <td></td>
                                            <td><strong><?php echo $totalSalaryToGivenAfterLeave; ?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- footer -->
<?php include "./footer/footer.php" ?>

<?php include "./data-tabel-js.php" ?>
