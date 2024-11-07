<?php
//including the database connection file
include_once("connection.php");
//include_once("Validation.php");
include_once("labdeptlist.php");
//$crud = new Crud();
//$validation = new Validation();

if(isset($_POST['submit'])) {	
	 $dept = ($_POST['dept']);
	$tname = ($_POST['tname']);
	$user =($_POST['user']);
	$amount = ($_POST['amount']);
	$iamount = ($_POST['iamount']);
	$report = addslashes($_POST['report']);
	
	//$msg = $validation->check_empty($_POST, array('ecode', 'ename', 'email','designation','jdate','qualification','department','dob','gender','mobile','salary','aadhar','accountno','bname','branch','caddress','pddress','designation','jdate','qualification','department','dob','gender','mobile','salary','aadhar','accountno','bname','branch','caddress','pddress'));
	//$check_age = $validation->is_age_valid($_POST['age']);
	//$check_email = $validation->is_email_valid($_POST['email']);
	
	 if (empty($tname)) {
 $errortname = "Please Enter Test Name";
       
    } else {

        $tname = ($tname);
    }
	 if (empty($amount)) {
 $erroramount = "Please Enter Lab Test Amount";
       
    } else {

        $amount = ($amount);
    }
	
	
	if (empty($iamount)) {
 $erroriamount = "Please Enter Lab Test Insurance Amount";
       
    } else {

        $iamount =($iamount);
    }
		
	// checking empty fields
	if($tname != '' and $amount!='') {
		
    	$result = mysqli_query($link,"INSERT INTO labtest1(dept,tname,amount,iamount,user)VALUES('$dept','$tname','$amount','$iamount','$user')");
		//$id=mysqli_insert_id($link);
		for($t=0; $t<count($_POST['title']); $t++){
		$title= addslashes($_POST['title'][$t]);
		$heading= addslashes($_POST['heading'][$t]);
			$units= addslashes($_POST['units'][$t]);
		$description= addslashes($_POST['description'][$t]);
			
	 $ts1="insert into labtest2(tname,description,title,heading,units)values('$tname','$description','$title','$heading','$units')";
		$result1 = mysqli_query($link,$ts1);
			
			
		}
		
		
		
		//display success message
		if($result){
			print "<script>";
			print "alert('Record Inserted Successfully ');";
			print "self.location='addlabtest1.php';";
			print "</script>";
		}
	}	
	
}
?>
