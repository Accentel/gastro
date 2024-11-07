<?php
include_once("Crud.php");

$crud = new Crud();

//fetching data in descending order (lastest entry first)
//$query = "SELECT * FROM employee";
$query="select a.empcode,a.empname,a.qualification,a.mobile,a.id,b.deptname from employee a,empdept b where a.department=b.id";
$result = $crud->getData($query);
?>