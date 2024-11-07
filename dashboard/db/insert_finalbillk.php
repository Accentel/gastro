
<?php
session_start();
$user=$_SESSION['user'];
include("connection.php");

if(isset($_POST['Submit'])) {	
	 $bno =$_POST['bno'];
	$mrno =$_POST['mrno'];
	 $patno =$_POST['patno'];
	$patname =$_POST['patname'];
	$fname =$_POST['fname'];
	$age =$_POST['age'];
	$sex =$_POST['sex'];
	$mobile =$_POST['mobile'];
	$doa1 =$_POST['doa'];
	$doa=date('Y-m-d', strtotime($doa1));
	
	$dichargedate1 =$_POST['dichargedate'];
	$dichargedate=date('Y-m-d', strtotime($dichargedate1));
	$address =$_POST['address'];
	$doctors =$_POST['doctors'];
	$tot_hosp_amnt1 =$_POST['tot_hosp_amnt'];
	 $hosp_paid_amnt =rtrim($_POST['hosp_paid_amnt']);
	$doctors123 =$_POST['paid_hosp'];
	$hosp_bal_amnt1 =$_POST['hosp_bal_amnt'];
	$tot_doct_amnt1 =$_POST['tot_doct_amnt'];
	$tot_doct_paid1 =$_POST['tot_doct_paid'];
	$tot_doct_bal1 =$_POST['tot_doct_bal'];
	$tot_lab_amnt1 =$_POST['tot_lab_amnt'];
	
	$lab_paid_amnt1 =$_POST['lab_paid_amnt'];
	$lab_bal_amnt1 =$_POST['lab_bal_amnt'];
	$tot_pharma_amnt1 =$_POST['tot_pharma_amnt'];
	$pharma_paid1 =$_POST['pharma_paid'];
	$pharma_bal1 =$_POST['pharma_bal'];
	
	$total1 =$_POST['total'];
	$paid1 =$_POST['paid'];
	$due1 =$_POST['due'];
	$concession1 =$_POST['concession'];
	$namount1 =$_POST['namount'];
	$tot_proc_amnt=$_POST['tot_proc_amnt'];
	$proc_paid_amnt=$_POST['proc_paid_amnt'];
	$proc_bal_amnt=$_POST['proc_bal_amnt'];
	$paymenttype=$_POST['paymenttype'];
	
	$now_pay=$_POST['now_pay'];
	$now_bal=$_POST['now_bal'];

	$sql = mysqli_query($link,"select max(id+0) from final_bill_fin ");

if($sql)
{
	$row = mysqli_fetch_array($sql);
	$lrno=$row[0];
}
 $lrno=$lrno+1;


   $a="INSERT INTO final_bill_fin(bno,mrno,patno,pname,fname,age,sex,mobile,
		doa,dichargedate,address,doctors,`tot_hosp_amnt`,`hosp_paid_amnt`,`hosp_bal_amnt`,
		tot_doct_amnt,tot_doct_paid,tot_doct_bal,tot_lab_amnt,lab_paid_amnt,
		lab_bal_amnt,tot_pharma_amnt,pharma_paid,pharma_bal,total,paid,due,concession,namount,tot_proc_amnt,proc_paid_amnt,proc_bal_amnt,paymenttype,new_paid,new_bal)VALUES('$bno',
		'$mrno','$patno','$patname','$fname','$age','$sex','$mobile','$doa','$dichargedate','$address',
		'$doctors','$tot_hosp_amnt1','$hosp_paid_amnt','$hosp_bal_amnt1','$tot_doct_amnt1','$tot_doct_paid1',
		'$tot_doct_bal1','$tot_lab_amnt1','$lab_paid_amnt1','$lab_bal_amnt1','$tot_pharma_amnt1','$pharma_paid1',
		'$pharma_bal1','$total1','$paid1','$due1','$concession1','$namount1','$tot_proc_amnt','$proc_paid_amnt','$proc_bal_amnt','$paymenttype','$now_pay','$now_bal')";
		
    	$result = mysqli_query($link,$a);
		
		
		$id=mysqli_insert_id($link);
		
		$bal=$namount1-$paid1;
		
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
	 values('Final Bill','$now_pay','$cnt','$mrno','$user','$paymenttype','$ndate','Final Bill')";
	
	
	//$sql = $crud->execute($aa);
	$sql=mysqli_query($aa);
		
		$sq=mysqli_query($link,"select * from ip_pat_bed where patno='$patno'");
		$r=mysqli_fetch_array($sq);
		//echo $BED_NO=$r['BED_NO'];
		//$room_no=$r['room_no'];
		//$room_type=$r['room_type'];
		 $fd="select * from ip_pat_admit where PAT_NO='$patno'";
		$sq1=mysqli_query($link,$fd);
		$r1=mysqli_fetch_array($sq1);
		$room_loc=$r1['room_loc'];
		$BED_NO=$r1['BED_NO'];
		$room_loc=$r1['room_loc'];
		$room_type=$r1['room_type'];
		$room_no=$r1['room_no'];
		date_default_timezone_set('Asia/Kolkata');
 $d=date('Y-m-d');
 $t=date('H:i:s');
		  $a="update beds set status='in' where id='$BED_NO' and roomno='$room_no' and rtype='$room_type' and ltype='$room_loc' ";
		//$qry = mysqli_query($link,$a);	
		  $b="update ip_pat_admit set DIS_STATUS='DISCHARGED',Discharge_date='$dichargedate',Discharge_Time='$t' where PAT_NO='$patno'  ";
         //$qry = mysqli_query($link,$b);	

	
		
		/*,tot_hosp_amnt,hosp_paid_amnt,hosp_bal_amnt,
		tot_doct_amnt,tot_doct_paid,tot_doct_bal,tot_lab_amnt,lab_paid_amnt,
		lab_bal_amnt,tot_pharma_amnt,pharma_paid,pharma_bal,total,paid,due,concession,namount
		,'$tot_hosp_amnt','$hosp_paid_amnt','$hosp_bal_amnt','$tot_doct_amnt','$tot_doct_paid',
		'$tot_doct_bal','$tot_lab_amnt','$lab_paid_amnt','$lab_bal_amnt','$tot_pharma_amnt','$pharma_paid',
		'$pharma_bal','$total','$paid','$due','$concession','$namount'*/
		 $count = count($_POST['description']);
		
for($m=0;$m <= $count;$m++)
{
	//echo $m;
	
 $description=$_POST['description'][$m];
$days=$_POST['days'][$m];
$charge=$_POST['charge'][$m];
$amount=$_POST['amount'][$m];
if($description!=''){
		  $a="insert into final_bill_genral(desc1, days, charge, amnt, id1) 
values('$description','$days','$charge','$amount','$id')";


	//echo "<br>";	
	$result =mysqli_query($link,$a);
	}
		
}



 $count1 = $_POST['rows1'];;
for($n=0;$n <= $count1;$n++)
{
$docname=$_POST['docname'][$n];
$daysk=$_POST['daysk'][$n];
$amountk=$_POST['amountk'][$n];
$tot=$_POST['tot'][$n];
 $b="insert into final_doctor(dname, days, amnt, total, id1) 
values('$docname','$daysk','$amountk','$tot','$lrno')";
		
		$result = mysqli_query($link,$b);
		//echo "<br>";
}
		
		 
	


	//display success message
		if($result){
			print "<script>";
			print "alert('Record Inserted Successfully ');";
			print "self.location='finalbilllis1.php';";
			print "</script>";
		}
	
	
}



if(isset($_POST['Submit1'])) {	
	 $bno =$_POST['bno'];
	$mrno =$_POST['mrno'];
	 $patno =$_POST['patno'];
	$patname =$_POST['patname'];
	$fname =$_POST['fname'];
	$age =$_POST['age'];
	$sex =$_POST['sex'];
	$mobile =$_POST['mobile'];
	$doa1 =$_POST['doa'];
	$doa=date('Y-m-d', strtotime($doa1));
	
	$dichargedate1 =$_POST['dichargedate'];
	$dichargedate=date('Y-m-d', strtotime($dichargedate1));
	$address =$_POST['address'];
	$doctors =$_POST['doctors'];
	$tot_hosp_amnt1 =$_POST['tot_hosp_amnt'];
	 $hosp_paid_amnt =rtrim($_POST['hosp_paid_amnt']);
	$doctors123 =$_POST['paid_hosp'];
	$hosp_bal_amnt1 =$_POST['hosp_bal_amnt'];
	$tot_doct_amnt1 =$_POST['tot_doct_amnt'];
	$tot_doct_paid1 =$_POST['tot_doct_paid'];
	$tot_doct_bal1 =$_POST['tot_doct_bal'];
	$tot_lab_amnt1 =$_POST['tot_lab_amnt'];
	
	$lab_paid_amnt1 =$_POST['lab_paid_amnt'];
	$lab_bal_amnt1 =$_POST['lab_bal_amnt'];
	$tot_pharma_amnt1 =$_POST['tot_pharma_amnt'];
	$pharma_paid1 =$_POST['pharma_paid'];
	$pharma_bal1 =$_POST['pharma_bal'];
	
	$total1 =$_POST['total'];
	$paid1 =$_POST['paid'];
	$due1 =$_POST['due'];
	$concession1 =$_POST['concession'];
	$namount1 =$_POST['namount'];
	$tot_proc_amnt=$_POST['tot_proc_amnt'];
	$proc_paid_amnt=$_POST['proc_paid_amnt'];
	$proc_bal_amnt=$_POST['proc_bal_amnt'];
	$paymenttype=$_POST['paymenttype'];
	
	 $id=$_POST['id'];

	$sql = mysqli_query($link,"select max(id+0) from final_bill_fin ");

if($sql)
{
	$row = mysqli_fetch_array($sql);
	$lrno=$row[0];
}
 $lrno=$lrno+1;


   $a="update   final_bill_fin set bno='$bno',mrno='$mrno',patno='$patno',pname='$patname',fname='$fname',
   age='$age',sex='$sex',mobile='$mobile',
		doa='$doa',dichargedate='$dichargedate',address='$address',doctors='$doctors',`tot_hosp_amnt`='$tot_hosp_amnt1',
		`hosp_paid_amnt`='$hosp_paid_amnt',`hosp_bal_amnt`='$hosp_bal_amnt1',
		tot_doct_amnt='$tot_doct_amnt1',tot_doct_paid='$tot_doct_paid1',tot_doct_bal='$tot_doct_bal1',
		tot_lab_amnt='$tot_lab_amnt1',lab_paid_amnt='$lab_paid_amnt1',
		lab_bal_amnt='$lab_bal_amnt1',tot_pharma_amnt='$tot_pharma_amnt1',pharma_paid='$pharma_paid1',
		pharma_bal='$pharma_bal1',total='$total1',paid='$paid1',due='$due1',concession='$concession1',
		namount='$namount1',tot_proc_amnt='$tot_proc_amnt',proc_paid_amnt='$proc_paid_amnt',proc_bal_amnt='$proc_bal_amnt',paymenttype='$paymenttype'
		 where id='$id'";
		
    	$result = mysqli_query($link,$a);
		$id=mysqli_insert_id();
		$sq=mysqli_query($link,"select * from ip_pat_bed where patno='$patno'");
		$r=mysqli_fetch_array($sq);
		//echo $BED_NO=$r['BED_NO'];
		//$room_no=$r['room_no'];
		//$room_type=$r['room_type'];
		 $fd="select * from ip_pat_admit where PAT_NO='$patno'";
		$sq1=mysqli_query($link,$fd);
		$r1=mysqli_fetch_array($sq1);
		$room_loc=$r1['room_loc'];
		$BED_NO=$r1['BED_NO'];
		$room_loc=$r1['room_loc'];
		$room_type=$r1['room_type'];
		$room_no=$r1['room_no'];
		date_default_timezone_set('Asia/Kolkata');
 $d=date('Y-m-d');
 $t=date('H:i:s');
		
		  $b="update ip_pat_admit set DIS_STATUS='DISCHARGED',Discharge_date='$dichargedate' where PAT_NO='$patno'  ";
         $qry = mysqli_query($link,$b);	

	
		
		/*,tot_hosp_amnt,hosp_paid_amnt,hosp_bal_amnt,
		tot_doct_amnt,tot_doct_paid,tot_doct_bal,tot_lab_amnt,lab_paid_amnt,
		lab_bal_amnt,tot_pharma_amnt,pharma_paid,pharma_bal,total,paid,due,concession,namount
		,'$tot_hosp_amnt','$hosp_paid_amnt','$hosp_bal_amnt','$tot_doct_amnt','$tot_doct_paid',
		'$tot_doct_bal','$tot_lab_amnt','$lab_paid_amnt','$lab_bal_amnt','$tot_pharma_amnt','$pharma_paid',
		'$pharma_bal','$total','$paid','$due','$concession','$namount'*/
		 $count = count($_POST['description']);
		
for($m=0;$m <= $count;$m++)
{
	//echo $m;
	
 $description=$_POST['description'][$m];
$days=$_POST['days'][$m];
$charge=$_POST['charge'][$m];
$amount=$_POST['amount'][$m];

	$fin_gen=$_POST['fin_gen'][$m];
//if($description!=''){
		  $a="update   final_bill_genral 
		 set desc1='$description', days='$days', charge='$charge', amnt='$amount' where id='$fin_gen'";


	//echo "<br>";	
	$result =mysqli_query($link,$a);
	//}
		
}



 $count1 = $_POST['rows1'];;
for($n=0;$n <= $count1;$n++)
{
$docname=$_POST['docname'][$n];
$daysk=$_POST['daysk'][$n];
$amountk=$_POST['amountk'][$n];
$tot=$_POST['tot'][$n];
$doct_id=$_POST['doct_id'][$n];
  $b="update   final_doctor set dname='$docname', days='$daysk', amnt='$amountk', total='$tot' where id='$doct_id'";
		
		$result = mysqli_query($link,$b);
		//echo "<br>";
}
		
		 
	


	//display success message
		if($result){
			print "<script>";
			print "alert('Record Updated Successfully ');";
			print "self.location='finalbilllis1.php';";
			print "</script>";
		}
	
	
}




?>
</body>
</html>
