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
$id=$crud->my_simple_crypt($_GET['id'],'d');
 $query = "SELECT * FROM adddischarge where id='$id'";
$result = $crud->getData($query);
foreach($result as $key=>$row){
	
	$id2=$crud->my_simple_crypt($row['id'],'e');
	$file=$row['file'];
	$mrno=$row['mrno'];
$patno=$row['patno'];
$patname=$row['pname'];
$fname=$row['relation'];
$age=$row['age'];
$sex=$row['sex'];
$admit1=str_replace('_', '/', ($row['admit']));
$admit=date('d/m/Y',strtotime($admit1));


$discharge1=str_replace('_', '/', ($row['discharge']));
$discharge=date('d/m/Y',strtotime($discharge1));




$surgery1=$row['surgery'];
$surgery=date('Y-m-d',strtotime($surgery1));
$ward=$row['ward'];
$addr=$row['addr'];
$doctor=$row['doctor'];
$clinicalsummary=$row['clinicalsummary'];
$treatsummary=$row['treatsummary'];
$pulse=$row['pulse'];
$pulse1=$row['pulse1'];
$bp=$row['bp'];
$bp1=$row['bp1'];
$temperature=$row['temperature'];
$temperature1=$row['temperature1'];
$repository=$row['repository'];
$repository1=$row['repository1'];
$heart=$row['heart'];
$heart1=$row['heart1'];
$lungs=$row['lungs'];
$lungs1=$row['lungs1'];
$pa=$row['pa'];
$pa1=$row['pa1'];
$cns=$row['cns'];
$cns1=$row['cns1'];
$localexamination=$row['localexamination'];
$localexamination1=$row['localexamination1'];
$finaldiagnosis=$row['finaldiagnosis'];
$suggestions=$row['suggestions'];


$reviewdate1=str_replace('_', '/', ($row['reviewdate']));
$reviewdate=date('d/m/Y',strtotime($reviewdate1));
 $iname = $row['file'];
	$inreport=$row['invgreport'];	
	$rdoctor=$row['rdname'];
}

if(isset($_POST['Submit'])) {	
 $id=$crud->my_simple_crypt($_POST['id2'],'d');
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
$finaldiagnosis= ($_POST['finaldiagnosis']);
$clinicalsummary= ($_POST['clinicalsummary']);
 $pulserate= ($_POST['pulserate']);
 $pulserate1= ($_POST['pulserate1']);
$bp= $_POST['bp'];
$bp1= $_POST['bp1'];
$temperature= $_POST['temperature'];

$temperature1= $_POST['temperature1'];
$respiratoryrate= $_POST['respiratoryrate'];
$respiratoryrate1= $_POST['respiratoryrate1'];
 $lheart= $_POST['lheart'];
$lheart1= $_POST['lheart1'];
$lungs= $_POST['lungs'];
$lungs1= $_POST['lungs1'];
$pa= $_POST['pa'];
$pa1= $_POST['pa1'];

$cns= $_POST['cns'];
$cns1= $_POST['cns1'];
$localexamination= $_POST['localexamination'];
$localexamination1= $_POST['localexamination1'];
$investigations= $_POST['investigations'];
$suggestions= $_POST['suggestions'];
$treatsummary= $_POST['treatsummary'];
$lab= ($_POST['lab']);
$lab1= ($_POST['lab1']);
$investigations= $_POST['investigations'];
$user=$_POST['user'];
$dname=$_POST['dname'];
$rdname=$_POST['rdname'];

	
	
	
	
	
	
	
	
	
	
	 if (empty($umrno)) {
 $errorumrno = "Please Enter UMR NO";
       
    } else {

        $umrno = $validation->test_input($umrno);
    }
	

	
	// checking empty fields
	if($umrno != '' ) {
	 $sq="update adddischarge set mrno='$umrno',patno='$patno',pname='$patname',relation='$fname',age='$age',sex='$sex',admit='$doa',discharge='$dichargedate',ward='$ward',
	 addr='$address',doctor='$doctors',clinicalsummary='$clinicalsummary',
	 treatsummary='$treatsummary',pulse='$pulsrate',pulse1='$pulsrate1',bp='$bp',bp1='$bp1',
	 temperature='$temperature',temperature1='$temperature1',repository='$respiratoryrate',repository1='$respiratoryrate1',
	 `heart`='$lheart',heart1='$lheart1',lungs='$lungs',lungs1='$lungs1',pa='$pa',pa1='$pa1',cns='$cns',cns1='$cns1',
	 localexamination='$localexamination',localexamination1='$localexamination1',suggestions='$suggestions',
	 reviewdate='$reviewdate',cdate=now(),file='$iname1',finaldiagnosis='$lab',user='$user',invgreport='$lab1',file='$dname',rdname='$rdname' where id='$id'";
    	$result = $crud->execute($sq);
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		//display success message
		if($result){
			print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='dischargesummarylist.php';";
			print "</script>";
		}
	}	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
?>
</body>
</html>
