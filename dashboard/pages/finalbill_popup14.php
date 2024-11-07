<?php
include("../db/connection.php");

$emp_id = $_REQUEST['emp_id'];


$query = mysqli_query($link,"select * from patientregister WHERE reg_id='$emp_id' ");
if($query){
	$row1 = mysqli_fetch_array($query);
	$registerno = $row1['registerno'];
	$regid = $row1['reg_id'];
	$total = $row1['total'];
	$billnum=$row1['bill_num'];
	
  }
 
echo $data="|".$registerno."|".$regid."|".$total."|".$billnum;
//.$nursefee2."|".$icu."|";
//."|".$maintfree2."|".$nursefee2."|".$icu; 
?>