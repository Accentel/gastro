<?php
include('../db/connection.php');
$q=$_GET["q"];

 echo $sql="SELECT city FROM location_city WHERE state ='$q'";

$result = mysqli_query($link,$sql);



echo "<select>";
echo "<option value=''>Select  City</option>";
while($row = mysqli_fetch_array($result))
  {
  
  echo "<option>" . $row['city'] . "</option>";
  }
echo "</select>";

//mysql_close($con);
?> 
