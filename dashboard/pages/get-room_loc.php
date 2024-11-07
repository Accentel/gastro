<?php
include("../db/connection.php");

$q=$_GET["q"];
//$roomtype=$_GET['roomtype'];
 $x="SELECT * FROM `locations` WHERE id = '$q'";
$sql1=mysqli_query($link,$x);
$r=mysqli_fetch_array($sql1);
 $id=$r['id'];

	 $sql="SELECT * FROM `roomtype` WHERE ltype ='$id'";

$result = mysqli_query($link,$sql);
	
	
	

echo "<select>";
echo "<option value=''>Select  Room Type</option>";
while($row = mysqli_fetch_array($result))
  {
  
  echo "<option value=" . $row['id'] . ">" . $row['rtype'] . "</option>";
  }
echo "</select>";
	
	
	//$date=$row['registerdate'];
	//$d=date('Y-m-d',strtotime($date));
	//echo ":" . $d;
	//echo ":" . $row['bed']." .".$row['patientname'];
	//echo ":" . $row['ROOM_NO'];
	//echo ":" . $row['NURSE_FEE']*$q;
	//echo ":" . $row['OTHER_FEE']*$q;
	
	//echo ":" . $d;
	
		
	
	


?>	

