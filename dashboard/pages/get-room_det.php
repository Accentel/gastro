<?php
include("../db/connection.php");

$q=$_GET["q"];
echo $loc=$_GET['loc'];
//$roomtype=$_GET['roomtype'];
// echo $x="SELECT * FROM `roomtype` WHERE ltype ='$loc' and rtype='$q'";
//$sql1=mysqli_query($link,$x);
//$r=mysqli_fetch_array($sql1);
 //$id=$r['ltype'];

	 echo $sql="SELECT * FROM `rooms` WHERE ltype ='$loc'  and rtype='$q'";

$result = mysqli_query($link,$sql);
	
	
	

echo "<select>";
echo "<option value=''>Select  Room No</option>";
while($row = mysqli_fetch_array($result))
  {
  
  echo "<option value= " . $row['id'] . ">" . $row['roomno'] . "</option>";
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

