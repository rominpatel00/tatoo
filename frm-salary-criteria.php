<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artist</title>

    <!-- bootstrap css -->
    <?php include "././header/bootstrap-css.php" ?>

</head>

<!-- navbar-sidebar -->
<?php include "././navbar-sidebar.php" ?>

<?php

if(isset($_POST['submit'])){
    include "config.php";
   
    $type = isset($_POST['type']) ? $_POST['type'] : '0';
    // $sale1 = isset($_POST['sale-1']) ? $_POST['sale-1'] : '0';
    $incentiveP1 = isset($_POST['incentive-p-1']) ? $_POST['incentive-p-1'] : '0';
    $incentiveE1 = isset($_POST['incentive-e-1']) ? $_POST['incentive-e-1'] : '0';
    $leave_deduaction= isset($_POST['leave_deduaction']) ? $_POST['leave_deduaction'] : '0';
    $no_of_leaves= isset($_POST['no_of_leaves']) ? $_POST['no_of_leaves'] : '0';
    $leave_award= isset($_POST['leave_award']) ? $_POST['leave_award'] : '0';
   
    // $sale2 = isset($_POST['sale-2']) ? $_POST['sale-2'] : '0';
    // $incentiveP2 = isset($_POST['incentive-p-2']) ? $_POST['incentive-p-2'] : '0';
    // $incentiveE2 = isset($_POST['incentive-e-2']) ? $_POST['incentive-e-2'] : '0';
    // $sale3 = isset($_POST['sale-3']) ? $_POST['sale-3'] : '0';
    // $incentiveP3 = isset($_POST['incentive-p-3']) ? $_POST['incentive-p-3'] : '0';
    // $incentiveE3 = isset($_POST['incentive-e-3']) ? $_POST['incentive-e-3'] : '0';
    // $sale4 = isset($_POST['sale-4']) ? $_POST['sale-4'] : '0';
    // $incentiveP4 = isset($_POST['incentive-p-4']) ? $_POST['incentive-p-4'] : '0';
    // $incentiveE4 = isset($_POST['incentive-e-4']) ? $_POST['incentive-e-4'] : '0';
    // $sale5 = isset($_POST['sale-5']) ? $_POST['sale-5'] : '0';
    // $incentiveP5 = isset($_POST['incentive-p-5']) ? $_POST['incentive-p-5'] : '0';
    // $incentiveE5 = isset($_POST['incentive-e-5']) ? $_POST['incentive-e-5'] : '0';
    // $sale6 = isset($_POST['sale-6']) ? $_POST['sale-6'] : '0';
    // $incentiveP6 = isset($_POST['incentive-p-6']) ? $_POST['incentive-p-6'] : '0';
    // $incentiveE6 = isset($_POST['incentive-e-6']) ? $_POST['incentive-e-6'] : '0';
    // $sale7 = isset($_POST['sale-7']) ? $_POST['sale-7'] : '0';
    // $incentiveP7 = isset($_POST['incentive-p-7']) ? $_POST['incentive-p-7'] : '0';
    // $incentiveE7 = isset($_POST['incentive-e-7']) ? $_POST['incentive-e-7'] : '0';
    $customization = isset($_POST['customization']) ? $_POST['customization'] : '0';
    $custom_design= isset($_POST['custom_design']) ? $_POST['custom_design'] : '0';
    $laser = isset($_POST['laser']) ? $_POST['laser'] : '0';
    $piercing = isset($_POST['piercing']) ? $_POST['piercing'] : '0';
    $product= isset($_POST['product']) ? $_POST['product'] : '0';
   
    $sql = "INSERT INTO `salary_rule` ( 
        `type`,
        `sale`, `incentive_p`, `incentive_e`, `customization`, `custom_design`, `laser`, 
        `piercing`, `no_of_leaves`, `leave_deduaction`, `leave_award`, `product`) 
    VALUES ('".$type."','0','".$incentiveP1."','".$incentiveE1."','".$customization."',
    '". $custom_design."','".$laser."','".  $piercing."','". $no_of_leaves."','".$leave_deduaction."',
    '".  $leave_award."', '".  $product."') "; 

    $result = mysqli_query($conn, $sql) or die("Query Failed". mysqli_error());

    if($result){
       
    }else{
        echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Insert product.</p>";
    }       
   
    echo "<script>window.location.href='list-salary-criteria.php';</script>";
    exit;
 
 }
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Artist Salary Criteria</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Artist Salary Criteria</li>
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
                    <h3 class="card-title">Artist Salary Criteria</h3>

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
                                    <label>Type of Artist</label>
                                    <select class="form-control" name="type">
                                        <option value="Emerging Artist">Emerging Artist</option>
                                        <option value="Senior Artist">Senior Artist</option>
                                        <option value="Head Artist">Head Artist</option>
                                        <option value="Pro Artist">Pro Artist</option>
                                        <option value="Fixed Artist">Fixed Artist</option>
                                    </select>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                           
                            <div class="col-md-4">
                                
                                <div class="form-group">
                                    <label>Comission % </label>
                                    <div class="input-group mb-2">
                                        <input type="number" step="0.01" class="form-control" name="incentive-p-1" placeholder="12.9" max="100">
                                        <div class="input-group-append">
                                        <div class="input-group-text">%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Incentive %</label>
                                
                                    <div class="input-group mb-2">
                                        <input type="number" step="0.01" class="form-control" name="incentive-e-1" placeholder="12.9" max="100">
                                        <div class="input-group-append">
                                        <div class="input-group-text">%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <!-- <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sale</label>
                                    <input type="number" step="0.01" name="sale-2"  class="form-control select2" style="width: 100%;">
                                    </input>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Comission % </label>
                                    <div class="input-group mb-2">
                                        <input type="number" step="0.01" class="form-control" name="incentive-p-2" placeholder="12.9" max="100">
                                        <div class="input-group-append">
                                        <div class="input-group-text">%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Incentive %</label>
                                    <div class="input-group mb-2">
                                        <input type="number" step="0.01" class="form-control" name="incentive-e-2" placeholder="12.9" max="100">
                                        <div class="input-group-append">
                                        <div class="input-group-text">%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sale</label>
                                    <input type="number" step="0.01" name="sale-3"  class="form-control select2" style="width: 100%;">
                                    </input>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Comission % </label>
                                    <div class="input-group mb-2">
                                        <input type="number" step="0.01" class="form-control" name="incentive-p-3" placeholder="12.9" max="100">
                                        <div class="input-group-append">
                                        <div class="input-group-text">%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Incentive %</label>
                                    <div class="input-group mb-2">
                                        <input type="number" step="0.01" class="form-control" name="incentive-e-3" placeholder="12.9" max="100">
                                        <div class="input-group-append">
                                        <div class="input-group-text">%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sale</label>
                                    <input type="number" step="0.01" name="sale-4"  class="form-control select2" style="width: 100%;">
                                    </input>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Comission % </label>
                                    <div class="input-group mb-2">
                                        <input type="number" step="0.01" class="form-control" name="incentive-p-4" placeholder="12.9" max="100">
                                        <div class="input-group-append">
                                        <div class="input-group-text">%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Incentive %</label>
                                    <div class="input-group mb-2">
                                        <input type="number" step="0.01" class="form-control" name="incentive-e-4" placeholder="12.9" max="100">
                                        <div class="input-group-append">
                                        <div class="input-group-text">%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                           
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Customization % </label>
                                    <div class="input-group mb-2">
                                        <input type="number" step="0.01" class="form-control" name="customization" placeholder="12.9" max="100">
                                        <div class="input-group-append">
                                        <div class="input-group-text">%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Custom Designs %</label>
                                    <div class="input-group mb-2">
                                        <input type="number" step="0.01" class="form-control" name="custom_design" placeholder="12.9" max="100">
                                        <div class="input-group-append">
                                        <div class="input-group-text">%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Piercing %</label>
                                    <div class="input-group mb-2">
                                        <input type="number" step="0.01" class="form-control" name="piercing" placeholder="12.9" max="100">
                                        <div class="input-group-append">
                                        <div class="input-group-text">%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Laser %</label>
                                    <div class="input-group mb-2">
                                        <input type="number" step="0.01" class="form-control" name="laser" placeholder="12.9" max="100">
                                        <div class="input-group-append">
                                        <div class="input-group-text">%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Product %</label>
                                    <div class="input-group mb-2">
                                        <input type="number" step="0.01" class="form-control" name="product" placeholder="12.9" max="100">
                                        <div class="input-group-append">
                                        <div class="input-group-text">%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sale</label>
                                    <input type="number" step="0.01" name="sale-5"  class="form-control select2" style="width: 100%;">
                                    </input>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Incentive % </label>
                                    <div class="input-group mb-2">
                                        <input type="number" step="0.01" class="form-control" name="incentive-p-5" placeholder="12.9" max="100">
                                        <div class="input-group-append">
                                        <div class="input-group-text">%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Extra Incentive</label>
                                    <div class="input-group mb-2">
                                        <input type="number" step="0.01" class="form-control" name="incentive-e-5" placeholder="12.9" max="100">
                                        <div class="input-group-append">
                                        <div class="input-group-text">%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sale</label>
                                    <input type="number"step="0.01" name="sale-6"  class="form-control select2" style="width: 100%;">
                                    </input>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Incentive % </label>
                                    <div class="input-group mb-2">
                                        <input type="number" step="0.01" class="form-control" name="incentive-p-6" placeholder="12.9" max="100">
                                        <div class="input-group-append">
                                        <div class="input-group-text">%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Extra Incentive</label>
                                    <div class="input-group mb-2">
                                        <input type="number" step="0.01" class="form-control" name="incentive-e-6" placeholder="12.9" max="100">
                                        <div class="input-group-append">
                                        <div class="input-group-text">%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sale</label>
                                    <input type="number" step="0.01" name="sale-7"  class="form-control select2" style="width: 100%;">
                                    </input>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Incentive % </label>
                                    <div class="input-group mb-2">
                                        <input type="number"  step="0.01"class="form-control" name="incentive-p-7" placeholder="12.9" max="100">
                                        <div class="input-group-append">
                                        <div class="input-group-text">%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Extra Incentive</label>
                                    <div class="input-group mb-2">
                                        <input type="number" step="0.01" class="form-control" name="incentive-e-7" placeholder="12.9" max="100">
                                        <div class="input-group-append">
                                        <div class="input-group-text">%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Number of leaves allowded</label>
                                        <div class="input-group mb-2">
                                            <input type="number" step="1" class="form-control"  name="no_of_leaves" placeholder="3" max="30">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Additional leaves will reduce their payment by</label>
                                        <div class="input-group mb-2">
                                            <input type="number" step="0.01" class="form-control"   name="leave_deduaction" placeholder="12.9" max="1000000">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Incentive if no further leaves are taken</label>
                                        <div class="input-group mb-2">
                                            <input type="number" step="0.01" class="form-control"  name="leave_award" placeholder="12.9" max="1000000">
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


<!-- footer -->
<?php include "././footer/footer.php" ?>

<!-- footer pluggins-->
<?php include "././footer/footer-plugins.php" ?>