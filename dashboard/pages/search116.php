<?php
include_once("../db/Crud.php");
$crud = new Crud();

$q=$_GET["q"];
//$itype=$_GET['itype'];

	$sql="SELECT  amount FROM labtest1 WHERE tname = '$q'";
	//$result = mysql_query($sql);
	$rsd=$crud->getData($sql);
	foreach($rsd  as $key=>$r){
	//$cname = $rs['registerno'];
	 $amount=  $r['amount'];
//	echo "$cname\n";
}
	//$row = mysql_fetch_array($result);
	//$amount=$row['amount'];
	echo ":" . $amount;




	
	
	
	

?>	

