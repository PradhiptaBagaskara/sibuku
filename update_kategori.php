<?php
include 'koneksi.php';
  if (!empty($_POST['kategori'])) {
    $id_pen = $_POST['id_tulis'];
    $nmp    = mysqli_escape_string($konek, $_POST['kategori']);
  $input = $konek->query("update kategori set nama_kategori = '".$nmp."' where id_kategori = '".$id_pen."'");
  if ($input) {
    header("location: data_kategori.php?edit=success");
  }else {
    header("location: data_kategori.php?edit=gagal");
  }
}





 ?>
