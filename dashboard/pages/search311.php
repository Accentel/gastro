<?php
//include("config.php");
include_once("../db/Crud.php");
$crud = new Crud();
$q=$_GET["q"];
$adate=$_GET["adate"];

$ddate=$_GET["ddate"];
$ad=date('Y-m-d',strtotime($adate));
$dd=date('Y-m-d',strtotime($ddate));

$sql="SELECT sum(namount) as namount,sum(pamount) as pamount,sum(bamount) as bamount from bill  WHERE mrno='$q' and bdate between '$ad' and '$dd'";
//$result = mysql_query($sql);
$rsd=$crud->getData($sql);
foreach($rsd  as $key=>$row){
	//$dc=date('d-m-Y');
	//$ad=date('d-m-Y',strtotime($row['ADMIT_DATE']));
	
	echo ":" . $row['namount'];
	echo ":" . $row['pamount'];
	echo ":" . $row['bamount'];
	
	
}

$sql1="SELECT sum(ADV_AMT) as advamount from adv_collection  WHERE mrno='$q' and ADV_DATE between '$ad' and '$dd'";
$rsd1=$crud->getData($sql1);
foreach($rsd1  as $key=>$row1){
	$a=$row1['advamount'];
//echo ":" . $row1['advamount'];

}

//echo $sql11="SELECT sum(adv_amnt) as advamount from ip_pat_admit  WHERE PAT_REGNO='$q' and ADMIT_DATE between '$ad' and '$dd'";

$sql11="SELECT sum(adv_amnt) as advamount from ip_pat_admit WHERE PAT_REGNO='201900005' and ADMIT_DATE between '2019-08-29' and '2019-08-29'";
$rsd11=$crud->getData($sql11);
foreach($rsd11  as $key=>$row11){
	$b=$row11['advamount'];
//echo ":" . $row11['adv_amnt'];

}
echo ":" . $a+$b;
?>	

