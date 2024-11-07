<?php
//include("config.php");
include("../db/connection.php");
$emp_id = $_REQUEST['emp_id'];
$cc="select PRD_NAME,mani_by,vattax,sgst,cgst from phr_prddetails_mast  where PRD_NAME='$emp_id' ";
$query =  mysqli_query($link,$cc);
if($query)
{
	$row = mysqli_fetch_array($query);
	$PRD_NAME=$row[0];
	$mani_by=$row[1];
	$vattax=$row[2];
	$sgst=$row['sgst'];
	$cgst=$row[4];
}	

$data = ":".$PRD_NAME.":".$mani_by.":".$vattax.":".$sgst.":".$cgst.":";
	echo $data;

?>