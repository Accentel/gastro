<?php
include("../db/connection.php");

$emp_id = $_REQUEST['emp_id'];

$query1 = mysqli_query($link,"select * from ip_pat_admit WHERE PAT_ID='$emp_id' ");
$ru=mysqli_fetch_array($query1);
$PAT_REGNO=$ru['PAT_REGNO'];
$PAT_NO=$ru['PAT_NO'];
$query = mysqli_query($link,"select * from patientregister WHERE registerno='$PAT_REGNO' ");
if($query){
	$row1 = mysqli_fetch_array($query);
	$registerno = $row1['registerno'];
	$pname = $row1['patientname'];
	$mobile = $row1['phoneno'];
	$age = $row1['age'];
//	$age2 = $row1['ageprefix'];
	$gender = $row1['gender'];
	
	
  }
 
echo $data="|".$pname."|".$age."|".$gender."|".$mobile."|".$registerno."|".$PAT_NO;
//.$nursefee2."|".$icu."|";
//."|".$maintfree2."|".$nursefee2."|".$icu; 
?>