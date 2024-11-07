<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Gastro Hospital</title>
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
<style>
body {
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 9pt "Tahoma";
}
.styled-button-2 {
	 background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}
* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}
.page {
    width: 21cm;
    min-height: 28.7cm;
    padding-left: 1.9cm;
	padding-right: 1.9cm;
	padding-bottom: 1.9cm;
	padding-top: 1.1cm;
    margin: 1cm auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
    padding: 0.25cm;
    border: 0px red solid;
    height: 245mm;
	padding-top:10px;
	font:"Times New Roman", Times, serif;
	font-size:14px;
  
}

@page {
    size: A4;
    margin: 0;
}
@media print {
    .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
    }
	
}
.text-line {
        background-color: transparent;
        color: #000;
        outline: none;
        outline-style: none;
        outline-offset: 0;
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom: solid red 1px;
        padding: 3px 10px;
		width:80px;
    }
</style>
</head>

<body>
<div align="center" style="border:#CC6666">
								
          <input type="button" value="Print" id="prnt" class="styled-button-2" onclick="prnt();"/> <a href="labbilllist.php"><input type="button" value="Close" id="cls" class="styled-button-2" /></a>
								</div>
<!--<div class="book">
    <div class="page">
        <div class="subpage">-->
        <?php 
include("../db/connection.php");
 $id=$_GET['id'];

$sql=mysqli_query($link,"select * from `bill` where id='$id'");
$row=mysqli_fetch_array($sql);


//$doct=$r['registerno'];
$bdate = date('d-m-Y',strtotime($row['bdate']));
				 $patname = $row['pname'];
				$billno=$row['billno'];
				$age = $row['age'];
				$mrno = $row['mrno'];
				$gender = $row['gender'];
				$dname = $row['dname'];
				$total =$row['tamount'];
				$consamt = $row['discount'];
				$namt = $row['namount'];
				$paid = $row['pamount'];
				$bal = $row['bamount'];
				$dname = $row['dname'];
				$ptype = $row['ptype'];
				$phoneno = $row['mobile'];
				$time1 = $row['time'];
				 $pay_type=$row['paymenttype'];
				 $discount=$row['discount'];
   

  $a="select * from patientregister where registerno='$mrno'";
$sq=mysqli_query($link,$a);
$r=mysqli_fetch_array($sq);
 $address=$r['address'];
 
?>




	


	
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF; margin-left:25px; margin-right:10px;">

          <tr><td colspan="2"><br></td></tr>
          
        
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="" valign="top" align="center">
        
        
        
           <table width="100%" border="0" cellspacing="0" cellpadding="4"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		<table align="center"><tr><td>
		<b align="center">SAI RAM GASTRO DIAGNOSIS </b></td></tr>
		<tr><td>#10-2-67/68, Mayuri Center, Khammam.</td></tr>
		<tr><td>08742230333, 8121530333</td></tr>
		</table>

         <hr>
		<h4 align="center" style="margin-left:-100px; height: 8px;">ORIGINAL BILL</h4>
		<hr>
		<table width="93%" border="0" align="left" style="vertical-align:text-top; margin-top-10px;" cellpadding="1" cellspacing="0" >
          
         	 
         <tr>
         
            <td width="40%"><div align="left"><b>Bill Date :</b> </div></td>
			<td width="40%"><?php echo date('d.M Y',strtotime($bdate));  ?> &nbsp;&nbsp;&nbsp;</td>
        
			<td  width="20%"> <?php echo $ptype;?>  &nbsp;&nbsp;&nbsp;  Genral</td>
            </tr>
			 
			 
          <tr>
         
            <td width="40%"><div align="left"><b>Patient Visit Time:</b> </div></td>
			<td width="40%"><?php echo $time1;  ?>
			
			<?php //echo $registerno;  ?> &nbsp;&nbsp;&nbsp;</td>
          
			<td  width="20%"> </td>
            </tr>
          <tr>
         
            <td width="40%"><div align="left"><b>Receipt No:</b> </div></td>
				<td ><?php echo $id
					 ?> <?php //echo $tokenno ?></td>
            <td width="40%"><div align="left"><b></b>&nbsp;&nbsp;&nbsp;&nbsp;  </div></td>
	
            </tr>
			
			<tr>
           <td width="40%"><div align="left"><b>Master Id : </b></div></td>
			<td ><?php echo $mrno;?> </td>
            <td ><div align="left"><b></b>&nbsp;&nbsp;&nbsp; </div></td>
			<td><?php  //echo $phoneno;  ?></td>
          
            </tr>
			  <tr>
           
            <td><div align="left"><b>Village Status: </b></div></td>
			<td><?php echo $address;  ?></td>
           <td><div align="left"> <b></b>&nbsp;&nbsp;&nbsp;</div></td>
		   <td><b></b></td>
          </tr>
		  
		    <tr>
           
            <td><div align="left"><b>Received with Thanks: </b></div></td>
			<td>Rs.<?php echo $namt;  ?></td>
           <td><div align="left"><b> </b></div></td>
		   <td><b></b></td>
          </tr>
		  
		   <tr>
           
            <td><div align="left"><b>From Sri/Smt: </b></div></td>
			<td><?php echo $patname;  ?></td>
           <td><div align="left"><b> </b></div></td>
		   <td><b></b></td>
          </tr>
		  <tr>
           
            <td><div align="left"><b>Age/Gender: </b></div></td>
			<td><?php echo $age."/".$gender;  ?></td>
           <td><div align="left"><b> </b></div></td>
		   <td><b></b></td>
          </tr>
		  
         <tr>
           
            <td><div align="left"><b>Consultant Doctor: </b></div></td>
			<td><?php echo $dname?></td>
           <td><div align="left"><b> </b></div></td>
		   <td><b></b></td>
          </tr>
			 <tr>
           
            <td><div align="left"><b>Towords: </b></div></td>
			<td><?php echo 'LAB';?></td>
           <td><div align="left"><b> </b></div></td>
		   <td><b><?php echo $tnum;?></b></td>
          </tr>
          
          
		  <!--
		 <tr>
         
			 <td valign="middle" ><div align="left"><b> : </b></div></td>
			 <td></td>
              <td><b> Visit Type</b></td><td>Paid: Follow up Visits</td>
            </tr>-->
			
            
			
         
			
        </table>
        
		
		</td>
		<td>
		
		<table align="center"><tr><td>
		<b align="center">SAI RAM GASTRO DIAGNOSIS </b></td></tr>
		<tr><td>#10-2-67/68, Mayuri Center, Khammam.</td></tr>
		<tr><td>08742230333, 8121530333</td></tr>
		</table>
		<hr>
		<h4 align="center" style="margin-left:-100px; height: 8px;">DUPLICATE BILL</h4>
		<hr>
		<table width="93%" border="0" align="left" style="vertical-align:text-top; margin-top-10px;" cellpadding="1" cellspacing="0" >
          
          <tr>
         
            <td width="40%"><div align="left"><b>Bill Date :</b> </div></td>
			<td width="40%"><?php echo date('d.M Y',strtotime($bdate));  ?> &nbsp;&nbsp;&nbsp;</td>
        
			<td  width="20%"> <?php echo $ptype;?>  &nbsp;&nbsp;&nbsp;  Genral</td>
            </tr>
			 
			 
          <tr>
         
            <td width="40%"><div align="left"><b>Patient Visit Time:</b> </div></td>
			<td width="40%"><?php echo $time1;  ?>
			
			<?php //echo $registerno;  ?> &nbsp;&nbsp;&nbsp;</td>
          
			<td  width="20%"> </td>
            </tr>
          <tr>
         
            <td width="40%"><div align="left"><b>Receipt No:</b> </div></td>
				<td ><?php echo $id
					 ?> <?php //echo $tokenno ?></td>
            <td width="40%"><div align="left"><b></b>&nbsp;&nbsp;&nbsp;&nbsp;  </div></td>
	
            </tr>
			
			<tr>
           <td width="40%"><div align="left"><b>Master Id : </b></div></td>
			<td ><?php echo $mrno;?> </td>
            <td ><div align="left"><b></b>&nbsp;&nbsp;&nbsp;  </div></td>
			<td><?php  //echo $phoneno;  ?></td>
          
            </tr>
			  <tr>
           
            <td><div align="left"><b>Village Status: </b></div></td>
			<td><?php echo $address;  ?></td>
           <td><div align="left"> <b></b>&nbsp;&nbsp;&nbsp; </div></td>
		   <td><b></b></td>
          </tr>
		  
		    <tr>
           
            <td><div align="left"><b>Received with Thanks: </b></div></td>
			<td>Rs.<?php echo $namt;  ?></td>
           <td><div align="left"><b> </b></div></td>
		   <td><b></b></td>
          </tr>
		  
		   <tr>
           
            <td><div align="left"><b>From Sri/Smt: </b></div></td>
			<td><?php echo $patname;  ?></td>
           <td><div align="left"><b> </b></div></td>
		   <td><b></b></td>
          </tr>
		  <tr>
           
            <td><div align="left"><b>Age/Gender: </b></div></td>
			<td><?php echo $age."/".$gender;  ?></td>
           <td><div align="left"><b> </b></div></td>
		   <td><b></b></td>
          </tr>
		  
         <tr>
           
            <td><div align="left"><b>Consultant Doctor: </b></div></td>
			<td><?php echo $dname?></td>
           <td><div align="left"><b> </b></div></td>
		   <td><b></b></td>
          </tr>
			 <tr>
           
            <td><div align="left"><b>Towords: </b></div></td>
			<td><?php echo 'LAB';?></td>
           <td><div align="left"><b> </b></div></td>
		   <td><b><?php echo $tnum;?></b></td>
          </tr>
			
		  <!--
		 <tr>
         
			 <td valign="middle" ><div align="left"><b> : </b></div></td>
			 <td></td>
              <td><b> Visit Type</b></td><td>Paid: Follow up Visits</td>
            </tr>-->
			
            
			
         
			
        </table></td>
      </tr>
      
      <tr><td>
	<table width="93%" border="1" align="left" style="vertical-align:text-top; margin-top-10px;" cellpadding="1" cellspacing="0">
            
            <tr>
                <td>SNo</td>
                <td>Test Name</td>
                <td>Amount</td>
            </tr>
            		
			<?php	
				 $sql1="SELECT testname,amount FROM bill1 WHERE bno = '$billno' and mrno='$mrno'";
				$y=mysqli_query($link,$sql1);
				$i=1;
				foreach($y as $key=>$row1){
				//while($row1 = mysql_fetch_array($sql1)){
				?>
				<tr>
				    <td><?php echo $i; ?></td>
				    <td><?php echo $row1['testname']; ?></td>
				    <td><?php echo $row1['amount']; ?></td>
				    
				</tr>
				<?php $i++; } ?>
        </table> 
        <table width="93%" border="0" align="left" style="vertical-align:text-top; margin-top-10px;" cellpadding="1" cellspacing="0">
            
            <!-- <tr>
                <td  width="47%">User:</td>
                <td>Gross Amt:</td>
                <td><?php echo $total;  ?></td>
            </tr>-->
             <tr>
               
                <td><b>Total Amt: </b><?php echo $namt;  ?></td>
                <td><b>Discount: </b><?php echo $discount;  ?></td>
            </tr>
            <!--<tr>
               
                <td>Grand Total:</td>
                <td><?php echo $total;  ?></td>
            </tr>-->
             <tr>
                <td><b>Balance:</b>
                <?php echo $bal;  ?></td>
                <td><b>Paid: </b><?php echo $paid;  ?></td>
              
            </tr>
           
			<?php if($pay_type=='Free'){?>
			<tr>
              
                <td><b>Patient Type:</b> <?php echo $pay_type;  ?></td>
                
            </tr>
			   <?php }?>
            		</table>
        
</td>
<td>
    
 <table width="93%" border="1" align="left" style="vertical-align:text-top; margin-top-10px;" cellpadding="1" cellspacing="0">
            
            <tr>
                <td>SNo</td>
                <td>Test Name</td>
                <td>Amount</td>
            </tr>
            		
			<?php	
				 $sql1="SELECT testname,amount FROM bill1 WHERE bno = '$billno' and mrno='$mrno'";
				$y=mysqli_query($link,$sql1);
				$i=1;
				foreach($y as $key=>$row1){
				//while($row1 = mysql_fetch_array($sql1)){
				?>
				<tr>
				    <td><?php echo $i; ?></td>
				    <td><?php echo $row1['testname']; ?></td>
				    <td><?php echo $row1['amount']; ?></td>
				    
				</tr>
				<?php $i++; } ?>
        </table>    
    <table width="93%" border="0" align="left" style="vertical-align:text-top; margin-top-10px;" cellpadding="1" cellspacing="0">
            
             <!-- <tr>
                <td  width="47%">User:</td>
                <td>Gross Amt:</td>
                <td><?php echo $total;  ?></td>
            </tr>-->
             <tr>
               
                <td><b>Total Amt: </b><?php echo $namt;  ?></td>
                <td><b>Discount: </b><?php echo $discount;  ?></td>
            </tr>
            <!--<tr>
               
                <td>Grand Total:</td>
                <td><?php echo $total;  ?></td>
            </tr>-->
             <tr>
                <td><b>Balance:</b>
                <?php echo $bal;  ?></td>
                <td><b>Paid: </b><?php echo $paid;  ?></td>
              
            </tr>
           
			<?php if($pay_type=='Free'){?>
			<tr>
              
                <td><b>Patient Type:</b> <?php echo $pay_type;  ?></td>
                
            </tr>
			   <?php }?>
            		</table>
</td>
<!--<tr><td style="float:right; margin-right:50px; margin-top:60px;"><b>[P.T.O]</b></td></tr>-->
</table>
   </div> 
        </div>    
    </div>
    
</div>

</body>
</html>