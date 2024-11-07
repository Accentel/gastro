<?php
include("../db/connection.php");
?>

<?php
$q=$_GET["q"];

$loc=$_GET["loc"];
$rtype=$_GET["room"];
$rnum=$_GET["rnum"];

echo $sql="select ROOM_NO,ROOM_FEE,DMO_FEE,NURSE_FEE,DOCT_FEE from room_tariff where LOCATION='$loc' and ROOM_TYPE='$rtype' and ROOM_NO='$rnum' 
";

$result = mysqli_query($link,$sql);


while($row = mysqli_fetch_array($result))
  {

   //echo ":" . $row[0];
   $sum = ($row[1]+$row[2]+$row[3]+$row[4])."-00";
    echo ":" . $sum;
	 
     
  
  }

?> 