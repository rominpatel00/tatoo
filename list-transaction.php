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
                    <h2>Transaction list</h2>
                    <a href="frm-transaction.php" class="btn btn-secondary">Create</a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Transaction list</li>
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
                  
                            
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Serial No</th>
                                        <th>Client</th>
                                        <th>Artist</th>
                                        <th>Product</th>
                                        <th>Tattoo Type</th>
                                        <th>Custo- mization</th>
                                        <th>Custom Design</th>
                                        <th>Laser</th>
                                        <th>Total</th>
                                        <!-- <th>Payment Type</th> -->
                                        <th>Cash</th>
                                        <th>Online</th>
                                        <th>Edit</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    include "config.php";
                                    $id = 0;
                                    $sql= "SELECT transaction.serial_no, transaction.id, transaction.contact_no, transaction.tattoo_type, transaction.customisation_charg, 
                                    transaction.total,transaction.cash_payment,transaction.online_payment, transaction.payment_type,.transaction.tattoo_type, transaction.payment_type, transaction.has_customization,transaction.has_custom_design,transaction.has_laser, transaction.product_id, CONCAT_WS(' ', customer.fname, customer.lname )
                                     AS `customer_name` , CONCAT_WS(' ', artist.fname, artist.lname ) AS `artist_name` FROM transaction, customer, artist, product 
                                    WHERE transaction.client_id = customer.id 
                                    AND transaction.artist_id = artist.id 
                                    AND transaction.product_id = product.id 
                                    ORDER BY transaction.id DESC";

                                    $result =mysqli_query($conn,$sql) or die("query failed". mysqli_error());
                                    if($row = mysqli_num_rows($result)>0){
                                        while($row = mysqli_fetch_assoc($result)){
                                            $id = $id +1;
                                ?>
                                 <script>
                                    console.log('<?= json_encode($row) ?>');
                                    </script>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['serial_no'] ?></td>
                                <td>
                                    <?php echo $row['customer_name'] ?>
                                    <div><?php echo $row['contact_no'] ?></div>
                                </td>
                                <td><?php echo $row['artist_name']?></td>
                                <td><?php
                                $list = $row['product_id'];
                                $sql1 = "SELECT product_name FROM product WHERE id IN ($list)";
                                $res =mysqli_query($conn,$sql1) or die("query failed". mysqli_error());
                               
                                if($rw = mysqli_num_rows($res)>0){
                                    while($rw = mysqli_fetch_assoc($res)){
                                        echo $rw['product_name']. ',';
                                    }
                                }
                                 ?></td>
                                <td><?php echo $row['tattoo_type']?></td>
                                <td><?php echo $row['has_customization'] == 0 ?  'No' :  'Yes'; ?></td>
                                <td><?php echo $row['has_custom_design'] == 0 ?  'No' :  'Yes'; ?></td>
                                <td><?php echo $row['has_laser'] == 0 ?  'No' : 'Yes' ?></td>
                               
                                <td><?php echo $row['total']?></td>
                                <!-- <td><?php // echo $row['payment_type']?></td> -->
                                <td><?php echo $row['cash_payment']?></td>
                                <td><?php echo $row['online_payment']?></td>
                                <td>
                                    <a href="frm-transaction-update.php?id=<?php echo $row['id'];?>"><button class='btn btn-primary'><i class='fa fa-edit'></i></button></a></td>
                                <td>
                                    <a href="frm-transaction-delete.php?id=<?php echo $row['id'];?>"><button class='btn btn-danger'><i class='fa fa-trash'></i></button></a>
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