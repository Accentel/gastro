<html>
<head>
	
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
	echo $user =$crud->escape_string($_POST['user']);
	echo $state = $crud->escape_string($_POST['state']);
	
	
	
	 if (empty($dname)) {
 $errordname = "Please Enter City/District Name";
       
    } else {

        $dname = $validation->test_input($dname);
    }
	if (empty($state)) {
 $erroramount = "Please Select State";
       
    } else {

        $state = $validation->test_input($state);
    }
		
	// checking empty fields
	if($dname != '' and $state!='') {
		
    	$result = $crud->execute("INSERT INTO location_city(state,city,user)VALUES('$state','$dname','$user')");
		
		//display success message
		if($result){
			print "<script>";
			print "alert('Record Inserted Successfully ');";
			print "self.location='city.php';";
			print "</script>";
		}
	}	
	
}
?>
</body>
</html>
