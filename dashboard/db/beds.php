<?php
include_once("Crud.php");

$crud = new Crud();

//fetching data in descending order (lastest entry first)
echo $query = "SELECT a.lname,b.rtype,c.roomno,d.id,d.bedno  FROM locations a, roomtype b,rooms c,beds d where a.id=d.ltype and b.id=d.rtype and c.id=d.roomno";
$result = $crud->getData($query);
?>