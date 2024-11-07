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
	// echo $name = $crud->escape_string($_POST['name']);
	// echo $user =$crud->escape_string($_POST['user']);
	// echo $amount = $crud->escape_string($_POST['amount']);
	 $name = $crud->escape_string($_POST['name']);
	 $user =$crud->escape_string($_POST['user']);
	 $amount = $crud->escape_string($_POST['amount']);
	//echo $plac = $crud->escape_string($_POST['mandal']);
	//echo $village = $crud->escape_string($_POST['village']);

	
	 if (empty($name)) {
 $errordname = "Please Enter Procedure Name";
       
    } else {

        $name = $validation->test_input($name);
    }
	if (empty($amount)) {
 $erroramount = "Please Enter Amount";
       
    } else {

        $amount = $validation->test_input($amount);
    }
		
	// checking empty fields
	if($name != '' and $amount!='' ) {
		//echo $a="INSERT INTO procedure1(name,amount)VALUES('$name','$amount')";
		 $a="INSERT INTO procedure1(name,amount)VALUES('$name','$amount')";

    	$result = $crud->execute($a);
		
		//display success message
		if($result){
			print "<script>";
			print "alert('Record Inserted Successfully ');";
			print "self.location='city3.php';";
			print "</script>";
		}
	}	
	
}

// $crud = new Crud();
// //echo $id=$crud->my_simple_crypt($_REQUEST['id'],'d');
// $id=$crud->my_simple_crypt($_REQUEST['id'],'d');
// //fetching data in descending order (lastest entry first)
// $query = "SELECT * FROM procedure1 where id='$id'";
// $result = $crud->getData($query);



// if(isset($_POST['update'])){
// $crud = new Crud();
// $id=$crud->my_simple_crypt($_POST['id'],'d');
// $name=$crud->escape_string($_POST['name']);
// $user=$crud->escape_string($_POST['user']);
// $amount=$crud->escape_string($_POST['amount']);
// //$plac=$crud->escape_string($_POST['mandal']);
// //$village=$crud->escape_string($_POST['village']);


//  $sql="update procedure1  set  name='$name',amount='$amount' where id='$id'";

// $result=$crud->execute($sql);
// if($result){
// 	print "<script>";
// 			print "alert('Successfully Updated ');";
// 			print "self.location='city3.php';";
// 			print "</script>";
// }
// }


?>
</body>
</html>
