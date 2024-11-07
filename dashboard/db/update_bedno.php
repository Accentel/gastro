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
$id=$crud->my_simple_crypt($_REQUEST['id'],'d');
$st="select * from beds where id='$id'";
$bt= $crud->getData($st);

if(isset($_POST['submit'])) {	
$ltype = $crud->escape_string($_POST['ltype']);
	$dname = $crud->escape_string($_POST['rtype']);
	$rno = $crud->escape_string($_POST['rno']);
	$bno = $crud->escape_string($_POST['bno']);
	$user =$crud->escape_string($_POST['user']);
	
	$id =$crud->escape_string($_POST['id'],'d');
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
		
    	$result = $crud->execute("update beds set ltype='$ltype',rtype='$dname',roomno='$rno',bedno='$bno',user='$user' where id='$id'");
		
		//display success message
		if($result){
			print "<script>";
			print "alert('Record Updated Successfully ');";
			print "self.location='bedslist.php';";
			print "</script>";
		}
	}	
	
}
?>
</body>
</html>
