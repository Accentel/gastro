<?php
include("../db/connection.php");
	$id=$_GET['id'];
	 $id;
	 
	 $sq=mysqli_query($link,"select * from adv_collection where 	ADV_ID='$id'");
	
	$r=mysqli_fetch_array($sq);
	 
	// $inv_id=$r['inv_id'];
	$bill_num=$r['bill_num'];
	 
	
	
	  $b="delete FROM daily_amount where  bill_num='$bill_num'";

$q71=mysqli_query($link,$b);

  $b1="delete FROM adv_collection where  ADV_ID='$id'";

$q71=mysqli_query($link,$b1);


	if($q71)
	{
		print "<script>";
		print "alert('Successfully deleted');";
		print "self.location='advancebilllist.php';";
		print "</script>";
	}else{
		print "<script>";
		print "alert('unable to delete');";
		print "self.location='advancebilllist.php';";
		print "</script>";
	}
	
	
	
	
?>