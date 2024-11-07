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

	<div class="book">
     <div class="page">
        <div class="subpage">
       
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF;" >
<THEAD>
<tr><td colspan="2"><img src="../img/raajtop.png" style="width:100%; height:120px;"/>  </td></tr>
<tr><td colspan="2"> <h2 align="center" style="font-size:18px;"><b><u>Bed Transfer</u></b></h2></td></tr>
</THEAD>
</table>
	<?php
			//include("config.php");

			$patno = $_REQUEST['pat'];
			
		?>
    
		
		
           
			<table  width="100%" style="border:1px solid #000000;" cellpadding="0" cellspacing="0">
				<tr >
					<td   align="left" ><b><u>Location</u></b></td>
					<td   align="left" ><b><u>Room Type</u></b></td>
					<td   align="left" ><b><u>Room No</u></b></td>
					<td   align="left" ><b><u>Bed No</u></b></td>
					<td   align="left" ><b><u>Start Date </u></b></td>
					<td   align="left" ><b><u>End Date</u></b></td>
					<td   align="left" ><b><u>Hours</u></b></td>
					
					
				</tr>
				
			<?php	
				$sql1="select * from ip_pat_bed where PAT_NO='$patno'";
				$y=mysqli_query($link,$sql1) or die(mysqli_error($link));
				while($row1=mysqli_fetch_array($y)){
					$room_loc=$row1['location'];
 $room_type=$row1['room_type'];
 $room_no=$row1['room_no'];
 $bedno = $row1['BED_NO'];
 
 $sahhh="SELECT * FROM `locations` where id='$room_loc'";
$ssq=mysqli_query($link,$sahhh);
$r=mysqli_fetch_array($ssq);
 $lname=$r['lname'];
 
  $sa="SELECT * FROM `roomtype` where id='$room_type'";
$ssq1=mysqli_query($link,$sa);
$r1=mysqli_fetch_array($ssq1);
 $rtype=$r1['rtype'];
 $sa2="SELECT * FROM `rooms` where id='$room_no'";
$ssq2=mysqli_query($link,$sa2);
$r2=mysqli_fetch_array($ssq2);
 $roomno=$r2['roomno']; 
 
$sa2="SELECT * FROM `beds` where id='$bedno'";
$ssq2=mysqli_query($link,$sa2);
$r2=mysqli_fetch_array($ssq2);
$bed=$r2['bedno'];
				?>	
				<tr>
				
				<td  align="left"><b><?php echo $lname ?></b></td>
				<td  align="left"><b><?php echo $rtype ?></b></td>
				<td  align="left"><b><?php echo $roomno ?></b></td>
				<td   align="left"><b><?php echo ($bed) ?></b></td>
				<td   align="left"><b><?php echo ($row1['START_DATE']." ".$row1['START_TIME']) ?></b></td>
				<td   align="left"><b><?php echo ($row1['END_DATE']." ".$row1['END_TIME']) ?></b></td>
				</tr>
				
				<?php }  ?>
				</table>
		<div style="height:50px;"></div>
       <div align="center"><a href="ipbedlist.php"><button>Close</button></a></div>
      
      
      
      
      
      
      
        
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