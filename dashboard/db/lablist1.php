<?php
include_once("Crud.php");

$crud = new Crud();

//fetching data in descending order (lastest entry first)

$date=date('Y-m-d');
	$date1=date('Y-m-d', strtotime("-60 days"));
		if(($ses=='admin') or ($ses=='achyuth') or ($ses=='joshua'))

$query = "SELECT * FROM bill_proc where status='' order by id desc ";
 else 
	$query = "SELECT * FROM bill_proc where bdate between '$date1' and '$date' and  status='' order by id desc ";
	
$result = $crud->getData($query);

?>