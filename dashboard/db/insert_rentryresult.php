<?php
//including the database connection file
include_once("connection.php");

	
if(isset($_POST['Submit'])) {	
	$bno = ($_POST['bno']);
	$pname= ($_POST['pname']);
	$age= ($_POST['age']);
	$gender= ($_POST['gender']);
	$dname= ($_POST['dname']);
	$bdate= ($_POST['bdate']);
	$tname= ($_POST['tname']);
	
	$ks=mysqli_query($link,"select * from resultentry where billno='$bno'") or die(mysqli_error($link));
	$ks1=mysqli_fetch_array($ks);
	$bno1=$ks1['billno'];
	if($bno==$bno1){
	}else{
	$ts="INSERT INTO resultentry(mrno,billno,pname,user,age,gender,bdate,dname)VALUES
	('$mrno','$bno','$pname','$user','$age','$gender','$bdate','$dname')";
    $result = mysqli_query($link,$ts) or die(mysqli_error($link));
	}
		
		for($t=0; $t<=count($_POST['result']); $t++){
		 $result= $_POST['result'][$t];
		 $title= $_POST['invg'][$t];
		  $units= $_POST['units'][$t];
		   $descr= $_POST['descr'][$t];
		    $heading= $_POST['heading'][$t];
		  
		  $mty=mysqli_query($link,"select * from resultentry3 where bno='$bno' and tname='$tname' and title='$title'") or die(mysqli_error($link));
		  $mty1=mysqli_num_rows($mty);
		  
		  if($mty1==1){
			echo   $ts1="update resultentry3 set result='$result',title='$title',units='$units',nvalues='$descr',heading='$heading'  where tname='$tname' and bno='$bno' and title='$title'";
		  }else{
			  
		echo	  $ts1="insert into resultentry3(bno,result,title,units,nvalues,heading,tname)values('$bno','$result','$title','$units','$descr','$heading','$tname')"; 
		  }
		  
		  $result1 = mysqli_query($link,$ts1) or die(mysqli_error($link));
			
			
		}
	//exit;
	//$bno = $crud->my_simple_crypt($_POST['bno'],'e');
		
		if($result1){
			print "<script>";
			print "alert('Successfully Registred ');";
			print "self.location='print_result.php?bno=$bno&tname=$tname';";
			print "</script>";
		}
	}	
	

?>
