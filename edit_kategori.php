<?php
include 'header.php';
if ($_GET['id']) {
  $id_pen = $_GET['id'];
  $qwrty = $konek->query("select * from kategori where id_kategori ='".$id_pen."' ");
  $fect = $qwrty->fetch_array(MYSQLI_ASSOC);
  $nm_kategori = $fect['nama_kategori'];
  $id_kategori = $fect['id_kategori'];
}else {
    $nm_kategori = "";
}


 ?>
 <div class="container">
   <h3>form input kategori</h3>
   <form action="update_kategori.php" method="post">
     <input type="hidden" name="id_tulis" value="<?php echo $id_kategori; ?>">
     <div class="form-group row">
       <label class="col-sm-2 col-form-label">Nama kategori</label>
       <div class="col-sm-10">
         <input type="text" name="kategori"
         placeholder="Masukan Nama kategori Baru" class="form-control" value="<?php echo $nm_kategori; ?>" required>
       </div>
     </div>

     <div class="form-group row">
       <label class="col-sm-2 col-form-label"></label>
       <div class="col-sm-10">
              <button type="submit" name="simpan" class="btn btn-danger">Update Data</button>
         <a href="data_kategori.php" class="btn btn-primary">Batal</a>
       </div>
     </div>

       <?php


          ?>
   </form>
 </div>
 <?php
 include 'footer.php';
 ?>
