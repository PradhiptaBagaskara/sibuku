<?php
include 'header.php';
 ?>
 <div class="container">
    <div class="row">
      <div class="col-8">
        <h3>DATA PENULIS</h3>
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
            <th>NAMA PENULIS</th>
            <th width="130">Aksi</th>
          </tr>

          <?php
          $batas =6;
          $halaman = isset($_GET['hal']) ? $_GET['hal'] : 0;
          if (isset($_POST['pencarian'])) {
            // query pencarian data
            $keybord = $_POST['keybord'];
            $sql = "SELECT * from penulis where nama_penulis like '%$keybord%' order by nama_penulis ASC limit $halaman,$batas";
          }else {
            // query menampilkan data biasa
          $sql ="SELECT * from penulis order by nama_penulis ASC limit $halaman,$batas";
        }
        $buku = mysqli_query($konek, $sql);
        $no=0;
        while ($row= mysqli_fetch_array($buku)) {
          $no++;
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row['nama_penulis']; ?></td>
            <td><a  class="btn btn-success btn-sm" href="edit_penulis.php?id=<?php echo $row['id_penulis']; ?>">edit</a>
               <a onclick="return konfirmasi()" class="btn btn-danger btn-sm" href="del_penulis.php?id=<?php echo $row['id_penulis']; ?>">delete</a> </td>
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
               <li class="page-item"><a class="page-link" href="index.php?hal=<?php echo $prev; ?>">previous</a></li>
               <?php
               $sql2 = mysqli_query($konek, "SELECT * from user");
               $jml_data = mysqli_num_rows($sql2);
               $jml_halaman = ceil ($jml_data / $batas);
               for ($hal=1; $hal <=$jml_halaman ; $hal++) {
                 echo "<li class='page-item'><a class='page-link' href ='index.php?hal=$hal'>$hal</a></li>";
               }
                ?>
                <li class="page-item"><a class="page-link" href="index.php?hal=<?php echo $halaman +1 ?>">NEXT</a></li>
            </ul>
          </nav>
        </div>
        <a href="input_penulis.php" class="btn btn-danger btn-sm">Input Data Penulis</a>

      </div>
    </div>
  </div>

  <?php
  include 'footer.php';
   ?>
