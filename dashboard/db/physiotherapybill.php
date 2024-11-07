<?php
include_once("Crud.php");

$crud = new Crud();

//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM physiotherapybill order by id desc limit 150";
$result = $crud->getData($query);

?>