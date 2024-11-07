<?php
include("../db/connection.php");
$lr_id=$_REQUEST['id'];

$rs=mysqli_query($link,"select customer_type from phr_salent_mast where lr_no='$lr_id' ");
while($rw = mysqli_fetch_array($rs))
{
	 $customer_type=$rw[0];
}

if($customer_type == "c"){
	 $cc="select CUST_NAME,sal_date,cust_name,Consultant_Name,auth_by,concession_type,bal,sr_bill_num,inv_no from 
	phr_salent_mast  where lr_no='$lr_id'";
	$ss=mysqli_query($link,$cc);
}
	
 else if($customer_type == "p"){
	 $cc="select CUST_NAME,sal_date,cust_name,Consultant_Name,auth_by,concession_type,bal,sr_bill_num,inv_no from 
	phr_salent_mast  where lr_no='$lr_id'";
	$ss=mysqli_query($link,$cc);
 } 
 else if($customer_type == "p1"){
	 $cc="select CUST_NAME,sal_date,cust_name,Consultant_Name,auth_by,concession_type,bal,sr_bill_num,inv_no from 
	phr_salent_mast  where lr_no='$lr_id'";
	$ss=mysqli_query($link,$cc);
 }
 else {
	 $a="select cust_name,sal_date,cust_name,Consultant_Name,auth_by,concession_type,conce_cardno,bal,sr_bill_num,inv_no from phr_salent_mast where lr_no='$lr_id'";
	$ss=mysqli_query($link,$a);
 }
 

while($rss = mysqli_fetch_array($ss))
{
 $custname=$rss[0];
$saledate=date('d-m-Y',strtotime($rss[1]));
$custname1=$rss[2];
$ConsultantName=$rss[3];
$authby=$rss[4];
$contype=$rss[5];
$bal=$rss['bal'];
$sr_bill_num=$rss['sr_bill_num'];
$inv_no=$rss['inv_no'];
$Consultant_Name=$rss['Consultant_Name'];
}

 $rest = substr("$custname", 0, 3); 
				if($rest=='RH'){
					//$ctype="Out Patient";
				$res=mysqli_query($link,"Select a.patientname,a.registerno from patientregister a,`op_pat_dlt` b where
				 a.registerno=b.PAT_REGNO and a.registerno='$custname'");
				} else if($customer_type=='p') {
					//$ctype="In Patient";
				$res=mysqli_query($link,"Select a.patientname,a.registerno from patientregister a,`ip_pat_admit` b where a.registerno=b.PAT_REGNO and b.pat_no='$custname'");
				} else {
					//$ctype="In Patient";
				$res=mysqli_query($link,"Select patientname,registerno from patientregister a where registerno='$custname'");
				}


  //$xx=mysql_query("Select a.patientname from patientregister a,`ip_pat_admit` b where a.registerno=b.PAT_REGNO and b.pat_no='$custname'");
				  //$rs1=mysql_query($xx);
				  $r=mysqli_fetch_array($res);
				  $registerno=$r['registerno'];
				  $custname2=$r['patientname'];
				  
				  if($customer_type == "c"){
					  $custname2=$custname;
				  }
		

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title> Pharmacy </title>
<style type="text/css">
.label1{
	font-weight:bold;
}
.heading1{
	font-size:32px;
	text-align:center;
}
.heading2{
	font-size:18px;
	text-align:center;
    
}
.heading3{
	font-size:14px;
	text-align:center;
	font-family: arial;

}
</style>
<script type="text/javascript">
function prnt(){
document.getElementById("prnt").style.display="none";
document.getElementById("cls").style.display="none";
window.print();
window.close();
}
function closew(){
window.close();
}
function printp(){
window.print();
window.close();
}
</script>
<style type="text/css" media="all">
table.table1{
	border-collapse:collapse;
}
table.table1, th.table1, td.table1{
border:1px solid #999999;
}
.cell_left{
	border-right:0px solid #999999;
	border-bottom:1px solid #999999;
}

</style>
</head>


<?php /*?><?php
		  
		  $sql="select *from  pharmacy";
		  $result=mysqli_query($link,$sql) or die(mysqli_error());
		  $i=1;
		  while($row=mysqli_fetch_array($result))
		  {
			  $orgname=$row['orgname'];
		  }
		  ?><?php */?>
          
       

<?php

$res=mysqli_query($link,"select * from  pharmacydetaisl");
while($row = mysqli_fetch_array($res)){
 $HOSP_NAME=$row[1];
$phrno=$row[2];
$ADDR=$row[6];         
$PHONE1=$row[7];   
$PHONE2=$row[8];         
$dlno =$row[3];          
$tin =$row[4]; 
 }

?>
<body style="margin-top:10px; font-style:normal; font-family:Verdana, Geneva, sans-serif;" >
<table style="width:100%"><tr><td style="width:40%">
<div align="left" class="" style="font-size:16px;" >
<b><?php echo $HOSP_NAME; ?></b><br>
<span style="font-size:12px;">
<?php echo $ADDR; ?>
</span>
<span style="font-size:12px;">
<?php echo $PHONE2; ?>
</span>
<?php  $HOSP_NAME ?></div></td><td style="width:100%; float:left;">
                 
                     <div   class="" >DL No1. :TG-18TG/18/01/2016-15317</div>
                     
                        <div  class="" >DL No2. :TG-18TG/18/01/2016-15318</div>
						  <div  class="" >Bill Type: Cash</div>
					</div></td></tr></table>
                    
                    <div align="center"> 
                    <!--<img src="../img/raajtop.png" height="100" width="100%" />
                     <!--<img src="images/logo print.png"  width="50%" height="" />--></div>  
                    
        
	
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><table width="100%" border="0" style="font-size:12px;border-top:1px solid #999999;" cellspacing="4" cellpadding="0">
		<!--<tr height="5px"></tr>
		
		 <tr height="5px"></tr>-->
           
         <tr style=" text-transform: uppercase;">
            <td style="padding-left:0px;" width="25%" align="left"><span class="label1"><!--Receipt No-->MR no</span> : <b><?php echo $registerno ;?></b></td>
            <td width="20%" align="left"> </td>
            <td width="15%" ><div align="left"><span class="label1"></span>   </div></td>
            <td width="10%" align="left"> </td>
             <td width="35%" ><div align="left"><span class="label1"></span> <?php // $lr_id ?><?php //echo $saledate ?> </div></td>
            <td width="20%" align="left"> </td>
          </tr>
         <tr style=" text-transform: uppercase;">
            <td style="padding-left:0px;" width="25%" align="left"><span class="label1"><!--Receipt No-->Patient </span> : <b><?php echo $custname2; ?></b></td>
            <td width="20%" align="left"> </td>
          
         
             <td width="25%" style=" text-transform: uppercase;" ><div align="left"><span class="label1">Inv No.</span> : <?php echo $inv_no; ?><?php //echo $saledate ?> </div></td>
            <td width="20%" align="left"> </td>
          </tr>
         <tr style=" text-transform: uppercase;">
            <td style="padding-left:0px;" width="25%" align="left"><span class="label1"><!--Receipt No-->Doctor</span> : <b><?php echo $Consultant_Name; ?></b></td>
            <td width="20%" align="left"> </td>

         
             <td width="25%" ><div align="left"><span class="label1"> Inv Date</span>: <?php // $lr_id ?><?php echo date('d/m/Y',strtotime($saledate)); ?> </div></td>
            <td width="20%" align="left"> </td>
          </tr>
		 <tr><td colspan="6"><hr /></td></tr><tr>
		  
		  
          <tr>
            <td colspan="8"><table width="100%" border="0" align="center" cellpadding="4" cellspacing="0" style="border:0px solid #999999;background:#FFFFFF">
              <tr class="label1">
                <td width="50" align="left" style="border-bottom:1px solid #999999;background:#FFFFFF">S No. </td>
                
                <td width="185" align="left" style="border-bottom:1px solid #999999;background:#FFFFFF">Product Name</td>
                <td width="55" align="left" style="border-bottom:1px solid #999999;background:#FFFFFF">Batch No.</td>
         <td width="65" align="left" style="border-bottom:1px solid #999999;background:#FFFFFF">EXP. dt.</td>
				<td width="23" align="left" style="border-bottom:1px solid #999999;background:#FFFFFF">QTY.</td>
				<td width="45" align="left" style="border-bottom:1px solid #999999;background:#FFFFFF">Rate</td>
                  <td width="72" align="left" style="border-bottom:1px solid #999999;background:#FFFFFF">Amount</td>
               <!-- <td width="45" align="left" style="border-bottom:1px solid #999999;background:#FFFFFF">S-GST</td>
                <td width="45" align="left" style="border-bottom:1px solid #999999;background:#FFFFFF">C-GST</td>-->
              
              </tr>
                    
			  <?php
			  $nn=0;
			  $tot=0;
			  $discount=0;
			  $price=0;
			  
			    $sa="select a.product_code,b.product_name,b.batch_no,b.mfg_date,b.exp_date,a.u_qty,a.u_rate,a.value,c.discount,c.total,a.disc,a.total,d.TYPE,a.gst,a.total as tt,d.mani_by,
				c.spl_dis,c.final_amnt,c.income_dis_amnt,c.adjust,c.round from phr_salent_dtl as a,
			  phr_purinv_dtl as b,phr_salent_mast as c,`phr_prddetails_mast` as d where a.inv_id=b.inv_id and a.lr_no=c.lr_no and a.lr_no='$lr_id' and b.inv_id=d.id";
			  $res1=mysqli_query($link,$sa);
			  while($row1 = mysqli_fetch_array($res1))
				{
				
				$discount=$row1[8];
				$tot=$row1[9];
				$price=($price+$row1[7]);
				$disc=$row1['disc'];
				$u_rate=$row1['u_rate'];
				$spl_dis=$row1['spl_dis'];
				$final_amnt=$row1['final_amnt'];
				$income_dis_amnt=$row1['income_dis_amnt'];
				$adjust=$row1['adjust'];
				$round=$row1['round'];
				
					$nn++;	  
				
			?>
              <tr >
                 <tr >
                <td align="left"><?php echo $nn; ?>)</td>
              
                <td align="left" style="text-transform:uppercase"><?php echo $row1[1] ?></td>
                <td align="left"><?php echo $row1[2] ?></td>
		<td align="left"><?php echo date('m-Y',strtotime($row1[4])) ?></td>
		<td align="left"><?php echo $qty=$row1[5] ?></td>
                <td align="left"><?php echo $rt=$row1[6] ; $tx=$rt*$qty?></td>
                <td align="left"><?php echo $amt=$row1[11] ?></td>
		<?php /*?><td align="left"><?php echo $row1[7] ?></td><?php */?>
                <!--<td align="left">
				 </td>
                 <td align="left"></td>-->
		<?php  $tt=$row1['tt']; $gst=$row1['gst'];  $gst_amt1=$tt*$gst/100;
				 $gst_amt=$gst_amt1/2;?><?php  $gst/2?>
				<?php //echo $gst_amt; ?><?php //echo $gst/2?>
				
				<?php if($gst=='0'){ $ntx=$amt; }?>
					<?php if($gst=='5'){ $ntx1=$amt-$gst_amt; $gmat=0; } else {$ntx1=0; $gmat=0; }?>
					<?php if($gst=='12'){ $ntx2=$amt-$gst_amt; $gamt1=$gst_amt1; }  else {$ntx2=0; $gamt1=0; }?>
					<?php if($gst=='18'){ $ntx3=$amt-$gst_amt; $gamt2=$gst_amt1; }  else {$ntx3=0; $gamt2=0; }?>
					<?php if($gst=='28'){ $ntx4=$amt-$gst_amt; $gamt3=$gst_amt1; }  else {$ntx4=0; $gamt3=0; }?>
					<?php  $sp_dis1=($u_rate*$qty);  $sp_dis=$sp_dis1*$disc/100;
					
					?>
              </tr>
                <?php  
				$nt=$ntx1+$nt;
				$ntk=$ntx2+$ntk;
				$ntkk=$ntx3+$ntkk;
				$ntkkk=$ntx4+$ntkkk;
				
				$gt=$gamt1+$gt;
				$gt1=$gamt2+$gt1;
				$gt2=$gamt3+$gt2;
				$qty1=$qty+$qty1;
				$sp_dis2=$sp_dis+$sp_dis2;
				 $rt1=$tx+$rt1;
				} ?>
            </table></td>
          </tr>
          
          
          <tr><td colspan="3">
          </td><td colspan="3" align="left" >
 
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               
              <strong >Total :</strong> <?php echo $tot ?>
               
               </td></tr>
               
               <tr><td colspan="6"><hr /></td></tr><tr>
               <td colspan="2" align="left" >
 
               
               
              <strong >Total :</strong> <?php echo $tot ?>
               
               </td>
               <td colspan="2" align="left"><strong >Total Paid:</strong><?php echo $t=$tot+$bal ?></td>
               <td colspan="1" align="center"><strong>Balance :</strong><?php echo $variation = str_replace("-", "", $bal); // $bal?></td>
               </tr>
			   <tr><td colspan="6"><br /></td></tr><tr>
			  <tr><td colspan="6" align="left" style=" text-transform: uppercase;">* Please Get Your Medicines checked by your Doctor before use *</td></tr><tr>
               
			      <tr><td colspan="6"><hr /></td></tr><tr>
				  
				  
				  
        
			
			</table>
			
			
			</td></tr>
	
		   
    </table>
	

<div align="center"><input type="button" value="Print" class="butt" id="prnt" onclick="prnt();"/>
 <input type="button" value="Close" class="butt" id="cls" onclick="closew();"/> </div>
</body>
</html>