<?php
include 'koneksi.php';
include 'function.php';
include 'header.php';
?>
<div class="container">
	<div class="row">
		<div class="col-8">
			<h3>Data Buku</h3>
		</div>

	</div>
	<div class="row">
		<div class="col-12">
			<table class="table table-bordered" id="tabel" >
				<thead>
          <tr>
          <th>COVER</th>
					<th>ISBN</th>
					<th>JUDUL BUKU</th>
					<th>PENULIS</th>
					<th>HARGA</th>
					<th>AKSI</th>
        </tr>
				</thead>
				<tbody>
          <?php
            $sql = mysqli_query($konek, "SELECT buku.id_buku,buku.cover,buku.isbn,buku.judul_buku,buku.harga,penulis.nama_penulis,kategori.nama_kategori FROM
              buku, penulis, kategori WHERE buku.id_penulis=penulis.id_penulis AND
              kategori.id_kategori=buku.id_kategori ORDER BY buku.isbn ASC");
            while ($fetch = mysqli_fetch_array($sql) ) {
            ?>
            <tr>

            <td><img src="cover/<?php echo $fetch['cover'];?>" width="40px" height="60px"></td>
            <td><?php echo $fetch['isbn'];?></td>
            <td><?php echo $fetch['judul_buku'];?></td>
            <td><?php echo $fetch['nama_penulis'];?></td>
            <td><?php echo $fetch['harga'];?></td>
            <td>
							<a href="detail.php?id=<?php echo $fetch['id_buku'];?>" class="btn btn-info btn-sm">Detail</a>
							<a href="input_buku.php?id_buku=<?php echo $fetch['id_buku'];?>" class="btn btn-success btn-sm">Edit<a/>
    					<a href="index.php?id_buku=<?php echo $fetch['id_buku'];?>" onclick="return konfirmasi()" class="btn btn-danger btn-sm">Delete</a></td>

            </tr>
            <?php
            }
            if (isset($_GET['id_buku'])) {
              $gmbr = imageBuku($_GET['id_buku']);
              if ($gmbr != '') {
                @unlink("cover/".$gmbr);
              }
              $del = mysqli_query($konek, "delete from buku where id_buku='".$_GET['id_buku']."'");
              if ($del) {
                echo "<script type='text/javascript'>
                  alert('Buku Terhapus');
                </script>";
                header('location: index.php');
              }
            }

            ?>

				</tbody>

				</table>
        <a href="input_buku.php" class="btn btn-danger btn-sm">Input Data Buku</a>
  		</div>
  	</div>
  </div>
  	<!-- data tabel mengurutkan -->
    <script type="text/javascript">
    $(document).ready(function() {
    $('#tabel').DataTable({
            "columnDefs":[
         {
          "targets":[0, 5],
          "orderable":false,
         },
       ],
       "info":     false
    });
      } );
    </script>

  	<?php
  	include 'footer.php';
  	?>
