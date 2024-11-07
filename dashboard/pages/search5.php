<?php
include("../db/connection.php");

$emp_id = $_REQUEST['q'];
//$q=$_GET["q"];

echo $a="select B.patientname,B.registerno, B.age, B.gender,B.address,B.doctorname,B.rel_type,
B.gaurdianname,B.phoneno,A.PAT_NO,B.gaurdianname,ADMIT_DATE from ip_pat_admit as A,patientregister as B WHERE
  A.PAT_REGNO=B.registerno and A.PAT_REGNO='$emp_id' ";

$query = mysqli_query($link,$a);
if($query){
	$row1 = mysqli_fetch_array($query);
	$patname = $row1['patientname'];
	$regno = $row1['registerno'];
	$age = $row1['age'];
	$gender = $row1['gender'];
	
	$admitdate = date('d-m-Y',strtotime($row1['ADMIT_DATE']));
	
	$addr1=$row1['address'];
	$doctorname=$row1['doctorname'];
	$rel_type=$row1['rel_type'];
	$gaurdianname=$row1['gaurdianname'];
	$phoneno=$row1['phoneno'];
	$PAT_NO=$row1['PAT_NO'];
	$gaurdianname=$row1['gaurdianname'];
	
	echo ":" . $patname;
	//echo ":" . $regno;
	echo ":" . $age;
	echo ":" . $gender;
	echo ":" . $PAT_NO;
	echo ":" . $gaurdianname;
	echo ":" . $phoneno;
	echo ":" . $admitdate;
    echo ":" . $addr1;
	
	//echo ":" . $doctorname;
	//echo ":" . $rel_type;
	//echo ":" . $gaurdianname;
	//echo ":" . $phoneno;
	
  }
 
//echo $data="|".$emp_id."|".$patname."|".$regno."|".$age."|".$gender."|".$addr1."|".$doctorname."|".$rel_type."|".$gaurdianname."|".$phoneno."|".$admitdate;
//.$nursefee2."|".$icu."|";
//."|".$maintfree2."|".$nursefee2."|".$icu; 


?>

<div class="control-label col-md-12" id="pharma" ><h1 align="left">Pharmacy Charges</h1>
                                                   <table class="table">
												   <tr>
												   <th>Particular Name</th>
												   <th>QTY</th>
												   <th>Rate</th>
												   <th>Amount</th>
												   </tr>
												  
												   <?php 
												   
												  echo $sa="select b.product_name,a.u_qty,a.u_rate,a.value,c.discount,c.total,a.disc,a.total,d.TYPE,a.gst,a.total as tt from phr_salent_dtl as a,
			  phr_purinv_dtl as b,phr_salent_mast as c,`phr_prddetails_mast` as d where a.inv_id=b.inv_id and a.lr_no=c.lr_no  and c.mrnum='$emp_id' and b.inv_id=d.id";
			  $res1=mysqli_query($link,$sa);
			  while($row1 = mysqli_fetch_array($res1)){
												   $i=1;
										 ?>
												   <tr>
												   <td><input type="text" name="description[]"   id="description" value="<?php echo $y['product_name'];?>"/></td>
												   <td><input type="text" name="qty[]" id="days<?php echo $i; ?>" data-row="<?php echo $i; ?>" value="<?php echo $row1['u_qty'];?>" class='tet'/></td>
												   <td><input type="text" name="charge[]" id="charge<?php echo $i; ?>" data-row="<?php echo $i; ?>" value="" class='tet'/></td>
												   <td><input type="text" name="amount[]" id="amount<?php echo $i; ?>" data-row="<?php echo $i; ?>" value="" class="txt"/></td>
												    
												   </tr>
												   <?php $i++;}?>
												   </table>
                                                </div>
                                                		
