<?php
// error_reporting(0);
	$host		= "localhost";
	$user_db		= "root";
	$password	= "";
	$database	= "sibuku";
	$konek		= mysqli_connect($host,$user_db,$password,$database);

  if (!$konek) {
    echo "gagal".mysqli_errno($konek);
  }


?>
