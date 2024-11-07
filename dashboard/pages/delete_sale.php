<?php
include("../db/connection.php");
	$id=$_GET['id'];
	 $id;
	 
	 $sq=mysqli_query($link,"select * from phr_salent_dtl where lr_no='$id'");
	
	 while($r=mysqli_fetch_array($sq)){
	 
	 $inv_id=$r['inv_id'];
	$uqty=$r['U_QTY'];
	 
	 	
	 $a="update phr_purinv_dtl set balance_qty=balance_qty+'$uqty' where inv_id='$inv_id'";
	 
	 $q7=mysqli_query($link,$a);
	 }
	 //exit;
	  $b="update phr_salent_dtl set PRODUCT_CODE='',U_QTY='',U_RATE='',VALUE=''
,inv_id='',disc='',total='',gst='',gst_amt='' where lr_no='$id'";

$q71=mysqli_query($link,$b);
$q7=mysqli_query($link,"update phr_salent_mast set BILLING_TYPE='',CUST_NAME='',`INV_NO`='',
`SALES_TYPE`='',`SAL_DATE`='',`total`='',`current`='',`auth_by`='',`bill_type`='',`customer_type`='',
`card_no`='',`age`='',`sex`='',`Consultant_Name`='',`discount`='',`concession_type`='',
`mobileno`='',`address1`='',`mrnum`='',`spl_dis`='',`bal`='',`sr_bill_num`='',status='Delete',final_paid='',
final_amnt='',income_dis='',income_dis_amnt	='',adjust='',round='' where lr_no='$id'");



	if($q7)
	{
		print "<script>";
		print "alert('Successfully deleted');";
		print "self.location='salesentry_list.php';";
		print "</script>";
	}else{
		print "<script>";
		print "alert('unable to delete');";
		print "self.location='salesentry_list.php';";
		print "</script>";
	}
	
	
	
	
?>