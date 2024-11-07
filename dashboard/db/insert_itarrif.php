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
	$user =$crud->escape_string($_POST['user']);
	$amount = $crud->escape_string($_POST['amount']);
	
	
	
	 if (empty($dname)) {
 $errordname = "Please Enter Insurance Tarrif Name";
       
    } else {

        $dname = $validation->test_input($dname);
    }
	if (empty($amount)) {
 $erroramount = "Please Enter Insurance Tarrif Amount";
       
    } else {

        $amount = $validation->test_input($amount);
    }
		
	// checking empty fields
	if($dname !='' and $amount!='') {
		$t="INSERT INTO insurance_tarrif(tname,amount,user)VALUES('$dname','$amount','$user')";
    	$result = $crud->execute($t);
		
		//display success message
		if($result){
			print "<script>";
			print "alert('Record Inserted Successfully ');";
			print "self.location='insurancetarriflist.php';";
			print "</script>";
		}
	}	
	
}
?>
</body>
</html>