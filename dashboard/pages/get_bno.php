<?php
include_once('../db/Crud.php');
 $q=$_GET["q"];
 $lno=$_GET["ltype"];
 $rtype=$_GET["rtype"];
 $crud = new Crud();
$sql="SELECT *  FROM `beds` where rtype='$rtype' and ltype='$lno' and roomno='$q'";
$result = $crud->getData($sql);
//$result = mysql_query($sql) or die(mysql_error());




 //echo "<select  class='invest' name='invtest' id='invtest' multiple validate='required:true'>";
 echo "<option value=''>Select Bed No</option>";
foreach($result as $key=>$t)
  {
  
  echo "<option value='".$t['id']."'>" . $t['bedno'] . "</option>";
   
  }
 // echo "<option value='Any'>" .Any. "</option>";
//echo "<select>";


  

//mysql_close($con);
?> 
