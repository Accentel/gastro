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
								
          <input type="button" value="Print" id="prnt" class="styled-button-2" onclick="prnt();"/> <a href="../pages/book_appointment.php"><input type="button" value="Close" id="cls" class="styled-button-2" onclick="closew();"/></a>
								</div>
<!--<div class="book">
    <div class="page">
        <div class="subpage">-->
        <?php 
include("../db/connection.php");
$id=$_GET['id'];

$sql=mysqli_query($link,"select * from `patientregister` where reg_id='$id'");
$r=mysqli_fetch_array($sql);


//$doct=$r['registerno'];
$doct1=$r['registerdate'];
//$doct2=$r['tknum'];
 $did=$r['doctorname'];
$pname=$r['patientname'];
$fname=$r['gaurdianname'];
$sex=$r['gender'];
$age=$r['age'];
$mobile=$r['phoneno'];
$pat_type=$r['pat_type'];
//$aadhar=$r['aadar'];
 $ref_doc=$r['ref_doc'];
$address=$r['address'];
$doctorname=$r['doctorname'];
 $con_doct_mob=$r['con_doc_mob'];
$ref_doc_mob=$r['ref_doc_mob'];
$tokenno=$r['tokenno'];
$validity=$r['validity'];
$registerno=$r['registerno'];
$rel_type=$r['rel_type'];
$token1=$r['token_num'];
$cons_fee=$r['cons_fee'];
$total=$r['total'];
 $regfee=$r['registerfee'];
$authby = $r['auth_by'];
$phoneno=$r['phoneno'];
$bill_num=$r['bill_num'];
 $hosp_fee=$r['hosp_fee'];
 $pname_type=$r['pname_type'];
 $pat_type1=$r['pat_type1'];
 $visit_count_pat=$r['visit_count_pat'];
 $registerno=$r['registerno'];
 $tnum=$r['tnum'];
   $dd="select dname1,dsi1,desc1,stime,etime,wdays,edays,dept1,valdity,visit_count,doct_dept_list from doct_infor where dname1 = '$did'";
$docid = mysqli_query($link,$dd);
if($docid)
{
	$row1 = mysqli_fetch_array($docid);
	 $doct3 = $row1['dname1'];
	$dsi1 = $row1['dsi1'];
	$desc1 = $row1['desc1'];
	$stime=$row1['stime'];
	$etime=$row1['etime'];
	$wdays=$row1['wdays'];
	$edays=$row1['edays'];
	$dept1=$row1['dept1'];
	$valdity=$row1['valdity'];
	$visit_count=$row1['visit_count'];
	$doct_dept_list=$row1['doct_dept_list'];
	$NewDate = date('Y-m-d', strtotime($day . " +7 days"));

}



 $dd="select * from referal_doctor where refcode = '$ref_doc'";
$docid = mysqli_query($link,$dd);


$row1 = mysqli_fetch_array($docid);
	$ref_docname = $row1['ref_docname'];
	



  $dd1="SELECT * FROM `doctdept` where id = '$dept1'";
$docid1 = mysqli_query($link,$dd1);

	$row1 = mysqli_fetch_array($docid1);
	 $doctdeptname = $row1['doctdeptname'];
	



?>

<?php // echo  $no = '$no';
   // $newtimestamp = strtotime($doct1. ' + 330 minute');//gets timestamp
    //convert into whichever format you need 
    // $newdate = date('d-m-Y H:i:s', $newtimestamp);
    $newdate=$doct1;
//echo "Right now: " . $now_stamp;
//echo "5 minutes from right now: " . $expire_stamp;


 $day2=date('Y-m-d', strtotime($newdate));

	$NewDate1 = date('Y-m-d', strtotime($day2 . " +$valdity days"));

  $daykk=date('d-m-Y', strtotime($NewDate1));
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
		<b align="center">SAI RAM GASTRO & LIVER HOSPITAL</b></td></tr>
		<tr><td>#10-2-67/68, Mayuri Center, Khammam.</td></tr>
		<tr><td>08742230333, 8121530333</td></tr>
		</table>

         <hr>
		<h4 align="center" style="margin-left:-100px; height: 8px;">ORIGINAL BILL</h4>
		<hr>
		<table width="93%" border="0" align="left" style="vertical-align:text-top; margin-top-10px;" cellpadding="1" cellspacing="0" >
          
         	 
          <tr>
         
            <td width="40%"><div align="left"><b>Bill Date :</b> </div></td>
			<td width="40%"><?php echo date('d.M Y',strtotime($newdate));  ?> &nbsp;&nbsp;&nbsp;</td>
        
			<td  width="20%"> <?php echo $pat_type1;?>  &nbsp;&nbsp;&nbsp;  General</td>
            </tr>
			 
			 
          <tr>
         
            <td width="40%"><div align="left"><b>Patient Visit Time:</b> </div></td>
			<td width="40%"><?php echo date('h:i:s',strtotime($newdate));  ?>
			
			<?php //echo $registerno;  ?> &nbsp;&nbsp;&nbsp;</td>
          
			<td  width="20%"> <?php  echo $sex."/". $age;  ?></td>
            </tr>
          <tr>
         
            <td width="40%"><div align="left"><b>Receipt No:</b> </div></td>
				<td ><?php echo $bill_num
					 ?> <?php //echo $tokenno ?></td>
            <td width="40%"><div align="left"><b> </b></div></td>
			<td ><?php //echo $newdate?></td>
		
            </tr>
			
			<tr>
           <td width="40%"><div align="left"><b>Master Id : </b></div></td>
			<td ><?php echo $registerno;?> </td>
            <td ><div align="left"><b></b> </div></td>
			<td><?php  //echo $phoneno;  ?></td>
          
            </tr>
			  <tr>
           
            <td><div align="left"><b>Village Status: </b></div></td>
			<td><?php echo $address;  ?></td>
           <td><div align="left"><b> </b></div></td>
		   <td><b></b></td>
          </tr>
		  
		    <tr>
           
            <td><div align="left"><b>Received with Thanks: </b></div></td>
			<td>Rs.<?php echo $cons_fee;  ?></td>
           <td><div align="left"><b> </b></div></td>
		   <td><b></b></td>
          </tr>
		  
		   <tr>
           
            <td><div align="left"><b>Patient Name: </b></div></td>
			<td><?php echo $pname_type." ".$pname;  ?></td>
           <td><div align="left"><b> </b></div></td>
		   <td><b></b></td>
          </tr>
		  
         <tr>
           
            <td><div align="left"><b>Consultant Doctor: </b></div></td>
			<td><?php echo $doctorname?>, <?php echo $dsi1?></td>
           <td><div align="left"><b> </b></div></td>
		   <td><b></b></td>
          </tr>
			 <tr>
           
            <td><div align="left"><b>Towords: </b></div></td>
			<td><?php echo $pat_type;?></td>
           <td><div align="left"><b> </b></div></td>
		   <td style="font-size:25px"><b><?php echo $tnum+4;?></b></td>
          </tr>
			
		  <!--
		 <tr>
         
			 <td valign="middle" ><div align="left"><b> : </b></div></td>
			 <td></td>
              <td><b> Visit Type</b></td><td>Paid: Follow up Visits</td>
            </tr>-->
			
            
			
         
			
        </table>
		
		</td><td>
		
		<table align="center"><tr><td>
		<b align="center">SAI RAM GASTRO & LIVER HOSPITAL</b></td></tr>
		<tr><td>#10-2-67/68, Mayuri Center, Khammam.</td></tr>
		<tr><td>08742230333, 8121530333</td></tr>
		</table>
		<hr>
		<h4 align="center" style="margin-left:-100px; height: 8px;">DUPLICATE BILL</h4>
		<hr>
		<table width="93%" border="0" align="left" style="vertical-align:text-top; margin-top-10px;" cellpadding="1" cellspacing="0" >
          
         	 
          <tr>
         
            <td width="40%"><div align="left"><b>Bill Date :</b> </div></td>
			<td width="40%"><?php echo date('d.M Y',strtotime($newdate));  ?> &nbsp;&nbsp;&nbsp;</td>
        
			<td  width="20%"> <?php echo $pat_type1;?>  &nbsp;&nbsp;&nbsp;  General</td>
            </tr>
			 
			 
          <tr>
         
            <td width="40%"><div align="left"><b>Patient Visit Time:</b> </div></td>
			<td width="40%"><?php echo date('h:i:s',strtotime($newdate));  ?>
			
			<?php //echo $registerno;  ?> &nbsp;&nbsp;&nbsp;</td>
          
			<td  width="20%"> <?php  echo $sex."/". $age;  ?></td>
            </tr>
          <tr>
         
            <td width="40%"><div align="left"><b>Receipt No:</b> </div></td>
				<td ><?php echo $bill_num
					 ?> <?php //echo $tokenno ?></td>
            <td width="40%"><div align="left"><b> </b></div></td>
			<td ><?php //echo $newdate?></td>
		
            </tr>
			
			<tr>
           <td width="40%"><div align="left"><b>Master Id : </b></div></td>
			<td ><?php echo $registerno;?> </td>
            <td ><div align="left"><b></b> </div></td>
			<td><?php  //echo $phoneno;  ?></td>
          
            </tr>
			  <tr>
           
            <td><div align="left"><b>Village Status: </b></div></td>
			<td><?php echo $address;  ?></td>
           <td><div align="left"><b> </b></div></td>
		   <td><b></b></td>
          </tr>
		  
		    <tr>
           
            <td><div align="left"><b>Received with Thanks: </b></div></td>
			<td>Rs.<?php echo $cons_fee;  ?></td>
           <td><div align="left"><b> </b></div></td>
		   <td><b></b></td>
          </tr>
		  
		   <tr>
           
            <td><div align="left"><b>Patient Name: </b></div></td>
			<td><?php echo $pname_type." ".$pname;  ?></td>
           <td><div align="left"><b> </b></div></td>
		   <td><b></b></td>
          </tr>
		  
         <tr>
           
            <td><div align="left"><b>Consultant Doctor: </b></div></td>
			<td><?php echo $doctorname?>, <?php echo $dsi1?></td>
           <td><div align="left"><b> </b></div></td>
		   <td><b></b></td>
          </tr>
			 <tr>
           
            <td><div align="left"><b>Towords: </b></div></td>
			<td><?php echo $pat_type;?></td>
           <td><div align="left"><b> </b></div></td>
		   <td style="font-size:25px"><b><?php echo $tnum+4;?></b></td>
          </tr>
			
		  <!--
		 <tr>
         
			 <td valign="middle" ><div align="left"><b> : </b></div></td>
			 <td></td>
              <td><b> Visit Type</b></td><td>Paid: Follow up Visits</td>
            </tr>-->
			
            
			
         
			
        </table></td>
      </tr><tr><td>
	 

<!--<tr><td style="float:right; margin-right:50px; margin-top:60px;"><b>[P.T.O]</b></td></tr>-->
</table>
   </div> 
        </div>    
    </div>
    
</div>

</body>
</html>