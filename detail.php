<?php
include 'koneksi.php';
if ($_GET['id']) {
$idb =  $_GET['id'];
$sql = "SELECT buku.id_buku,buku.deskripsi,buku.cover,buku.isbn,buku.judul_buku,buku.harga,penulis.nama_penulis,kategori.nama_kategori FROM
  buku, penulis, kategori WHERE buku.id_buku='".$idb."' AND buku.id_penulis=penulis.id_penulis AND
  kategori.id_kategori=buku.id_kategori ORDER BY buku.isbn ASC";
$sqli = mysqli_query($konek, $sql);
$ftc = mysqli_fetch_array($sqli);
// $id = $ftc['id_buku'];
}else {
  header('location: index.php');
}

 ?>
 <?php
 session_start();

 if(empty($_SESSION['status_login'])){
 	header("location:login.php");
 }

 include 'koneksi.php';
 ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<!-- memanggil CSS -->
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 	<title>SI BUKU</title>
 	<!--memanggil Bootstrap CSS -->
 	<link rel="stylesheet" href="css/bootstrap.min.css"/>
 	<script src="js/ajax-geolapis.js"></script>
  <!-- <link rel="stylesheet" href="css/jquery.dataTables.min.css" /> -->
<link rel="stylesheet" href="css/style.css">
 </head>
 <body>
 	<nav class="navbar navbar-expand-lg navbar-light bg-light">
 		<a class="navbar-brand" href="#">SIBUKU DATA</a>

 		<!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
 			aria-controls="navbarSupportedContent" aria-expanded="£alse" aria-label="Toggle navigation">
 			<span class="navbar-toggler-icon"></span>
 		</button> -->
 		<div class="collapse navbar-collapse" id="navbarSupportedContent">
 			<ul class="navbar-nav mr-auto">
 				<li class="nav-item active">
 					<a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
 					</li>
 					<li class="nav-item">
 						<a class="nav-link" href="index.php">DATA BUKU</a>
 					</li>
 					<li class="nav-item">
 						<a class="nav-link" href="data_penulis.php">DATA PENULIS</a>
 					</li>
 					<li class="nav-item">
 						<a class="nav-link" href="data_kategori.php">DATA KATEGORI </a>
 					</li>
 					<li class="nav-item">
 						<a class="nav-link" href="user.php">DATA USER</a>
 					</li>

 					</ul>
 					<ul class="nav navbar-nav navbar-right">
 						<li class="nav-item">
 							<a href="#" class="nav-1ink" style="margin-right: 10px;"><?php echo $_SESSION['email']?></a>
 					</li>
 					<li class="nav-item">
 						<a href="logout.php" class="nav-1ink">Logout</a>
 					</li>
 				</ul>
 			</div>
 		</nav>

<div class="container">
  <div class="row">
    <div class="col-4">
      <h3>Detail Buku</h3>
    </div>
  </div>
  <main>
  <div class="konten">
    <img src="cover/<?=$ftc['cover'];?>" width="240px" height="380px">

  </div>
  <div class="sidebar">

        <table class="table table-bordered" height="380px">

        <tr>
          <td width="150px">ISBN</td>
          <td height="30px"><?=$ftc['isbn']?></td>
        </tr>
        <tr>
          <td>PENULIS</td>
          <td height="30px"><?=$ftc['nama_penulis']?></td>
        </tr>
        <tr>
          <td>KATEGORI</td>
          <td height="30px"><?=$ftc['nama_kategori']?></td>
        </tr>
        <tr>
          <td>DESKRIPSI</td>
          <td><?=$ftc['deskripsi']?></td>
        </tr>
        <tr>
          <td>HARGA</td>
          <td height="30px"><?=$ftc['harga']?></td>
        </tr>

    </table>
</main>
<a href="index.php" class="btn btn-primary">KEMBALI</a>

</div>


<?php include 'footer.php'; ?>
