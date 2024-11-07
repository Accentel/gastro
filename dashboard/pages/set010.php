<?php
include("../db/connection.php");

$q=$_GET["q"];

$sql="SELECT fee1,mnum1,fee1  FROM doct_infor WHERE dname1 = '$q'";

$result = mysqli_query($link,$sql);


while($row = mysqli_fetch_array($result))
  {
 
	  echo ":" . $row[0];
	  
	  echo ":" . $row[0];
	  echo ":" . $row[1];
	  
  }
?> 