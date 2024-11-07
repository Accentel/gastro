<?php
include_once("Crud.php");

$crud = new Crud();

//fetching data in descending order (lastest entry first)
echo $query = "SELECT a.lname,b.rtype,c.roomno,c.id  FROM locations a, roomtype b,rooms c where a.id=c.ltype and b.id=c.rtype";
$result = $crud->getData($query);
?>