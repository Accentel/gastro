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
	$bno = $crud->escape_string($_POST['bno']);
	$user =$crud->escape_string($_POST['user']);
	
	
	//$msg = $validation->check_empty($_POST, array('ecode', 'ename', 'email','designation','jdate','qualification','department','dob','gender','mobile','salary','aadhar','accountno','bname','branch','caddress','pddress','designation','jdate','qualification','department','dob','gender','mobile','salary','aadhar','accountno','bname','branch','caddress','pddress'));
	//$check_age = $validation->is_age_valid($_POST['age']);
	//$check_email = $validation->is_email_valid($_POST['email']);
	
	 if (empty($bno)) {
 $errorbno = "Please Enter Room No";
       
    } else {

        $bno = $validation->test_input($bno);
    }
	
		
	// checking empty fields
	if($bno != '') {
		
    	$result = $crud->execute("INSERT INTO beds(ltype,rtype,roomno,bedno,user)VALUES('$ltype','$dname','$rno','$bno','$user')");
		
		//display success message
		if($result){
			print "<script>";
			print "alert('Record Inserted Successfully ');";
			print "self.location='bedslist.php';";
			print "</script>";
		}
	}	
	
}
?>
</body>
</html>
