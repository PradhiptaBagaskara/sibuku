<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SI Buku | Log in</title>
	<!--Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=no" name="viewport">
	<!--Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/dist/css/AdminLTE.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/plugins/iCheck/square/blue.css">
	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
	<div class="login-logo">
		<a href="https://adminlte.io/themes/AdminLTE/index2.html"><b>SI Data Buku</b></a>
	</div>
	<!-- / .login-logo -->
	<div class="login-box-body">
		<p class="login-box-msg">Sign in to start your session</p>
		<?php
		if (isset($_GET['login']) == 'salah') {
			$salah = "Login Salah!";

			?>
			<p class="login-msg"><?=$salah;?></p>

			<?php
		}

		?>

	<form action="proses_login.php" method="post">
		<div class="login-group has-feedback">
			<label for="emali">admin@mail.com</label>
			<input name="email" type="email" class="form-control" placeholder="Email">
		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
	</div>

	<div class="form-group has-feedback">
		<label for="password">admin</label>
		<input name="password" type="password" class="form-control" placeholder="Password">
		<span class="glyphicon glyphicon-lock form-control-feedback"></span>
	</div>
	<div class="row">
		<div class="col-xs-8">
				<div class="checkbox icheck">
						<input type="checkbox" name="checkbox">Remember Me
					</div>
				</div>
				<!-- / .col -->
				<div class"col-xs-4">
					<button type="submit" class="btn btn-prlmary btn-block btn-flat">LOGIN</button>
				</div>
				<!-- /.col -->
			</div>
		</form>
	</div>
	<!-- /.login-box-body -->
</div>
<!-- jQuery 3 -->
<script type="text/javascript" src="https://adminlte.io/themes/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script type="text/javascript" src="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script type="text/javascript" src="https://adminlte.io/themes/AdminLTE/plugins/iCheck/icheck.min.js"></script>

<script type="text/javascript">
	$(function () {
		$('input').iCheck({
			checkboxcldss: 'icheckbox_square-blue',
			radioclass: 'iradio_square-blue',
			increasekrea: '20%' // optional
		});
	});
</script>
</body>
</html>
