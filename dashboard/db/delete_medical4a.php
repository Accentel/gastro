<?php

include("connection.php");

//include_once("Crud.php");

//$crud = new Crud();

//getting id of the data from url
//$id = $crud->my_simple_crypt($_GET['id'],'d');

$id = $_GET['id'];

//deleting the row from table
//$result = $crud->execute("DELETE FROM users WHERE id=$id");
//$result = $crud->delete3($id, 'form4a');

$sq=mysqli_query($link,"delete from form4a where id='$id'");

if($sq){
	print "<script>";
			print "alert('Successfully Deleted ');";
			print "self.location='../pages/medicalcertificateofcauseofdeathlist(4A).php';";
			print "</script>";
}
?>