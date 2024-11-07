<?php //include('config.php');
include('../db/Crud.php');
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
	font-size:18px;
  
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
	//var bno=document.getElementById("bno").value;
	//url="count1.php?bno+bno";
//myPopup =window.open('count1.php?bno='+bno,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
//var t=setTimeout(myPopup.close(),400000);
//alert('count1.php?bno='+bno);
//window.location = "count1.php?bno='+bno"
//window.location = 'count1.php?bno='+bno;
//loadXMLDoc();
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
								
          <input type="button" value="Print" id="prnt" class="styled-button-2" onclick="prnt();"/> <input type="button" value="Close" id="cls" class="styled-button-2" onclick="closew();"/>
								</div>
							
	

									
	<div class="book">
	<?php

						$crud = new Crud();
						$bno = $_REQUEST['id'];
			             $ty="select * from labtest1 where id='$bno'";
			$t = $crud->getData($ty);
			//$sql= mysql_query("select  b.mrno,b.BillDate,b.phoneno,b.PatientName,b.Age,b.Sex,b.DoctorName,b.conce_type,b.ptype,b1.Total,b1.Discount,b1.NetAmount,b1.PaidAmount,b1.BalanceAmount,b1.time from bill b,bill1 b1 where b.BillNO=b1.BillNO and b.BillNO='$bno'");
			foreach($t as $key=>$row)
			{
				//$row = mysql_fetch_array($sql);
				
				
				 $report = $row['report'];
				 $tname = $row['tname'];
				
				
	
			}		
				 ?>
     <div class="page">
        <div class="subpage">
       <div ><img src="../img/raajtop.png" style="width:100%; height:120px;"/></div>
<hr/>

		  <h5><?php echo $tname; ?></h5>
				
						 <table class="table" width="100%" id="table" style="font-size:14px;">
												   <tr>
												   <th>Investigations</th>
												   <th>Result</th>
												   <th>Units</th>
												   <th>Normal Values</th>
												  
												   </tr>
												   <?php
												  $m="select * from labtest2 where tname='$tname'";
												   $t=mysqli_query($link,$m) or die(mysqli_error($link));
													$i=1;  
												  while($t1=mysqli_fetch_array($t)){
												   ?>
												   <tr>
												  
												  
												   <td >
												     <?php  if($t1['heading']=="c"){
												    echo "<b>".$t1['title']."</b>"; 
												    }else{
												    
												    echo $t1['title'];
												    
												    }?>
												  
												   
												   </td>
												   <td></td>
												   <td align="center"><?php echo $t1['units']; ?></td>
												   <td align="center"><?php echo $t1['description']; ?></td>
												   </tr>
												   <?php $i++; }?>
												   <tbody>
												   
												   
												   </tbody>
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