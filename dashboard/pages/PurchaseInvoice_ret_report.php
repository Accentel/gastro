<?php
include("../db/connection.php");


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link rel="stylesheet" type="text/css" href="../css/form_style.css" />
<link rel="stylesheet" type="text/css" href="../css/table_style.css" />
<link rel="stylesheet" type="text/css" href="../css/default.css" />
<script type="text/javascript" src="js/tableruler.js"></script>
<script language="javascript" type="text/javascript" src="js/actb.js"></script>
<script language="javascript" type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/sortable.js"></script>
<SCRIPT type="text/javascript">window.onload=function(){tableruler();}</SCRIPT>
<script language="JavaScript" src="../js/gen_validatorv31.js" type="text/javascript"></script>


<script>
function printWindow(){
		
			document.getElementById('submit1').style.display='none';
			document.getElementById('submit2').style.display='none';
		window.print();
		window.close();
	}
	function fun(){
	window.close();
	}
</script>
</head>
<body>
<?php /*?><?php
$sql = mysqli_query($link,"select * from organization");
if($sql){
$res = mysqli_fetch_array($sql);
$orgname = $res['orgname'];
$addr = $res['address'];
$phone = $res['phone'];
$mob = $res['mobile'];
$email = $res['email'];
}
?><?php */?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
            <td>
            
            
            <img src="../img/raajtop.png" height="100" width="100%" />
            
            
                <?php /*?><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-bottom:1px solid #999999;background:#FFFFFF">
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
                </table><?php */?>
            </td>
            </tr>
            <tr align="center"><td><hr /><b>Purchase Return</b></td></tr>
			<tr><td></hr></td></tr>
</table>



  <?php

$lr_id=$_REQUEST['lr_id'];

 $x="select a.suppl_code,b.suppl_name,b.addr1,pur_type,PUR_RETURNNO,inv_date,AUTH_BY,total,rec_date,LR_NO,b.city,lr_no 
from phr_pur_returns_mast as a,phr_supplier_mast as b where lr_no='$lr_id' and a.suppl_code=b.suppl_code";
	$result = mysqli_query($link,$x);
while($row = mysqli_fetch_array($result))
	{
		$suppl_code=$row[0];
		$suppl_name=$row[1];
		$address=$row[2];
		$pur_type=$row[3];
		$invno=$row[4];
		$invdt=$row[5];
		$recby=$row[6];
		$total=$row[7];
		$recdt=$row[8];
		$gr_no=$row[9];
		$city=$row[10];
		$lr_no=$row[11];
		$tot_dis=$row[12];
		

		if($address == "")
		{
			$address="---";
		}
		if($city == "")
		{
			$city="---";
		}
		if($pur_type == "C")
		{
			$pur_type="Cash";
		}
		if($pur_type == "B")
		{
			$pur_type="Bank";
		}
		if($pur_type == "CR")
		{
			$pur_type="Credit Card";
		}

	}

 
 $sql1 = mysqli_query($link,"select * from phr_pur_returns_dtl where LR_NO='$lr_id'");
 
?>
  <table width="100%" border="0" cellspacing="5" cellpadding="2">
              <tr>
                <td width="23%" class="label"><div align="right">Supplier Code<span class="style2">*</span>:</div></td>
                <td  align="left"><?php echo $suppl_code ?></td>
              
                <td width="23%" class="label"><div align="right">Supplier Name<span class="style2">*</span>:</div></td>
                <td  align="left"><?php echo $suppl_name ?></td>
              </tr>
			    <tr>
			      <td class="label"><div align="right">Address:</div></td>
			      <td align="left"><?php echo $address ?></td>
			      <td class="label"><div align="right">GRN NO:</div></td>
			      <td align="left"><?php echo $gr_no ?></td>
			    </tr>
			    <tr>
			      <td class="label"><div align="right">City:</div></td>
			      <td align="left"><?php echo $city ?></td>
                  <td class="label"><div align="right">Invoice  No<span class="style2">*</span>:</div></td>
                  <td align="left"><?php echo $invno ?></td>
			    </tr>
				<tr>
				  <td class="label"><div align="right">Purchase Type<span class="style2">*</span>:</div></td>
				  <td align="left"><?php echo $pur_type ?></td>
                  <td class="label"><div align="right">Invoice Date<span class="style2">*</span>:</div></td>
                  <td align="left"><?php echo $invdt ?>
                    
					</td>
				</tr>
				<tr>
				  <td class="label">&nbsp;</td>
				  <td>&nbsp;</td>
				  <td class="label"><div align="right">Received Date<span class="style2">*</span>:</div></td>
				  <td><div align="left">
                      <?php echo $recdt ?>
                  </div>
				  </td>
				</tr>
				
        
            </table>
			<table id="t1" width="100%">
			<tr><td></td>
            	   
           <tr><td width="100%" align="center"><br />

<div id="purtable" valign="top">

            <table width="100%" id="TABLE1">
              <thead>
              	 
              	 <tr>
  <!-- <th width="7%" class="TH1">P.Code</th>-->
   <th width="15%" class="TH1">P.Name </th>
     <!-- <th width="7%" class="TH1">Pack</th>-->
	   <th width="7%" class="TH1">Mnf.By</th>
	    
   <th width="10%" class="TH1">Batch.NO</th>
 
   <th width="9%" class="TH1">R.Qty</th>
   <th width="9%" class="TH1">Rate</th>
   <th width="7%" class="TH1">Amount</th>
   
    </tr>
   </thead>
   <tbody>
    <?php
		if($sql1){
		$vat4 = 0;
		$vat14 = 0;
		$vat12 = 0;
		$p = 0;
		while($row1 = mysqli_fetch_array($sql1))
		 {	
			//$pcode=$row1['PRODUCT_CODE'];
			$pname=$row1['PRODUCT_CODE'];
			//$packing=$row1[2];
			$batch=$row1['BATCH_NO'];
			$dis=$row1['disc'];
			$expdt=date('d-m-Y',strtotime($row1[5]));
			$rqty=$row1['R_QTY'];
			$sfree=$row1[7];
			$rrate=$row1['R_RATE'];
			$dis=$row1[9];
			$valu=$row1['Total'];
			 $vat=$row1[11];
			$vat_amt=$row1[12];
			$mfgdt=date('d-m-Y',strtotime($row1[13]));
			$noi=$row1[14];
			$cst=$row1[15];
			$maniby=$row1['manf_by'];
			$sgst=$row1[17];
			$cgst=$row1[18];
			if($vat==5.0){$vat4=($vat4+$vat_amt);}
		if($vat==15.0){$vat14=($vat14+$vat_amt);}
		if($vat==14.5){$vat12=($vat12+$vat_amt);}
		$vatadd=($vatadd+$vat_amt);
		$nit=($nit+$sqty);
			$p = $p+1;
			
			
			
			if($vat==0.00){
			$novat1=$vat_amt;
			$novat=$novat1+$novat;
		} elseif($vat==5.00) {
			$gst51=$vat_amt;
			$gst5=$gst51+$gst5;
		}else if($vat==12.00){
			 $gst121=$vat_amt;
			$gst12=$gst121+$gst12;
		}else if($vat==18.00){
			$gst181=$vat_amt;
			$gst18=$gst181+$gst18;
		}else if($vat==28.00){
			$gst281=$vat_amt;
			$gst28=$gst281+$gst28;
		}
			
			
			 ?>
        <tr> 
 		
		<?php /*?> <td class="TD1"><?php echo $pcode ?></td><?php */?>
		<td class="TD1"><?php echo $pname ?></td>
	<!--	<td class="TD1"><?php  $packing ?></td>-->
		<td class="TD1"><?php echo $maniby ?></td>
		 <td class="TD1"><?php echo $batch ?></td>
		<td class="TD1"><?php echo $rqty ?></td>
		<td class="TD1"><?php echo $rrate ?></td>
       <td class="TD1"><?php echo $valu ?></td>
		
		
       
        </tr> <?php
		
		
		} 
		}?>
   </tbody>
 </table>

 </div>
 </td>
 
  
  </tr>


</table>
<input type="hidden" name="rows" id="rows" value="0" >
<table width="100%" >
              	   <tr height="40">
              	     <td colspan="6" class="label">&nbsp;</td>
              	     </tr>
                     
                     	 <tr>
                   <td colspan="5" class="label1">Discount:</td>
              	   <td align="left"><?php echo $tot_dis ?></td>
              	 </tr>
                     
                    
              	 <tr>
                   <td colspan="5" class="label1">Net PAYABLE:</td>
              	   <td align="left"><?php echo $total ?></td>
              	 </tr>
 

              	 <tr>
                   <td colspan="5" class="label1">Received By:</td>
              	   <td align="left"><?php echo $recby ?></td>
            	   </tr>
              	 </table>
                  <div align="center">
				  <input type="button" id="submit1" value="Report" class="butt" onclick="javascript:printWindow();"/>
              <input type="button" id="submit2" value="Close" class="butt" onclick = "javascript:fun();" > 
            </div>
            
</body>
</html>	