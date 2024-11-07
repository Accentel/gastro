<?php
include_once("Crud.php");

$crud = new Crud();

//fetching data in descending order (lastest entry first)


 $query1 = "SELECT * FROM login";
$result1 = $crud->getData($query1);
foreach ($result1 as $key => $res1) { 
 $ename=$res1['ename'];

 $query = "SELECT * FROM employee where empcode='$ename'";
$result = $crud->getData($query);

}

?>