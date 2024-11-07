<?php
include("../db/connection.php");

$emp_id = $_REQUEST['emp_id'];


$query = mysqli_query($link,"select B.patientname,B.registerno, B.age, B.gender,B.address,B.doctorname,B.rel_type,
B.gaurdianname,B.phoneno,ADMIT_DATE from ip_pat_admit as A,patientregister as B WHERE
  A.PAT_REGNO=B.registerno and A.PAT_NO='$emp_id' ");
if($query){
	$row1 = mysqli_fetch_array($query);
	$patname = $row1['patientname'];
	$regno = $row1['registerno'];
	$age = $row1['age'];
	$gender = $row1['gender'];
	
	$admitdate = date('d-m-Y',strtotime($row1['ADMIT_DATE']));
	
	$addr1=$row1['address'];
	$doctorname=$row1['doctorname'];
	$rel_type=$row1['rel_type'];
	$gaurdianname=$row1['gaurdianname'];
	$phoneno=$row1['phoneno'];
  }
 
echo $data="|".$emp_id."|".$patname."|".$regno."|".$age."|".$gender."|".$addr1."|".$doctorname."|".$rel_type."|".$gaurdianname."|".$phoneno."|".$admitdate;
//.$nursefee2."|".$icu."|";
//."|".$maintfree2."|".$nursefee2."|".$icu; 
?>