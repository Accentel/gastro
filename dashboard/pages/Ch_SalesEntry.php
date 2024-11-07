<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/form_style.css" />
<link rel="stylesheet" type="text/css" href="../css/table_style.css" />
<link rel="stylesheet" type="text/css" href="../css/default.css" />
<script type="text/javascript" src="../js/tableruler.js"></script>
<script language="javascript" type="text/javascript" src="../js/actb.js"></script>
<script language="javascript" type="text/javascript" src="../js/common.js"></script>
<script type="text/javascript" src="../js/sortable.js"></script>
<script type="text/javascript">window.onload=function(){tableruler();}</script>
<script language="JavaScript" src="../js/gen_validatorv31.js" type="text/javascript"></script>
<title>Day Sale Report</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color:#fff;
	color:#000;
}
.heading1 {	font-size:20px;
	text-align:center;
        font-family: "Times New Roman";
        font-weight: bold;
}
.heading2 {	font-size:12px;
	text-align:center;
        font-family: "arial";
}
.heading3 {	font-size:15px;
	text-align:center;
	
	text-decoration:underline;	
}
-->
</style>
<script type="text/javascript">
function printWindow(){
		document.getElementById("submit1").style.display='none';
	document.getElementById("submit2").style.display='none';
	window.print();	
	}
	function fun(){
	window.close();
	}
</script>

</head>
<body>
<?php

include("../db/connection.php");
$rs=mysqli_query($link,"select * from  pharmacydetaisl");
while($res = mysqli_fetch_array($rs)){
$HOSP_NAME=$res['pharmacyname'];
$ADDR=$res['address'];     
     
$PHONE1=$res['phoneno'];

 }



?>

<table width="100%" border="0" align="center" cellspacing="0" cellpadding="0">
    <tr>
    <td width="75%" align="center">
<table width="75%" border="0" cellpadding="0" cellspacing="0" >
    <tr><td>&nbsp;</td></tr>
  <tr>
    <td class="heading1"><?php echo $HOSP_NAME ?></td>
  </tr>
  <tr>
    <td class="heading2"> <?php echo $ADDR ?></td>
  </tr>
  <tr>
    <td class="heading2">Ph : <?php echo $PHONE1 ?></td>
  </tr>
</table>
  </td>
    </tr>
</table>
<p>&nbsp;</p>


<div align="center">
  <?php
$sdate=$_REQUEST['s_date'];
//$edate=$_REQUEST['e_date'];

$s_date=date('Y-m-d',strtotime($_REQUEST['s_date']));
//$e_date=date('Y-m-d',strtotime($_REQUEST['e_date']));

?>
  
  <table width="75%" cellpadding="0" cellspacing="0" border="1" style="font-family: arial;font-size: 12px">
    <tr><td colspan=5><div align="center"><strong>Day Sales Entry Report</strong></div></td></tr>
  

  <tr><td colspan=2><div align="right"><strong> Date</strong>:</div></td><td colspan=3><div align="left"><?php echo $sdate ?></div></td>
  
     
	   
</tr>


<tr>
  <td align="center"><strong>S.No.</strong></td>
  <td align="center"><strong>Invoice No.</strong></td>
  <td align="center"><strong>MR No./Customer Name.</strong></td>
  <td align="center"><strong>Date</strong></td>
  <td align="center"><strong>Total</strong></td>
  </tr>
  
   <?php

$counts=0;
  //$s="select  distinct b.registerno,a.INV_NO,a.CUST_NAME,a.SAL_DATE,a.total,a.mrnum,b.patientname from phr_salent_mast a,patientregister b
 //where a.SAL_DATE='$s_date'  and b.registerno=a.mrnum ";
 
$s="SELECT * FROM `phr_salent_mast` WHERE `SAL_DATE`='$sdate'"; 
$qry=mysqli_query($link,$s) or die();
if($qry){
$sno=0;
$tot3=0;
while($res1 = mysqli_fetch_array($qry)){
    $sno++;
$tot2=$res1['total'];
$cname=$res1['CUST_NAME'];

$uy=mysqli_query($link,"select * from patientregister where registerno='$cname'");
$uy1=mysqli_fetch_array($uy);
$pname=$uy1['patientname'];

?>
  
<tr>
  <td align="center"><?php echo $sno; ?></td>
  <td align="center"><?php echo $res1['INV_NO'] ?></td>
   <td align="center"><?php echo $cname." / ".$pname ?></td>
   <td align="center"><?php echo  $d=$res1['SAL_DATE'];  ?></td>
   <td align="center"><?php echo $res1['total'] ?></td>

  </tr>
  
<?php 		
		//$tot2=$res1[1];
        $tot3=$tot3+$tot2;
$counts++;

}
}
?>



<tr><td colspan=4><div align="right"><strong>Grand Total:</strong></div></td>
<td colspan="1"><div align="center"><b><?php echo $tot3+$tot4; ?></b></div></td>
  

  <?php /*?>
<tr>
  <td colspan="2"><strong>S.No.</strong></td>
  <td colspan="1"><strong>Date</strong></td>
  <td colspan="2"><strong>Total</strong></td>
  </tr>
  
   <?php

$counts=0;
 
$qry=mysql_query("select  total_date,grand_total from z_gran_tot where total_date between '$s_date' and '$e_date'");
if($qry){
$sno=0;
$tot3=0;
while($res1 = mysql_fetch_array($qry)){
    $sno++;

?>
  
<tr>
  <td colspan="2"><?php echo $sno ?></td>
  <td colspan="1"><?php echo $res1[0] ?></td>
  <td colspan="2"><?php echo $res1[1] ?></td>

  </tr>
  
<?php 		
		$tot2=$res1[1];
        $tot3=$tot3+$tot2;
$counts++;

}
}
?>
<tr><td colspan=3><div align="right"><strong>Grand Total:</strong></div></td><td colspan="2"><div align="center"><b><?php echo $tot3 ?></b></div></td>
  <?php */?>

  <?php if($counts==0){ ?>
  <tr><td colspan=5><div align="center"><strong>No Records</strong></div></td></tr>
  
<?php } ?>
  
  </table>
   <tr>
            <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">
              <tr>
                <td>&nbsp;</td>
                
              </tr>
            </table></td>
          </tr>
    <tr>
            <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">
              <tr>
                <td>
                  <div align="right">
                    <input type="button" value="Print" id="submit1" onclick="javascript:printWindow()"  />
                </div></td>
					 <td>
                       <div align="left">
                         <input type="button" value="Close" id="submit2" onclick="fun()"  />
                     </div></td>
              </tr>
            </table></td>
          </tr>
</div>
</body>
</html>