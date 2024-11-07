
<?php
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
	$tot_hosp_amnt =$_POST['tot_hosp_amnt'];
	$hosp_paid_amnt =$_POST['hosp_paid_amnt'];
	
	$hosp_bal_amnt =$_POST['hosp_bal_amnt'];
	$tot_doct_amnt =$_POST['tot_doct_amnt'];
	$tot_doct_paid =$_POST['tot_doct_paid'];
	$tot_doct_bal =$_POST['tot_doct_bal'];
	$tot_lab_amnt =$_POST['tot_lab_amnt'];
	
	$lab_paid_amnt =$_POST['lab_paid_amnt'];
	$lab_bal_amnt =$_POST['lab_bal_amnt'];
	$tot_pharma_amnt =$_POST['tot_pharma_amnt'];
	$pharma_paid =$_POST['pharma_paid'];
	$pharma_bal =$_POST['pharma_bal'];
	
	$total =$_POST['total'];
	$paid =$_POST['paid'];
	$due =$_POST['due'];
	$concession =$_POST['concession'];
	$namount =$_POST['namount'];

	$sql = mysqli_query($link,"select max(id+0) from final_bill ");

if($sql)
{
	$row = mysqli_fetch_array($sql);
	$lrno=$row[0];
}
$lrno=$lrno+1;
 $a="INSERT INTO final_bill(bno,mrno,patno,pname,fname,age,sex,mobile,
		doa,dichargedate,address,doctors,tot_hosp_amnt,hosp_paid_amnt,hosp_bal_amnt,
		tot_doct_amnt,tot_doct_paid,tot_doct_bal,tot_lab_amnt,lab_paid_amnt,
		lab_bal_amnt,tot_pharma_amnt,pharma_paid,pharma_bal,total,paid,due,concession,namount)VALUES('$bno',
		'$mrno','$patno','$patname','$fname','$age','$sex','$mobile','$doa','$dichargedate','$address',
		'$doctors','$tot_hosp_amnt','$hosp_paid_amnt','$hosp_bal_amnt','$tot_doct_amnt','$tot_doct_paid',
		'$tot_doct_bal','$tot_lab_amnt','$lab_paid_amnt','$lab_bal_amnt','$tot_pharma_amnt','$pharma_paid',
		'$pharma_bal','$total','$paid','$due','$concession','$namount')";
		
    	$result = mysqli_query($link,$a);
		$id=mysql_insert_id();
		
		
		 $count = 14;
for($m=0;$m <= $count;$m++)
{
	//echo $m;
	
 $description=$_POST['description'][$m];
$days=$_POST['days'][$m];
$charge=$_POST['charge'][$m];
$amount=$_POST['amount'][$m];

		 $a="insert into final_bill_genral(desc1, days, charge, amnt, id1) 
values('$description','$days','$charge','$amount','$lrno')";

	//echo "<br>";	
	$result =mysqli_query($link,$a);
		
}


 $count1 = $_POST['rows1'];;
for($n=0;$n <= $count1;$n++)
{
$docname=$_POST['docname'][$n];
$daysk=$_POST['daysk'][$n];
$amountk=$_POST['amountk'][$n];
$tot=$_POST['tot'][$n];
echo $b="insert into final_doctor(dname, days, amnt, total, id1) 
values('$docname','$daysk','$amountk','$tot','$lrno')";
		
		$result = mysqli_query($link,$b);
		//echo "<br>";
}
		
		 $count2 = $_POST['rows2'];;
for($k=0;$k <= $count2;$k++)
{
$test_name=$_POST['test_name'][$k];
$lab_amnt=$_POST['lab_amnt'][$k];


		 $c="insert into final_lab(test_name, amnt, id1) 
values('$test_name','$lab_amnt','$lrno')";
		$result = mysqli_query($link,$c);
	// "<br>";	
}
	$count3 = $_POST['rows3'];;
for($p=0;$p <= $count3;$p++)
{
$desc=$_POST['desc'][$p];
$qty=$_POST['qty'][$p];
$rate=$_POST['rate'][$p];
$amn=$_POST['amn'][$p];
//$qty=$_POST['qty'.$p];
 $d="insert into final_pharmacy(prd_name, qty,rate,amount, id1) 
values('$desc','$qty','$rate','$amn','$lrno')";
		
		$result = mysqli_query($link,$d);
		//echo "<br>";
}	

		//display success message
		if($result){
			print "<script>";
			print "alert('Record Inserted Successfully ');";
			print "self.location='finalbilllist.php';";
			print "</script>";
		}
	
	
}
?>
</body>
</html>
