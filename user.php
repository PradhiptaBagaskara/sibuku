<?php
include 'header.php';
 ?>
 <div class="container">
    <div class="row">
      <div class="col-8">
        <h3>DATA USER</h3>
      </div>
      <div class="col-4">
        <form method="post" class="form-inline" action="<?php echo $_SERVER['PHP_SELF'];?>">
          <div class="form-group mx-sm-3 mb-2">
            <label for="inputPasswod2" class="sr-only">Password</label>
            <input type="text" name="" class="form-control" name="keybord" placeholder="Masukan keybord">
          </div>
          <button name="pencarian" type="text" class="btn btn-primary mb-2">Cari Data</button>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <table class="table table-bordered">
          <tr>
            <th width="10px":>NO</th>
            <th>NAMA LENGKAP</th>
            <th>USERNAME</th>
            <th>EMAIL</th>
            <th width="130">Aksi</th>
          </tr>

          <?php
          $batas =6;
          $halaman = isset($_GET['hal']) ? $_GET['hal'] : 0;
          if (isset($_POST['pencarian'])) {
            // query pencarian data
            $keybord = $_POST['keybord'];
            $sql = "SELECT * from user where nama_lengkap like '%$keybord%' order by nama_lengkap ASC limit $halaman,$batas";
          }else {
            // query menampilkan data biasa
          $sql ="SELECT * from user order by nama_lengkap ASC limit $halaman,$batas";
        }
        $buku = mysqli_query($konek, $sql);
        $no=0;
        while ($row= mysqli_fetch_array($buku)) {
          $no++;
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row['nama_lengkap']; ?></td>
            <td><?php echo $row['nama_user']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><a class="btn btn-success btn-sm" href="edit_user.php?id=<?=$row['id_user']?>">edit</a>
               <a onclick="return konfirmasi()" class="btn btn-danger btn-sm" href="delete_user.php?id=<?=$row['id_user']?>">delete</a> </td>
          </tr>

          <?php
        }
           ?>
        </table>
        <div class="float-right">
          <nav arial-label="page navigation example">
            <ul class="pagination">

              <?php
              if (!isset($_GET['hal']) or ($_GET['hal']==1)){
                $prev = 1 ;
              }else {
                $prev = $_GET['hal'] -1;
              }
               ?>

               <li class="page-item"><a class="page-link" href="user.php?hal=<?php echo $prev; ?>">previous</a> </li>
               <?php
               $sql2 = mysqli_query($konek, "SELECT * from user");
               $jml_data = mysqli_num_rows($sql2);
               $jml_halaman = ceil ($jml_data / $batas);
               for ($hal=1; $hal <=$jml_halaman ; $hal++) {
                 echo "<li class='page-item'><a class='page-link' href ='user.php?hal=$hal'>$hal</a></li>";
               }
                ?>
                <li class="page-item"><a class="page-link" href="user.php?hal=<?php echo $halaman +1 ?>">next</a></li>
            </ul>
          </nav>
        </div>
        <a href="input_user.php" class="btn btn-danger btn-sm">Input Data User</a>

      </div>
    </div>
  </div>
  <?php
  include 'footer.php';
   ?>
