<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Sai Ram Gastro Hospital</title>
<script language="JavaScript" type="text/javascript">
function prnt(){
	//var bno=document.getElementById("bno").value;
	//url="count1.php?bno+bno";
//myPopup =window.open('count1.php?bno='+bno,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
//var t=setTimeout(myPopup.close(),400000);
//alert('count1.php?bno='+bno);
//window.location = "count1.php?bno='+bno"
//window.location = 'count1.php?bno='+bno;

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
	padding-top:120px;
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

<?php
include('../db/connection.php');

$sql = mysqli_query($link,"select * from pharmacydetaisl");
if($sql){
$res = mysqli_fetch_array($sql);
$orgname = $res['pharmacyname'];
$addr = $res['address'];
$phone = $res['phoneno'];
$mob = $res['mobileno'];
$email = $res['email'];
}
?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
            <td>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-bottom:1px solid #999999;background:#FFFFFF">
                    <tr>
                        <td style="text-align:center;font-size:24px;" colspan="6"><?php echo $orgname ?></td>
                    </tr>
                    <tr>
                        <td style="text-align:center;font-size:18px;" colspan="6"><?php echo $addr ?></td>
                    </tr>
                    <tr>
                        <td style="text-align:center;font-size:18px;" colspan="6">Ph : <?php echo $phone ?></td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                </table>
            </td>
            </tr>
</table>




    
		<table class="table" width="100%" border='1'>
								
									<tr>
									<td>S No</td>
									<td>Mr No</td>
									<td>Invoice No</td>
									<td>Bill Date</td>
									<td>Amount</td>
									</tr>
									<?php 
									if(isset($_POST['submit'])){
									$mrno=$_POST['mrno'];
									
									$t=mysqli_query($link,"select * from phr_salent_mast where mrnum='$mrno'") or die(mysqli_error($link));
									$i=1;
									while($t1=mysqli_fetch_array($t)){
									?>
									<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $mrno?></td>
									<td><?php echo $bn=$t1['LR_NO']; ?></a></td>
									<td><?php echo $t1['SAL_DATE']; ?></td>
									<td>
									<?php 
									
										echo $t1['final_amnt'];
									
									
									?>
									
									
									</td>
									</tr>
									<?php $i++; }} ?>
									<tr>
<td colspan="5" align="center"> <input type="button" value="Print" id="prnt" class="styled-button-2" onclick="prnt();"/> <input type="button" value="Close" id="cls" class="styled-button-2" onclick="closew();"/></td>
</tr>
									<table>
		

</body>
</html>