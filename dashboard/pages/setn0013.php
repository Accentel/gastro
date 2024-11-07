<?php
include("../db/connection.php");
?>

<?php
 $q=$_GET["q"];
 $q1=$_GET['q1'];
 $q2=$_GET['q2'];
   $a="select dname1,op_fee,ip_fee,ins_fee from  doct_infor where id='$q'";
$sq=mysqli_query($link,$a);

while($row=mysqli_fetch_array($sq)){

 $rk=$row['dname1'];
   $op_fee=$row['op_fee'];
  $ip_fee=$row['ip_fee'];
  $ins_fee=$row['ins_fee'];
}



$rest = substr("$rk", 0, 4); 
//echo substr('abcdef', 0, 4);  // abcd

 $date=date('Y-m-d');
  $sql="select * from patientregister where date='$date' and doctorname='$rk'";

//$sql="select b.ROOM_NO,b.ROOM_FEE,b.MAINT_FEE,b.NURSE_FEE,b.OTHER_FEE from bed_details as a inner join room_tariff as b where a.ROOM_no= b.room_no and a.BED_STATUS='Unreserved' and a.BED_NO = '$q'";

$result = mysqli_query($link,$sql);
 $cnt=mysqli_num_rows($result)+1;
 
 
   $sql1="select * from patientregister  where registerno ='$q2' order by reg_id desc limit 0,1";

//$sql="select b.ROOM_NO,b.ROOM_FEE,b.MAINT_FEE,b.NURSE_FEE,b.OTHER_FEE from bed_details as a inner join room_tariff as b where a.ROOM_no= b.room_no and a.BED_STATUS='Unreserved' and a.BED_NO = '$q'";

$resultt = mysqli_query($link,$sql1);
$rrr=mysqli_fetch_array($resultt);
echo $validity=$rrr['validity'];
echo $visit_count_pat=$rrr['visit_count_pat'];
 //$cnt=mysqli_num_rows($result)+1;
 $date=date('Y-m-d');
 
if($date<$validity and $visit_count_pat<5){


	$op=0;
} else {
	echo $op=$op_fee;
}

//while($row = mysql_fetch_array($result))
 // {
if($q1=='OP'){
   echo ":" ."$rest"."_".$cnt;
   echo ":" .$op;
} else if($q1=='IP'){
	
	 echo ":" ."$rest"."_".$cnt;
   echo ":" .$ip_fee;
	
} else if($q1=='Insurence'){
	 echo ":" ."$rest"."_".$cnt;
   echo ":" .$ins_fee;
}
   //$sum = ($row[1]+$row[2]+$row[3]+$row[4])."-00";
  //  echo ":" . $sum;
	 
     
  
 // }
 

?> 