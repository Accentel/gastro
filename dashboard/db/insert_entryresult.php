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
$id=$crud->my_simple_crypt($_REQUEST['id'],'d');
			//include("config.php");
			/*$dt = date('d-m-Y');
			$dt1 = explode("-",$dt);
			$dt2 = implode($dt1);
			$dt3 = ltrim($dt2, '0');
			$str20 = "BL-".$dt3."-";
			$tp="select count(distinct billno) as billcont from bill where billno like '$str20%'";*/
			$tp="select *  from bill where billno='$id'";
			$rst = $crud->getdata($tp);
	
if(isset($_POST['Submit'])) {	
	$mrno = $crud->escape_string($_POST['mrno']);
	$bno = $crud->escape_string($_POST['bno']);
	$pname= $crud->escape_string($_POST['pname']);
	$user= $crud->escape_string($_POST['user']);
	$ts="INSERT INTO resultentry(mrno,billno,pname,user)VALUES
	('$mrno','$bno','$pname','$user')";
    $result = $crud->execute($ts);

		//echo $count=;
		//exit;
		for($t=0; $t<=count($_POST['result']); $t++){
		 $result= $_POST['result'][$t];
		 $tname= $_POST['tname'][$t];
		
			if($result!=''){
			echo	 $ts1="insert into resultentry1(bno,mrno,tname,result)values('$bno','$mrno','$tname','$result')";
				$result1 = $crud->execute($ts1);
			}
			
		}
	exit;
	//$bno = $crud->my_simple_crypt($_POST['bno'],'e');
		
		if($result1){
			print "<script>";
			print "alert('Successfully Registred ');";
			print "self.location='labreultlist.php';";
			print "</script>";
		}
	}	
	

?>
</body>
</html>
