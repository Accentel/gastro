<?php
include_once("Crud.php");

$crud = new Crud();

//getting id of the data from url
$id = $_GET['id'];
echo $a="DELETE FROM login WHERE `name1`='$id'";
$result1 = $crud->execute($a);

//$result = $crud->delete($id, 'hospital_tarrif');

if($result1){
	print "<script>";
			print "alert('Successfully Deleted ');";
			print "self.location='../pages/userview.php';";
			
			
			print "</script>";


}
?>