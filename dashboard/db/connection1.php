<?php
//include('config.php');
define("HOST_NAME", "localhost");
define("USER", "accentel_gastro");
define("PASSWORD", "accentel_gastro");
define("DB", "accentel_gastro");
$conn=mysqli_connect(HOST_NAME,USER,PASSWORD,DB);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
error_reporting(0);





?>