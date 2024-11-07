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
	echo $dname = $crud->escape_string($_POST['dname']);
	$user =$crud->escape_string($_POST['user']);
	//$amount = $crud->escape_string($_POST['amount']);
	
	
	
	 if (empty($dname)) {
 $errordname = "Please Enter Hospital Department Name";
       
    } else {

        $dname = $validation->test_input($dname);
    }
	
		
	// checking empty fields
	if($dname != '') {
		echo $t="INSERT INTO hospital_dept(tname,user)VALUES('$dname','$user')"; 
    	$result = $crud->execute($t);
		
		//display success message
		if($result){
			print "<script>";
			print "alert('Record Inserted Successfully ');";
			print "self.location='hospital_dept_list.php';";
			print "</script>";
		}
	}	
	
}
?>
</body>
</html>
