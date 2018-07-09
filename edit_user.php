<?php
include 'header.php';
$id_user = $_GET['id'];
$user = mysqli_query($konek, "select * from user where id_user='$id_user'");
$row = mysqli_fetch_array($user);
?>
 <div class="container">
   <h3>form input user</h3>
   <form action="update_user.php" method="POST">
     <input type="hidden" name="id_user" value="<?php echo $id_user;?>">
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
        <div class="col-sm-10">
          <input type="text" name="nama_lengkap"
          placeholder="Masukan Nama Lengkap" class="form-control" value="<?php echo $row['nama_lengkap'];?>">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama User</label>
        <div class="col-sm-10">
          <input type="text" name="user"
          placeholder="Masukan Nama User" class="form-control" value="<?=$row['nama_user'];?>">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" name="email" placeholder="Masukan Email" class="form-control" value="<?=$row['email'];?>">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" name="password"
          placeholder="Masukan Password Baru" class="form-control">
        </div>
      </div>
         <div class="form-group row">
           <label class="col-sm-2 col-form-label"></label>
           <div class=col-sm-10>
             <button type="submit" class="btn btn-danger">Simpan Data</button>
             <a href="user.php" class="btn btn-primary">Batal</a>
           </div>
         </div>
         <?php
          if (isset($_GET['id']) && isset($_GET['update']) == "success") {
            ?>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label"></label>
              <div class=col-sm-10>
                <p class="btn btn-primary">Update User Telah Berhasil</p>
              </div>
            </div>
            <?php
          }

            ?>

       </form>
     </div>
     <?php
     include 'footer.php';
     ?>
