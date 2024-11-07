<?php //include('config.php');
include('../db/connection.php');

session_start();
if($_SESSION['user'])
{
$ses=$_SESSION['user'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
	<?php
		//include("header.php");
	?>
	<style>
body {
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 12pt "Tahoma";
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
    padding: 1.5cm;
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
	padding-top:0px;
	font:"Times New Roman", Times, serif;
	font-size:15px;
  
}
.ddd{
	
	padding-bottom:100px;
	
	}
	.ddd1{
	height: 100px;
	padding-top:50px;
	
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
@media screen {
    div#footer_wrapper {
      display: none;
    }
  }

  @media print {
    tfoot { visibility: hidden; }

    div#footer_wrapper {
      margin: 0px 2px 12px 7px;
      position: fixed;
      bottom: 0;
    }

    div#footer_content {
      font-weight: bold;
    }
  }

</style>
<script language="JavaScript" type="text/javascript">
function prnt(){
document.getElementById("prnt").style.display="none";
document.getElementById("cls").style.display="none";
window.print();
window.self.location='dentalbilllist.php';
window.close();
}
function closew(){
	window.self.location='dentalbilllist.php';
//window.close();
}

function abc(){
	
//document.getElementById('tr1').style.display='none';
window.print();
window.close();
//document.getElementById('tr1').style.display='';
}
</script>


	</head>

	<body style="margin-top:0px;">

	<div class="book">
     <div class="page">
        <div class="subpage">
       
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF;" >
<THEAD>
<tr><td colspan="2"><img src="../img/raajtop.png" style="width:100%; height:120px;"/>  </td></tr>
<tr><td colspan="2"> <h2 align="center" style="font-size:18px;"><b><u>Lab Bill</u></b></h2></td></tr>
  </THEAD>
	<?php
			//include("config.php");
		//	$crud = new Crud();
			$bno1 = $_REQUEST['id'];
			$ty="select * from bill where id='$bno1'";
			$t = mysqli_query($link,$ty) or die(mysqli_error($link));
			//$sql= mysql_query("select  b.mrno,b.BillDate,b.phoneno,b.PatientName,b.Age,b.Sex,b.DoctorName,b.conce_type,b.ptype,b1.Total,b1.Discount,b1.NetAmount,b1.PaidAmount,b1.BalanceAmount,b1.time from bill b,bill1 b1 where b.BillNO=b1.BillNO and b.BillNO='$bno'");
			foreach($t as $key=>$row)
			{
				//$row = mysql_fetch_array($sql);
				$bdate = date('d-m-Y',strtotime($row['bdate']));
	    		$patname = $row['pname'];
				$age = $row['age'];
				$bno=$row['billno'];
				$mrno = $row['mrno'];
				$gender = $row['gender'];
				$dname = $row['dname'];
				$total =$row['tamount'];
				$consamt = $row['discount'];
				$namt = $row['namount'];
				$paid = $row['pamount'];
				$bal = $row['bamount'];
				$ptype = $row['ptype'];
				$phoneno = $row['mobile'];
				$time1 = $row['time'];
				$rdate = $row['rdate'];
	
			}		
				
		?>
    <TBODY>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td  valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> 

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center"  cellpadding="0" cellspacing="0" >
          
          <tr>
            <td colspan="4"></td>
             </tr>
			
             <tr>
          <td style="padding-left:20px;"><div align="left">Mr No </div></td>
			<td style="padding-left:20px;"> : <b><?php echo $mrno ?></b></td>
            
           
            </tr>
          <tr>
         <tr>
          <td style="padding-left:20px;" width="20%"><div align="left">Patient Name </div></td>
			<td style="padding-left:20px;"> : <b><?php echo $patname ?></b></td>
            
            <td style="padding-left:20px;" width="15%"><div align="left">Date </div></td>
			<td style="padding-left:20px;" width="35%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
         
           <td style="padding-left:20px;" width="15%"><div align="left">Bill No. </div></td>
			<td style="padding-left:20px;" width="35%"> : <b><?php echo $bno ?></b></td>
           
            <td style="padding-left:20px;"><div align="left">Age / Sex </div></td>
			<td style="padding-left:20px;"> : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
			
			  <tr>
           
            <td style="padding-left:20px;"><div align="left">Doctor  Name </div></td>
			<td style="padding-left:20px;"> : <b><?php echo $dname ?></b></td>
			<td style="padding-left:20px;"><div align="left">Patient Type </div></td>
			<td style="padding-left:20px;"> : <b><?php echo $ptype ?> </b></td>
          
          </tr>
		  	 <tr>
           
            <td style="padding-left:20px;"><div align="left">Phone No </div></td>
			<td style="padding-left:20px;"> : <b><?php echo $phoneno ?></b></td>
			<td style="padding-left:20px;"><div align="left">Time </div></td>
			<td style="padding-left:20px;"> : <b><?php echo $time1 ?></b></td>
			
          
          </tr>
		   
		  <tr>
			<td colspan="4">
			<table align="center" width="100%" style="border-top:1px solid #000000;border-bottom:1px solid #000000;" cellpadding="0" cellspacing="0">
				<tr >
					<td width="70%" style="padding-left:50px;" align="left" ><b><u>Test</u></b></td>
					<td align="left" style="padding-left:50px;" ><b><u>Amount</u></b></td>
				</tr>
				
			<?php	
				 $sql1="SELECT * FROM bill1  WHERE bno='$bno'  and mrno='$mrno'";
				$y=mysqli_query($link,$sql1) or die(mysqli_error($link));
				foreach($y as $key=>$row1){
				//while($row1 = mysql_fetch_array($sql1)){
				
				?>	
				<tr>
				
				<td style="padding-left:50px;" align="left"><b><?php echo $row1['testname'] ?></b></td>
				<td  style="padding-left:60px;" align="left"><b><?php echo number_format($row1['amount'],2) ?></b></td>
				
				<?php }  ?>
					
				</table>
			</td>
		  </tr>
            <?php if($consamt > 0){ ?><tr>
         
			 <td style="padding-left:20px;" width="20%" align="left">Discount</td>
			 <td width="30%" style="padding-left:20px;"> : <b><?php echo number_format($consamt,2) ?></b></td>
              <td width="20%" style="padding-left:20px;">Total </td><td style="padding-left:20px;" width="30%"> : <b><?php echo number_format($total,2) ?></b></td>
            </tr><?php } ?>
			 <tr>
         
			 <td style="padding-left:20px;" align="left">Net Total </td>
			 <td style="padding-left:20px;"> : <b><?php echo number_format($namt,2) ?></b></td>
              <td style="padding-left:20px;" align="left" width="20%">Paid Amount</td>
			  <td style="padding-left:20px;"> : <b><?php echo number_format($paid,2) ?></b> </td>
            </tr>
          <tr>
            <td class="label1" >&nbsp;</td>
			 <td class="label1" >&nbsp;</td>
            <td><div style="padding-left:20px;" align="left">Balance </div></td>
			<td style="padding-left:20px;"> : <b><?php echo number_format($bal,2) ?></b> </td>
            </tr>
			
         <tr>
            <td class="label1"  colspan="4"><br/><br/><br/><br/><br/></td>
			  
            </tr>
			<tr>
            
            
			<td colspan="4" align="right" style="padding-right:20px;"  >  <b>Authorized Signature</b> </td>
            </tr>
			
			
        </table></td>
      </tr>
      <tr><td align="center" >
	  
	  
	 
	  </td></tr>
	  
    </table>
	</tr>
	</td>
  </tr>
 
 
	<tr>
          <td height="100" colspan="3" align="center"><input type="button" value="Print" id="prnt" class="butt" onclick="prnt();"/> <input type="button" value="Close" id="cls" class="butt" onclick="window.close();"/></td>
      </tr>
      
      
      
      
      
      
      
        </table>
        </TBODY>
        
       <div id="footer_wrapper">
  <div id="footer_content">
  <!--  <p>24x7 Emergency: *Cardiac  *Neuro  *Paediatric  *General Surgery  *Ortho Poly Trauma Services Available</p>
    <hr />
    <p>Super Bazar,HUZURABAD-505 468,Dist.Karimnagar.*Cell:9441773007, 9959954108,8008036663</p>-->
  </div>
</div>
		  
</div>
</div>
</div>
	</body>

</html>

<?php 

}else

{

session_destroy();

session_unset();

header('Location:index.php');

}

?>