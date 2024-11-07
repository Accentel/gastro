<?php
include("../db/connection.php");

$emp_id = $_REQUEST['emp_id'];


$query = mysqli_query($link,"select * from bill_proc WHERE id='$emp_id' ");
if($query){
	$row1 = mysqli_fetch_array($query);
	$registerno = $row1['mrno'];
	$pname = $row1['pname'];
	$mobile = $row1['mobile'];
	$age = $row1['age'];
//	$age2 = $row1['ageprefix'];
	$gender = $row1['gender'];
	$referal=$row1['dname'];
	
  }
 
echo $data="|".$pname."|".$age."|".$gender."|".$mobile."|".$registerno;
//.$nursefee2."|".$icu."|";
//."|".$maintfree2."|".$nursefee2."|".$icu; 
?>