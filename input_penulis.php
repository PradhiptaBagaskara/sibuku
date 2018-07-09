<?php
include 'header.php';

if (isset($_POST['simpan'])) {
  if (!empty($_POST['penulis'])) {
  $nmp    = mysqli_escape_string($konek, $_POST['penulis']);
  $input = $konek->query("insert into penulis set nama_penulis = '".$nmp."'");
  if ($input) {
    header("location: input_penulis.php?input=success");
  }else {
    header("location: input_penulis.php?input=gagal");
  }
}

}

 ?>
 <div class="container">
   <h3>form input penulis</h3>
   <form action="input_penulis.php" method="post">
     <div class="form-group row">
       <label class="col-sm-2 col-form-label">Nama Penulis</label>
       <div class="col-sm-10">
         <input type="text" name="penulis"
         placeholder="Masukan Nama Penulis" class="form-control"  required>
       </div>
     </div>

     <div class="form-group row">
       <label class="col-sm-2 col-form-label"></label>
       <div class="col-sm-10">
              <button type="submit" name="simpan" class="btn btn-danger">Simpan Data</button>
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
