<?php //include('config.php');
include('../db/connection.php');
session_start();
if($_SESSION['user'])
{
$ses=$_SESSION['user'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
    padding: 0.23cm;
    border: 0px red solid;
    height: 245mm;
	padding-top:0px;
	font:"Courier New", Courier, monospace;
	font-size:16px;
  
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

	<body style="margin-top:0px;">
	<div align="center" style="border:#CC6666">
								
          <input type="button" value="Print" id="prnt" class="styled-button-2" onclick="prnt();"/> <input onClick="window.close()"type="button" value="Close" id="cls" class="styled-button-2" />
								</div>
								<?php 
								
						$bno = ($_REQUEST['bno']);
						$str =$_REQUEST['tname'];
					
                    
						
			//$crud = new Crud();
            $ty="select * from resultentry where billno='$bno'";
			$t = mysqli_query($link,$ty) or die(mysqli_error($link));
			//$sql= mysql_query("select  b.mrno,b.BillDate,b.phoneno,b.PatientName,b.Age,b.Sex,b.DoctorName,b.conce_type,b.ptype,b1.Total,b1.Discount,b1.NetAmount,b1.PaidAmount,b1.BalanceAmount,b1.time from bill b,bill1 b1 where b.BillNO=b1.BillNO and b.BillNO='$bno'");
			while($row=mysqli_fetch_array($t)){
		//	foreach($t as $key=>$row)
		//	{
				//$row = mysql_fetch_array($sql);
				
				$bdate = date('d-m-Y',strtotime($row['bdate']));
				 $patname = $row['pname'];
				
				$age = $row['age'];
		
				$gender = $row['gender'];
				$dname = $row['dname'];
				$sno = $row['id'];
			//	$ctype = $row['conce_type'];
			
	
			}		
		//	$tn1=$_GET['str'];
		//	$tn=explode(',',$tn1);
		//	foreach($tn as $key=>$t){
		//	$t=$tn;
	
		
				
			 ?>
	<div class="book">
	    <div class="page">
        <div class="subpage">
            <div  style="height:12%; width:100%" style="padding-bottom:0px;"><!-- <img src="../img/raajtop.png" style="width:100%; height:120px;"/>--></div>
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  >
        
         
         <tr>
          <td style="width:120px;">Patient Name </div></td>
			<td style="width:330px;"> : <b><?php echo substr(ucfirst($patname), 0, 15); ?></b></td>
             <td > Age / Sex </div></td>
			<td> : <b><?php echo ucfirst($age); ?> / <?php echo ucfirst($gender); ?></b></td>
           
            </tr>
            <tr>
            <td colspan="4" style="height:20px"></td>
             </tr> 
          <tr>
         
           <td style="widht:120px;text-align:left;">Reffer Name</td>
			<td style="widht:120px;text-align:left;" > : <b><?php echo ucfirst($dname); ?></b></td>
            <td style="widht:10%;text-align:left;" ><div align="left">Date </div></td>
			<td style="widht:40%;text-align:left;" > : <b><?php echo $bdate ?></b></td>
           
           </tr>
			<?php //if($ptype!='general'){ ?>
			  
			<?php //}else{}?>
		  	<!-- <tr>
           
            <td ><div align="left">PHONE NO </div></td>
			<td > : <b><?php echo $phoneno ?></b></td>
			<td ><div align="left">TIME </div></td>
			<td > : <b><?php echo $time1 ?></b></td>
			
          
          </tr>-->
		  </table>
            <h2 align="center" style="padding-bottom:0px;"><u><?php echo  $str; ?></u></h2>
		  <h5><?php  strtoupper($str); ?></h5>
		<table width="100%">
		    <tr>
		        <td width="380px"><b>Type Of Test</b></td>
		        <td width="180px"><b>Patient Value</b></td>
		       
		        <td width="280px;" align="right"><b>Normal Values</b></td>
		        </tr>
		        <?php 
		        
		         $sql1="SELECT * FROM resultentry3 WHERE bno = '$bno' and tname='$str' ";
				 
				$y=mysqli_query($link,$sql1) or die(mysqli_error($link));
				while($ts=mysqli_fetch_array($y)){
		        ?>
		        <tr>
		            <td><?php echo $ts['title'] ?></td>
		            <td><?php echo $ts['result']."".$ts['units']; ?></td>
		           
		            <td align="right"><?php echo $ts['nvalues'] ?></td>
		        </tr>
		        <?php }?>
		</table>		
		
				<div style="height:50px;"></div>
			<div style="text-align:right;">Lab Incharge</div>
       
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