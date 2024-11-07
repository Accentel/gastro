<?php
include('../db/connection.php');
$emp_id = $_REQUEST['pname'];
$btype = $_REQUEST['btype1'];

if($btype == "mrp")
{
	 $a="select balance_qty,mfg_date,exp_date,mrp,s_qty,noitems,vat,each_mrp_rate from phr_purinv_dtl where inv_id='$emp_id' ";
	$query =  mysqli_query($link,$a);
}
/*else if($btype == "pur.rate")
{
	$query = mysql_query("select product_code,balance_qty,mfg_date,exp_date,s_rate,s_qty,noitems,vat from phr_purinv_dtl where inv_id='$emp_id' ");
}*/
$sqty = 1;

if($query){
while($row = mysqli_fetch_array($query)){
//$vat=$row[];
//$product_code=$row[0];
$balance=$row['balance_qty'];
$mfg_date=date('d-m-Y',strtotime($row['mfg_date']));
$exp_date=date('d-m-Y',strtotime($row['exp_date']));
 $unitcost=$row['each_mrp_rate'];
$sqty=$row['s_qty'];
$vat=$row['vat'];
//$vat1=0;
echo $nitem=$row[6];


}
}
$sqty=($sqty*$nitem);
echo $eachcost=($unitcost/$nitem);
//$eachcost=round(($eachcost*100.0)/100.0);

$data = ":".$balance.":".$mfg_date.":".$exp_date.":".$unitcost .":".$vat.":".$vat;
echo $data;
?>