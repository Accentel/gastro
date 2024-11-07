<?php
include_once("Crud.php");

$crud = new Crud();

//fetching data in descending order (lastest entry first)
$date=date('Y-m-d');
$date1=date('Y-m-d', strtotime("-60 days"));
if(($ses=='admin') ){
$query = "SELECT * FROM adddischarge order by id desc";
} else { 
$query = "SELECT * FROM adddischarge order by id desc";
}

$result = $crud->getData($query);
?>
