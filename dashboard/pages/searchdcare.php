<?php
include_once("../db/Crud.php");
$crud = new Crud();

$q=$_GET["q"];
//$itype=$_GET['itype'];

	$sql="SELECT  amount FROM daycare WHERE dname = '$q'";
	
	$rsd=$crud->getData($sql);
	foreach($rsd  as $key=>$r){
	$amount=  $r['amount'];
	}
	echo ":" . $amount;




	
	
	
	

?>	

