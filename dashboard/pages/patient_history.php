<?php
 $mrno=$_GET['mrno'];
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Amount Collection</title>
        <script type="text/javascript">
            function printt()
            {
                document.getElementById("prt").style.display="none";
                document.getElementById("cls").style.display="none";
             window.print();
            }
            function closs()
            {
                window.close();
            }
        </script>
        <style type="text/css">
            .header{
                font-family: monospace,sans-serif,arial;
                font-size: 20px;
                font-weight: bold;
                text-align: center;
                text-decoration: underline;
            }
            .heading1 {	
                    font-size:24px;
                    text-align:center;
                    font-weight: bold; 
            }
            .heading2 {	
                font-size:16px;
                text-align:center;
            }
            body {
	background: #FFFFFF;
}
        </style>
    </head>
    <body>
<?php 
include("../db/connection.php");
?>
<table align="center">
<tr><td ><img src="../img/raajtop.png" style="width:100%; height:120px;"/></td></tr>
</table>
<h3 align="center">Patient History Report</h3>
<h3 align="center">Patient Registration</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>
<td>MR No</td>
<td>Patient Name</td>
<td>Age/Gender</td>
<td>Patient Type</td>
<td>Date</td>

</tr>
<?php
$mrnpo=$_GET['mrno'];
$query=mysqli_query($link,"select * from patientregister where registerno='$mrno'") or die(mysqli_error($link));
while($q1=mysqli_fetch_array($query)){
 ?>
<tr>
<td><?php echo $q1['registerno']; ?></td>
<td><?php echo $q1['patientname']; ?></td>
<td><?php echo $q1['age']."/".$q1['gender']; ?></td>
<td><?php echo $q1['pat_type']; ?></td>
<td><?php echo $q1['registerdate']; ?></td>
</tr>

<?php }?>

</table>

<h3 align="center">In Patient Registration</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>
<td>MR No</td>
<td>IP No</td>
<td>Admit Date</td>
<td>Discharge Date</td>
<td>Status</td>
</tr>
<?php
//$mrnpo=$_GET['mrno'];
$query=mysqli_query($link,"select * from ip_pat_admit where PAT_REGNO='$mrno'") or die(mysqli_error($link));
while($q1=mysqli_fetch_array($query)){
 ?>
<tr>
<td><?php echo $q1['PAT_REGNO']; ?></td>
<td><?php echo $q1['PAT_NO']; ?></td>
<td><?php echo $q1['ADMIT_DATE']."/".$q1['ADMIT_TIME']; ?></td>
<td><?php echo $q1['Discharge_date']."/".$q1['Discharge_Time']; ?></td>
<td><?php echo $q1['DIS_STATUS']; ?></td>
</tr>

<?php }?>

</table>


<h3 align="center">Lab Bill</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>

<td>Bill No</td>
<td>MR No</td>
<td>Bill Date</td>
<td>Patient Type</td>
<td>Amount</td>

</tr>
<?php
//$mrnpo=$_GET['mrno'];
$query1=mysqli_query($link,"select * from bill where mrno='$mrno'") or die(mysqli_error($link));
while($q11=mysqli_fetch_array($query1)){
 ?>
<tr>
<td><?php echo $bno=$q11['billno']; ?></td>
<td><?php echo $q11['mrno']; ?></td>
<td><?php echo $q11['bdate']; ?></td>
<td><?php echo $q11['ptype']; ?></td>
<td><?php echo $q11['namount']; ?></td>
</tr>
<?php 
$y=mysqli_query($link,"select * from bill1 where bno='$bno' and mrno='$mrno' ") or die(mysqli_error($link));
while($y1=mysqli_fetch_array($y)){
?>
<tr>
<td colspan="4"><?php echo $tname=$y1['testname'] ?></td>
<td><?php echo $y1['amount'] ?></td>
</tr>

 
<?php }?>
<?php }?>

</table>




<h3 align="center">Procedure Lab  Bill</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>

<td>Bill No</td>
<td>MR No</td>
<td>Bill Date</td>
<td>Patient Type</td>
<td>Amount</td>

</tr>
<?php
//$mrnpo=$_GET['mrno'];
$query1=mysqli_query($link,"select * from bill_proc where mrno='$mrno'") or die(mysqli_error($link));
while($q11=mysqli_fetch_array($query1)){
 ?>
<tr>
<td><?php echo $bno=$q11['billno']; ?></td>
<td><?php echo $q11['mrno']; ?></td>
<td><?php echo $q11['bdate']; ?></td>
<td><?php echo $q11['ptype']; ?></td>
<td><?php echo $q11['namount']; ?></td>
</tr>
<?php 
$y=mysqli_query($link,"select * from bill1_proc where bno='$bno' and mrno='$mrno' ") or die(mysqli_error($link));
while($y1=mysqli_fetch_array($y)){
?>
<tr>
<td colspan="4"><?php echo $tname=$y1['testname'] ?></td>
<td><?php echo $y1['amount'] ?></td>
</tr>

 
<?php }?>
<?php }?>

</table>

<h3 align="center">Final  Bill</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>

<td>Bill No</td>
<td>MR No</td>
<td>Bill Date</td>
<td>Patient Type</td>
<td>View</td>

</tr>
<?php
//$mrnpo=$_GET['mrno'];
$query12=mysqli_query($link,"select * from daycarebill where mrno='$mrno'") or die(mysqli_error($link));
while($q112=mysqli_fetch_array($query12)){
 ?>
<tr>
<td><?php echo $bno1=$q112['billno']; ?></td>
<td><?php echo $q112['mrno']; ?></td>
<td><?php echo $q112['bdate']; ?></td>
<td><?php echo $q112['ptype']; ?></td>
<td><a href="dbill_view.php?mrno=<?php echo $mrno; ?>&bno=<?php echo $bno1;?>">View</a></td>
</tr>

<?php }?>

</table>
<h3 align="center">Discharge Summary</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>

<td>Pat No</td>
<td>MR No</td>
<td>Admit Date</td>
<td>Discharge Date</td>
<td>Doctor</td>
<td>View</td>

</tr>
<?php
//$mrnpo=$_GET['mrno'];
$query12=mysqli_query($link,"select * from adddischarge where mrno='$mrno'") or die(mysqli_error($link));
while($q112=mysqli_fetch_array($query12)){
 ?>
<tr>
<td><?php echo $bno1=$q112['patno']; ?></td>
<td><?php echo $q112['mrno']; ?></td>
<td><?php echo $q112['admit']; ?></td>
<td><?php echo $q112['discharge']; ?></td>
<td><?php echo $q112['doctor']; ?></td>
<td><a href="print_discharge5.php?id=<?php echo $q112['id']; ?>">View</a></td>
</tr>

<?php }?>

</table>


<h3 align="center">Pharmacy Sales Report</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>
<td colspan="2">MR No</td>
<td>Sale Date</td>

<td>Amount</td>

</tr>
<?php
//$mrnpo=$_GET['mrno'];
$query123=mysqli_query($link,"select * from phr_salent_mast where mrnum='$mrno'") or die(mysqli_error($link));
while($q1123=mysqli_fetch_array($query123)){
    $lno=$q1123['LR_NO'];
 ?>
<tr>

<td><?php echo $q1123['mrnum']; ?></td>
<td><?php echo $q1123['SAL_DATE']; ?></td>
<td><?php echo $q1123['final_amnt']; ?></td>
</tr>

<?php 
$y10=mysqli_query($link,"select * from phr_salent_dtl where LR_NO='$lno'") or die(mysqli_error($link));
while($y11=mysqli_fetch_array($y10)){
?>
<tr>
<td ><?php echo $y11['PRODUCT_CODE'] ?></td>
<td ><?php echo $y11['U_QTY'] ?></td>
<td ><?php echo $y11['U_RATE'] ?></td>
<td ><?php echo $y11['VALUE'] ?></td>

</tr>

 
<?php }?>
<?php }?>

</table>

    

<div>
    <td align="center"><input type="button" value="Print" id="prt" class="butbg" onclick="printt()"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Close" id="cls" class="butbg" onclick="closs()"/></td>
</div>
        
       
    </body>
</html>
