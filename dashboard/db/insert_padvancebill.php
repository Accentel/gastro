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

	
if(isset($_POST['Submit'])) {	
	$mrno = $crud->escape_string($_POST['mrno']);
	$bdate1 = str_replace('/', '-', ($_POST['bdate']));
    $bdate=date('Y-m-d', strtotime($bdate1));
	$pname= $crud->escape_string($_POST['pname']);
	$ndays= $crud->escape_string($_POST['days']);
	$age= $crud->escape_string($_POST['age']);
	$gender= $crud->escape_string($_POST['gender']);
	$mobile= $crud->escape_string($_POST['mobile']);
	$rupees= $crud->escape_string($_POST['rupees']);
	$adv_words= $crud->escape_string($_POST['adv_words']);
	$paymenttype= $crud->escape_string($_POST['paymenttype']);
	$user= $crud->escape_string($_POST['user']);
	
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
		$p="insert into padv_collection( ADV_DATE, ADV_AMT, PAYMENT_MODE, CURRENTDATE, AUTH_BY,bill_num,pname,age,gender,mobile,rwords,mrno)
 values('$bdate','$rupees','$paymenttype',now(),'$user','$cnt','$pname','$age','$gender','$mobile','$adv_words','$mrno')";
$sql1 = $crud->execute($p);
} 
	
	
	$aa="insert into daily_amount(amnt_type,amount,bill_num,mrnum,recv_by,pay_type,date_time,amnt_desc)
	 values('Physiotherapy Advance Collection','$rupees','$cnt','$mrno','$user','$paymenttype','$ndate','Physiotherapy Advance Collection')";
	
	
	$sql = $crud->execute($aa);
	
	
		
		if($sql){
			print "<script>";
			print "alert('Successfully Registred ');";
			print "self.location='padvancebilllist.php';";
			print "</script>";
		}
	}	
	

?>
</body>
</html>
