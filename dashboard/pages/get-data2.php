<?php
include("../db/connection.php");

$emp_id = $_REQUEST['q'];
//$q=$_GET["q"];

echo $a="select * from village where vil_name='$emp_id'";

$query = mysqli_query($link,$a);
if($query){
	$row1 = mysqli_fetch_array($query);
	$state = $row1['state'];
	$city = $row1['city'];
	$mandal = $row1['mandal'];
	
	
	echo ":" . $state;
	//echo ":" . $regno;
	echo ":" . $city;
	echo ":" . $mandal;
	
	
	//echo ":" . $doctorname;
	//echo ":" . $rel_type;
	//echo ":" . $gaurdianname;
	//echo ":" . $phoneno;
	
  }
 

                                                		
