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
	echo $city = $crud->escape_string($_POST['city']);
	echo $user =$crud->escape_string($_POST['user']);
	echo $state = $crud->escape_string($_POST['state']);
	echo $plac = $crud->escape_string($_POST['mandal']);
	echo $village = $crud->escape_string($_POST['village']);

	
	 if (empty($city)) {
 $errordname = "Please Enter City/District Name";
       
    } else {

        $city = $validation->test_input($city);
    }
	if (empty($state)) {
 $erroramount = "Please Select State";
       
    } else {

        $state = $validation->test_input($state);
    }
		
	// checking empty fields
	if($city != '' and $state!='' and $plac!='') {
		echo $a="INSERT INTO village(state,city,vil_name,mandal)VALUES('$state','$city','$village','$plac')";

    	$result = $crud->execute($a);
		
		//display success message
		if($result){
			print "<script>";
			print "alert('Record Inserted Successfully ');";
			print "self.location='city2.php';";
			print "</script>";
		}
	}	
	
}
?>
</body>
</html>
