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
	$lname = $crud->escape_string($_POST['lname']);
	$user =$crud->escape_string($_POST['user']);
	
	
	//$msg = $validation->check_empty($_POST, array('ecode', 'ename', 'email','designation','jdate','qualification','department','dob','gender','mobile','salary','aadhar','accountno','bname','branch','caddress','pddress','designation','jdate','qualification','department','dob','gender','mobile','salary','aadhar','accountno','bname','branch','caddress','pddress'));
	//$check_age = $validation->is_age_valid($_POST['age']);
	//$check_email = $validation->is_email_valid($_POST['email']);
	
	 if (empty($lname)) {
 $errorlname = "Please Enter Employee Dept Name";
       
    } else {

        $lname = $validation->test_input($lname);
    }
	
		
	// checking empty fields
	if($lname != '') {
		
    	$result = $crud->execute("INSERT INTO locations(lname,user)VALUES('$lname','$user')");
		
		//display success message
		if($result){
			print "<script>";
			print "alert('Record Inserted Successfully ');";
			print "self.location='locationlist.php';";
			print "</script>";
		}
	}	
	
}
?>
</body>
</html>
