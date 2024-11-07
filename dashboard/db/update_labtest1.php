<?php
//including the database connection file
include_once("connection.php");
//include_once("Validation.php");
include_once("labdeptlist.php");
//include_once("Validation.php");
$id=($_REQUEST['id']);
$q="select * from labtest1 where id='$id'";
$r=mysqli_query($link,$q);
//$crud = new Crud();
//$validation = new Validation();

if(isset($_POST['update'])) {	
$id=($_REQUEST['id']);
	$dept = ($_POST['dept']);
	$tname = ($_POST['tname']);
	$user =($_POST['user']);
	$amount = ($_POST['amount']);
	$iamount = ($_POST['iamount']);
	//$report=addslashes($_POST['report']);
	
	
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

        $iamount = ($iamount);
    }
		
	// checking empty fields
	if($tname != '' and $amount!='') {
	 $tt="update labtest1 set dept='$dept',tname='$tname',amount='$amount',iamount='$iamount',user='$user' where id='$id'";
    	$result = mysqli_query($link,$tt) or die(mysqli_error($link));
		
		for($t=0; $t<count($_POST['title']); $t++){
		$title= addslashes($_POST['title'][$t]);
		 $heading= addslashes($_POST['heading'][$t]);
		  $units= addslashes($_POST['units'][$t]);
		$description= addslashes($_POST['description'][$t]);
				$tid= ($_POST['tid'][$t]);
				
			if($tid!=''){

		 $ts1="update labtest2 set tname='$tname',description='$description',title='$title',heading='$heading',units='$units' where id='$tid'";
		
			}else{

		 $ts1="insert into labtest2(tname,description,title,heading,units)values('$tname','$description','$title','$heading','$units')";
		

			}			
			$result1 = mysqli_query($link,$ts1) or die(mysqli_error($link));
			
		}
		
				
		//display success message
		if($result){
			print "<script>";
			print "alert('Record Updated Successfully ');";
			print "self.location='labtestdetails.php';";
			print "</script>";
		}
	}	
	
}
?>
