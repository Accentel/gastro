<?php
session_start(); $ses = $_SESSION['user'];// exit;
ob_start();
include("../db/connection.php");

if(isset($_POST['submit'])){
error_reporting(E_ALL);
$pregno =$_POST['rnum'];
$pno=$_POST['patno'];
$adate=date("Y-m-d", strtotime($_POST['admitdate']));
//date("Y-m-d", strtotime($dateToday));
$atime=$_POST['time'];
$ampm = $_POST['time1'];
$atime1 = $atime." ".$ampm; 
  $bedno=$_POST['bedsno']; 
$dstatus='ADMITTED';
$bstatus='NOT PAID';
$ctype=$_POST['conce_type'];
$concardno=$_POST['conce_card'];
$insutype=$_POST['insutype'];
$amt=$_POST['adm_fee'];
$conamt=$_POST['conce_fee'];
$allotby = $_POST['emp_name'];
$aname = $_POST['emp_name'];
$doccode =$_POST['docname'];
$cashcredit = $_POST['pat_type'];
$dcost = $_POST['diet_cost'];
$mrcost = $_POST['mr_charge'];

$advdate1 = $_POST['adv_date'];
$advdate = date("Y-m-d", strtotime($advdate1));
 $advamt = $_POST['rupees'];
 $roomrents=$_POST['roomrents'];
 $room_location=$_POST['room_location'];
 //$room_type=$_POST['room_type'];
 
 $adate=$_POST['admitdate'];
 $tot=$amt-$conamt+$mrcost+$dcost+$roomrents;
  $bal=$tot-$advamt; 
$adt=$_POST['admitdate'];
$pname=$_POST['pname'];
 $roomsno = $_POST['roomsno'];
 $room_type = $_POST['room_type'];
 $pkg="No";
  $pay_type=$_POST['pay_type'];
 
  $dt=date('Y-m-d');
$sq=mysqli_query($link,"select * from daily_amount where date(date1)='$dt'");
 $bcnt=mysqli_num_rows($sq);
//$cnt=$bcnt+1;
$cnt1=$bcnt+1;
$cnt=date('dmy')."-".$cnt1;
date_default_timezone_set('Asia/Kolkata');
 $ndate=date( 'Y-m-d H:i:s', time ()); 
  $advamt; 
  
  
  $sq=mysqli_query($link,"select * from daily_amount where amnt_type='Patient Register' and mrnum='$pregno' and  date(date1)='$dt'");
  $r1=mysqli_fetch_array($sq);
  $idd=$r1['id'];
  $ssq=mysqli_query($link,"update daily_amount set amnt_type='In Patient' where id='$idd'");
  

 if($advamt>=1){

    $sq="insert into ip_pat_admit(PAT_REGNO,PAT_NO,ADMIT_DATE,ADMIT_TIME,BED_NO,DIS_STATUS,BILL_STATUS,CONCESSION_TYPE,
	CONCESSION_CARDNO,AMOUNT,CONS_AMT,ALLOT_BY,CURRENTDATE,AUTH_BY,doc_code,cash_credit,diet_cost,MR_cost,package,bill_num,adv_amnt,bal,tot,room_loc,room_type,room_no,room_rent) 
values('$pregno','$pno','$adate',str_to_date('$atime','%r'),'$bedno','ADMITTED','NOT PAID','$ctype','$concardno','$amt',
'$conamt','$allotby',now(),'$aname','$doccode','$cashcredit','$dcost','$mrcost','$pkg','$cnt','$advamt','$bal','$tot','$room_location','$room_type','$roomsno','$roomrents')";
 } else {
	 
	   $sq="insert into ip_pat_admit(PAT_REGNO,PAT_NO,ADMIT_DATE,ADMIT_TIME,BED_NO,DIS_STATUS,BILL_STATUS,CONCESSION_TYPE,CONCESSION_CARDNO,AMOUNT,CONS_AMT,ALLOT_BY,
	   CURRENTDATE,AUTH_BY,doc_code,cash_credit,diet_cost,MR_cost,package,bill_num,adv_amnt,bal,tot,room_loc,room_type,room_no,room_rent) 
values('$pregno','$pno','$adate',str_to_date('$atime','%r'),'$bedno','ADMITTED','NOT PAID','$ctype','$concardno','$amt','$conamt','$allotby',now(),
'$aname','$doccode','$cashcredit','$dcost','$mrcost','$pkg','','$advamt','$bal','$tot','$room_location','$room_type','$roomsno','$roomrents')";

 }

mysqli_query($link,$sq) or die(mysqli_error($link)); 
 if($advamt>=1){
$qq=mysqli_query($link,"insert into daily_amount(amnt_type,amount,bill_num,mrnum,recv_by,pay_type,date_time,amnt_desc)
values('In Patient','$advamt','$cnt','$pregno','$ses','$pay_type','$ndate','In Patient')");
 }
if($sq){
	$qry1=mysqli_query($link,"insert into ip_pat_bed(PAT_NO,BED_NO,START_DATE,START_TIME,ALLOTED_BY,CURRENTDATE,AUTH_BY,room_no,room_type,location) 
	values('$pno','$bedno','$adate',str_to_date('$atime','%r'),'$allotby',now(),'$aname','$roomsno','$room_type','$room_location')");

	if($qry1){
	$qry = mysqli_query($link,"update beds set status='out' where id='$bedno' and roomno='$roomsno' and rtype='$room_type' and ltype='$room_location'");	
	if($qry)
	{
		$qry3=mysqli_query($link,"update patientregister set pat_type='IP',status='Used' where registerno='$pregno'");	
		if($qry3)
		{
		if($cashcredit == "cash"){	
			$sql1 = mysqli_query();
		}
		
			print "<script>";
			print "alert('Successfully added');";
			print "self.location='../pages/inpatient.php';";
			print "</script>";
		
		}
	}		
	}
}
else{
mysqli_error($link);}
}
?>
<?php
ob_get_flush();
?>