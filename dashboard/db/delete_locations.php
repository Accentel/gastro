<?php
include_once("Crud.php");

$crud = new Crud();

//getting id of the data from url
$id = $crud->my_simple_crypt($_GET['id'],'d');

//deleting the row from table
//$result = $crud->execute("DELETE FROM users WHERE id=$id");
$result = $crud->delete($id, 'locations');
if($result){
	print "<script>";
			print "alert('Successfully Deleted ');";
			print "self.location='../pages/locationlist.php';";
			print "</script>";
}
?>