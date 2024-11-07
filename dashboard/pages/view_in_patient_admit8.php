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
<tr><td colspan="2"> <h2 align="center" style="font-size:18px;"><b><u>Out Patient List</u></b></h2></td></tr>
  </THEAD></table>
	
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td colspan="2" style="border-bottom:1px solid #999999;padding-left: 20px;">
          <?php /*?> <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
		   <?php
				include("config.php");
				
				$sql = mysql_query("select * from organization");
				if($sql)
				{
					$row = mysql_fetch_array($sql);
					
					$orgname = $row['orgname'];
					$orgaddr = $row['address'];
					$orgphone = $row['phone'];
					$orgmobile = $row['mobile'];
					
				}
		   ?>
           
            <td>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="background:#FFFFFF">
                    <tr>
                        <td align="center" style="font-size:24px;" colspan="6"><?php echo $orgname ?></td>
                    </tr>
                    <tr>
                        <td align="center" style="font-size:18px;" colspan="6"><?php echo $orgaddr ?>,</td>
                    </tr>
                    <tr>
                        <td align="center" style="font-size:18px;" colspan="6">Ph : <?php echo $orgphone ?>,<?php echo $orgmobile ?></td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                </table><?php */?>
            </td>
            </tr>
        </table>
            </td>
        </tr>
        
       
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="4"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="1" align="center" style="vertical-align:text-top" cellpadding="1" cellspacing="0" >
          
         
          <tr>
         <td width="5%"><div align="left"><b>S.NO : </b> </div></td>
            <td width="20%"><div align="left"><b>UMR No : </b> </div></td>
            <td width="20%"><div align="left"><b>Patient Name : </b></div></td>
                 <td ><div align="left"><b>Age/Gender :</b> </div></td>
                 
                  <td  ><div align="left"><b>Tel No : </b></div></td>
				   <td  ><div align="left"><b>Doctor : </b></div></td>
				   <td  ><div align="left"><b>Village : </b></div></td>
                  <td width="20%"><div align="left"><b>Date : </b> </div></td>
				   <td width="20%"><div align="left"><b>Amount : </b> </div></td>
				  
				  </tr>
		 <?php 
		
			
			$start_dt=$_REQUEST['s_date'];
$end_dt=$_REQUEST['e_date'];
$sdate = date('Y-m-d',strtotime($start_dt));
$edate = date('Y-m-d',strtotime($end_dt));
$i=1;
          $x="select registerno,patientname,age,gender,doctorname,date,phoneno,address,cons_fee from patientregister where pat_type='OP' and 
  date between '$sdate' and '$edate' ";
$qry1=mysqli_query($link,$x);
while($r=mysqli_fetch_array($qry1)){?>
        
        <tr>	
        
    
            <td><?php echo $i?></td>
			<td ><?php echo $r['registerno'] ?></td>
         
			<td ><?php echo $r['patientname']; ?></td>
            
       
			<td><?php echo $r['age']; ?> / <?php echo $r['gender']; ?></td>
          
          <td><?php echo $r['phoneno']; ?></td>
            <td><?php echo $r['doctorname'];?></td>
          	<td><?php echo $r['address'];?></td>
			<td ><?php  $d=$r['date'];  echo date("d-m-Y", strtotime($d)); ?></td>
            <td><?php echo $t1=$r['cons_fee'];?></td>
            </tr>
            <?php $t=$t1+$t;  $i++;}?>
             <tr><th colspan="8" align="right">Total Amount</th><th><?php echo $t;?></th></tr>
			
			
			<tr height="20"></tr>
        </table></td>
      </tr>
      <tr><td align="center"><b>Cancelled Patients List</b></td></tr>
     <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="1" align="center" style="vertical-align:text-top" cellpadding="1" cellspacing="0" >
          
         
          <tr>
         <td width="5%"><div align="left"><b>S.NO : </b> </div></td>
            <td width="20%"><div align="left"><b>UMR No : </b> </div></td>
            <td width="20%"><div align="left"><b>Patient Name : </b></div></td>
                 <td ><div align="left"><b>Age/Gender :</b> </div></td>
                 
                  <td  ><div align="left"><b>Tel No : </b></div></td>
				   <td  ><div align="left"><b>Doctor : </b></div></td>
				   <td  ><div align="left"><b>Village : </b></div></td>
                  <td width="20%"><div align="left"><b>Date : </b> </div></td>
				   <td width="20%"><div align="left"><b>Amount : </b> </div></td>
				  
				  </tr>
		 <?php 
		
			
			$start_dt=$_REQUEST['s_date'];
$end_dt=$_REQUEST['e_date'];
$sdate = date('Y-m-d',strtotime($start_dt));
$edate = date('Y-m-d',strtotime($end_dt));
$i=1;
          $x1="select registerno,patientname,age,gender,doctorname,date,phoneno,address,cons_fee from patientregister where pat_type='OP' and 
  date between '$sdate' and '$edate' and pcancel='Canceled'";
$qry11=mysqli_query($link,$x1);
$y=0;
while($r1=mysqli_fetch_array($qry11)){?>
        
        <tr>	
        
    
            <td><?php echo $i?></td>
			<td ><?php echo $r1['registerno'] ?></td>
         
			<td ><?php echo $r1['patientname']; ?></td>
            
       
			<td><?php echo $r1['age']; ?> / <?php echo $r1['gender']; ?></td>
          
          <td><?php echo $r1['phoneno']; ?></td>
            <td><?php echo $r1['doctorname'];?></td>
          	<td><?php echo $r1['address'];?></td>
			<td ><?php  $d=$r1['date'];  echo date("d-m-Y", strtotime($d)); ?></td>
            <td><?php echo $y1=$r1['cons_fee'];?></td>
            </tr>
            <?php $y=$y1+$y;  $i++;}?>
             <tr><th colspan="8" align="right">Total Amount</th><th><?php echo $y;?></th></tr>
			
			
			<tr height="20"></tr>
        </table></td>
      </tr>
      <tr><td align="center"><b style="color:red;">Total Collected Amount :<?php echo $t-$y ?></b></td>
      </tr>
  <tr><td >&nbsp;</td></tr>
	<tr>
          <td height="100" colspan="3" align="center"><input type="button" value="print" id="prnt" class="butt" onclick="prnt();"/> <input type="button" value="Close" id="cls" class="butt" onclick="closew();"/></td>
      </tr>
        </table>
		  

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