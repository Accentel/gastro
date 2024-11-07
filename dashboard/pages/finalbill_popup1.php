

<?php
include("../db/connection.php");

$emp_id = $_REQUEST['emp_id'];


$query = mysqli_query($link,"select A.PAT_NO,A.adv_amnt,B.patientname,B.registerno, B.age, B.gender,B.address,B.doctorname,B.rel_type,
B.gaurdianname,B.phoneno,ADMIT_DATE from ip_pat_admit as A,patientregister as B WHERE
  A.PAT_REGNO=B.registerno and A.PAT_NO='$emp_id' ");
if($query){
	$row1 = mysqli_fetch_array($query);
	$patname = $row1['patientname'];
	$regno = $row1['registerno'];
	$age = $row1['age'];
	$gender = $row1['gender'];
	
	$admitdate = date('d-m-Y',strtotime($row1['ADMIT_DATE']));
	$admitdate1 = date('Y-m-d',strtotime($row1['ADMIT_DATE']));
	$edate=date('Y-m-d');
	$addr1=$row1['address'];
	$doctorname=$row1['doctorname'];
	$rel_type=$row1['rel_type'];
	$gaurdianname=$row1['gaurdianname'];
	$phoneno=$row1['phoneno'];
	$AMOUNT=$row1['adv_amnt'];
	$PAT_NO=$row1['PAT_NO'];
  }
 //$x="";
 
 
   $y="select sum(namount) as net,sum(pamount) as paid,sum(bamount) as bal from bill where bill_cancel!='Cancel' and  mrno='$regno' and bdate between '$admitdate1' and '$edate'  ";

$sql3=mysqli_query($link,$y); 


	$row3 = mysqli_fetch_array($sql3);
	$lab_net=$row3['net'];
	$lab_paid=$row3['paid'];
	$lab_bal=$row3['bal'];

  $y="select sum(namount) as net,sum(pamount) as paid,sum(bamount) as bal from bill_proc where bill_cancel!='Cancel' and mrno='$regno' and bdate between '$admitdate1' and '$edate'  ";

$sql3=mysqli_query($link,$y); 


	$row3 = mysqli_fetch_array($sql3);
	$proc_net=$row3['net'];
	$proc_paid=$row3['paid'];
	$proc_bal=$row3['bal'];


$y1="select  sum(final_amnt) as tamt,sum(final_paid) paid,sum(bal) as bal from phr_salent_mast where mrnum='$regno' and SAL_DATE between '$admitdate1' and '$edate'  ";

$sql6=mysqli_query($link,$y1); 


	$row4 = mysqli_fetch_array($sql6);
	$phr_net=$row4['tamt'];
	$phr_paid=$row4['paid'];
	$phr_bal=$row4['bal'];
	
	
	   $y2="select sum(ADV_AMT) as adv_net from adv_collection where mrno='$regno' and PAT_NO ='$PAT_NO'  ";

$sql5=mysqli_query($link,$y2); 
$r=mysqli_fetch_array($sql5);
$adv_net=$r['adv_net'];
$advh=trim($adv_net+$AMOUNT);


if($lab_net==''){
	$lab_net=0;
} else {
	$lab_net=$lab_net;
}
if($lab_paid==''){
	$lab_paid=0;
} else {
	$lab_paid=$lab_paid;
}
if($lab_bal==''){
	$lab_bal=0;
} else {
	$lab_bal=$lab_bal;
}
if($phr_net==''){
	$phr_net=0;
} else {
	$phr_net=$phr_net;
}
if($phr_paid==''){
	$phr_paid=0;
} else {
	$phr_paid=$phr_paid;
}
if($phr_bal==''){
	$phr_bal=0;
} else {
	$phr_bal=$phr_bal;
}
if($advh==''){
	$advh=0;
} else {
	$advh=$advh;
}
if($proc_net==''){
	$proc_net=0;
} else {
	$proc_net=$proc_net;
}
if($proc_paid==''){
	$proc_paid=0;
} else {
	$proc_paid=$proc_paid;
}
if($proc_bal==''){
	$proc_bal=0;
} else {
	$proc_bal=$proc_bal;
}

 
 
 echo $data=":".$emp_id.":".$patname.":".$regno.":".$age.":".$gender.":".$addr1.":".$doctorname.":".$gaurdianname.":".$phoneno.":".$admitdate.":".$lab_net.":".$lab_paid.":".$lab_bal.":".$phr_net.":".$phr_paid.":".$phr_bal.":".$advh.":".$proc_net.":".$proc_paid.":".$proc_bal;

?>


						
												  
                                              