<?php
include_once("Crud.php");

$crud = new Crud();
$id=$crud->my_simple_crypt($_REQUEST['id'],'d');
//fetching data in descending order (lastest entry first)
$q1 = "SELECT * FROM packageservice where id='$id'";
$r = $crud->getData($q1);

$q2 = "SELECT * FROM package";
$result = $crud->getData($q2);

if(isset($_POST['update'])){

$id=$crud->my_simple_crypt($_POST['id'],'d');
$pname=$crud->escape_string($_POST['pname']);
$user=$crud->escape_string($_POST['user']);
$sname=$crud->escape_string($_POST['sname']);

$sql="update packageservice  set  pname='$pname',sname='$sname',user='$user' where id='$id'";
$result=$crud->execute($sql);
if($result){
	print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='packageservicelist.php';";
			print "</script>";
}
}
?>