<?php
include("../db/connection.php");

$emp_id = $_REQUEST['emp_id'];

$query1 = mysqli_query($link,"select * from bill_proc WHERE id='$emp_id' ") or die(mysql_error($link));
$row1=mysqli_fetch_array($query1);



	//$row1 = mysqli_fetch_array($query);
	$registerno = $row1['mrno'];
	$pname = $row1['pname'];
	$mobile = $row1['mobile'];
	$age = $row1['age'];
	$ptype = $row1['ptype'];
	$gender = $row1['gender'];
	$referal=$row1['dname'];
	
	$tamount=$row1['tamount'];
	$discount=$row1['discount'];
	$namount=$row1['namount'];
	$bamount=$row1['bamount'];
	$pamount=$row1['pamount'];
	$billno=$row1['billno'];
	$id=$row1['id'];
	
	
  
 
echo $data="|".$pname."|".$age."|".$gender."|".$referal."|".$mobile."|".$registerno."|".$tamount."|".$discount."|".$namount."|".$pamount."|".$bamount."|".$billno."|".$ptype."|".$id;
//.$nursefee2."|".$icu."|";
//."|".$maintfree2."|".$nursefee2."|".$icu; 
?>