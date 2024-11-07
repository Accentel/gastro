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
	$sname = $crud->escape_string($_POST['sname']);
	$user =$crud->escape_string($_POST['user']);
	
	
	//$msg = $validation->check_empty($_POST, array('ecode', 'ename', 'email','designation','jdate','qualification','department','dob','gender','mobile','salary','aadhar','accountno','bname','branch','caddress','pddress','designation','jdate','qualification','department','dob','gender','mobile','salary','aadhar','accountno','bname','branch','caddress','pddress'));
	//$check_age = $validation->is_age_valid($_POST['age']);
	//$check_email = $validation->is_email_valid($_POST['email']);
	
	 if (empty($sname)) {
 $errorsname = "Please Enter Insurance Name";
       
    } else {

        $sname = $validation->test_input($sname);
    }
	
		
	// checking empty fields
	if($sname != '') {
	  $t="INSERT INTO insurance(ins_name,user)VALUES('$sname','$user')";
		
    	$result = $crud->execute($t);
		
		//display success message
		if($result){
			print "<script>";
			print "alert('Record Inserted Successfully ');";
			print "self.location='insurancelist.php';";
			print "</script>";
		}
	}	
	
}
?>
</body>
</html>
