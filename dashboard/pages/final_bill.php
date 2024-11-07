<?php 
include("../db/connection.php");
if(isset($_POST['Submit'])){
	$umrno = ($_POST['umrno']);
	$patno = ($_POST['patno']);
	$patname = ($_POST['patname']);
	$fname= ($_POST['fname']);
    //$dichargedate1 = str_replace('/', '-', ());
    $dichargedate=$_POST['dichargedate'];
    $age= ($_POST['age']);
    $sex= ($_POST['sex']);
//$dob= ($_POST['dob']);

//$doa1 = str_replace('/', '-', ($_POST['doa']));
    $doa=$_POST['doa'];

$address= ($_POST['address']);
$doctors= ($_POST['doctors']);
$lab= ($_POST['lab']);
$lab1= ($_POST['lab1']);

$user=$_POST['user'];

$tot_amt=$_POST['tot_amt'];
$discount=$_POST['discount'];
$net=$_POST['net'];
$paid=$_POST['paid'];
$due=$_POST['due'];
$paymenttype=$_POST['paymenttype'];
$cdate=date('Y-m-d');
					

 $a="INSERT INTO `final_bill`( `mrno`, `patno`,
		`pname`, `fname`, `age`, `sex`, `mobile`, `doa`, `dichargedate`, `address`, 
		`doctors`,  `tot_amt`, `discount`, `net`,`paymenttype`,`paid`,`due`,bdate)
		VALUES ('$umrno','$patno','$patname','$fname','$age','$sex','','$doa','$dichargedate','$address',
		'$doctors', '$tot_amt', '$discount', '$net','$paymenttype','$paid','$due','$cdate')	";
					
		$sq=mysqli_query($link,$a);	
		$id=mysqli_insert_id($link);
											
				$count=count($_POST['description']);	
	for($m=0;$m <= $count;$m++)
{
	//echo $m;
	
 $description=$_POST['description'][$m];
$days=$_POST['days'][$m];
$charge=$_POST['charge'][$m];
$amount=$_POST['amount'][$m];
if($description!=''){
		  $a="insert into ifinal_bill_genral(desc1, days, charge, amnt, id1) 
values('$description','$days','$charge','$amount','$id')";


	//echo "<br>";	
	$result =mysqli_query($link,$a);
	}
		
}				
					
					
					
					
					
					
					
					
					
					
					
											
										
					print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='finalbilllist.php';";
			print "</script>";						
											
											
}									
																			
											
											
											
		if(isset($_POST['update'])){
	$umrno = ($_POST['umrno']);
	$patno = ($_POST['patno']);
	$patname = ($_POST['patname']);
	$fname= ($_POST['fname']);
	
	//$dichargedate1 = str_replace('/', '-', ($_POST['dichargedate']));
    $dichargedate=$_POST['dichargedate'];

$age= ($_POST['age']);
$sex= ($_POST['sex']);
//$dob= ($_POST['dob']);

//$doa1 = str_replace('/', '-', ($_POST['doa']));
    $doa=$_POST['doa'];

$address= ($_POST['address']);
$doctors= ($_POST['doctors']);

$tot_amt=$_POST['tot_amt'];
$discount=$_POST['discount'];
$net=$_POST['net'];
$id=$_POST['id'];
					$paid=$_POST['paid'];
$due=$_POST['due'];
//$bdate=date('Y-m-d');

 $a="update  `final_bill` set  `mrno`='$umrno', `patno`='$patno',
		`pname`='$patname', `fname`='$fname', `age`='$age', `sex`='$sex', `doa`='$doa', `dichargedate`='$dichargedate',
		`address`='$address', 
		`doctors`='$doctors',  `tot_amt`='$tot_amt', `discount`='$discount', `net`='$net',paymenttype='$paymenttype',paid='$paid',due='$due' where id='$id'	";
					
		$sq=mysqli_query($link,$a);							
			
			
	$count=count($_POST['description']);	
	for($m=0;$m <= $count;$m++)
{
	//echo $m;
	
 $description=$_POST['description'][$m];
$days=$_POST['days'][$m];
$charge=$_POST['charge'][$m];
$amount=$_POST['amount'][$m];
$id2=$_POST['id2'][$m];

if($description!=''){
		  $a="update ifinal_bill_genral set desc1='$description', days='$days', charge='$charge', amnt='$amount' where id='$id2'";


	//echo "<br>";	
	$result =mysqli_query($link,$a) or die(mysqli_error($link));
	}
		
}												
											
										
					print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='finalbilllist.php';";
			print "</script>";						
											
											
}									
										
											
	
?>
