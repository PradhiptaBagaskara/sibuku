<?php
include 'koneksi.php';
  if (!empty($_POST['penulis'])) {
    $id_pen = $_POST['id_tulis'];
    $nmp    = mysqli_escape_string($konek, $_POST['penulis']);
  $input = $konek->query("update penulis set nama_penulis = '".$nmp."' where id_penulis = '".$id_pen."'");
  if ($input) {
    header("location: data_penulis.php?edit=success");
  }else {
    header("location: data_penulis.php?edit=gagal");
  }
}





 ?>
