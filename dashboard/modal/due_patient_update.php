<?php
session_start();

if($_SESSION['user'])
{
$authby = $_SESSION['user'];

include("../db/connection.php");

echo $pat_no=$_REQUEST['pat_no'];
$bill=$_REQUEST['bill'];
 $bal=$_REQUEST['bal'];
if($bal>=1){
	$bal1="-".$bal;
} else {
$bal1=0;}

 $as="insert into due_patients_dtl(mast_id, pay_amt, pay_date, auth_by) values($pat_no,$bill,now(),'$authby')"; 
$i1=mysqli_query($link,$as);
 $x="update phr_salent_mast set bal='$bal1' where LR_NO='$pat_no'";
$qry1=mysqli_query($link,$x);
$qry=mysqli_query($link,"update due_patients set paid_amount=(paid_amount+$bill),currentdate=now(),auth_by='$authby' where id='$pat_no'");
//if($qry){

if($qry1){
		print "<script>";
		print "alert('Successfully paid');";
		print "self.location='../pages/duecustomer.php';";
		print "</script>";
}
//}
}
else
{

session_destroy();

session_unset();

header('Location:login.php');

}

?>
