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

$id=$crud->my_simple_crypt($_REQUEST['id'],'d');
 $s="select * from rooms where id='$id'";
$result1 = $crud->getData($s);
$validation = new Validation();

if(isset($_POST['submit'])) {	
$ltype = $crud->escape_string($_POST['ltype']);
	$dname = $crud->escape_string($_POST['rtype']);
	$rno = $crud->escape_string($_POST['rno']);
	$user =$crud->escape_string($_POST['user']);
	 $id=$crud->my_simple_crypt($_POST['id'],'d');
	
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
		$iqry="update rooms set ltype='$ltype',rtype='$dname',roomno='$rno',user='$user' where id='$id' ";
    	$result = $crud->execute($iqry);
		
		//display success message
		if($result){
			print "<script>";
			print "alert('Record Updated Successfully ');";
			print "self.location='roomslist.php';";
			print "</script>";
		}
	}	
	
}
?>
</body>
</html>
