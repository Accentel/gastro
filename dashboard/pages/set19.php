<?php
//include_once("../db/connection.php");
include_once("../db/Crud.php");
$crud = new Crud();

$q = strtolower($_GET["term"]);
if (!$q) return;
 $rs="SELECT  distinct dname  FROM   daycare WHERE dname LIKE '%$q%'"; 
 $rsd=$crud->getData($rs);
//$rsd = mysqli_query($link,$rs);
foreach($rsd  as $key=>$r){
	//$cname = $rs['registerno'];
	 $return_arr[] =  $r['dname'];
//	echo "$cname\n";
}
echo json_encode($return_arr);
//echo $return_arr;


?>