<?php
include_once("Crud.php");

$crud = new Crud();
echo $id=$crud->my_simple_crypt($_REQUEST['id'],'d');
//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM location_city where id='$id'";
$result = $crud->getData($query);



if(isset($_POST['update'])){

$id=$crud->my_simple_crypt($_POST['id'],'d');
$state=$crud->escape_string($_POST['state']);
$user=$crud->escape_string($_POST['user']);
$city=$crud->escape_string($_POST['city']);


$sql="update location_city  set  state='$state',city='$city',user='$user' where id='$id'";
$result=$crud->execute($sql);
if($result){
	print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='city.php';";
			print "</script>";
}
}
?>