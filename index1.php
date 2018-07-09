<h1>Login</h1>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<input type="text" name="email" value="" placeholder="Email">
	<input type="password" name="password" value="" placeholder="Password">
	<button type="submit" name="submit">Submit</button>

</form>
<form class="" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<button type="submit" name="logot">logot</button>

</form>
  <div id="carasingkat">
<h1>Registration Form</h1>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<input type="text" name="first_name" value="" placeholder="First Name">
	<input type="text" name="surname" value="" placeholder="Surname">
	<input type="text" name="email" value="" placeholder="Email">
	<input type="password" name="password" value="" placeholder="Password">
	<button type="submit" name="sumbit">Submit</button>
</form>
<?php
require_once("koneksi.php");
if(isset($_POST['submit'])){
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);

	$sql = "select * from user where email = '".$email."'";
	$rs = mysqli_query($konek,$sql);
	$numRows = mysqli_num_rows($rs);

	if($numRows  > 0){
		$row = mysqli_fetch_assoc($rs);
		if(password_verify($password,$row['password'])){
			session_start();
			$_SESSION['terbuat'] = $row['nama_user'];
			$_SESSION['waktu'] = time();

			header('location: tester.php');
		}
		else{
			echo "Wrong Password";
		}
	}
	else{
		echo "No User found";
	}
}
if(isset($_POST['sumbit'])){
		$firstName = $_POST['first_name'];
		$surName = $_POST['surname'];
		$email 	= $_POST['email'];
		$password = $_POST['password'];

		$options = array("cost"=>4);
		$hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);

		$sql = "insert into user (nama_user, nama_lengkap,email, password) value('".$firstName."', '".$surName."', '".$email."','".$hashPassword."')";
		$result = mysqli_query($konek, $sql);
		if($result)
		{
			echo "Registration successfully";
		}
	}
	if (!empty($_SESSION['terbuat'])) {
		echo "Password verified Dan Sesi terbuat<br>";
	}else {
		echo "hahaa<br>";
	}
	if (isset($_POST['logot'])) {
				session_destroy();
				session_unset();
				header('location:'.$_SERVER['PHP_SELF'].'?terlogot');
	}else {
		echo "gagal logot<br>";
	}

	// echo time();
	?>
