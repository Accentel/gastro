<?php
//including the database connection file
include_once("Crud.php");
include_once("Validation.php");
$crud = new Crud();
$validation = new Validation();

	
if(isset($_POST['Submit'])) {	
//$mrno = $crud->escape_string($_POST['mrno']);
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
	//$bdate1=date('Y-m-d');
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
	 values('Lab Due Bill','$damount','$cnt','$mrno','$user','$paymenttype','$ndate','Lab Due Bill')";
	mysqli_query($link,$aa);
		//$ts1="insert into duebill(mrno,billno,bdate,pname,mobile,pamount,user) values('$mrno','$bno','$bdate1','$pname','$mobile','$damount','$user')";
		//$crud->execute($ts1)
		 $ts="update bill set mrno='$mrno',billno='$bno',bdate='$bdate',pname='$pname',age='$age',gender='$gender',dname='$dname',mobile='$mobile',ptype='$ptype',time='$time',tamount='$tamount',discount='$discount',namount='$namount',pamount='$paidamount',bamount='$ramount',remarks='$remarks',user='$user',paymenttype='$paymenttype' where id='$id'";
		$result = $crud->execute($ts);

		if($result){
			print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='labbilllist.php';";
			print "</script>";
		}
	}	
	

?>
