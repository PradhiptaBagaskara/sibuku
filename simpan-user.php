<?php
$nama_lengkap = $_POST['nama_lengkap'];
$options = array("cost"=>4);
$pass         = password_hash($_POST['password'] ,PASSWORD_BCRYPT,$options) ;
$email        = $_POST['email'] ;
$user         = $_POST['user'];
include 'koneksi.php' ;
$sql = "insert into user set nama_lengkap='$nama_lengkap',nama_user='$user',password='$pass',email='$email'";
$insert = mysqli_query($konek, $sql);
header("location:user.php");
 ?>
