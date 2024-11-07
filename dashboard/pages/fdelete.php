<?php
include_once('../db/Crud.php');
include('../db/connection.php');
$crud = new Crud();
$id=$_GET['id'];
//$p="select * from ";

echo $k5=mysqli_query($link,"select * from bill1  where id ='$id'") or die(mysqli_error($link));
$k6=mysqli_fetch_array($k5);
echo $amt=$k6['amount'];
echo $billno=$k6['bno'];
$mrno=$k6['mno'];
echo $k7=mysqli_query($link,"select * from bill where billno='$billno'") or die(mysqli_error($link));
$k8=mysqli_fetch_array($k7);
$ktamt=$k8['tamount'];
$kdamt=$k8['discount'];
$kpamt=$k8['pamount'];
$kbamt=$k8['bamount'];
$knamt=$k8['namount'];


echo $thamt=$ktamt-$amt;
echo $tnamt=$knamt-$amt;
echo $tbamt=$kbamt-$amt;


 $fbno=$crud->my_simple_crypt($billno,'e');

$m=mysqli_query($link,"update bill set tamount='$thamt',namount='$tnamt',bamount='$tbamt'  where billno='$billno'");

$k="delete from bill1 where id='$id'";
echo $y=mysqli_query($link,$k) or die(mysqli_error($link));

if($y){
			print "<script>";
			print "alert('Successfully Deleted ');";
			print "self.location='edit_labbill.php?id=$fbno';";
			print "</script>";
	
	
}


?>