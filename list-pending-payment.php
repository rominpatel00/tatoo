<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Black Opal Ink</title>

    <!-- bootstrap css -->
    <?php include "./header/bootstrap-css.php" ?>

    <!-- datatable css -->
    <?php include "./data-tabel-css.php" ?>


</head>

<!-- navbar-sidebar -->
<?php include "./navbar-sidebar.php" ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2>Pending Payment</h2>
                    <a href="frm-pending-payment.php" type="button" class="btn btn-secondary">Add Pending Payment</a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pending Payment</li>
                       
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

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
                                        <th>Client Name</th>
                                        <th>Contact No</th>
                                        <th>Email id</th>
                                        <th>Artist Name</th>
                                        <th>Pending amount</th>
                                        <th>Created Date</th>
                                        <th>Expected Date</th>
                                        <th>Payment Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                include "config.php";
                                $id = 0;
                                $sql= "SELECT pending_amount.*, customer.fname, customer.lname,customer.mname, artist.fname as aFname, artist.lname as aLname,artist.mname as aMname, customer.email,customer.contact from pending_amount JOIN customer on customer.id = pending_amount.customer_id JOIN artist on artist.id = pending_amount.artist_id ORDER BY pending_amount.id DESC;";
                                $result =mysqli_query($conn,$sql) or die("query failed". mysqli_error());
                                if($row = mysqli_num_rows($result)>0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $id = $id +1;
                                        ?>
                                                <tr>
                                                    <td><?php echo $row['id'] ?></td>
                                                    <td><?php echo $row['fname'] ?> <?php echo $row['mname']?>  <?php echo $row['lname']?></td>
                                                    <td><?php echo $row['contact'] ?></td>
                                                    <td><?php echo $row['email']?></td>
                                                    <td><?php echo $row['aFname'] ?> <?php echo $row['aMname']?>  <?php echo $row['aLname']?></td>
                                                    <td><?php echo $row['pending_amount'];?></td>
                                                    <td><?php echo $row['created_date'];?></td>
                                                    <td><?php echo $row['expected_date'];?></td>
                                                    <td><?php echo $row['status'];?></td>
                                                    <td>
                                <a href="frm-pending-payment-update.php?id=<?php echo $row['id']?>"><button class='btn btn-primary'><i class='fa fa-edit'></i></button></a>
                                <a href="frm-pending-payment-delete.php?id=<?php echo $row['id']?>"><button class='btn btn-danger'><i class='fa fa-trash'></i></button></a>
                                </td>
                                                </tr>
                                            <?php
                                    }
                                } 
                            ?>
                                  


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



</body>

</html>