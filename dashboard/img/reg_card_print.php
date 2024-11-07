
<?php
	include("../db/connection.php");
 $opno=$_REQUEST['opno'];
$a = $_REQUEST['a'];


	  if($a==1){
	  //$age = $_REQUEST['age'];

	    
		$qry2= mysqli_query($link,"select * from patientregister  where reg_id='$opno'");

		if($qry2){
		
		$row = mysqli_fetch_array($qry2);
		
		 $regno=$row['registerno'];
		 $regdate=$row['registerdate'];
		 $opno1=$row['op_no'];
		 $age=$row['age'];
		 $gender=$row['gender'];
		 $tokenno=$row['tokenno'];
		 $dnamek=$row['dname'];
		 $dname="Dr.".$row['doctorname'];
		 $regfee=$row['registerfee'];
		 $vno=$row['visit_no'];
		 $apptime=$row['appmnt_time'];
		 $pname=$row['pname_type'].".".$row['patientname'];
		 $ctype=$row['pay_type'];
		 $cardno=$row['card_no'];
		 $cons_fee=$row['cons_fee'];
		  $t = $row['tokenno'];
		  $validity1 = $row['validity'];
		  $validity=date('d/m/Y',strtotime($validity1));
		  $auth_by =$row['auth_by']; 
		  $bill_num=$row['bill_num'];
		  $hosp_fee=$row['hosp_fee'];
		  $serv_name=$row['serv_name'];
		  $mobile=$row['phoneno'];
		  $ref_doc=$row['ref_doc'];
		  $opt_type=$row['opt_type'];
		 } 
}

 $dd="select * from referal_doctor where refcode = '$ref_doc'";
$docid = mysqli_query($link,$dd);


$row1 = mysqli_fetch_array($docid);
	$ref_docname = $row1['ref_docname'];
 $dd1="SELECT * FROM `doctdept` where id = '$dnamek'";
$docid1 = mysqli_query($link,$dd1);

	$row1 = mysqli_fetch_array($docid1);
	 $doctdeptname = $row1['doctdeptname'];
	
	$tot=$regfee+$cons_fee;	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
		include("header.php");
	?>
    <style>
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
@media screen {
    div#footer_wrapper {
      display: none;
    }
  }

  @media print {
    tfoot { visibility: hidden; }

    div#footer_wrapper {
      margin: 0px 2px 12px 2px;
      position: fixed;
      bottom: 0;
    }

    div#footer_content {
      font-weight: bold;
    }
  }
  </style>
<script type="text/javascript">
function print1(){
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
 <?php
  /**
   * Created by PhpStorm.
   * User: sakthikarthi
   * Date: 9/22/14
   * Time: 11:26 AM
   * Converting Currency Numbers to words currency format
   */
$number = $tot;
   $no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'One', '2' => 'Two',
    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'Eighty', '90' => 'Ninety');
   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
  $rupee= $result . "Rupees  " ;
 ?> 

</head>
<?php
include("config.php");
$sql = mysql_query("select valid_days from validity_days");
if($sql){
	$row = mysql_fetch_array($sql);
	$vdays = $row[0];
}
?>
<body >
<div class="book">
     <div class="page">
        <div class="subpage" style="margin-top:-50px;">
       

    <?php if($a==1){ ?>
<table width="100%" border="0"  style="background-color:#FFFFFF">
    <THEAD>
<tr><tr><td colspan="5"  align="center"><img src="../img/raajtop.png" style="width:100%; height:100px;"  ></td></tr>
<tr  style=" height:10px; background-color:#213; color:#FFF;"><td colspan="5"> <h1 align="center" style="font-size:18px;"><b><u>OP Consultation Bill</u></b></h1></td></tr>
  </THEAD>
   <TBODY>
  
<tr>
    <td colspan="5" style="margin-top:-10px;">
	<fieldset style="border='1px solid;   '">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#FFFFFF;"> <!--style="border:1px #BDD9E1 solid">-->
         
          <tr height="30">
            <td width="20%" ><b>Bill No</b></td>
            <td width="2%" >: </td><td width="28%"><?php echo $bill_num ?> </td>  
             <td width="20%" ><b>Bill Date</b> </td>
            <td width="2%">: </td><td width="28%"><?php echo $regdate ?></td>
                    </tr>
            <tr height="30">
            <td width="20%" ><b>UMR No</b></td>
            <td >: </td><td><?php echo $regno ?> </td>  
             <td width="20%" ><b>OP No</b> </td>
            <td >:</td><td> <?php echo $tokenno; ?></td>
                    </tr> 
                    
                    
                     
                     
          <tr height="30">
            <td ><b>Patient Name</b> </td>
            <td> :</td><td> <?php echo $pname ?></td>
            <td ><b>Age/Gender</b></td>
            <td > : </td><td><?php echo $age ?>/<?php echo $gender ?></td>
            </tr>
         
          <tr height="30">
            <td ><b>Mobile</b></td>
            <td > :</td><td> <?php echo $mobile ?></td>
            <td ><b>Reffered By</b></td>
            <td >:</td><td><?php echo $ref_docname ?> </td>
            </tr>
			
			 <tr height="30">
            <td ><b>Consultant Doctor </b></td>
            <td > :</td><td> <?php echo $dname ?></td>
            <td ><b></b></td>
            <td > </td>
            </tr>
			<?php /*?><tr height="30">
            <td ><b>Payment Type</b></td>
            <td >: <?php echo $ctype; ?></td>
            <?php if($ctype != "self"){ ?>
			<td ><b>Card No.</b></td>
            <td > : <?php echo $cardno ?></td>
            <?php } ?>
		  </tr ><?php */?>
          </table></fieldset>
         
         
         <?php $sqqq=mysqli_query($link,"select * from daily_amount where bill_num='$bill_num'");
		 $r=mysqli_fetch_array($sqqq);
		 $amount=$r['amount'];
		 $pay_type=$r['pay_type'];
		 $recv_by=$r['recv_by'];
		 ?>
         
         <tr><td align="center" style=" border-top: #000000 0px solid; width:100%" colspan="10">
		 
		 <table width="99%" cellpadding="0" cellspacing="0" border='0' ><tr><td>
		<table style="border:1px solid; width:100%"><tr>
    <td><b>Sno</b></td><td><b>Details</b></td><td><b>Amount</b></td></tr>
<tr><td colspan='3'><hr></td></tr>

    <tr><td><b>1</b></td><td><b><?php echo $opt_type; ?> Consultation</b></td><td><b><?php echo $tot?></b></td></tr>
	
	<tr><td colspan='3'><hr></td></tr>
	
	<tr><td></td><td></td>
	
	<td colspan="0"  ><span style="margin-left:-70px">Total Amount:</span>  <?php echo $tot?></td></tr>
	<tr><td>Rupees  : <?php echo $rupee?> Only</td><td></td><td ><span style="margin-left:-70px">Paid Amount: </span>  <?php echo $amount?></td></tr>
	
	<tr><td>Mode of Payment : <?php echo $pay_type?></td><td></td>
	<td><span style="margin-left:-45px">Balance:</span>  <?php echo $tot-$amount;?></td></tr>
	
	</table>
         
			<?php /*?><tr>
            <td ><b></b></td>
            <td >  </td>
            <td ><b>Reg.Fee </b></td>
            <td > : <?php echo $regfee ?></td>
            </tr>
            <tr>
            <td ></td>
            <td ></td>
            <td ><b>Consultation.Fee </b></td>
            <td > : <?php echo $cons_fee ?></td>
            </tr>
		
          <tr>
            <td style="border-top:1px solid #999999;background:#FFFFFF">&nbsp;</td>
            <td style="border-top:1px solid #999999;background:#FFFFFF">&nbsp;</td>
            <td style="border-top:1px solid #999999;background:#FFFFFF"><b>Tot.Amt </b></td>
            <td style="border-top:1px solid #999999;background:#FFFFFF">: <?php echo $regfee+$cons_fee ?></td>
            </tr>
          <tr>
            <td style="border-top:1px solid #999999;background:#FFFFFF">&nbsp;</td>
            <td style="border-top:1px solid #999999;background:#FFFFFF">&nbsp;</td>
            <td style="border-top:1px solid #999999;background:#FFFFFF"><b>Paid.Amt </b></td>
            <td style="border-top:1px solid #999999;background:#FFFFFF">: <?php echo $regfee+$cons_fee ?></td>
          </tr><?php */?>
         <!-- <tr height="60px;">
          
          </tr>-->
          
         <!-- 
          <tr>
            <td colspan="5" height="30"><div id="inwords"><b>Prepared by : <?php echo $auth_by?></b></div> </td>
            </tr>
          
          -->
          <tr>
            <td align="left" colspan="5" style="height:150px;">
			<div id="inwords" align="left"><b>Prepared by : <?php echo $recv_by?></b></div>
			
			<div align="right" style="margin-top:-12px"><b>Authorized Signature </b>  </div>
			</tr>
			
        </table>
    </td></tr>
         <?php } ?>
		
        <?php if($a==1){ ?>
        
         
             </TBODY>
         
         <?php } ?>  
        </table>
        <table width="100%" style="background-color:#FFFFFF" cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td height="100" colspan="3" align="center"><input type="button" value="print" id="prnt" class="butt" onclick="javascript:print1();"/> <input type="button" value="Close" id="cls" class="butt" onclick="closew();"/></td>
			</tr>
        </table>
	
<!--<div id="footer_wrapper">
  <div id="footer_content">
    <p>24x7 Emergency: *Cardiac  *Neuro  *Paediatric  *General Surgery  *Ortho Poly Trauma Services Available</p>
    <hr />
    <p>Super Bazar,HUZURABAD-505 468,Dist.Karimnagar.*Cell:9441773007, 9959954108,8008036663</p>
  </div>
</div>-->


</div>
</div>
</div>
</body>
</html>
