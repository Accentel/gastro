<?php
include("../db/connection.php");
	$id=$_GET['id'];
	 $id;
	//$name=$_GET['name'];
	//echo $name;
	$sql="DELETE FROM phr_supplier_mast WHERE SUP_ID='$id'";
	$result=mysqli_query($link,$sql);
	if($result)
	{
		print "<script>";
		print "alert('Successfully deleted');";
		print "self.location='../pages/supplier_info_list.php';";
		print "</script>";
	}else{
		print "<script>";
		print "alert('unable to delete');";
		print "self.location='../pages/supplier_info_list.php';";
		print "</script>";
	}
	
	
	
	
?>