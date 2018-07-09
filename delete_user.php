<?php
$id_user = $_GET['id'];
if($id_user)
{
  include 'koneksi.php';
  $delete = mysqli_query($konek, "delete from user where id_user='$id_user'");
}
header("location:user.php");
 ?>
