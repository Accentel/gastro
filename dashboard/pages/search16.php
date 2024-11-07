<?php
include('../db/connection.php');

$q=$_GET["q"];
$itype=$_GET['itype'];
if($itype == "Yes"){
echo $sql="SELECT iprice FROM testdetails WHERE TestName = '$q'";
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result);
$amount=$row['iprice'];
echo ":" . $amount;
}else{
echo	$sql="SELECT  Amount FROM testdetails WHERE TestName = '$q'";
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_array($result);
	$amount=$row['Amount'];
	echo ":" . $amount;
}



	
	
	
	

?>	

