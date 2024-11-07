<?php
include_once("../db/Crud.php");
$crud = new Crud();

$q=$_GET["q"];
//$itype=$_GET['itype'];

echo $sql="SELECT  a.patientname,a.age,a.gender,a.phoneno,b.ADMIT_DATE,b.PAT_NO FROM ip_pat_admit b,patientregister a WHERE a.registerno=b.PAT_REGNO AND b.PAT_REGNO = '$q'";
	//$result = mysql_query($sql);
	$rsd=$crud->getData($sql);
	foreach($rsd  as $key=>$r){
	//$cname = $rs['registerno'];
	$PAT_NO=  $r['PAT_NO'];
	
	 
	 $ADMIT_DATE1 = str_replace('-', '/', ($r['ADMIT_DATE']));
    $ADMIT_DATE=date('d/m/Y', strtotime($ADMIT_DATE1));
	 $age=  $r['age'];
	 $gender=  $r['gender'];
	 $patientname=  $r['patientname'];
	 $phoneno=  $r['phoneno'];
	 //$pat_type=  $r['pat_type'];
	 
//	echo "$cname\n";
}
	//$row = mysql_fetch_array($result);
	//$amount=$row['amount'];
	echo ":" . $PAT_NO;
	echo ":" . $ADMIT_DATE;
	echo ":" . $patientname;
	echo ":" . $age;
	echo ":" . $gender;
	echo ":" . $phoneno;

	




	
	
	
	

?>	

