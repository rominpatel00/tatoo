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
                    <h2>Artist list</h2>
                    <a href="frm-artist.php" type="button" class="btn btn-secondary">Create Artist</a>
                    
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User list</li>
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
                                        <th>Name</th>
                                        <th>Contact No</th>
                                        <th>Email id</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>District</th>
                                        <th>Zip</th>
                                        <th>Type</th>
                                        <th>Salary</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    include "config.php";
                                    $id = 0;
                                    $sql= "SELECT * FROM artist ORDER BY id DESC";
                                    $result =mysqli_query($conn,$sql) or die("query failed". mysqli_error());
                                    if($row = mysqli_num_rows($result)>0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $id = $id +1;
                                        ?>
                                        <tr>
                                            <td><?php echo $id ?></td>
                                            <td><?php echo $row['fname'] ?> <?php echo $row['mname']?>  <?php echo $row['lname']?></td>
                                            <td><?php echo $row['contact'] ?></td>
                                            <td><?php echo $row['email']?></td>
                                            <td><?php echo $row['address']?></td>
                                            <td><?php echo $row['city'] ?></td>
                                            <td><?php echo $row['district']?></td>
                                            <td><?php echo $row['zip']?></td>
                                            <td><?php echo $row['type']?></td>
                                            <td><?php echo $row['salary']?></td>
                                            <td>
                                            <a href="frm-artist-update.php?id=<?php echo $row['id']?>"><button class='btn btn-primary'><i class='fa fa-edit'></i></button></a>
                                    <a href="frm-artist-delete.php?id=<?php echo $row['id']?>"><button class='btn btn-danger'><i class='fa fa-trash'></i></button></a>
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