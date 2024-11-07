<?php
include_once('../db/Crud.php');
 $q=$_GET["q"];
 $lno=$_GET["ltype"];
 $crud = new Crud();
$sql="SELECT *  FROM `rooms` where rtype='$q' and ltype='$lno'";
$result = $crud->getData($sql);
//$result = mysql_query($sql) or die(mysql_error());




 //echo "<select  class='invest' name='invtest' id='invtest' multiple validate='required:true'>";
 echo "<option value=''>Select Room Type</option>";
foreach($result as $key=>$t)
  {
  
  echo "<option value='".$t['id']."'>" . $t['roomno'] . "</option>";
   
  }
 // echo "<option value='Any'>" .Any. "</option>";
//echo "<select>";


  

//mysql_close($con);
?> 
