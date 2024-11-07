<?php
include_once("Crud.php");

$crud = new Crud();

//fetching data in descending order (lastest entry first)
$query = "SELECT a.pname,b.sname,b.id FROM package a,packageservice b where b.pname=a.id";
$result = $crud->getData($query);
?>