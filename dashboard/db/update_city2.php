<?php
include_once("Crud.php");

$crud = new Crud();
echo $id=$crud->my_simple_crypt($_REQUEST['id'],'d');
//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM village where id='$id'";
$result = $crud->getData($query);



if(isset($_POST['update'])){

$id=$crud->my_simple_crypt($_POST['id'],'d');
$state=$crud->escape_string($_POST['state']);
$user=$crud->escape_string($_POST['user']);
$city=$crud->escape_string($_POST['city']);
$plac=$crud->escape_string($_POST['mandal']);
$village=$crud->escape_string($_POST['village']);


$sql="update village  set  state='$state',city='$city',vil_name='$village',mandal='$plac' where id='$id'";

$result=$crud->execute($sql);
if($result){
	print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='city2.php';";
			print "</script>";
}
}
?>