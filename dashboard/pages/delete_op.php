<?php
include("../db/connection.php");
	$id=$_GET['id'];
	 $id;
	 
	 $sq=mysqli_query($link,"select * from patientregister where reg_id='$id'");
	
	 while($r=mysqli_fetch_array($sq)){
	 
	// $inv_id=$r['inv_id'];
	$bill_num=$r['bill_num'];
	 
	 	
	 $a="update patientregister set `registerno`='',`registerdate`='',
	 `tokenno`='',`doctorname`='',`patientname`='',
	 `age`='',`gaurdianname`='',`gender`='',`address`='',
	 `phoneno`='',`occupation`='',`appointmentdate`='',
	 `registerfee`='',`remarks`='',`pat_type`='',
	 `pay_type`='',`con_type`='',`mobile`='',
	 `aadar`='',`ref_doc`='',`ref_doc_mob`='',
	 `con_doc_mob`='',`date`='',`rel_type`='',
	 `cons_fee`='',`total`='',`pat_type1`='',
	 `status`='Delete',`pname_type`='',`validity`='',
	 `arrival_mode`='',`ref_from`='',`previous`='',
	 `concession_type`='',`dept`='',`insutype`='',
	 `policy`='',`chq_num`='',`bank`='',
	 `chq_date`='',`insutype_name`='',`policy_no`='',`pkg_amt`='',
	 `req_amt`='',`req_no`='',`apr_date`='',`ins_type`='',`token_num`='',
	 `auth_by`='',`bill_num`='',`serv_name`='',`hosp_fee`='',`reg_no`='',
	 `opt_type`='',`rec_no`='',`image`='',`visit_count_pat`='',`have_ref`='',
	 `state`='',`city`='',`mandal`='',`tnum`='',`pcancel`='' WHERE reg_id='$id'";
	 
	 $q7=mysqli_query($link,$a);
	 }
	 //exit;
	  $b="delete FROM daily_amount where  bill_num='$bill_num'";

$q71=mysqli_query($link,$b);




	if($q71)
	{
		print "<script>";
		print "alert('Successfully deleted');";
		print "self.location='book_appointment.php';";
		print "</script>";
	}else{
		print "<script>";
		print "alert('unable to delete');";
		print "self.location='book_appointment.php';";
		print "</script>";
	}
	
	
	
	
?>