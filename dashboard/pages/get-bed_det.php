<?php
include("../db/connection.php");

$q=$_GET["q"];
//$roomtype=$_GET['roomtype'];
echo $loc=$_GET['loc'];
$loc=$_GET['loc'];
$rtype=$_GET["room"];
	 echo $sql="SELECT * FROM `beds` WHERE roomno ='$q' and ltype='$loc' and rtype='$rtype' and status='in'";

$result = mysqli_query($link,$sql);
	
	
	

echo "<select>";
echo "<option value=''>Select  Bed No</option>";
while($row = mysqli_fetch_array($result))
  {
  
  echo "<option value=" . $row['id'] . ">" . $row['bedno'] . "</option>";
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

