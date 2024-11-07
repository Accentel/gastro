<?php
include_once("Crud.php");

$crud = new Crud();

//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM emergencycertificate order by eid desc limit 150";
$result = $crud->getData($query);

?>