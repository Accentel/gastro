<?php
include_once("Crud.php");

$crud = new Crud();

//fetching data in descending order (lastest entry first)
$date=date('Y-m-d');
$date1=date('Y-m-d', strtotime("-180 days"));
if($ses=='admin'or $ses=='achyuth' or $ses=='phonepay' or $ses=='joshua' or $ses=='nagaraju' ){
$query = "SELECT * FROM final_bill order by id desc";
} else {
$query = "SELECT * FROM final_bill where doa between '$date1' and '$date'order by id desc";
}
$result = $crud->getData($query);
?>