<!DOCTYPE html>
<html>
<head>
<style>
  .button {
    display: inline-block;
    padding: 15px 30px;
    font-size: 18px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
    background-color: #007BFF;
    color: #fff;
    border: 2px solid #007BFF;
    border-radius: 10px;
  }

  .button:hover {
    background-color: #0056b3;
    border: 2px solid #0056b3;
  }
</style>
</head>
<body>

<a href="dischargesummarylist.php" class="button">Go to DISCHARGE SUMMARY List</a>

</body>
</html>  

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
$query = "SELECT * FROM empdept";
$result = $crud->getData($query);

if(isset($_POST['Submit'])) {	
	$umrno = ($_POST['umrno']);
	$patno = ($_POST['patno']);
	$patname = ($_POST['patname']);
	$fname= ($_POST['fname']);
	
	$dichargedate1 = str_replace('/', '-', ($_POST['dichargedate']));
    $dichargedate=date('Y-m-d', strtotime($dichargedate1));

$age= ($_POST['age']);
$sex= ($_POST['sex']);
//$dob= ($_POST['dob']);

$doa1 = str_replace('/', '-', ($_POST['doa']));
    $doa=date('Y-m-d', strtotime($doa1));

$address= ($_POST['address']);
$doctors= ($_POST['doctors']);
$lab= ($_POST['lab']);
$lab1= ($_POST['lab1']);

$user=$_POST['user'];
$dname=$_POST['dname'];
	$dname1=$_POST['rdname'];
	
	
	
	
	
	
	
	
	
	
	
	 if (empty($umrno)) {
 $errorumrno = "Please Enter UMR NO";
       
    } else {

        $umrno = $validation->test_input($umrno);
    }
	

	
	// checking empty fields
	if($umrno != '' ) {
	// $sq="INSERT INTO adddischarge(mrno,patno,pname,relation,age,sex,admit,discharge,ward,addr,doctor,clinicalsummary,
	// treatsummary,pulse,pulse1,bp,bp1,temperature,temperature1,repository,repository1,heart,heart1,lungs,
	// lungs1,pa,pa1,cns,cns1,localexamination,localexamination1,suggestions,reviewdate,cdate,file,finaldiagnosis,user,invgreport,rdname)
	// VALUES('$umrno','$patno','$patname','$fname','$age','$sex','$doa','$dichargedate','$ward',
	// '$address','$doctors','$clinicalsummary','$treatsummary','$pulsrate','$pulsrate1','$bp','$bp1',
	// '$temperature','$temperature1','$respiratoryrate','$respiratoryrate1','$heart','$heart1','$lungs',
	// '$lungs1','$pa','$pa1','$cns','$cns1','$localexamination','$localexamination1','$suggestions',
	// '$reviewdate',now(),'$dname','$lab','$user','$lab1','$rdname')";
	$sq="INSERT INTO adddischarge(mrno, patno, pname, relation, age, sex, admit, discharge, addr, doctor, file, finaldiagnosis, user, invgreport, rdname)
	VALUES ('$umrno', '$patno', '$patname', '$fname', '$age', '$sex', '$doa', '$dichargedate', '$address', '$doctors', '$dname', '$lab', '$user', '$lab1', '$dname1')";
	
    	$result = $crud->execute($sq);
		
	include("connection.php");	
	
	
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
		$qry = mysqli_query($link,$a);	
		  $b="update ip_pat_admit set DIS_STATUS='DISCHARGED',Discharge_date='$dichargedate',Discharge_Time='$t' where PAT_NO='$patno'  ";
         $qry = mysqli_query($link,$b);	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		//display success message
		if($result){
			print "<script>";
			print "alert('Successfully Registred ');";
			print "self.location='dischargesummarylist.php';";
			print "</script>";
		}
	}	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
?>
</body>
</html>
