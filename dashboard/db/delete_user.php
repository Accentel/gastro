<?php
include_once("Crud.php");

$crud = new Crud();

//getting id of the data from url
$id = $_GET['id'];
$id1=$_GET['id1'];

//deleting the row from table
$result1 = $crud->execute("DELETE FROM login WHERE name1='$id'");
$result = $crud->execute("DELETE FROM hr_user WHERE emp_id=$id1");
//$result = $crud->delete($id, 'hospital_tarrif');
if($result){
	print "<script>";
			//print "alert('Successfully Deleted ');";
			print "self.location='delete_user1.php?id=$id';";
			
			
			print "</script>";
}

?>