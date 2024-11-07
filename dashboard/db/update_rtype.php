<?php
include_once("Crud.php");

//$crud = new Crud();
include_once("locations.php");
$id=$crud->my_simple_crypt($_REQUEST['id'],'d');
//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM roomtype where id='$id'";
$result1 = $crud->getData($query);



if(isset($_POST['update'])){

$id=$crud->my_simple_crypt($_POST['id'],'d');
$dname=$crud->escape_string($_POST['rtype']);
$user=$crud->escape_string($_POST['user']);
$ltype=$crud->escape_string($_POST['ltype']);

$sql="update roomtype  set ltype='$ltype',rtype='$dname',user='$user' where id='$id'";
$result=$crud->execute($sql);
if($result){
	print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='roomtypeslist.php';";
			print "</script>";
}
}
?>