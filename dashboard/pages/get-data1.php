<?php
include('../db/connection.php');
$q=$_GET["q"];

 echo $sql="SELECT plac FROM location_city1 WHERE city ='$q'";

$result = mysqli_query($link,$sql);



echo "<select>";
echo "<option value=''>Select  Place</option>";
while($row = mysqli_fetch_array($result))
  {
  
  echo "<option>" . $row['plac'] . "</option>";
  }
echo "</select>";

//mysql_close($con);
?> 
