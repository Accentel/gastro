<?php 
include('../db/Crud.php');
session_start();
if($_SESSION['user'])
{
$ses=$_SESSION['user'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<?php
		include("header.php");
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
<style>
div1{
    height:100px;
}
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
    padding-top:0px;
	 padding-bottom: 1.5cm;
	  padding-left: 1.5cm;
	   padding-right: 1.5cm;
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
	padding-top:42px;
	font:"Times New Roman", Times, serif;
	font-size:12px;
  
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

</style>
</head>

<body>
<div align="center" style="border:#CC6666">
								
          <input type="button" value="Print" id="prnt" class="styled-button-2" onclick="prnt();"/> <a href="dischargesummarylist.php"><input type="button" value="Close" id="cls" class="styled-button-2" onclick="closew();"/></a>
								</div>
<div class="book">
    <div class="page">
        <div class="subpage">
        <?php 
$crud = new Crud();
$bno = $crud->my_simple_crypt($_REQUEST['id'],'d');
$k="select * from  adddischarge where  id='$bno'";
$t = $crud->getData($k);
foreach($t as $key=>$r){
$id1=$r['id'];
$mrno=$r['mrno'];
$patno=$r['patno'];
$pname=$r['pname'];
$relation=$r['relation'];
$age=$r['age'];
$sex=$r['sex'];
$admit1=$r['admit'];
$admit=date('Y-m-d',strtotime($admit1));
$discharge1=$r['discharge'];
$discharge=date('Y-m-d',strtotime($discharge1));
$surgery1=$r['surgery'];
$surgery=date('Y-m-d',strtotime($surgery1));
$ward=$r['ward'];
$addr=$r['addr'];
$doctor=$r['doctor'];
$clinicalsummary=$r['clinicalsummary'];
$treatsummary=$r['treatsummary'];
$pulse=$r['pulse'];
$pulse1=$r['pulse1'];
$bp=$r['bp'];
$bp1=$r['bp1'];
$temperature=$r['temperature'];
$temperature1=$r['temperature1'];
$repository=$r['repository'];
$repository1=$r['repository1'];
$heart=$r['heart'];
$heart1=$r['heart1'];
$lungs=$r['lungs'];
$lungs1=$r['lungs1'];
$pa=$r['pa'];
$pa1=$r['pa1'];
$cns=$r['cns'];
$cns1=$r['cns1'];
$localexamination=$r['localexamination'];
$localexamination1=$r['localexamination1'];
$file=$r['file'];
$rdoctor=$r['rdname'];
$suggestions=$r['suggestions'];
$reviewdate=$r['reviewdate'];
$finaldiagnosis=$r['finaldiagnosis'];
$invgreport=$r['invgreport'];
			}?>
<!--<div><img src="../img/raajtop.png" style="width:100%; height:120px;"/>  </div>-->
<div style="height:180px;"></div>
        <table    border="0"  width="100%" style="font-size:20px;" cellspacing="10">
		
		
		 <tr>
<td style="width:40%" align="left"><strong>Name</strong>  : <?php echo $pname;  ?></td>
<td style="width:20%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

<td style="width:40%" ><strong>MR.No</strong> : <?php echo $mrno;  ?> </td>
</tr>

 <tr>
<td><strong>Age/Gender</strong>  : <?php  echo $age."/". $sex."&nbsp;&nbsp;";?></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

<td><strong>D.O.A</strong> : <?php echo date('d-m-Y',strtotime($admit));  ?> </td>
</tr>


 <tr>
<td><strong>Address</strong>  : <?php  echo $addr;?></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

<td><strong>D.O.D</strong> : <?php echo date('d-m-Y',strtotime($discharge));  ?> </td>
</tr>

 

<tr>

</tr>
</table>
<hr/>
<h3 align="center" style="margin-bottom:-15px;">Discharge Summary</h3>
 <table width="100%" align="left">
       
        <tr>
      
       <th><h3 align="left">	DIAGNOSIS</h3>
		
		
	</th>
       
       </tr>
       <tr>
     
      
        <td><?php echo $finaldiagnosis ?></td>
       </tr>
      <tr>
        <th><h3 align="left" style="margin-bottom:-15px;">	DISCHARGE ADVICE</h3>
		
		
	</th>
     
        </tr>
		 <tr>
      
        <td><?php echo $invgreport; ?></td>
        </tr>
       </table>
   
        
        
        
         
        </table>
		
	
       
        <div class="div1"></div>
              
        <table width="100%" align="left" style="margin-top:80px;">
    
       
	      <tr>
        <th><?php echo $file;  ?>. </th>
        
        <td style="text-align:right;"><b><?php echo $rdoctor; ?></b></td>
       </tr>
      
       
       
      
             
        </table>
        
        </div> 
        </div>   
       
    </div>
    
</div>
</body>
</html>
<?php 
include("footer.php");
}else
{
session_destroy();
session_unset();
header('Location:index.php');
}
?>