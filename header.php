<?php
session_start();

if(empty($_SESSION['status_login'])){
	header("location:login.php");
}else {
		$div = " <div id='logot'>";

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
	<link rel="stylesheet" href="css/bootstrap.css"/>
	<script src="js/ajax-geolapis.js"></script>
 <link rel="stylesheet" href="css/jquery.dataTables.min.css" />

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">SIBUKU DATA</a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="£alse" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
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
