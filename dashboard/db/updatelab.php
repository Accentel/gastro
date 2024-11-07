<?php
include_once("Crud.php");

$crud = new Crud();

//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM lab";
$result = $crud->getData($query);



if(isset($_POST['update'])){

$id=$crud->escape_string($_POST['id']);
$hname=$crud->escape_string($_POST['lname']);
$address=$crud->escape_string($_POST['address']);
$email=$crud->escape_string($_POST['email']);
$number=$crud->escape_string($_POST['number']);
$tnumber=$crud->escape_string($_POST['tnumber']);
$url=$crud->escape_string($_POST['url']);
$gst=$crud->escape_string($_POST['gst']);

$sql="update lab  set  labname='$hname',address='$address',phone='$tnumber',email='$email',mobile='$number',website='$url', gst='$gst' where id='$id'";
$result=$crud->execute($sql);
if($result){
	print "<script>";
			print "alert('Successfully Registred ');";
			print "self.location='update_lab.php';";
			print "</script>";
}
}
?>