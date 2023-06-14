<?php
$localhost = "localhost";
// $username = "black-opal-ink-tatoo";
$username = "root";
// $password = "Ij#Z&{GkV[.R";
$password = "";
$db_name = "black-opal-ink-tatoo";



$conn = mysqli_connect($localhost,$username,$password,$db_name) or die("Query failed".mysqli_error());

?>