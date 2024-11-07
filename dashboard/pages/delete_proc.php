<?php
include("../db/connection.php");
	$id=$_GET['id'];
	 $id;
	 
	 $sq=mysqli_query($link,"select * from bill_proc where 	id='$id'");
	
	while($r=mysqli_fetch_array($sq)){
	 
	// $inv_id=$r['inv_id'];
	$bill_num=$r['billno'];
	
	  $b="delete FROM bill1 where  bno='$bill_num'";

$q71=mysqli_query($link,$b);
	 
	}
	
	  $b="delete FROM daily_amount where  bill_num='$bill_num'";

$q71=mysqli_query($link,$b);

   $b1="UPDATE `bill_proc` SET `mrno`='',`billno`='',`bdate`='',`pname`='',
  `age`='',`gender`='',`dname`='',`mobile`='',`ptype`='',
  `time`='',`tamount`='',`discount`='',`namount`='',`pamount`='',
  `bamount`='',`remarks`='',`user`='',`cdate`='',`paymenttype`='',
  `bill_cancel`='',`reg_no`='',`status`='Delete' WHERE  	id='$id'";
  


$q71=mysqli_query($link,$b1);


	if($q71)
	{
		print "<script>";
		print "alert('Successfully deleted');";
		print "self.location='labbilllistk.php';";
		print "</script>";
	}else{
		print "<script>";
		print "alert('unable to delete');";
		print "self.location='labbilllistk.php';";
		print "</script>";
	}
	
	
	
	
?>