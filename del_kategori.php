<?php
// penghapusan user
include 'koneksi.php';
if (isset($_GET['id'])) {
  $id_pen = mysqli_escape_string($konek, $_GET['id']);
  $del = $konek->query("delete from kategori where id_kategori='".$_GET['id']."'");
  if ($del) {
    header("location:data_kategori.php?action=delete&&delete=success");
  }else {
    header("location:data_kategori.php?action=delete&&delete=gagal");

  }
}
// akhir script hapus



 ?>
