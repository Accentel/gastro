<?php
include_once("Crud.php");

$crud = new Crud();

//fetching data in descending order (lastest entry first)
echo $query = "SELECT a.lname,b.rtype,b.id  FROM locations a, roomtype b where a.id=b.ltype";
$result = $crud->getData($query);
?>