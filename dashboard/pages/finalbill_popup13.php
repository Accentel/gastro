<?php
include("../db/connection.php");

$emp_id = $_REQUEST['emp_id'];


$query = mysqli_query($link,"select * from patientregister WHERE reg_id='$emp_id' ");
if($query){
	$row1 = mysqli_fetch_array($query);
	$registerno = $row1['registerno'];
	$pname = $row1['patientname'];
	$mobile = $row1['phoneno'];
	$age = $row1['age'];
//	$age2 = $row1['ageprefix'];
	$gender = $row1['gender'];
	$referal=$row1['doctorname'];
	
  }
 
echo $data="|".$pname."|".$age."|".$gender."|".$referal."|".$mobile."|".$registerno;
//.$nursefee2."|".$icu."|";
//."|".$maintfree2."|".$nursefee2."|".$icu; 
?>