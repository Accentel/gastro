<?php
session_start();
 $ses= $_SESSION['user'] ;
 if($_SESSION['user'])

{
 ?>
<?php include("header1.php");
//include('../db/connection.php');

$res = mysqli_query($link,"select max(SUP_ID) FROM phr_supplier_mast");
	IF($res)
	{
		$row = mysqli_fetch_array($res);
		$sid = $row[0];	
	}
?>



<?php


$lr_id=$_REQUEST['id'];
$sql = mysqli_query($link,"select a.suppl_code,b.suppl_name,b.addr1,pur_type,suppl_inv_no,inv_date,rec_by,total,rec_date,grn,b.city,lr_no,a.paid,a.bal,a.adjust,a.round from phr_purinv_mast as a,phr_supplier_mast as b where lr_no='$lr_id' and a.suppl_code=b.suppl_code");
if($sql){
$row = mysqli_fetch_array($sql);

$suppl_code=$row[0];
$suppl_name=$row[1];
$address=$row[2];
$pur_type=$row[3];
$invno=$row[4];
$invdt=date('Y-m-d',strtotime($row[5]));
$recby=$row[6];
 $total=$row[7];
$recdt=date('Y-m-d',strtotime($row[8]));
$gr_no=$row[9];
$city=$row[10];
$lr_no=$row[11];
 $paid=$row['paid'];
$bal=$row['bal'];
$adjust=$row['adjust'];
$round=$row['round'];

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

$sql1 = mysqli_query($link,"select product_code,product_name,packing_type,batch_no,mrp,exp_date,s_qty,s_free,s_rate,discount,value,vat,vat_amt,mfg_date,noitems,cost,manu_by,inv_id,sgst,cgst,tqty,each_pur_rate,each_mrp_rate from phr_purinv_dtl where lr_no='$lr_id'");
 
?>

<link rel="stylesheet" href="../css/all1.css" type="text/css" /> 


<script type="text/javascript">
function test(){
    alert('hi');
}
function calkdyn(i)
{
	var sqty1=document.getElementById('sqtyo'+i).value ;
	//alert(sqty1);
	var noi1=document.getElementById('noio'+i).value ;
	document.getElementById('tqtyo'+i).value =sqty1*noi1;
	
}


function mrp(i)
{
	var sqty1=document.getElementById('mrpo'+i).value ;
	//alert(sqty1);
	var noi1=document.getElementById('noio'+i).value ;
	var t=eval(sqty1)/noi1
	document.getElementById('mrp_tabo'+i).value =t;
	
	
}

function calkdyn1(i)
{
	var sqty1=document.getElementById('srateo'+i).value ;

	var no=document.getElementById('noio'+i).value ;
	var noi1=document.getElementById('sqtyo'+i).value ;
	var tqty=document.getElementById('tqtyo'+i).value;
	var sfree=document.getElementById('sfreeo'+i).value;
	var mrpo=document.getElementById('mrpo'+i).value;
	var vato=document.getElementById('vat'+i).value;
	
	sf1=eval(noi1)+eval(sfree);

	sf2=sf1*no;
	//alert(sf2);
	var p=sqty1*noi1;
	sf3=p/sf2;
//	alert(sf3);
	p1=p/tqty;
	emrp=mrpo/no;
	vatamt=(p*vato)/100;
	vat=vatamt/2;
		//alert(vatamt);
	
	document.getElementById('sal_tabo'+i).value =p1;
	document.getElementById('valueo'+i).value =p;
	document.getElementById('sal_ftabo'+i).value =sf3;
		document.getElementById('mrp_tabo'+i).value =emrp;
	document.getElementById('sgsto'+i).value =vat;
	document.getElementById('cgsto'+i).value =vat;
	document.getElementById('vatamto'+i).value =vatamt;
	
	calculateSum();
		calculateSum1();
			calculateSum2();
			
				calculateSum3();
}

function calk()
{
	var sqty1=document.getElementById('sqty10').value ;
	//alert(sqty1);
	var noi1=document.getElementById('noi10').value ;
	document.getElementById('tqty10').value =sqty1*noi1;
	
}

function calk1()
{
	var sqty1=document.getElementById('sqty11').value ;
	//alert(sqty1);
	var noi1=document.getElementById('noi11').value ;
	document.getElementById('tqty11').value =sqty1*noi1;
	
}

function calk2()
{
	var sqty1=document.getElementById('sqty12').value ;
	//alert(sqty1);
	var noi1=document.getElementById('noi12').value ;
	document.getElementById('tqty12').value =sqty1*noi1;
	
}
function calk3()
{
	var sqty1=document.getElementById('sqty13').value ;
	//alert(sqty1);
	var noi1=document.getElementById('noi13').value ;
	document.getElementById('tqty13').value =sqty1*noi1;
	
}
function calk4()
{
	var sqty1=document.getElementById('sqty14').value ;
	//alert(sqty1);
	var noi1=document.getElementById('noi14').value ;
	document.getElementById('tqty14').value =sqty1*noi1;
	
}

function calp()
{
	var sqty1=document.getElementById('srate10').value ;
	var noi1=document.getElementById('noi10').value ;
	document.getElementById('sal_tab10').value =sqty1/noi1;	
}
function calpdyn(i)
{
    alert(i);
    var sqty1=document.getElementById('srateo'+i).value ;
    
	var noi1=document.getElementById('noio'+i).value ;
	document.getElementById('sal_tabo'+i).value =sqty1/noi1;	
}
function calp()
{
	var sqty1=document.getElementById('srate10').value ;
	var noi1=document.getElementById('noi10').value ;
	document.getElementById('sal_tab10').value =sqty1/noi1;	
}
function calp1()
{
	var sqty1=document.getElementById('srate11').value ;
	var noi1=document.getElementById('noi11').value ;
	document.getElementById('sal_tab11').value =sqty1/noi1;	
}
function calp2()
{
	var sqty1=document.getElementById('srate12').value ;
	var noi1=document.getElementById('noi12').value ;
	document.getElementById('sal_tab12').value =sqty1/noi1;	
}
function calp3()
{
	var sqty1=document.getElementById('srate13').value ;
	var noi1=document.getElementById('noi13').value ;
	document.getElementById('sal_tab13').value =sqty1/noi1;	
}
function calp4()
{
	var sqty1=document.getElementById('srate14').value ;
	var noi1=document.getElementById('noi14').value ;
	document.getElementById('sal_tab14').value =sqty1/noi1;	
}
function calmdyn(i)
{
	var sqty1=document.getElementById('mrpo'+i).value ;
	var noi1=document.getElementById('noi'+i).value ;
	document.getElementById('mrp_tabo'+i).value =sqty1/noi1;	
}
function calm()
{
	var sqty1=document.getElementById('mrp10').value ;
	var noi1=document.getElementById('noi10').value ;
	document.getElementById('mrp_tab10').value =sqty1/noi1;	
}
function calm1()
{
	var sqty1=document.getElementById('mrp11').value ;
	var noi1=document.getElementById('noi11').value ;
	document.getElementById('mrp_tab11').value =sqty1/noi1;	
}
function calm2()
{
	var sqty1=document.getElementById('mrp12').value ;
	var noi1=document.getElementById('noi12').value ;
	document.getElementById('mrp_tab12').value =sqty1/noi1;	
}
function calm3()
{
	var sqty1=document.getElementById('mrp13').value ;
	var noi1=document.getElementById('noi13').value ;
	document.getElementById('mrp_tab13').value =sqty1/noi1;	
}
function calm4()
{
	var sqty1=document.getElementById('mrp14').value ;
	var noi1=document.getElementById('noi14').value ;
	document.getElementById('mrp_tab14').value =sqty1/noi1;	
}
</script>
<script>
    
    $(document).ready (function(){ 
$(".txt").each(function(){
$(this).keyup(function(){
calculateSum()
;})
});

$(".txt1").each(function(){
$(this).keyup(function(){
calculateSum1()
;})
});


$(".txt2").each(function(){
$(this).keyup(function(){
calculateSum2()
;})
});

$(".vatamt").each(function(){
$(this).keyup(function(){
calculateSum3()
;})
});


});
function calculateSum(){
var sum=0;
$(".txt").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value)
;}});
$("#total").val(sum.toFixed(2));
var tt=document.getElementById('total').value;
var tv=document.getElementById('vatadd').value;
var t=eval(tt)+eval(tv)
$("#nettot").val(t.toFixed(2));
$("#gtot").val(t.toFixed(2));
$("#bal").val(t.toFixed(2))

;}

function calculateSum3(){
var sum=0;
$(".vatamt").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value)
;}});
$("#vatadd").val(sum.toFixed(2));
//$("#namount").val(sum.toFixed(2));
//$("#balamount").val(sum.toFixed(2))

;}

function calculateSum1(){
var sum=0;
$(".txt1").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value)
;}});
$("#vat_12").val(sum.toFixed(2));
//$("#namount").val(sum.toFixed(2));
//$("#balamount").val(sum.toFixed(2))

;}

function calculateSum2(){
var sum=0;
$(".txt2").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value)
;}});
$("#vat_4").val(sum.toFixed(2));
//$("#namount").val(sum.toFixed(2));
//$("#balamount").val(sum.toFixed(2))

;}
</script>

<script type="text/javascript">

function isNum(value)
{
    return 123;
}

function calcTotals()
{
    var grandTotal = 0;
	var grandTotal1 = 0;
	var grandTotal2 = 0;
	var tt = 0; 
    var row = 0;
	var items=0;
    while (document.forms['form'].elements['sqty[]'][row])
    {
        rateObj = document.forms['form'].elements['sqty[]'][row];
        qtyObj   = document.forms['form'].elements['srate[]'][row];
        totalObj = document.forms['form'].elements['value[]'][row];
			sgst = document.forms['form'].elements['sgst[]'][row];
		cgst = document.forms['form'].elements['cgst[]'][row];
		vt   = document.forms['form'].elements['vat[]'][row];
		//tqtyobj   = document.forms['form'].elements['tqty[]'][row];
		//noiobj   = document.forms['form'].elements['noi[]'][row];
		
		
//alert(totObj);
        if (isNaN(rateObj.value))
        {
		
            rateObj = '';
        }
        if (isNaN(qtyObj.value))
        {
            qtyObj = '';
        }

		
	
		
		
       
		
        if (rateObj.value && qtyObj.value)
        {
		
            totalObj.value = (parseFloat(rateObj.value) * parseFloat(qtyObj.value));

			//each.value=( parseFloat(totalObj.value)/parseFloat(tqty.value));
            grandTotal = grandTotal + parseFloat(totalObj.value);
			
			sgst.value= (parseFloat(rateObj.value) * parseFloat(qtyObj.value)*parseFloat(vt.value)/100)/2;
			cgst.value= (parseFloat(rateObj.value) * parseFloat(qtyObj.value)*parseFloat(vt.value)/100)/2;
			// document.forms['form'].elements['sgst[]'][row]=vatamt;
			//alert(vatamt);
			
			items++;
        }
        else
        {
            totalObj.value = '';
        }
		
		
		sgst=rateObj*qtyObj*vt/100;
		cgst=rateObj*qtyObj*vt/100;
		
		
		//alert(sgst);
		
		//each = document.forms['form'].elements['mrp_tab[]'][row];
		rateObj1 = document.forms['form'].elements['value[]'][row];
        qtyObj1   = document.forms['form'].elements['vat[]'][row];
		totalObj1   = document.forms['form'].elements['vatamt[]'][row];
			
		vatamt = document.forms['form'].elements['cgst[]'][row];
	
		if (isNaN(rateObj1.value))
        {
            rateObj1 = '';
        }
        if (isNaN(qtyObj1.value))
        {
            qtyObj1 = '';
        }
		
		if(rateObj1.value && qtyObj1.value){
		//alert( qtyObj1.value)
			totalObj1.value = (parseFloat(rateObj1.value) * (parseFloat(qtyObj1.value)/100));
			//totalObjx.value=totalObj1.value/2;
			
			grandTotal1 = grandTotal1 + parseFloat(totalObj1.value);
			x=(parseFloat(totalObj1.value)/2);
			//tt=tt+parseFloat(totalObj1.value);
			/*if(qtyObj1.value == "5.00"){
	document.getElementById('vat_4').value = tt+parseFloat(totalObj1.value);
	} if(qtyObj1.value=='14.50'){
	document.getElementById('vat_12').value = tt+parseFloat(totalObj1.value);
	}
	 if(qtyObj1.value=='15.00')
	{
	document.getElementById('vat_14').value = tt+parseFloat(totalObj1.value);
	}
			*/
			//alert(totalObj1);
		}
		
		
		/*rateObj2 = document.forms['form'].elements['amount[]'][row];
        qtyObj2   = document.forms['form'].elements['ltax[]'][row];
		
		if (isNaN(rateObj2.value))
        {
            rateObj2 = '';
        }
        if (isNaN(qtyObj2.value))
        {
            qtyObj2 = '';
        }
		
		if(rateObj2.value && qtyObj2.value){
			totalObj2 = (parseFloat(rateObj2.value) * (parseFloat(qtyObj2.value)/100));
			grandTotal2 = grandTotal2 + parseFloat(totalObj2);
		}*/
		
		
			document.getElementById('vatadd').value = grandTotal1;
			
			document.getElementById('vat_12').value = grandTotal1/2;
			document.getElementById('vat_4').value = grandTotal1/2;
			
			
			
			//document.getElementById('sgst').value = x.value;
			//document.getElementById('cgst').value = x.value;
			
			
        row++;
    }
   // document.getElementById('tamount').value = grandTotal;
	var st=document.getElementById('total').value = grandTotal;
	
//document.getElementById('discad').value=grandTotal2;
	//vat nn=st-dis;
	document.getElementById('vatadd').value=grandTotal1;
	
	
		document.getElementById('nettot').value=grandTotal+grandTotal1;
		//document.getElementById('nettot').value=grandTotal;
		
		
		//document.getElementById('nettot1').value=grandTotal+grandTotal1-grandTotal2;
		//document.getElementById('gtot').value=grandTotal+grandTotal1-grandTotal2;
		
	//document.getElementById('vattotal').value = grandTotal2;
	//var net = grandTotal+grandTotal1+grandTotal2;
	
	//document.getElementById('netamount').value = net;
	//var discount=document.getElementById('discount').value;
	//d=net-discount;
	//var net1=document.getElementById('netamount1').value;
	//document.getElementById('netamount1').value = d;
	//var f=d;
	//document.getElementById('paid').value = f;
	document.getElementById('nitem').value = items;
    return;
}



</script>
 
 <script type="text/javascript">

function CheckColors(val){

 var element=document.getElementById('color');

 if(val=='B')

   element.style.display='block';
    

 else  

   element.style.display='none';
  

}



</script>
			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content1">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Edit Purchase Invoice</div>
								
							
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="purchase_invoice_list.php">Purchase Invoice List</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Edit Purchase Invoice</li>
                            </ol>
                        </div>
                    </div>
				<?php 	
				
				 $a="select max(lr_no) from phr_purinv_mast";
				$sql = mysqli_query($link,$a);
if($sql)
{
	$row = mysqli_fetch_array($sql);
	$pnid = $row[0];
}
		?>			
					
					
					
					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Purchase Invoice</header>
                                    <button id = "panel-button3" 
				                           class = "mdl-button mdl-js-button mdl-button--icon pull-right" 
				                           data-upgraded = ",MaterialButton">
				                           <i class = "material-icons">more_vert</i>
				                        </button>
				                        <!--<ul class = "mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
				                           data-mdl-for = "panel-button3">
				                           <li class = "mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>
				                           <li class = "mdl-menu__item"><i class="material-icons">print</i>Another action</li>
				                           <li class = "mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>
				                        </ul>-->
                                </div>
								
								 <form name="form" method="post" action="insert_purchase_invoice1.php" >
                                <div class="card-body " id="bar-parent2">
                                	<div class="row">
	                                    <div class="col-md-6 col-sm-6">
	                                        <!-- text input -->
	                                        <div class="form-group">
	                                            <label>Supplier Code</label>
	                                           <!-- <input type="text" class="form-control" name="supcode"   required="required" readonly id="supcode" >-->
											   <input name="supcode" type="text" required="required" value="<?php echo $suppl_code ?>" class="form-control"  onclick="window.open('purchase_inv_popup.php','mypatwindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')" id="supcode"/>
				
												 <input type="hidden" name="authby" value="<?php echo $aname ?>" />
		  <input type="hidden" name="lrno" value="<?php echo $lr_no ?>" />
	                                        </div>
											
										<div class="form-group">
	                                            <label>City</label>
	                                            <input type="text" class="form-control" name="city" value="<?php echo $city ?>" id="city" readonly >
	                                        </div>
											<br/>
											<div class="form-group">
                                            <label>GRN NO:</label>
                                            <input type="text" class="form-control" required name="grnno" readonly id="grnno" value="<?php echo $gr_no ?>"  readonly="readonly"/> 
									   </div>
											<div class="form-group">
	                                            <label>Invoice No.</label>
	                                            <input type="text" class="form-control" name="invno" value="<?php echo $invno ?>" required="required" id="invno" >
	                                        </div>
										
											
											
												<div class="form-group">
	                                            <label>Received Date</label>
	                                            <input type="date"   value="<?php echo $recdt ?>" class="form-control" required name="recdate" id="recdate" >
	                                        </div>
										
											
											
											
											
	                                    </div>
	                                    <div class="col-md-6 col-sm-6">
                                        <!-- textarea -->
										
										
										
                                        <div class="form-group">
                                            <label>Supplier Name</label>
	                                            <input type="text" class="form-control" name="supname" value="<?php echo $suppl_name ?>" required readonly id="supname" >
                                        </div>
										
										<div class="form-group">
                                            <label>Address</label>
                                   <textarea  class="form-control" name="addr" readonly id="addr" ><?php echo $address ?></textarea>
									   </div>
									
                                        
										
										<div class="form-group">
	                                          <br /><br /><br />
	                                        </div>  
										
										
										
										<div class="form-group">
                                            <label>Invoice Date</label>
                                            <input type="date" class="form-control" value="<?php echo $invdt ?>" name="invdate"  id="invdate" >
									   </div>
									  <div class="form-group">
	                                            <label>Purchase Type</label>
										<select name="ptype" class="form-control" required>
										 <option value="<?php echo $pur_type ?>"><?php echo $pur_type ?></option>
									  <option value="Cash">Cash</option>
									  <option value="Card">Card</option></select>
	                                        </div>
                                    </div>
									
                                	</div>
									
									
                                </div>
								<div class="table-scrollable">
								<table id="t1" width="99%">
			<tr><td><div align="right">
              	     <input name="new2" type="button" class="btn btn-info" value=" + " onclick="javascript:Addrow()"/>
            	     <input name="new" type="button" class="btn btn-info" value=" - " onclick="javascript:deleteRow()"/>
            	     </div></td>
            	   
           <tr><td width="100%" align="center"><br />

<div id="purtable" valign="top">

<table><tr><td><strong>Note:</strong>Rate: Rate Should be Strip wise ; </td><td>One Qty means : Each Qty Price.</td></tr></table>
                                      					   <table class="table table-hover table-checkable order-column full-width" border="1" id="TABLE1">
					                                        <thead>
					                                            <tr>
					                                            	<!-- <th width="10%" class="TH1">P.Name </th>     
																		<th width="7%" class="TH1">Mnf.By</th>
																	
																		<th width="7%" class="TH1">Batch.NO</th> 
																		<th width="8%" class="TH1">MFG.Dt</th>
																		<th width="8%" class="TH1">EXP.Dt</th>
																			<th width="7%" class="TH1">Pk.Qty </th>
																		<th width="7%" class="TH1">Qty</th>
																		<th width="7%" class="TH1">TQty</th>
																		<th width="7%" class="TH1">Free</th>
																		<th width="7%" class="TH1">Rate</th>
																		<th width="7%" class="TH1">One Qty</th>
																		<th width="7%" class="TH1">Amount</th>
																		<th width="7%" class="TH1">MRP</th> 
																		<th width="7%" class="TH1">One Qty</th>
																		<th width="7%" class="TH1">SGST</th>
																		<th width="7%" class="TH1">CGST</th>
																		<th width="7%" class="TH1">GST</th>-->
																		
																		
																		
																		
																		 <tr>
  <!-- <th width="7%" class="TH1">P.Code</th>-->
   <th width="10%" class="TH1">P.Name </th>
      <!--<th width="7%" class="TH1">Pack</th>-->
	   <th width="7%" class="TH1">Mnf.By</th>
	    <th width="8%" class="TH1">Batch.NO</th>
		   <th width="9%" class="TH1">MFG.Dt</th>
		     <th width="9%" class="TH1">EXP.Dt</th>
	     <th width="7%" class="TH1">Pk.Qty </th>
  
 

 
   <th width="7%" class="TH1">Qty</th>
   <th width="7%" class="TH1">TQty</th>
   <th width="7%" class="TH1">Free</th>
    <th width="7%" class="TH1">Rate</th>
	<th width="7%" class="TH1">One Qty</th>
   <th width="7%" class="TH1">Amount</th>
   <th width="7%" class="TH1">MRP</th>
   <th width="7%" class="TH1">One_Qty</th>
   <th width="5%" class="TH1">SGST</th>
    <th width="5%" class="TH1">CGST</th>
     <th width="6%" class="TH1">GST</th>
	 
	 
	 
	 
	 
	
					                                              
																		
																	
																	
																			<!--
																		<th width="7%" class="TH1">Rate</th>
																		<th width="7%" class="TH1">One Qty</th>
																		<th width="7%" class="TH1">Amount</th>
																		<th width="7%" class="TH1">MRP</th> 
																		<th width="7%" class="TH1">One Qty</th>
																		<th width="7%" class="TH1">SGST</th>
																		<th width="7%" class="TH1">CGST</th>
																		<th width="7%" class="TH1">GST</th>-->
					                                            </tr>
																<?php
		if($sql1){
		$vat4 = 0;
		$vat14 = 0;
		$vat12 = 0;
		$p = 0;
		$ijkc=1;
		while($row1 = mysqli_fetch_array($sql1))
		 {	
			$pcode=$row1[0];
			$pname=$row1[1];
			$packing=$row1[2];
			$batch=$row1[3];
			$mrp=$row1[4];
			$expdt=date('m-Y',strtotime($row1[5]));
			$sqty=$row1[6];
			$sfree=$row1[7];
			$srate=$row1[8];
			$dis=$row1[9];
			$valu=$row1[10];
			$vat=$row1[11];
			$vat_amt=$row1[12];
			$mfgdt=date('m-Y',strtotime($row1[13]));
			$noi=$row1[14];
			$cst=$row1[15];
			$maniby=$row1[16];
			$invid=$row1[17];
			$sgst=$row1[18];
			$cgst=$row1[19];
			$tqty=$row1['tqty'];
			$each_pur_rate=$row1['each_pur_rate'];
			$each_mrp_rate=$row1['each_mrp_rate'];
			$feach_pur_rate=$row1['feach_pur_rate'];
			//if($vat==5.0){$vat4=($vat4+$vat);}
			$vat4=($vat4+$vat);
			$vat14=($vat14+$vat);
		//if($vat==15.0){$vat14=($vat14+$vat);}
		if($vat==14.5){$vat12=($vat12+$vat);}
		$vatadd=($vatadd+$vat_amt);
		$nit=($nit+$sqty);
			$p = $p+1;
			 ?>
			 <tr> 
 		
		<!-- <td class="TD1"><?php// echo $pcode ?></td>-->
		<td class="TD1">
		    <a href="productdelete.php?id=<?php echo $invid ?>&lrid=<?php echo $lr_id; ?>"><i class="fa fa-trash-o "></i></a>
		    <input type="text" readonly class="form-control" name="pname[]" value="<?php echo $pname ?>" id="pnameo<?php echo $ijkc?>" size="10"/></td>
		<!--<td class="TD1"><?php// echo $packing ?></td>-->
		<td class="TD1"><input type="text" class="form-control" name="maniby[]" value="<?php echo $maniby ?>" id="manibyo<?php echo $ijkc?>" size="10"/></td>
		    <td class="TD1"><input type="text" class="form-control" name="batch[]" value="<?php echo $batch ?>" id="batcho<?php echo $ijkc?>" size="8"/></td>
				<td class="TD1"><input type="text" class="form-control" name="mfgdate[]" value="<?php echo $mfgdt ?>" id="mfgdateo<?php echo $ijkc?>" size="10"/></td>
					<td class="TD1"><input type="text" class="form-control" name="expdate[]" value="<?php echo $expdt ?>" id="expdateo<?php echo $ijkc?>" size="10"/></td>
		<td class="TD1"><input type="text" class="form-control" name="noi[]" value="<?php echo $noi ?>" id="noio<?php echo $ijkc?>" size="4"/></td>
    
	
		<!--<td class="TD1"><input type="text" class="form-control" name="mfgdate[]" value="<?php echo date("d-m-Y"); ?>" id="mfgdate1" size="10"/></td>-->
		
		<!--<input type="hidden" name="mfgdate[]" value="<?php echo date("d-m-Y"); ?>" id="mfgdate1" size="10"/>-->
		
	
		<td class="TD1"><input type="text" class="form-control" name="sqty[]" value="<?php echo $sqty ?>" id="sqtyo<?php echo $ijkc?>" onKeyup="calkdyn(<?php echo $ijkc?>)" onfocus="calkdyn(<?php echo $ijkc?>)" size="4" /></td>
		<td class="TD1"><input type="text" class="form-control" name="tqty[]" value="<?php echo $tqty ?>" id="tqtyo<?php echo $ijkc?>" size="4" /></td>
		
        <td class="TD1"><input type="text" class="form-control" name="sfree[]" value="<?php echo $sfree ?>" id="sfreeo<?php echo $ijkc?>" size="4"/></td>
		 <td class="TD1"><input type="text" class="form-control" name="srate[]"  value="<?php echo $srate ?>" id="srateo<?php echo $ijkc ?>" size="6"   onKeyup="calkdyn1(<?php echo $ijkc?>)"/></td>
		
 <td class="TD1"><input type="text" readonly class="form-control" name="sal_tab[]"  value="<?php echo $each_pur_rate ?>" id="sal_tabo<?php echo $ijkc?>" size="6" onChange="calcTotals()"/>
 <input type="hidden" readonly class="form-control" name="sal_ftab[]"  value="<?php echo $feach_pur_rate ?>" id="sal_ftabo<?php echo $ijkc?>" size="6" />
 </td>
 
		 
        <td class="TD1"><input type="text" readonly class="form-control txt" name="value[]"  value="<?php echo $valu ?>" id="valueo<?php echo $ijkc?>" size="6"/></td>
		<td class="TD1"><input type="text" class="form-control"  name="mrp[]" value="<?php echo $mrp ?>" onKeyup="mrp(<?php echo $ijkc?>)"     id="mrpo<?php echo $ijkc ?>" size="6"/></td>
		
		<td class="TD1"><input type="text" class="form-control" readonly  name="mrp_tab[]" value="<?php echo $each_mrp_rate ?>" id="mrp_tabo<?php echo $ijkc?>" size="6" onkeyup="calmdyn(<?php echo $ijkc?>)"/></td>
	
		<td class="TD1"><input type="text" class="form-control txt1" name="sgst[]" readonly value="<?php echo $sgst ?>" id="sgsto<?php echo $ijkc?>" size="6"/></td>
        	<td class="TD1"><input type="text" class="form-control txt2" name="cgst[]" readonly value="<?php echo $cgst ?>" id="cgsto<?php echo $ijkc?>" size="6"/></td>
            	<td class="TD1"><input type="text" class="form-control" name="vat[]"  value="<?php echo $vat ?>" id="vat<?php echo $ijkc?>" size="6"/>
            	
            	<input type="hidden" name="vatamt[]" value="<?php echo $vat_amt ?>" id="vatamto<?php echo $ijkc?>" class="vatamt" size="6"/>
		<input  type="hidden" name="invid[]" id="invid1" class="textbox" value="<?php echo $invid ?>" size="5" readonly>
            	
            	</td>
		

       
        </tr> <?php
		
		$ijkc++;
		} 
		}?>
					<tr>
		<td class="TD1"><input type="text" class="form-control" name="pname[]" value="" id="pname10" size="10" onclick=window.open('Drug_itemcode_pop.php?rowid=10','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no') readonly/></td>
		<!--<td class="TD1"><?php// echo $packing ?></td>-->
		<td class="TD1"><input type="text" class="form-control" name="maniby[]" value="" id="maniby10" size="10"/></td>
		
		  <td class="TD1"><input type="text" class="form-control" name="batch[]" value="" id="batch10" size="8"/></td>
		  	<td class="TD1"><input type="text" class="form-control" name="mfgdate[]" value="<?php echo date("m-Y"); ?>" id="mfgdate10" size="10"/></td>
			<td class="TD1"><input type="text" class="form-control" name="expdate[]" value="<?php echo date("m-Y"); ?>" id="expdate10" size="10"/></td>
		  <td class="TD1"><input type="text" class="form-control" name="noi[]" value="" id="noio10" size="4"/></td>
      
	
		
		<!--<td class="TD1"><input type="text" class="form-control" name="mfgdate[]" value="<?php echo date("d-m-Y"); ?>" id="mfgdate10" size="10"/></td>-->
		
		<!--<input type="hidden" name="mfgdate[]" value="<?php echo date("d-m-Y"); ?>" id="mfgdate10" size="10"/>-->
		
		
		<td class="TD1"><input type="text" class="form-control" name="sqty[]" value="" id="sqtyo10" size="4" onKeyup="calkdyn(10)" onfocus="calkdyn(10)"/></td>
		<td class="TD1"><input type="text" class="form-control" name="tqty[]" value="" id="tqtyo10" size="4" onChange="calcTotals()"/></td>
        <td class="TD1"><input type="text" class="form-control" name="sfree[]" value="" id="sfreeo10" size="4"/></td>
		
		
		
		 <td class="TD1"><input type="text" class="form-control" name="srate[]"  value="" id="srateo10" size="6" onKeyup="calkdyn1(10)"/>
		 </td>
		 <td class="TD1"><input type="text" class="form-control" name="sal_tab[]"  readonly value="" id="sal_tabo10" size="4"/>
		 <input type="hidden" readonly class="form-control" name="sal_ftab[]"  value="" id="sal_ftabo10" size="6" />
		 </td>
        <td class="TD1"><input type="text" class="form-control txt" name="value[]" readonly value="" id="valueo10" size="6"/></td>
		<td class="TD1"><input type="text" class="form-control" name="mrp[]" value="" id="mrpo10" onKeyup="mrp(10)"  size="6"/></td>
		<td class="TD1"><input type="text" class="form-control" readonly name="mrp_tab[]" id="mrp_tabo10" size="6"/></td>
		<td class="TD1"><input type="text" class="form-control txt1" readonly name="sgst[]" value="" id="sgsto10" size="6"/></td>
        <td class="TD1"><input type="text" class="form-control txt2" readonly name="cgst[]" value="" id="cgsto10" size="6"/></td>
        <td class="TD1"><input type="text" class="form-control" name="vat[]" value="" id="vat10" size="6"/>
        <input type="hidden" name="vatamt[]" class="vatamt" value="" id="vatamto10" size="6"/>
		<input  type="hidden" name="invid[]" id="invid10" class="textbox" value="" size="5" readonly>
        
        </td>
		
		
       
		</tr>
		<tr>
		<td class="TD1"><input type="text" class="form-control" name="pname[]" value="" id="pname11" size="10" onclick=window.open('Drug_itemcode_pop.php?rowid=11','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no') readonly/></td>
		<!--<td class="TD1"><?php// echo $packing ?></td>-->
		<td class="TD1"><input type="text" class="form-control" name="maniby[]" value="" id="maniby11" size="10"/></td>
		<td class="TD1"><input type="text" class="form-control" name="batch[]" value="" id="batch11" size="8"/></td>
		<td class="TD1"><input type="text" class="form-control" name="mfgdate[]" value="<?php echo date("m-Y"); ?>" id="mfgdate11" size="10"/></td>
		<td class="TD1"><input type="text" class="form-control" name="expdate[]" value="<?php echo date("m-Y"); ?>" id="expdate11" size="10"/></td>
		<td class="TD1"><input type="text" class="form-control" name="noi[]" value="" id="noio11" size="4"/></td>
        
	
		
		<!--<td class="TD1"><input type="text" class="form-control" name="mfgdate[]" value="<?php echo date("d-m-Y"); ?>" id="mfgdate11" size="10"/></td>-->
		
			<!--<input type="hidden" name="mfgdate[]" value="<?php echo date("d-m-Y"); ?>" id="mfgdate11" size="10"/>-->
		
		
		<td class="TD1"><input type="text" class="form-control" name="sqty[]" value="" id="sqtyo11" size="4" onKeyup="calkdyn(11)" /></td>
		<td class="TD1"><input type="text" class="form-control" name="tqty[]" value="" id="tqtyo11" size="4" /></td>
        <td class="TD1"><input type="text" class="form-control" name="sfree[]" value="" id="sfreeo11" size="4"/></td>
		
		 <td class="TD1"><input type="text" class="form-control" name="srate[]" value="" id="srateo11" size="6" onKeyup="calkdyn1(11)" onkeyup="calp1()"/></td>
		 <td class="TD1"><input type="text" class="form-control" name="sal_tab[]"  readonly value="" id="sal_tabo11" size="4"/>
		 
		 <input type="hidden" readonly class="form-control" name="sal_ftab[]"  value="" id="sal_ftabo11" size="6" />
		 
		 
		 </td>
        <td class="TD1"><input type="text" class="form-control txt" name="value[]" readonly value="" id="valueo11" size="6"/></td>
		<td class="TD1"><input type="text" class="form-control" name="mrp[]" value="" id="mrpo11" onKeyup="mrp(11)" size="6"/></td>
		<td class="TD1"><input type="text" class="form-control" readonly name="mrp_tab[]" id="mrp_tabo11" onkeyup="calm1()"  size="6"/></td>
        <td class="TD1"><input type="text" class="form-control txt1" name="sgst[]" readonly value="" id="sgsto11" size="6"/></td>
        <td class="TD1"><input type="text" class="form-control txt2" name="cgst[]" readonly value="" id="cgsto11" size="6"/></td>
        <td class="TD1"><input type="text" class="form-control" name="vat[]" value="" id="vat11" size="6"/>
		<input type="hidden" name="vatamt[]" class="vatamt" value="" id="vatamto11" size="6"/>
		<input  type="hidden" name="invid[]" id="invid11" class="textbox" value="" size="5" readonly>
		</td>
       
		</tr>
		<tr>
		<td class="TD1"><input type="text" class="form-control" name="pname[]" value="" id="pname12" size="10" onclick=window.open('Drug_itemcode_pop.php?rowid=12','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no') readonly/></td>
		<!--<td class="TD1"><?php// echo $packing ?></td>-->
		<td class="TD1"><input type="text" class="form-control" name="maniby[]" value="" id="maniby12" size="10"/></td>
		 <td class="TD1"><input type="text" class="form-control" name="batch[]" value="" id="batch12" size="8"/></td>
		 <td class="TD1"><input type="text" class="form-control" name="mfgdate[]" value="<?php echo date("m-Y"); ?>" id="mfgdate12" size="10"/></td>
		 <td class="TD1"><input type="text" class="form-control" name="expdate[]" value="<?php echo date("m-Y"); ?>" id="expdate12" size="10"/></td>
		<td class="TD1"><input type="text" class="form-control" name="noi[]" value="" id="noio12" size="4"/></td>
       
		
		
		<!--<td class="TD1"><input type="text" class="form-control" name="mfgdate[]" value="<?php echo date("d-m-Y"); ?>" id="mfgdate12" size="10"/></td>-->
		
		<!--<input type="hidden" name="mfgdate[]" value="<?php echo date("d-m-Y"); ?>" id="mfgdate12" size="10"/>-->
		
		
		<td class="TD1"><input type="text" class="form-control" name="sqty[]" value="" id="sqtyo12" onKeyup="calkdyn(12)" size="4" /></td>
		<td class="TD1"><input type="text" class="form-control" name="tqty[]" value="" id="tqtyo12" size="4" /></td>
        <td class="TD1"><input type="text" class="form-control" name="sfree[]" value="" id="sfreeo12" size="4"/></td>
		
		 <td class="TD1"><input type="text" class="form-control" name="srate[]" value="" id="srateo12" size="6" onKeyup="calkdyn1(12)" /></td>
		 <td class="TD1"><input type="text" class="form-control" name="sal_tabo[]"  readonly value="" id="sal_tab12" size="4"/>
		 <input type="hidden" readonly class="form-control" name="sal_ftab[]"  value="" id="sal_ftabo12" size="6" />
		 
		 
		 </td>
        <td class="TD1"><input type="text" class="form-control txt" name="value[]" readonly value="" id="valueo12" size="6"/></td>
		<td class="TD1"><input type="text" class="form-control" name="mrp[]" value="" id="mrpo12" onKeyup="mrp(12)"  size="6"/></td>
		<td class="TD1"><input type="text" class="form-control" readonly name="mrp_tab[]" id="mrp_tabo12" size="6"/></td>
        <td class="TD1"><input type="text" class="form-control txt1" name="sgst[]" readonly value="" id="sgsto12" size="6"/></td>
        <td class="TD1"><input type="text" class="form-control txt2" name="cgst[]" readonly value="" id="cgsto12" size="6"/></td>
		<td class="TD1"><input type="text" class="form-control " name="vat[]" value="" id="vat12" size="6"/>
		<input type="hidden" name="vatamt[]" value="" class="vatamt" id="vatamto12" size="6"/>
		<input  type="hidden" name="invid[]" id="invid1" class="textbox" value="" size="5" readonly>
		</td>
       
		</tr>
		<tr>
		<td class="TD1"><input type="text" class="form-control" name="pname[]" value="" id="pname13" size="10" onclick=window.open('Drug_itemcode_pop.php?rowid=13','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no') readonly/></td>
		<!--<td class="TD1"><?php// echo $packing ?></td>-->
		<td class="TD1"><input type="text" class="form-control" name="maniby[]" value="" id="maniby13" size="10"/></td>
		  <td class="TD1"><input type="text" class="form-control" name="batch[]" value="" id="batch13" size="8"/></td>
		  <td class="TD1"><input type="text" class="form-control" name="mfgdate[]" value="<?php echo date("m-Y"); ?>" id="mfgdate13" size="10"/></td>
		  <td class="TD1"><input type="text" class="form-control" name="expdate[]" value="<?php echo date("m-Y"); ?>" id="expdate13" size="10"/></td>
		<td class="TD1"><input type="text" class="form-control" name="noi[]" value="" id="noio13" size="4"/></td>
      
		
		
		
	
		
			<!--<input type="hidden" name="mfgdate[]" value="<?php echo date("d-m-Y"); ?>" id="mfgdate13" size="10"/>-->
		
		
		<td class="TD1"><input type="text" class="form-control" name="sqty[]" value="" id="sqtyo13" onKeyup="calkdyn(13)" size="4" /></td>
		<td class="TD1"><input type="text" class="form-control" name="tqty[]" value="" id="tqtyo13" size="4" /></td>
        <td class="TD1"><input type="text" class="form-control" name="sfree[]" value="" id="sfreeo13" size="4"/></td>
		
		 <td class="TD1"><input type="text" class="form-control" name="srate[]"  value="" id="srateo13" size="6" onKeyup="calkdyn1(13)" onkeyup="calp3()"/></td>
		 <td class="TD1"><input type="text" class="form-control" name="sal_tab[]"  readonly value="" id="sal_tabo13" size="4"/>
		 <input type="hidden" readonly class="form-control" name="sal_ftab[]"  value="" id="sal_ftabo13" size="6" />
		 
		 
		 </td>
        <td class="TD1"><input type="text" class="form-control txt" name="value[]" readonly value="" id="valueo13" size="6"/></td>
		<td class="TD1"><input type="text" class="form-control" name="mrp[]" value="" id="mrpo13" onKeyup="mrp(13)"  size="6"/></td>
		<td class="TD1"><input type="text" class="form-control" readonly name="mrp_tab[]" id="mrp_tabo13" size="6"/></td>
        <td class="TD1"><input type="text" class="form-control txt1" name="sgst[]" readonly value="" id="sgsto13" size="6"/></td>
        <td class="TD1"><input type="text" class="form-control txt2" name="cgst[]" readonly value="" id="cgsto13" size="6"/></td>
		<td class="TD1"><input type="text" class="form-control" name="vat[]" value="" id="vat13" size="6"/>
		<input type="hidden" name="vatamt[]" value="" id="vatamt13" class="vatamt" size="6"/>
		<input  type="hidden" name="invid[]" id="invid1" class="textbox" value="" size="5" readonly>
		</td>
       
		</tr>
		<tr>
		<td class="TD1"><input type="text" class="form-control" name="pname[]" value="" id="pname14" size="10" onclick=window.open('Drug_itemcode_pop.php?rowid=14','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no') readonly/></td>
		<!--<td class="TD1"><?php// echo $packing ?></td>-->
		<td class="TD1"><input type="text" class="form-control" name="maniby[]" value="" id="maniby14" size="10"/></td>
		 <td class="TD1"><input type="text" class="form-control" name="batch[]" value="" id="batch14" size="8"/></td>
		 	<td class="TD1"><input type="text" class="form-control" name="mfgdate[]" value="<?php echo date("m-Y"); ?>" id="mfgdate14" size="10"/></td>
			<td class="TD1"><input type="text" class="form-control" name="expdate[]" value="<?php echo date("m-Y"); ?>" id="expdate14" size="10"/></td>
		<td class="TD1"><input type="text" class="form-control" name="noi[]" value="" id="noio14" size="4"/></td>
       
	
		
		<!--<input type="hidden" name="mfgdate[]" value="<?php echo date("d-m-Y"); ?>" id="mfgdate14" size="10"/>-->
		
		
		
		<td class="TD1"><input type="text" class="form-control" class="form-control" name="sqty[]" onKeyup="calkdyn(14)" value="" id="sqtyo14" size="4" /></td>
		<td class="TD1"><input type="text" class="form-control" class="form-control" name="tqty[]" value="" id="tqtyo14" size="4" /></td>
        <td class="TD1"><input type="text" class="form-control" class="form-control" name="sfree[]" value="" id="sfreeo14" size="4"/></td>
		
		 <td class="TD1"><input type="text" class="form-control" class="form-control" name="srate[]" value="" id="srateo14"  size="6" onKeyup="calkdyn1(14)"/></td>
		 <td class="TD1"><input type="text" class="form-control" name="sal_tab[]"  readonly value="" id="sal_tabo14" size="4"/>
		 
		 <input type="hidden" readonly class="form-control" name="sal_ftab[]"  value="" id="sal_ftabo10" size="6" />
		 
		 
		 </td>
        <td class="TD1"><input type="text" class="form-control txt" class="form-control" readonly name="value[]" value="" id="valueo14" size="6"/></td>
		<td class="TD1"><input type="text" class="form-control" class="form-control" name="mrp[]" value="" id="mrpo14"  onKeyup="mrp(14)"  size="6"/></td>
		<td class="TD1"><input type="text" class="form-control" readonly name="mrp_tab[]"  id="mrp_tab14" size="6"/></td>
        <td class="TD1"><input type="text" class="form-control txt1" class="form-control" readonly name="sgst[]" value="" id="sgsto14" size="6"/></td>
        <td class="TD1"><input type="text" class="form-control txt2" class="form-control" readonly name="cgst[]" value="" id="cgsto14" size="6"/></td>
		<td class="TD1"><input type="text" class="form-control" class="form-control" name="vat[]" value="" id="vat14" size="6"/>
		<input type="hidden" name="vatamt[]" value="" id="vatamto14" class="vatamt" size="6"/>
		<input  type="hidden" name="invid[]" id="invid1" class="textbox" value="" size="5" readonly>
		</td>
       
		</tr>								
					                                        </thead>
					                                        <tbody>	
                                                           
															
                                                            
																
	<script>
                                                        function pay(mny)
                                                        {
                                                            var fe=document.getElementById("total").value;
                                                            if(mny==null || mny==""){mny=0;}
                                                            var sum=0;
                                                            sum=eval(fe)-eval(mny);
															var vd=document.getElementById("vatadd").value;
															sum1=eval(sum)+eval(vd);
                                                            document.getElementById("nettot").value=sum1.toString();
															document.getElementById("gtot").value=sum1.toString();
                                                        }
                                                </script>															
															</tbody>
					                                    </table>
														</table>
														<input type="hidden" name="rows" id="rows" value="0" >
													</div>	
												<div class="card-body " id="bar-parent2">
                                	<div class="row">
	                                    <div class="col-md-3 col-sm-3">
	                                        <!-- text input -->
											<div class="form-group">
	                                            <label>CGST</label>
	                                            <input type="text" class="form-control" readonly name="vat_12"  value="<?php echo $vatadd/2; ?>" id="vat_12" >
	                                        </div>
											<div class="form-group">
                                            <label>No.of Items</label>
	                                            <input type="text" class="form-control" readonly id="nitem" name="nitem" size="10" value="<?php echo ($p) ?>"  onclick="javasript:noitems()" >
                                        </div>										
	                                    </div>
										
										
	                                    <div class="col-md-3 col-sm-3">
                                        <!-- textarea -->
										
										
										
                                       <div class="form-group">
	                                            <label>SGST</label>
	                                            <input type="text" class="form-control" readonly name="vat_4" value="<?php echo $vatadd/2; ?>"   id="vat_4" >
	                                        </div>
										
										<div class="form-group">
                                            <label> Discount</label>
                                  <input type="text" class="form-control" name="disc" readonly value="<?php echo $dis ?>" onkeyup="javascript:nettotal()"  id="disc" >
									   </div>
                                        <input name="vat_14" type="hidden" class="textbox" id="vat_14" size="10"/>
                                    </div>
									
									<div class="col-md-3 col-sm-3"><div class="form-group">
	                                            <label> GST</label>
										<input type="text" class="form-control" readonly name="vatadd" value="<?php echo $vatadd; ?>"  id="vatadd" >
	                                        </div>
									<div class="form-group">
                                            <label>Sub Total</label>
	                                            <input type="text" class="form-control" readonly value="<?php echo $total-$vatadd ?>" name="total" required id="total" >
                                        </div>
										<div class="form-group">
                                            <label>Net Amount</label>
	                                            <input type="text"  readonly="readonly" class="form-control" name="nettot" value="<?php echo ($total);  ?>" required id="nettot" >
                                        </div>
										<div class="form-group">
                                            <label>Adjustables</label>
	                                            <input type="text" class="form-control" readonly name="adjt" value="<?php echo $adjust?>"  id="adjt" onkeyup="javascript:adjttotal()" >
                                        </div>
										<div class="form-group">
                                            <label>Rounded</label>
	                                            <input type="text" class="form-control" readonly name="round" value="<?php echo $round?>"  id="round" onkeyup="javascript:adjttotal()">
                                        </div>
										<div class="form-group">
                                            <label>Total Amount</label>
	                                            <input type="text" readonly="readonly" readonly class="form-control" name="gtot"  value="<?php echo $total ?>"   id="gtot" onclick="javascript:adjttotal()" >
                                        </div>
										<div class="form-group">
                                            <label>Paid Amount</label>
	                                            <input type="text" class="form-control" name="paid"  value="<?php echo $paid ?>"  required id="paid" onkeyup="javascript:krk()" >
                                        </div>
										<div class="form-group">
                                            <label>Balance Amount</label>
	                                            <input type="text" class="form-control" name="bal" readonly  value="<?php echo $bal ?>"  readonly="readonly" id="bal" >
                                        </div>
										<script>
function adjttotal(){
var sum=0;
var ntot=document.getElementById("nettot").value;

if(ntot=="" || ntot==null){
document.getElementById("gtot").value="0";
}
else{
var ad=document.getElementById("adjt").value;
var rn=document.getElementById("round").value;
if(ad=="" || ad==null){ad=0;}
if(rn=="" || rn==null){rn=0;}
ntot=eval(ntot)+eval(ad);
//alert(sum);
var ss=eval(ntot)-eval(rn);
document.getElementById("gtot").value=ss;
//document.getElementById("paid").value=ss;
}
}

</script>

<script>
function krk(){
	
	var gtot=document.getElementById("gtot").value;
	var paid=document.getElementById("paid").value;
	
	var ss=eval(gtot)-eval(paid);
document.getElementById("bal").value=ss;
}</script>

 <script type="text/javascript">
		$(function(){
$('#paid').keyup(function() { 
    var balance = parseFloat($(this).val());
    var totalpoints = parseFloat($('#gtot').val());
    $('#bal').val(totalpoints - balance);
});



});//]]>  
</script>
										<div class="form-group">
                                            <label>Received By</label>
	                                            <input type="text" class="form-control" name="recby" readonly="readonly" value="<?php echo $ses?>" required id="recby" >
                                        </div>
                                       
                                    </div>
                                	</div></div>
														
									<div class="card-body " id="bar-parent2">
                                	<div class="row">
	                                    <div class="col-md-3 col-sm-3">
	                                        <!-- text input -->
											<div class="form-group"></div>
											<div class="form-group"> </div>	
										
	                                    </div>
										
										
	                                   
									
									
                                	</div>
									
									
                                </div>					
								<div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                   <?php if($ses=='admin'){ ?><input type="submit" class="btn btn-info" name="submit" onclick="save1()" value="Submit" name=" "><?php }?>
                                                    <button type="button" class="btn btn-default" onclick="javascript:location.href='purchase_invoice_list.php'">Cancel</button>
                                                </div>
                                            	</div>
                                        	</div>
                            </div>
                        </div>
                    </div>
					
					</form>
					
					
					
              
            <!-- end page content -->
            <!-- start chat sidebar -->
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
            
            <!-- end chat sidebar -->
        </div>
        <!-- end page container -->
        <!-- start footer -->
       <?php include("footer.php");?>
	    <?php 

}else

{

session_destroy();

session_unset();

header('Location:../../index.php');

}

?>