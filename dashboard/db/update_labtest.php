<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("labdeptlist.php");
include_once("Validation.php");
$id=$crud->my_simple_crypt($_REQUEST['id'],'d');
$q="select * from labtest where id='$id'";
$r=$crud->getData($q);
//$crud = new Crud();
$validation = new Validation();

if(isset($_POST['update'])) {	
$id=$crud->my_simple_crypt($_REQUEST['id'],'d');
	$dept = $crud->escape_string($_POST['dept']);
	$tname = $crud->escape_string($_POST['tname']);
	$user =$crud->escape_string($_POST['user']);
	$amount = $crud->escape_string($_POST['amount']);
	$iamount = $crud->escape_string($_POST['iamount']);
	$report=addslashes($_POST['report']);
	
	
	 if (empty($tname)) {
 $errortname = "Please Enter Test Name";
       
    } else {

        $tname = $validation->test_input($tname);
    }
	 if (empty($amount)) {
 $erroramount = "Please Enter Lab Test Amount";
       
    } else {

        $amount = $validation->test_input($amount);
    }
	
	
	if (empty($iamount)) {
 $erroriamount = "Please Enter Lab Test Insurance Amount";
       
    } else {

        $iamount = $validation->test_input($iamount);
    }
		
	// checking empty fields
	if($tname != '' and $amount!='') {
	 $tt="update labtest set dept='$dept',tname='$tname',amount='$amount',iamount='$iamount',user='$user',report='$report' where id='$id'";
    	$result = $crud->execute($tt);
		
		//display success message
		if($result){
			print "<script>";
			print "alert('Record Inserted Successfully ');";
			print "self.location='labtestdetails.php';";
			print "</script>";
		}
	}	
	
}
?>
</body>
</html>
