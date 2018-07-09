<?php
include 'header.php';

if (isset($_POST['simpan'])) {
  if (!empty($_POST['kategori'])) {
  $nmp    = mysqli_escape_string($konek, $_POST['kategori']);
  $input = $konek->query("insert into kategori set nama_kategori = '".$nmp."'");
  if ($input) {
    header("location: input_kategori.php?input=success");
  }else {
    header("location: input_kategori.php?input=gagal");
  }
}

}

 ?>
 <div class="container">
   <h3>form input kategori</h3>
   <form action="input_kategori.php" method="post">
     <div class="form-group row">
       <label class="col-sm-2 col-form-label">Nama Kategori</label>
       <div class="col-sm-10">
         <input type="text" name="kategori"
         placeholder="Masukan Nama kategori" class="form-control"  required>
       </div>
     </div>

     <div class="form-group row">
       <label class="col-sm-2 col-form-label"></label>
       <div class="col-sm-10">
              <button type="submit" name="simpan" class="btn btn-danger">Simpan Data</button>
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
