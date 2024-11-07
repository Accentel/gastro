<?php
include_once("Crud.php");

$crud = new Crud();

//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM labtest1 order by tname asc";
$result = $crud->getData($query);

?>