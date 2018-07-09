<?php
include 'header.php';
if ($_GET['id']) {
  $id_pen = $_GET['id'];
  $qwrty = $konek->query("select * from penulis where id_penulis ='".$id_pen."' ");
  $fect = $qwrty->fetch_array(MYSQLI_ASSOC);
  $nm_penulis = $fect['nama_penulis'];
  $id_penulis = $fect['id_penulis'];
}else {
    $nm_penulis = "";
}


 ?>
 <div class="container">
   <h3>form input penulis</h3>
   <form action="update_penulis.php" method="post">
     <input type="hidden" name="id_tulis" value="<?php echo $id_penulis; ?>">
     <div class="form-group row">
       <label class="col-sm-2 col-form-label">Nama Penulis</label>
       <div class="col-sm-10">
         <input type="text" name="penulis"
         placeholder="Masukan Nama Penulis Baru" class="form-control" value="<?php echo $nm_penulis; ?>" required>
       </div>
     </div>

     <div class="form-group row">
       <label class="col-sm-2 col-form-label"></label>
       <div class="col-sm-10">
              <button type="submit" name="simpan" class="btn btn-danger">Update Data</button>
         <a href="data_penulis.php" class="btn btn-primary">Batal</a>
       </div>
     </div>

       <?php


          ?>
   </form>
 </div>
 <?php
 include 'footer.php';
 ?>
