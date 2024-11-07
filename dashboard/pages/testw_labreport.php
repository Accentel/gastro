<?php include('../db/connection.php');
session_start();
if($_SESSION['user'])
{
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
	<?php
		//include("header.php");
	?>
<script language="JavaScript" type="text/javascript">
function prnt(){
document.getElementById("prnt").style.display="none";
document.getElementById("cls").style.display="none";
window.print();
window.close();
}
function closew(){
window.close();
}

function abc(){
	
//document.getElementById('tr1').style.display='none';
window.print();
window.close();
//document.getElementById('tr1').style.display='';
}
</script>


	</head>

	<body>
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF" >
<THEAD>
<tr><td colspan="2"><img src="../img/raajtop.png" style="width:100%; height:120px;"/>  </td></tr>
<tr><td colspan="2"> <h2 align="center" style="font-size:18px;"><b><u>Test Wise Lab  List</u></b></h2></td></tr>
  </THEAD></table>
	
<?php
$tname=$_REQUEST['tname'];
	$start_dt=$_REQUEST['s_date'];
$end_dt=$_REQUEST['e_date'];
//$tname=$_REQUEST['tname'];
$sdate = date('Y-m-d',strtotime($start_dt));
$edate = date('Y-m-d',strtotime($end_dt));
if($tname!=''){ ?>
		<table width="100%" border="1" align="center" style="vertical-align:text-top" cellpadding="1" cellspacing="0" >
          <tr><th align="center" colspan="7"><?php  echo $_REQUEST['tname'];?></th></tr>
         
          <tr>
         <td width="5%"><div align="left"><b>S.NO : </b> </div></td>
        <td width="20%"><div align="left"><b>MR No : </b> </div></td>
         <td width="20%"><div align="left"><b>Bill No : </b> </div></td>
        <td width="20%"><div align="left"><b>Patient Name : </b></div></td>
        <td ><div align="left"><b>Age/Gender :</b> </div></td>
        <td width="20%"><div align="left"><b>Date : </b> </div></td>
		<td width="20%"><div align="left"><b>Amount : </b> </div></td>
		</tr>
		 <?php 
		
			
		
$i=1;

          $x="select * from bill1 where  testname='$tname' and 
  cdate between '$sdate' and '$edate' ";
$qry1=mysqli_query($link,$x);
while($r=mysqli_fetch_array($qry1)){
        $mrno=$r['mrno'];
        $bno=$r['bno'];
        $k=mysqli_query($link,"select * from bill where billno='$bno' and mrno='$mrno'") or die(mysqli_error($link));
        $k1=mysqli_fetch_array($k);
        ?>
        <tr>	
        
    
            <td><?php echo $i?></td>
			<td ><?php echo $mrno; ?></td>
         <td ><?php echo $bno; ?></td>
			<td ><?php echo $k1['pname']; ?></td>
            
       
			<td><?php echo $k1['age']; ?> / <?php echo $k1['gender']; ?></td>
          
          	<td ><?php  $d=$k1['bdate'];  echo date("d-m-Y", strtotime($d)).$k1['time']; ?></td>
            <td><?php echo $t1=$r['amount'];?></td>
            </tr>
            <?php $t=$t1+$t;  $i++;}?>
             <tr><th colspan="6" align="right">Total Amount</th><th><?php echo $t;?></th></tr>
			
			
			<tr height="20"></tr>
        </table>
        
        <?php }else{ 
        $kj=mysqli_query($link,"select distinct testname from bill1 where cdate between '$sdate' and '$edate' ");
        while($kj1=mysqli_fetch_array($kj)){
        $testname=$kj1['testname'];
        ?>
    	<table width="100%" border="1" align="center" style="vertical-align:text-top" cellpadding="1" cellspacing="0" >
          <tr><th align="center" colspan="7"><?php  echo $testname;?></th></tr>
         
          <tr>
         <td width="5%"><div align="left"><b>S.NO : </b> </div></td>
        <td width="20%"><div align="left"><b>MR No : </b> </div></td>
         <td width="20%"><div align="left"><b>Bill No : </b> </div></td>
        <td width="20%"><div align="left"><b>Patient Name : </b></div></td>
        <td ><div align="left"><b>Age/Gender :</b> </div></td>
        <td width="20%"><div align="left"><b>Date : </b> </div></td>
		<td width="20%"><div align="left"><b>Amount : </b> </div></td>
		</tr>
		 <?php 
		
			
		
$i=1;

          $x="select * from bill1 where  testname='$testname' and 
  cdate between '$sdate' and '$edate' ";
$qry1=mysqli_query($link,$x);
$t=0;
while($r=mysqli_fetch_array($qry1)){
        $mrno=$r['mrno'];
        $bno=$r['bno'];
        $k=mysqli_query($link,"select * from bill where billno='$bno' and mrno='$mrno'") or die(mysqli_error($link));
        $k1=mysqli_fetch_array($k);
        ?>
        <tr>	
        
    
            <td><?php echo $i?></td>
			<td ><?php echo $mrno; ?></td>
         <td ><?php echo $bno; ?></td>
			<td ><?php echo $k1['pname']; ?></td>
            
       
			<td><?php echo $k1['age']; ?> / <?php echo $k1['gender']; ?></td>
          
          	<td ><?php  $d=$k1['bdate'];  echo date("d-m-Y", strtotime($d)).$k1['time']; ?></td>
            <td><?php echo $t1=$r['amount'];?></td>
            </tr>
            <?php $t=$t1+$t;  $i++;}?>
             <tr><th colspan="6" align="right">Total Amount</th><th><?php echo $t;?></th></tr>
			
			
			<tr height="20"></tr>
        </table>
        <?php }?>
      
     <?php }?>
     <div align="center"> 
          <td height="100" colspan="3" align="center"><input type="button" value="print" id="prnt" class="butt" onclick="prnt();"/> <input type="button" value="Close" id="cls" class="butt" onclick="closew();"/></td>
     </div>
    
		  

	</body>

</html>

<?php 

}else

{

session_destroy();

session_unset();

header('Location:login.php');

}

?>