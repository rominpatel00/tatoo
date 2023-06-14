
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Black Opal Ink</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">

</head>
<body class="hold-transition login-page">


<?php
 include "config.php";
 session_start();
 

    $id = 0;
    if(isset($_POST['login'])){
        $username = isset($_POST['username']) ? $_POST['username'] : 'username';
        $password = isset($_POST['password']) ? $_POST['password'] : 'password';
        
        $sql = "SELECT * FROM user WHERE email = '$username' and password = '$password'";
   
        $result =mysqli_query($conn,$sql) or die("query failed". mysqli_error());
        if($row = mysqli_num_rows($result)>0){
          while($m = mysqli_fetch_assoc($result)){
            $_SESSION['login_user']=$m['fname'];
            $_SESSION['login_user_id']=$m['id'];
            $_SESSION['user_type']=$m['user_type'];
          }
         
          echo "<script>window.location.href='dashboard.php';</script>";
          exit;
        } else{
          echo "<p style='color:red;text-align:center;margin: 10px 0;'>Wrong User name or password</p>";
        }
  
 }
?>
<div class="login-box">
  <div class="login-logo">
    <a href="./index2.html"><img src="logo.jpg" style="width: 250px;" alt=""></a>
    <div>We Create With Love</div>

  </div>



  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Please Sign In First</p>

      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <div class="input-group mb-4">
          <input type="email" class="form-control" name="username" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-4">
          <input type="password" class="form-control"name="password"  placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block btn-center" name="login">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

     
      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
</body>
</html>
