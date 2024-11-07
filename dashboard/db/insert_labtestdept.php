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

if(isset($_POST['submit'])) {	
	$dname = $crud->escape_string($_POST['dname']);
	$dcode = $crud->escape_string($_POST['dcode']);
	$user =$crud->escape_string($_POST['user']);
	
	
	//$msg = $validation->check_empty($_POST, array('ecode', 'ename', 'email','designation','jdate','qualification','department','dob','gender','mobile','salary','aadhar','accountno','bname','branch','caddress','pddress','designation','jdate','qualification','department','dob','gender','mobile','salary','aadhar','accountno','bname','branch','caddress','pddress'));
	//$check_age = $validation->is_age_valid($_POST['age']);
	//$check_email = $validation->is_email_valid($_POST['email']);
	
	 if (empty($dname)) {
 $errordname = "Please Enter Employee Dept Name";
       
    } else {

        $dname = $validation->test_input($dname);
    }
	 if (empty($dcode)) {
 $errordcode = "Please Enter Lab Test Dept Code";
       
    } else {

        $dcode = $validation->test_input($dcode);
    }
		
	// checking empty fields
	if($dname != '' and $dcode!='') {
		
    	$result = $crud->execute("INSERT INTO labdept(deptcode,deptname,user)VALUES('$dcode','$dname','$user')");
		
		//display success message
		if($result){
			print "<script>";
			print "alert('Record Inserted Successfully ');";
			print "self.location='labtestdeptlist.php';";
			print "</script>";
		}
	}	
	
}
?>
</body>
</html>
