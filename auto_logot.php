<?php
session_destroy();
session_unset();
header('location: login.php?sesi=habis');


 ?>
