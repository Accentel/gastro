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
	$ecode = ($_POST['ecode']);
	$ename = ($_POST['ename']);
	$email = ($_POST['email']);
	$designation= ($_POST['designation']);
	
	$jdate1 = str_replace('/', '-', ($_POST['jdate']));
    $jdate=date('Y-m-d', strtotime($jdate1));

$qualification= ($_POST['qualification']);
$department= ($_POST['department']);
//$dob= ($_POST['dob']);

$dob1 = str_replace('/', '-', ($_POST['dob']));
    $dob=date('Y-m-d', strtotime($dob1));
	
$gender= ($_POST['gender']);
$mobile= ($_POST['mobile']);
$amobile= ($_POST['amobile']);
$salary= ($_POST['salary']);
$aadhar= ($_POST['aadhar']);
$accountno= ($_POST['accountno']);
$bname= ($_POST['bname']);
$branch= ($_POST['branch']);
$caddress= ($_POST['caddress']);
$pddress= ($_POST['pddress']);
$user= ($_POST['user']);
$iname = $_FILES['file']['name'];
$date=date('dmy');
	if($iname!= ""){
				// echo "hi";
				 
	$code = md5(rand());
	 //$date=date("Y");
	echo $iname =$date."-".$_FILES['file']['name'];
	$tmp = $_FILES['file']['tmp_name'];
	
	 $dir = "../photo";
		       $destination =  $dir . '/' . $iname;
		         move_uploaded_file($tmp, $destination);
	//move_uploaded_file($tmp,"../staff/" . $code.$_FILES["sfile"]["name"]);
	 $iname1 =$date."-".$_FILES['file']['name'];
	//$iname = $code.$_FILES["sfile"]["name"];
	$iname1 = ($iname1);
	}else{
	 $iname1 = ($image1);
	}
	
	
	
	
	
	//$msg = $validation->check_empty($_POST, array('ecode', 'ename', 'email','designation','jdate','qualification','department','dob','gender','mobile','salary','aadhar','accountno','bname','branch','caddress','pddress','designation','jdate','qualification','department','dob','gender','mobile','salary','aadhar','accountno','bname','branch','caddress','pddress'));
	//$check_age = $validation->is_age_valid($_POST['age']);
	//$check_email = $validation->is_email_valid($_POST['email']);
	
	 if (empty($ecode)) {
 $errorecode = "Please Enter Employee Code";
       
    } else {

        $ecode = $validation->test_input($ecode);
    }
	
	if (empty($ename)) {
 $errorename = "Please Enter Employee Name";
       
    } else {

        $ename = $validation->test_input($ename);
    }
	
	
	if (empty($designation)) {
 $errordesignation = "Please Enter Designation";
       
    } else {

        $designation = $validation->test_input($designation);
    }
	
	
	if (empty($qualification)) {
 $errorqualification = "Please Enter Qualification";
       
    } else {

        $qualification = $validation->test_input($qualification);
    }
	
	
	if (empty($department)) {
 $errordepartment = "Please Enter Department";
       
    } else {

        $department = $validation->test_input($department);
    }
	
	
	if (empty($gender)) {
 $errorgender = "Please Select Gender";
       
    } else {

        $gender = $validation->test_input($gender);
    }
	
	
	if (empty($mobile)) {
		$errormobile = "Please Enter Mobile No";
       
    
    } else if (!is_numeric($mobile)) {
        $errormobile = 'Enter a valid Mobile No.';
    }else if (strlen($mobile) != 10) {
        $errormobile = 'Enter a valid Mobile No.';
    } else{
		
		$mobile = $validation->test_input($mobile);
	}
	
	
	// checking empty fields
	if($ecode != '' and $ename!='' and $designation!='' and $qualification!='' and $department!='' and $gender!='' and $mobile!='') {
		
    	$result = $crud->execute("INSERT INTO employee(empcode,empname,empemail,designation,jdate,qualification,department,dob,gender,mobile,salary,aadhar,accountno,bname,branch,caddress,pddress,amobile,photo,user)VALUES('$ecode','$ename','$email','$designation','$jdate','$qualification','$department','$dob','$gender','$mobile','$salary','$aadhar','$accountno','$bname','$branch','$caddress','$pddress','$amobile','$iname1','$user')");
		
		//display success message
		if($result){
			print "<script>";
			print "alert('Successfully Registred ');";
			print "self.location='addemployee.php';";
			print "</script>";
		}
	}	
	
}
?>
</body>
</html>
