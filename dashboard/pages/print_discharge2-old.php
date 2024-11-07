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
    min-height: 40.7cm;
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
								
          <input type="button" value="Print" id="prnt" class="styled-button-2" onclick="prnt();"/> <a href="finalbilllis1.php"><input type="button" value="Close" id="cls" class="styled-button-2" onclick="closew();"/></a>
								</div>
<div class="book">
    <div class="page">
        <div class="subpage">
        <?php 
        ob_start();
$crud = new Crud();
$bno = $crud->my_simple_crypt($_REQUEST['id'],'d');
$k="select * from  final_bill_fin where  id='$bno'";
$t = $crud->getData($k);
foreach($t as $key=>$r){
$id1=$r['id'];
$mrno=$r['mrno'];
$patno=$r['patno'];
$pname=$r['pname'];
$relation=$r['relation'];
$age=$r['age'];
$sex=$r['sex'];
$admit1=$r['doa'];
$admit=date('Y-m-d',strtotime($admit1));
$discharge1=$r['dichargedate'];
$discharge=date('Y-m-d',strtotime($discharge1));
$surgery1=$r['surgery'];
$surgery=date('Y-m-d',strtotime($surgery1));
$ward=$r['ward'];
$addr=$r['address'];
$doctor=$r['doctors'];

$bill=$r['bno'];
$mobile=$r['mobile'];
$tot_hosp_amnt=$r['tot_hosp_amnt'];
$hosp_paid_amnt=$r['hosp_paid_amnt'];
$hosp_bal_amnt=$r['hosp_bal_amnt'];
$tot_doct_amnt=$r['tot_doct_amnt'];
$tot_doct_paid=$r['tot_doct_paid'];
$tot_doct_bal=$r['tot_doct_bal'];
   $tot_lab_amnt=$r['tot_lab_amnt'];
   $lab_paid_amnt=$r['lab_paid_amnt'];
   $lab_bal_amnt=$r['lab_bal_amnt'];
   
   $tot_pharma_amnt=$r['tot_pharma_amnt'];
   $pharma_paid=$r['pharma_paid'];
   $pharma_bal=$r['pharma_bal'];
   
      $total=$r['total'];
   $paid=$r['paid'];
   $due=$r['due'];
    $concession=$r['concession'];
   $namount=$r['namount'];  
			}?>

<hr/>
        <table    border="0" width="100%"  cellspacing="10" style="font-size:16px;">
		       <!--<tr>
<td><strong>Bill No</strong>  : <?php echo $bill;  ?></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><strong></strong>  </td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><strong></strong>  <?php //echo $pname;  ?> </td>
</tr>-->
        <tr><td style="width:33%"><strong>Bill No</strong>  : <?php echo $bill;  ?>

<!--Pat No</strong> : <?php echo $patno;  ?>--> </td>
<td style="width:33%"><strong>UMR No</strong>  : <?php echo $mrno;  ?></td>

<td style="width:33%"><strong>Pt.Name</strong> : <?php echo $pname;  ?> </td>
</tr>

<tr>
<td><strong>Contact</strong> : <?php echo $mobile;  ?></td>

<td><strong>Age/Gender </strong>: <?php  echo $age."/". $sex."&nbsp;&nbsp;";?></td>
<td><strong>Consult Dr. Name</strong>  : <?php echo $doctor;  ?></td>
</tr>

<tr>
<td><strong>Admit Date</strong>  : <?php echo $admit;  ?></td>
<td><strong>Dicharge Date</strong>  : <?php echo $discharge;  ?></td>
<td><strong>Address</strong>  : <?php echo $addr;  ?></td>
</tr>
<tr>

</tr>
</table>
<hr/>
<h3 align="center">FINAL BILL DETAILS</h3>
 
                                                   <table  width="100%" cellpadding="5px"  border="0" width="100%" style="overflow: wrap" >
												   <tr>
												   <td><b>Description</b></td>
												   <td><b>Days</b></td>
												   <td><b>Charge</b></td>
												   <td><b>Amount</b></td>
												   </tr>
												   <?php 
												   
												   $crud = new Crud();
$bno = $crud->my_simple_crypt($_REQUEST['id'],'d');
$k="select * from  final_bill_genral where  id1='$bno' and days>=1";
$t = $crud->getData($k);
foreach($t as $key=>$y){
												   
												?>
												   <tr>
												   <td>
												   <?php echo $y['desc1'];?>
												   
												  </td>
												   <td> <?php echo $y['days'];?></td>
												   <td> <?php echo $y['charge'];?></td>
												   <td> <?php echo $y['amnt'];?></td>
												    
												   </tr>
												   <?php }?>
												
												   
												 <?php 
												   
												   $crud = new Crud();
$bno = $crud->my_simple_crypt($_REQUEST['id'],'d');
$k="select * from  final_doctor where  id1='$bno' and dname!=''";
$t = $crud->getData($k);
foreach($t as $key=>$s){
												   
												?>  
												<tr>
												   <td>
												   <?php echo $s['dname'];?>
												   
												  </td>
												   <td> <?php echo $s['days'];?></td>
												   <td> <?php echo $s['amnt'];?></td>
												   <td> <?php echo $s['total'];?></td>
												    
												   </tr>
												   <?php }?>   
												   <tr><td colspan="4"><br /></td></tr>
												    <tr><td colspan="2" align="right"><b>Total Hospital Amount </b> </td><td>:</td>
													<td colspan="1" ><b><?php echo $tot_hosp_amnt+$tot_doct_amnt ?></b></td> </tr>
                                                <tr><td colspan="4">

 <hr/></td></tr>
												   </table>
												  
 

 
 
 
 <!--
 <tr><td colspan="3">
 <hr/>
<h3 align="center">DOCTOR DETAILS</h3>
                                                   <table  width="100%">
												   <tr>
												   <th>Dr.Name</th>
												   <th>No of Days Visit</th>
												   <th>Amount</th>
												   <th>Total</th>
												   </tr>
												   
												   
												   </table>
                                                
 
 </td></tr>
 -->
 
 
 

 

												   <?php 
												   $crud = new Crud();
//$bno = $crud->my_simple_crypt($_REQUEST['id'],'d');
  $k="select * from  bill where mrno='$mrno' and 	bdate between  '$admit' and '$discharge'";
  $t1 = $crud->getData($k);
  if(sizeof($t1)>0)
  { ?>
  <h3 align="center">LAB DETAILS</h3>
                                                   <table  width="100%" cellpadding="5px"  border="0" width="100%" style="overflow: wrap" >
												   <tr>
												   <td><b>Test Name</b></td>
									
												   <td><b>Amount</b></td>
												
												   </tr>
  <?php

foreach($t1 as $key=>$e1){
	 $billno=$e1['billno'];
}
												   //$crud = new Crud();
//$bno = $crud->my_simple_crypt($_REQUEST['id'],'d');
  $k1="select * from  bill1 where  bno='$billno'";
$t = $crud->getData($k1);
foreach($t as $key=>$e){
												   
											?>
												   <tr>
												   <td>
												   <?php echo $e['testname'];?>
												   
												  </td>
												
												   <td> <?php echo $lab=$e['amount'];?></td>
												  
												    
												   </tr>
												   <?php $tot_lab_amnt1=$lab+$tot_lab_amnt1;} ?>
												      <tr><td colspan="2"><br /></td></tr>
												  <tr> <td align="right"><b>Total Lab Amount :</b></td><td><b> <?php echo $tot_lab_amnt1 ?></b></td></tr>
												  

<tr><td colspan="2">

 <hr/></td></tr>
												  </table>
                                                
 

 
 
 

 
 


<?php } ?>
												   <?php 
												   $crud = new Crud();
//$bno = $crud->my_simple_crypt($_REQUEST['id'],'d');
  $k="select * from  bill_proc where mrno='$mrno' and 	bdate between  '$admit' and '$discharge'";
  $t1 = $crud->getData($k);
  if(sizeof($t1)>0)
  {
      ?>
      <h3 align="center">PROCEDURE DETAILS</h3>
                                                   <table  width="100%" cellpadding="5px"  border="0" width="100%" style="overflow: wrap" >
												   <tr>
												   <td><b>Test Name</b></td>
									
												   <td ><b>Amount</b></td>
												
												   </tr>
      <?php

foreach($t1 as $key=>$e1){
	 $billno=$e1['billno'];
}
												   //$crud = new Crud();
//$bno = $crud->my_simple_crypt($_REQUEST['id'],'d');
 $k1="select * from  bill1_proc where  bno='$billno'";
$t = $crud->getData($k1);
foreach($t as $key=>$e){
												   
											?>
												   <tr>
												   <td>
												   <?php echo $e['testname'];?>
												   
												  </td>
												
												   <td> <?php echo $labk=$e['amount'];?></td>
												  
												    
												   </tr>
												   <?php $tot_lab_amnt2=$labk+$tot_lab_amnt2;} ?>
												      <tr><td colspan="2"><br /></td></tr>
												  <tr> <td align="right"><b>Total Procedure Amount :</b></td><td><b> <?php echo $tot_lab_amnt2 ?></b></td></tr>
												 
<tr><td colspan="2">

 <hr/></td></tr>
												 </table>
                                                
 


 <?php } ?>
 
 

 

												   <?php 
												   
												   $crud = new Crud();
												   
												   
												 
												   
												   
												   
//$bno = $crud->my_simple_crypt($_REQUEST['id'],'d');
 $k="select * from  phr_salent_mast where mrnum='$mrno' and SAL_DATE between '$admit' and '$discharge'";
$t1 = $crud->getData($k);
if(sizeof($t1)>0)
{ ?>
<h3 align="center">PHARMACY DETAILS</h3>
                                                   <table    cellpadding="5px"  border="0" width="100%" style="overflow: wrap">
												   <tr>
												   <tr>
												   <td><b>Product Name</b></td>
												   <td><b>QTY</b></td>
												   <td><b>Rate</b></td>
												   <td><b>Amount</b></td>
												   </tr>
<?php
foreach($t1 as $key=>$y1){
	 $id1=$y1['LR_NO'];
}
		



 $a=" select a.product_code,b.product_name,b.batch_no,b.mfg_date,b.exp_date,a.u_qty,a.u_rate,a.value,c.discount,c.total,a.disc,a.total,d.TYPE,a.gst,a.total as tt,d.mani_by,
				c.spl_dis,c.final_amnt,c.income_dis_amnt,c.adjust,c.round from phr_salent_dtl as a,
			  phr_purinv_dtl as b,phr_salent_mast as c,`phr_prddetails_mast` as d where a.inv_id=b.inv_id and a.lr_no=c.lr_no and a.lr_no='$id1' and b.inv_id=d.id";
												   



		$crud = new Crud();
//$bno = $crud->my_simple_crypt($_REQUEST['id'],'d');
 //$kg="select * from  phr_salent_dtl where LR_NO='$id1'";
$t1g = $crud->getData($a);
foreach($t1g as $key=>$y112){
	
	//echo $inv_id=$y112['inv_id'];
	
	//$crud = new Crud();

//echo $k3="select * from  phr_prddetails_mast where id='$inv_id'";
//$t11 = $crud->getData($k3);
//foreach($t11 as $key=>$y11){
	//$id1=$y1['id'];
								   
												?>
												   <tr>
												   <td>
												   <?php echo $y112['product_name'];?>
												   
												  </td>
												   <td> <?php echo $y112['u_qty'];?></td>
												   <td> <?php echo $y112['u_rate'];?></td>
												   <td> <?php echo $tot_pharma_amnt=$y112['value'];?></td>
												    
												   </tr>
<?php $tot_pharma_amnt1=$tot_pharma_amnt+$tot_pharma_amnt1;}?>
												   <tr><td colspan="4"><br /></td></tr>
												    <tr><td colspan="2" align="right"><b>Total Pharmacy Amount </b> </td><td>:</td>
													<td colspan="1" ><b><?php echo $tot_pharma_amnt1;?></b></td> </tr>
                                                
												   <tr><td colspan="4">

 <hr/></td></tr>
												   </table>
                                                


        <?php } ?>
		<table cellpadding="0px"  border="0" width="100%" style="overflow: wrap">
       <!-- <tr>
        <td></td>

        <td><b>Advance Amount :</b> <?php echo $hosp_paid_amnt; ?></td>
        <td><b>Bal Amount :</b>  <?php echo $hosp_bal_amnt; ?></td>
    
       </tr>
	  
	   
	    <tr>
        <td><b>Total Doctor Amount :</b> <?php echo $tot_doct_amnt ?></td>

        <td><b>Advance Amount :</b> <?php echo $tot_doct_paid; ?></td>
        <td><b>Bal Amount :</b>  <?php echo $tot_doct_bal; ?></th>
    
       </tr>
	    <tr>
        <td><b>Total Lab Amount :</b> <?php echo $tot_lab_amnt ?></td>

        <td><b>Advance Amount :</b> <?php echo $lab_paid_amnt; ?></td>
        <td><b>Bal Amount :</b>  <?php echo $lab_bal_amnt; ?></th>
    
       </tr>
	   <tr>
        <td><b>Total Pharmacy Amount :</b> <?php echo $tot_pharma_amnt ?></td>

        <td><b>Advance Amount :</b> <?php echo $pharma_paid; ?></td>
        <td><b>Bal Amount :</b>  <?php echo $pharma_bal; ?></th>
    
       </tr>-->
	   
	   
	   <tr>
        <td>&nbsp;</td>

        <td align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td  align="center"><b>Total :</b>  <?php echo $total; ?></td>
    
       </tr>
	   
	   <tr><td colspan="3"><br></td></tr>
	   
	    <tr>
        <td>&nbsp;</td>

        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td align="center"><b>Concession :</b>  <?php echo $concession; ?></td>
    
       </tr>
	 <tr><td colspan="3"><br></td></tr>
		 <tr>
        <td>&nbsp;</td>

        <td>&nbsp;</td>
        <td align="center"><b>Net Amount  :</b>  <?php echo $namount; ?></td>
    
       </tr>
		 
		 <tr><td colspan="3"><br></td></tr>
		 <tr>
        <td>&nbsp;</td>

        <td>&nbsp;</td>
        <td align="center"><b>Total Paid Amount  :</b>  <?php echo $namount; ?></td>
    
       </tr>
	    <tr><td colspan="3"><br></td></tr>
		 <tr>
        <td>&nbsp;</td>

        <td>&nbsp;</td>
        <td align="center"><b>Total Due :</b>  <?php echo '0'; ?></td>
    
       </tr>
	   
        
        
        </table>
        
        </td>
         
        
        </tr>
         
        </table>
		
		 
        
        
              
       
        
        </div> 
        </div>   
       
    </div>
    
</div>
<?php
    
    $body=ob_get_clean();
$body=iconv("UTF-8","UTF-8//IGNORE",$body);

include('mpdf/mpdf.php');
$mpdf=new \mPDF('c','A4','','',20,20,40,20,20,40);
$mpdf->writeHTML($body);
$mpdf->Output('demo123check.pdf','F');
	
		print "<script>";
	print "self.location='demo123check.pdf';";
	print "</script>";
	
 
?>
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