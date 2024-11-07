<?php
include_once("Crud.php");

$crud = new Crud();

//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM validity";
$result = $crud->getData($query);



if(isset($_POST['update'])){

$id=$crud->my_simple_crypt($_POST['id'],'d');
$validity=$crud->escape_string($_POST['validity']);
 $sql="update validity  set  vdays='$validity' where id='$id'";
$result=$crud->execute($sql);
if($result){
	print "<script>";
			print "alert('Successfully Registred ');";
			print "self.location='update_validity.php';";
			print "</script>";
}
}
?>