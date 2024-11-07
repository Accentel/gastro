<?php
//include_once("../db/connection.php");
include_once("../db/Crud.php");
$crud = new Crud();

$q = strtolower($_GET["term"]);
if (!$q) return;
 $rs="SELECT  distinct mrnum  FROM   phr_salent_mast WHERE mrnum LIKE '%$q%'"; 
 $rsd=$crud->getData($rs);
//$rsd = mysqli_query($link,$rs);
foreach($rsd  as $key=>$r){
	//$cname = $rs['registerno'];
	 $return_arr[] =  $r['mrnum'];
//	echo "$cname\n";
}
echo json_encode($return_arr);
//echo $return_arr;


?>