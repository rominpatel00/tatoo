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
include "config.php";
if(isset($_POST['submit'])){
    include "config.php";
    $id = isset($_POST['id']) ? $_POST['id'] : 'id';
    $type = isset($_POST['type']) ? $_POST['type'] : '0';
    $incentiveP1 = isset($_POST['incentive-p-1']) ? $_POST['incentive-p-1'] : '0';
    $incentiveE1 = isset($_POST['incentive-e-1']) ? $_POST['incentive-e-1'] : '0';
    $customization = isset($_POST['customization']) ? $_POST['customization'] : '0';
    $custom_design= isset($_POST['custom_design']) ? $_POST['custom_design'] : '0';
    $leave_deduaction= isset($_POST['leave_deduaction']) ? $_POST['leave_deduaction'] : '0';
    $no_of_leaves= isset($_POST['no_of_leaves']) ? $_POST['no_of_leaves'] : '0';
    $leave_award= isset($_POST['leave_award']) ? $_POST['leave_award'] : '0';
    $laser = isset($_POST['laser']) ? $_POST['laser'] : '0';
    $piercing = isset($_POST['piercing']) ? $_POST['piercing'] : '0';
    $product = isset($_POST['product']) ? $_POST['product'] : '0';
   
    $sql = "UPDATE  `salary_rule` SET 
        `type` = '{$type}',
        `incentive_p` = '{$incentiveP1}',
        `incentive_e` = '{$incentiveE1}',
        `customization` = '{$customization}',
        `custom_design` = '{$custom_design}',
        `laser` = '{$laser}',
        `piercing` = '{$piercing}',
        `no_of_leaves` = '{$no_of_leaves}',
        `leave_deduaction` = '{$leave_deduaction}',
        `leave_award` = '{$leave_award}',
        `product` = '{$product}'
         WHERE id = '{$id}'"; 

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
    <?php 
     $id = isset($_GET['id']) ? $_GET['id'] : 'id';
     $sql = "SELECT * FROM salary_rule WHERE id = '{$id}'";
       
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
                                        <input type="hidden" class="form-control" value="<?php echo $id;?>" name="id" >
                                        <select class="form-control" name="type">
                                            <option value="Emerging Artist" <?php echo $row['type'] ===  'Emerging Artist' ? 'selected' : ''?>>Emerging Artist</option>
                                            <option value="Senior Artist" <?php echo $row['type'] ===  'Senior Artist' ? 'selected' : ''?>>Senior Artist</option>
                                            <option value="Head Artist" <?php echo $row['type'] ===  'Head Artist' ? 'selected' : ''?>>Head Artist</option>
                                            <option value="Pro Artist" <?php echo $row['type'] ===  'Pro Artist' ? 'selected' : ''?>>Pro Artist</option>
                                        </select>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            
                                <div class="col-md-4">
                                    
                                    <div class="form-group">
                                        <label>Comission % </label>
                                        <div class="input-group mb-2">
                                            <input type="number" step="0.01" class="form-control" value="<?php echo $row['incentive_p'];?>" name="incentive-p-1" placeholder="12.9" max="100">
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
                                            <input type="number" step="0.01" class="form-control" value="<?php echo $row['incentive_e'];?>" name="incentive-e-1" placeholder="12.9" max="100">
                                            <div class="input-group-append">
                                            <div class="input-group-text">%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                            
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Customization % </label>
                                        <div class="input-group mb-2">
                                            <input type="number" step="0.01" class="form-control"  value="<?php echo $row['customization'];?>" name="customization" placeholder="12.9" max="100">
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
                                            <input type="number" step="0.01" class="form-control"  value="<?php echo $row['custom_design'];?>" name="custom_design" placeholder="12.9" max="100">
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
                                            <input type="number" step="0.01" class="form-control"  value="<?php echo $row['piercing'];?>" name="piercing" placeholder="12.9" max="100">
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
                                            <input type="number" step="0.01" class="form-control"  value="<?php echo $row['laser'];?>" name="laser" placeholder="12.9" max="100">
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
                                            <input type="number" step="0.01" class="form-control"  value="<?php echo $row['product'];?>" name="product" placeholder="12.9" max="100">
                                            <div class="input-group-append">
                                            <div class="input-group-text">%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Number of leaves allowded</label>
                                        <div class="input-group mb-2">
                                            <input type="number" step="1" class="form-control"  value="<?php echo $row['no_of_leaves'];?>" name="no_of_leaves" placeholder="3" max="30">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Additional leaves will reduce their payment by</label>
                                        <div class="input-group mb-2">
                                            <input type="number" step="0.01" class="form-control"  value="<?php echo $row['leave_deduaction'];?>" name="leave_deduaction" placeholder="12.9" max="1000000">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Incentive if no further leaves are taken</label>
                                        <div class="input-group mb-2">
                                            <input type="number" step="0.01" class="form-control"  value="<?php echo $row['leave_award'];?>" name="leave_award" placeholder="12.9" max="1000000">
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
    <?php }
     }
     ?>
    <!-- /.content -->
</div>


<!-- footer -->
<?php include "././footer/footer.php" ?>

<!-- footer pluggins-->
<?php include "././footer/footer-plugins.php" ?>