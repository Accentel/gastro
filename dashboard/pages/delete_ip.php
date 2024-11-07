<?php
include("../db/connection.php");
	$id=$_GET['id'];
	// $id;
	 $aa="select * from ip_pat_admit where PAT_ID='$id'";
	 $sq=mysqli_query($link,$aa);
	
$r=mysqli_fetch_array($sq);
	 
	// $inv_id=$r['inv_id'];
	 $bill_num=$r['bill_num'];
	$room_loc=$r['room_loc'];
	$room_type=$r['room_type'];
	$room_no=$r['room_no'];
	$BED_NO=$r['BED_NO'];
	$pat_regno=$r['PAT_REGNO'];
	 
	 	  $b="delete FROM ip_pat_admit where  PAT_ID='$id'";

//$q71=mysqli_query($link,$b);
 $aa="update beds set status='in' where id='$BED_NO' ";

$qry = mysqli_query($link,$aa);	

//exit;


	 // $b="delete FROM daily_amount where  bill_num='$bill_num'";
	  $b="delete FROM daily_amount where  mrnum='$pat_regno'";

$q71=mysqli_query($link,$b);




	if($q71)
	{
		print "<script>";
		print "alert('Successfully deleted');";
		print "self.location='inpatient.php';";
		print "</script>";
	}else{
		print "<script>";
		print "alert('unable to delete');";
		print "self.location='inpatient.php';";
		print "</script>";
	}
	
	
	
	
?>