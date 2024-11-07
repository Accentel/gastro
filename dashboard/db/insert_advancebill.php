<html>
<head>
	<title>Add Data</title>
</head>
<body>
<?php
//including the database connection file
include_once("Crud.php");
include_once("Validation.php");
$crud = new Crud();
$validation = new Validation();
			//include("config.php");
			$dt = date('d-m-Y');
			$dt1 = explode("-",$dt);
			$dt2 = implode($dt1);
			$dt3 = ltrim($dt2, '0');
			$str20 = "BL-".$dt3."-";
			$tp="select count(distinct billno) as billcont from bill where billno like '$str20%'";
			$rst = $crud->getdata($tp);
	
if(isset($_POST['Submit'])) {	
	$mrno = $crud->escape_string($_POST['mrno']);
	$patno = $crud->escape_string($_POST['patno']);
	$admitdate1 = str_replace('/', '-', ($_POST['admitdate']));
    $admitdate=date('Y-m-d', strtotime($admitdate1));
	$bdate1 = str_replace('/', '-', ($_POST['bdate']));
    $bdate=date('Y-m-d', strtotime($bdate1));
	$pname= $crud->escape_string($_POST['pname']);
	$age= $crud->escape_string($_POST['age']);
	$gender= $crud->escape_string($_POST['gender']);
	$mobile= $crud->escape_string($_POST['mobile']);
	$rupees= $crud->escape_string($_POST['rupees']);
	$adv_words= $crud->escape_string($_POST['adv_words']);
	$paymenttype= $crud->escape_string($_POST['paymenttype']);
	$user= $crud->escape_string($_POST['user']);
	$time=$_POST['time'];
	
	include('connection.php');
	$dtn=date('Y-m-d');
	$k="select * from daily_amount where date(date1)='$dtn'";
	$sq = mysqli_query($link,$k);
$bcnt=mysqli_num_rows($sq);
//$cnt=$bcnt+1;
$cnt1=$bcnt+1;
$cnt=date('dmy')."-".$cnt1;
date_default_timezone_set('Asia/Kolkata');
 $ndate=date( 'Y-m-d H:i:s', time ()); 
	
	
	if($rupees>=1){
		$p="insert into adv_collection(PAT_NO, ADV_DATE, ADV_AMT, PAYMENT_MODE, CURRENTDATE, AUTH_BY,bill_num,admit_date,pname,age,gender,mobile,rwords,mrno,time)
 values('$patno','$bdate','$rupees','$paymenttype',now(),'$user','$cnt','$admitdate','$pname','$age','$gender','$mobile','$adv_words','$mrno','$time')";
$sql1 = $crud->execute($p);
} 
	
	
	$aa="insert into daily_amount(amnt_type,amount,bill_num,mrnum,recv_by,pay_type,date_time,amnt_desc)
	 values('Advance Collection','$rupees','$cnt','$mrno','$user','$paymenttype','$ndate','Advance Collection')";
	
	
	$sql = $crud->execute($aa);
	
	
		
		if($sql){
			print "<script>";
			print "alert('Successfully Registred ');";
			print "self.location='advancebilllist.php';";
			print "</script>";
		}
	}	
	

?>
</body>
</html>
