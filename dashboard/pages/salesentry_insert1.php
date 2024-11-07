<?php
include("../db/connection.php");

$admin = $_REQUEST['authby'];
$lrno = $_REQUEST['lrno'];
$total = $_REQUEST['total'];
$disc = $_REQUEST['disc'];
$amount1=$_REQUEST['amount1'];
$grand1=$_REQUEST['grand1'];
$spl_dis=$_REQUEST['spl_dis'];
$amount=$_REQUEST['amount'];
$amount1=$_REQUEST['amount1'];
$spl_dis_amnt=$_REQUEST['spl_dis_amnt'];
//$grand1=$_REQUEST['grand1'];
$sql2=mysqli_query($link,"select u_qty,inv_id FROM phr_salent_dtl WHERE lr_no='$lrno'");
while($row2 = mysqli_fetch_array($sql2)){
	$uqty = $row2[0];
	$invid = $row2[1];
	$sql3=mysqli_query($link,"update phr_purinv_dtl set balance_qty=balance_qty+$uqty WHERE inv_id='$invid'");
}
$sql1=mysqli_query($link,"DELETE FROM phr_salent_dtl WHERE lr_no='$lrno'");
if($sql1){						
	$q1=mysqli_query($link,"update phr_salent_mast set total='$total',
	discount='$disc',bal='$amount1',income_dis='$spl_dis',income_dis_amnt='$spl_dis_amnt',final_amnt='$grand1',final_paid='$amount' where lr_no=$lrno ");
}
if($q1){
$i = $_REQUEST['i'];
$count = $_REQUEST['rows'];
//echo $count;
for($m=1;$m <= $count;$m++)
{
//echo $count;
//echo $m;
$pcode=$_REQUEST['pcode'.$m];
//$mfg=$_REQUEST['mfg'+$m];
//$exp=$_REQUEST['exp'+$m];
$uqty=$_REQUEST['sqty'.$m];
$invno=$_REQUEST['bachno'.$m];
$urate=$_REQUEST['ucost'.$m];
$value=$_REQUEST['value'.$m];
$dis=$_REQUEST['dis'.$m];
$amt=$_REQUEST['amt'.$m];

	$q2=mysqli_query($link,"insert into phr_salent_dtl(LR_NO, PRODUCT_CODE, U_QTY, U_RATE, VALUE, CURRENT, AUTH_BY, inv_id,disc,total) values($lrno,'$pcode','$uqty','$urate','$value',now(),'$admin','$invno','$dis','$amt')");

if($q2){
	$q7=mysqli_query($link,"update phr_purinv_dtl set balance_qty=balance_qty-'$uqty' where inv_id='$invno'");

}
}
if($q7){

		print "<script>";
		print "alert('Successfully updated');";
		print "self.location='salesentry_list.php';";
		print "</script>";
	}else{
		print "<script>";
		print "alert('unable to update');";
		print "self.location='salesentry_view.php';";
		print "</script>";
}	

}
?>