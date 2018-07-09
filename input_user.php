<?php
include 'header.php';
 ?>
 <div class="container">
   <h3>form input user</h3>
   <form action="simpan-user.php" method="post">
     <div class="form-group row">
       <label class="col-sm-2 col-form-label">Nama Lengkap</label>
       <div class="col-sm-10">
         <input type="text" name="nama_lengkap"
         placeholder="Masukan Nama Lengkap" class="form-control">
       </div>
     </div>

     <div class="form-group row">
       <label class="col-sm-2 col-form-label">Nama User</label>
       <div class="col-sm-10">
         <input type="text" name="user"
         placeholder="Masukan Nama User" class="form-control">
       </div>
     </div>

     <div class="form-group row">
       <label class="col-sm-2 col-form-label">Email</label>
       <div class="col-sm-10">
         <input type="email" name="email" placeholder="Masukan Email" class="form-control">
       </div>
     </div>

     <div class="form-group row">
       <label class="col-sm-2 col-form-label">Password</label>
       <div class="col-sm-10">
         <input type="password" name="password"
         placeholder="Masukan Password" class="form-control">
       </div>
     </div>

       <div class="col-sm-10">
         <button type="submit" class="btn btn-danger">Simpan Data</button>
         <a href="index.php" class="btn btn-primary">Batal</a>
       </div>
   </form>
 </div>
 <?php
 include 'footer.php';
 ?>
