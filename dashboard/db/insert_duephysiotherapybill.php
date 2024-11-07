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
$id=$crud->my_simple_crypt($_REQUEST['id'],'d');
			//include("config.php");
			/*$dt = date('d-m-Y');
			$dt1 = explode("-",$dt);
			$dt2 = implode($dt1);
			$dt3 = ltrim($dt2, '0');
			$str20 = "BL-".$dt3."-";
			$tp="select count(distinct billno) as billcont from bill where billno like '$str20%'";*/
			$tp="select *  from physiotherapybill where billno='$id'";
			$rst = $crud->getdata($tp);
	
if(isset($_POST['Submit'])) {	
$mrno = $crud->escape_string($_POST['mrno']);
	$mrno = $crud->escape_string($_POST['mrno']);
	$bno = $crud->escape_string($_POST['bno']);
	$bdate1 = str_replace('/', '-', ($_POST['bdate']));
    $bdate=date('Y-m-d', strtotime($bdate1));
	$pname= $crud->escape_string($_POST['pname']);
	$age= $crud->escape_string($_POST['age']);
	$gender= $crud->escape_string($_POST['gender']);
	$dname= $crud->escape_string($_POST['dname']);
	$mobile= $crud->escape_string($_POST['mobile']);
	$ptype= $crud->escape_string($_POST['ptype']);
	$time= $crud->escape_string($_POST['time']);
	$tamount= $crud->escape_string($_POST['tamount']);
	$discount= $crud->escape_string($_POST['discount']);
	$namount= $crud->escape_string($_POST['namount']);
	$pamount= $crud->escape_string($_POST['pamount']);
	$balamount= $crud->escape_string($_POST['balamount']);
	$remarks= $crud->escape_string($_POST['remarks']);
	$user= $crud->escape_string($_POST['user']);
	$paymenttype= $crud->escape_string($_POST['paymenttype']);
	$id=$crud->my_simple_crypt($_POST['id'],'d');
	
	$damount= $crud->escape_string($_POST['damount']);
	$ramount= $crud->escape_string($_POST['ramount']);
	
	$paidamount=$pamount+$damount;
	include('../db/connection.php');
	$dtn=date('Y-m-d');
	$k="select * from daily_amount where date(date1)='$dtn'";
	$sq = mysqli_query($link,$k);
$bcnt=mysqli_num_rows($sq);
//$cnt=$bcnt+1;
$cnt1=$bcnt+1;
$cnt=date('dmy')."-".$cnt1;
date_default_timezone_set('Asia/Kolkata');
 $ndate=date( 'Y-m-d H:i:s', time ()); 
	$aa="insert into daily_amount(amnt_type,amount,bill_num,mrnum,recv_by,pay_type,date_time,amnt_desc)
	 values('Physiotherapy Due Bill','$damount','$cnt','$mrno','$user','$paymenttype','$ndate','Physiotherapy Due Bill')";
	mysqli_query($link,$aa);
	
	
	
	
	
	
	if($mrno != '') {
		  $ts="update physiotherapybill set mrno='$mrno',billno='$bno',bdate='$bdate',pname='$pname',age='$age',gender='$gender',dname='$dname',mobile='$mobile',ptype='$ptype',time='$time',tamount='$tamount',discount='$discount',namount='$namount',pamount='$paidamount',bamount='$ramount',remarks='$remarks',user='$user',paymenttype='$paymenttype' where id='$id'";
		$result = $crud->execute($ts);
	}
	
		//echo $count=;
		//exit;
		for($t=0; $t<=count($_POST['tname']); $t++){
		 $tname= $_POST['tname'][$t];
		$amount= $_POST['amount'][$t];
		 $id1= $_POST['id1'][$t];
			if($tname!='' and $id1!=''){
				  $ts1="update physiotherapybill1 set testname='$tname',amount='$amount' where id1='$id1' and mrno='$mrno'";
				$result1 = $crud->execute($ts1);
			}else{
				if($tname!='' and $id1==''){
			  	$ts2="insert into physiotherapybill1(bno,mrno,testname,amount,cdate)values('$bno','$mrno','$tname','$amount','$bdate')";
				$crud->execute($ts2);
				}
			}
			
		}
	//exit;
		if($result){
			print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='physiotherapybilllist.php';";
			print "</script>";
		}
	}	
	

?>
</body>
</html>
