<?php
include "header.php";
include 'function.php';


if (isset($_GET['id_buku'])){
  $isb        = mysqli_escape_string($konek, $_GET['id_buku']);
  $quer       = mysqli_query($konek, "select * from buku where id_buku = '". $isb ."'");
  $qwr        = mysqli_fetch_array($quer);
  $isbn       = $qwr['isbn'];
  $judul      = $qwr['judul_buku'];
  $writer     = $qwr['id_penulis'];
  $categori   = $qwr['id_kategori'];
  $desk       = htmlspecialchars($qwr['deskripsi']);
  $rego       = $qwr['harga'];
  $button     = "update";
  $btn_nm     = "Update Data";
  $jpeg       = "<img src='cover/".$qwr['cover']."' width='60px' height='80px'>";
}else {
  $isbn       = "";
  $judul      = "";
  $writer     = "";
  $categori   = "";
  $desk       = "";
  $rego       = "";
  $button     = "simpan";
  $btn_nm     = "Simpan Data";
  $jpeg       = "";



}

 ?>
 <img src="" alt="" >
 <div class="container">
   <h3>Form Input Buku</h3>
   <form action="" method="post" enctype="multipart/form-data">
     <div class="form-group row">
       <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
       <div class="col-sm-10">
         <input type="text" name="isbn" class="form-control" placeholder="Masukan ISBN" value="<?php echo $isbn;?>" >
       </div>
     </div>
     <div class="form-group row">
       <label for="isbn" class="col-sm-2 col-form-label">Judul Buku</label>
       <div class="col-sm-10">
         <input type="text" name="judul_buku" class="form-control" placeholder="Masukan Judul Buku" value="<?php echo $judul;?>">
       </div>
     </div>
     <div class="form-group row">
       <label for="isbn" class="col-sm-2 col-form-label">Penulis</label>
       <div class="col-sm-10">
         <select class="form-control" name="penulis" >
           <?php
           if ($writer != "") {
             $wri = $konek->query("select * from penulis where id_penulis = '".$writer."'");
             $update_w = $wri->fetch_array(MYSQLI_ASSOC);
             echo "<option value='".strtoupper($update_w['id_penulis'])."'>".$update_w['nama_penulis']."</option>";
           }else {
             echo "<option>Pilih Penulis</option>";
           }
            ?>
           <?php
           $penulis = $konek->query("select * from penulis");
           while ($p = $penulis->fetch_array(MYSQLI_ASSOC)) {
             ?>
              <option value="<?php echo $p['id_penulis'];?>"><?php echo $p['nama_penulis'];?></option>

             <?php
           }


            ?>
         </select>
       </div>
     </div>
     <div class="form-group row">
       <label for="isbn" class="col-sm-2 col-form-label">Kategori</label>
       <div class="col-sm-10">
         <select class="form-control" name="kategori">
           <?php
           $kategori = mysqli_query($konek, "select * from kategori");
           if ($categori != "") {
             $kat = $konek->query("select * from kategori where id_kategori = '".$categori."'");
             $update_k = $kat->fetch_array(MYSQLI_ASSOC);
             echo "<option value='".strtoupper($update_k['id_kategori'])."'>".$update_k['nama_kategori']."</option>";
           }else {
             echo "<option>Pilih Kategori</option>";
           }

           while ($k = mysqli_fetch_array($kategori)) {
             ?>
              <option value="<?php echo strtoupper($k['id_kategori']);?>"><?php echo $k['nama_kategori'];?></option>

             <?php
           }


            ?>
         </select>
       </div>
     </div>
     <div class="form-group row">
       <label for="isbn" class="col-sm-2 col-form-label">Deskripsi</label>
       <div class="col-sm-10">
          <textarea name="deskripsi" class="form-control"><?php echo $desk;?></textarea>
       </div>
     </div>
     <div class="form-group row">
       <label for="isbn" class="col-sm-2 col-form-label">Harga</label>
       <div class="col-sm-10">
         <input type="text" name="harga" class="form-control" placeholder="Masukan Harga" value="<?php echo $rego;?>">
       </div>
     </div>
     <div class="form-group row">
       <label for="isbn" class="col-sm-2 col-form-label">Cover</label>
       <div class="col-sm-10">
         <input type="file" name="cover" >
       </div>
     </div>
     <div class="form-group row">
       <label for="isbn" class="col-sm-2 col-form-label"></label>
       <div class="col-sm-10">
          <?php echo $jpeg; ?>
       </div>
     </div>
     <div class="form-group row">
       <label for="isbn" class="col-sm-2 col-form-label"></label>
       <div class="col-sm-10">
         <button type="submit" class="btn btn-danger" name="<?php echo $button;?>"><?php echo $btn_nm;?></button>
         <a href="index.php" class="btn btn-primary">Batal</a>
       </div>
     </div>
     <div class="form-group row">
       <label for="isbn" class="col-sm-2 col-form-label"></label>
       <div class="col-sm-10">
         <?php
          if (isset($_POST['simpan'])) {
            if (simpanData()) {
                echo "<span class='btn-danger' >".$_SESSION['msg']."</span>";
            }else {
              echo "<span class='btn-success' >".$_SESSION['msg']."</span>";
            }
          }
          if (isset($_POST['update'])) {
            if (updateData()) {
                echo "<span class='btn-danger' >".$_SESSION['msg']."</span>";
            }else {
              echo "<span class='btn-success' >".$_SESSION['msg']."</span>";
            }
          }

          ?>
       </div>
     </div>

   </form>
 </div>

 <?php include 'footer.php'; ?>
