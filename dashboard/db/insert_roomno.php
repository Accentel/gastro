<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
//include_once("Crud.php");
include_once("Validation.php");
include_once("locations.php");
//$crud = new Crud();
$validation = new Validation();

if(isset($_POST['submit'])) {	
$ltype = $crud->escape_string($_POST['ltype']);
	$dname = $crud->escape_string($_POST['rtype']);
	$rno = $crud->escape_string($_POST['rno']);
	$user =$crud->escape_string($_POST['user']);
	
	
	//$msg = $validation->check_empty($_POST, array('ecode', 'ename', 'email','designation','jdate','qualification','department','dob','gender','mobile','salary','aadhar','accountno','bname','branch','caddress','pddress','designation','jdate','qualification','department','dob','gender','mobile','salary','aadhar','accountno','bname','branch','caddress','pddress'));
	//$check_age = $validation->is_age_valid($_POST['age']);
	//$check_email = $validation->is_email_valid($_POST['email']);
	
	 if (empty($rno)) {
 $errorrno = "Please Enter Room No";
       
    } else {

        $rno = $validation->test_input($rno);
    }
	
		
	// checking empty fields
	if($rno != '') {
		
    	$result = $crud->execute("INSERT INTO rooms(ltype,rtype,roomno,user)VALUES('$ltype','$dname','$rno','$user')");
		
		//display success message
		if($result){
			print "<script>";
			print "alert('Record Inserted Successfully ');";
			print "self.location='roomslist.php';";
			print "</script>";
		}
	}	
	
}
?>
</body>
</html>
