<?php
include_once("../db/connection.php");
//getting id of the data from url
$id =$_GET['id'];
$id1=$_GET['id1'];

//deleting the row from table
//$result = $crud->execute("DELETE FROM users WHERE id=$id");
$result = mysqli_query($link,"delete from labtest2 where id='$id'") or die(mysqli_error($link));
if($result){
	print "<script>";
			print "alert('Successfully Deleted ');";
			print "self.location='../pages/edit_labtest1.php?id=$id1';";
			print "</script>";
}
?>