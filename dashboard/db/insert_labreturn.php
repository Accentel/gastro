<html>
<head>
	<title>Add Data</title>
</head>
<body>
<?php
//including the database connection file
include('connection.php');
include_once("connection.php");

if(isset($_POST['Submit'])) {	
	$mrno = $_POST['mrno'];
	$bno = $_POST['bno'];
  echo  $bdate=$_POST['bdate'];
	$pname= $_POST['pname'];
	$age= $_POST['age'];
	$gender= $_POST['gender'];
	$mobile= $_POST['mobile'];
	$time= $_POST['time'];
	$tamount= $_POST['ramount'];
	$user= $_POST['user'];
	$paymenttype= $_POST['paymenttype'];
	$reg_no=$_POST['reg_no'];
	$remarks=$_POST['remarks'];
	$dtn=date('Y-m-d');
	
	
	
	$k="select * from daily_amount where date(date1)='$dtn'";
	$sq = mysqli_query($link,$k) or die(mysqli_error($link));
$bcnt=mysqli_num_rows($sq);
//$cnt=$bcnt+1;
$cnt1=$bcnt+1;
$cnt=date('dmy')."-".$cnt1;
date_default_timezone_set('Asia/Kolkata');
 $ndate=date( 'Y-m-d H:i:s', time ()); 
	$aa="insert into daily_amount(amnt_type,amount,bill_num,mrnum,recv_by,pay_type,date_time,amnt_desc)
	 values('Lab Return Amount','$tamount','$cnt','$mrno','$user','$paymenttype','$ndate','Lab Return Amount')";
	
	
	$sql =mysqli_query($link,$aa) or die(mysqli_error($link));
	
	
	
		$ts="INSERT INTO labreturn(mrno,billno,bdate,pname,age,gender,mobile,time,ramount,remarks,user,paymenttype,reg_no)VALUES
		('$mrno','$bno','$bdate','$pname','$age','$gender','$mobile','$time','$tamount','$remarks','$user','$paymenttype','$reg_no')";
    	$result = mysqli_query($link,$ts) or die(mysqli_error($link));
	
		if($result){
			print "<script>";
			print "alert('Successfully Registred ');";
			print "self.location='lab_ret.php';";
			print "</script>";
		}
	}	
	

?>
</body>
</html>
