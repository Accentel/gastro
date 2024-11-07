<?php
include_once("Crud.php");

$crud = new Crud();

//fetching data in descending order (lastest entry first)

$date=date('Y-m-d');
$date1=date('Y-m-d', strtotime("-60 days"));
if($ses=='admin')
$query = "SELECT * FROM adv_collection order by ADV_ID desc";
else
$query = "SELECT * FROM adv_collection where ADV_DATE between '$date1' and '$date'  order by ADV_ID desc";
$result = $crud->getData($query);

?>