<?php
include_once("Crud.php");

$crud = new Crud();

//fetching data in descending order (lastest entry first)
 $query = "SELECT a.lname,b.rtype,c.roomno,e.ROOM_ID,d.bedno,e.AC,e.ROOM_FEE,DOCT_FEE,e.NURSE_FEE,e.DMO_FEE,e.OXYGEN,e.FBED  FROM locations a, roomtype b,rooms c,beds d,room_tariff e where a.id=e.LOCATION and b.id=e.ROOM_TYPE and c.id=e.ROOM_NO and d.id=e.NO_BEDS order by e.ROOM_ID desc";
$result = $crud->getData($query);
?>