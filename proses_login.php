<?php
	// menyimpan inputan dari halaman login
	$email	= $_POST['email'];
	$pass	= $_POST['password'];
	// $pass = password_hash($_POST['password'] ,PASSWORD_BCRYPT);


	// memanggil konfigurasi database
	include 'koneksi.php';
	// perintah SQL untuk check data di database
	$sql	= "select * from user where email='".$email."'";
	$user	= mysqli_query($konek, $sql);

	//jika berhasil maka dialihkan ke halaman index
	session_start();

	$userData = mysqli_fetch_array($user);

	if(password_verify($pass,$userData['password'])){//password benar & menyimpan ke session
	$_SESSION['status_login'] = "sudah_login";
	$_SESSION['nama_user'] = $userData['nama_lengkap'];
	$_SESSION['email'] = $userData['email'];




	header("location:index.php");
}else{
	//password salah
	header("location:login.php?login=salah");
}

?>
