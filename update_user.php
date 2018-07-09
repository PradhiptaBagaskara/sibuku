<<?php
$nama_lengkap = $_POST['nama_lengkap'];
$options = array("cost"=>4);
$pass = password_hash($_POST['password'] ,PASSWORD_BCRYPT,$options);
$email = $_POST['email'];
$id_user = $_POST['id_user'];
$user         = $_POST['user'];
include 'koneksi.php';
if (empty($pass)){
  $sql = "update user set nama_lengkap='$nama_lengkap',nama_user='$user',email='$email'where id_user='$id_user'";
}
else{
  $sql = "update user set nama_lengkap='$nama_lengkap',email='$email',nama_user='$user',password='$pass' where id_user='$id_user'";
}

$insert = mysqli_query($konek, $sql);
header("location:edit_user.php?id=".$id_user."&&update=success");
 ?>
