<?php
include_once("Crud.php");

$crud = new Crud();

//fetching data in descending order (lastest entry first)
$query = "SELECT a.deptname,b.tname,b.amount,b.iamount,b.id FROM labtest b,labdept a where b.dept=a.id";
$result = $crud->getData($query);
?>