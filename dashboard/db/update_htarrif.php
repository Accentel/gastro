<?php
//including the database connection file
include_once("Crud.php");
include_once("Validation.php");

$crud = new Crud();
$validation = new Validation();

if(isset($_POST['update'])) {	
	echo $dname = $crud->escape_string($_POST['dname']);
	$user =$crud->escape_string($_POST['user']);
	$amount = $crud->escape_string($_POST['amount']);
	$id=$crud->my_simple_crypt($_REQUEST['id'],'d');
	
	
	 if (empty($dname)) {
 $errordname = "Please Enter Hospital Tarrif Name";
       
    } else {

        $dname = $validation->test_input($dname);
    }
	if (empty($amount)) {
 $erroramount = "Please Enter Hospital Tarrif Amount";
       
    } else {

        $amount = $validation->test_input($amount);
    }
		
	// checking empty fields
	if($dname != '' and $amount!='') {
		$t="update hospital_tarrif set  tname='$dname',amount='$amount',user='$user' where id='$id'";
    	$result = $crud->execute($t);
		
		//display success message
		if($result){
			print "<script>";
			print "alert('Record Updated Successfully ');";
			print "self.location='hospitaltarriflist.php';";
			print "</script>";
		}
	}	
	
}else{
	$id=$crud->my_simple_crypt($_REQUEST['id'],'d');
	$query = "SELECT * FROM hospital_tarrif where id='$id'";
$result = $crud->getData($query);
	
	
}
?>

