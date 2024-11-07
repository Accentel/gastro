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
<link rel="stylesheet" href="../css/all1.css" type="text/css" /> 
<script>

function vattot()
{
var vat14=document.getElementById("vat_14").value;
var vat12=document.getElementById("vat_12").value;
var vat4=document.getElementById("vat_4").value;
if(eval(vat14)==null ||eval(vat14)=='' ){vat14=0;}
if(eval(vat12)==null ||eval(vat12)=='' ){vat12=0;}
if(eval(vat4)==null ||eval(vat4)=='' ){vat4=0;}
var vat14=0;
//var sum=eval(vat14)+eval(vat12)+eval(vat4);
var sum=eval(vat14)+eval(vat12);
var sum1=sum/2;
//alert(sum1);
document.getElementById("vatadd").value=sum.toFixed(2);

document.getElementById("vat_4").value=sum1.toFixed(2);
document.getElementById("vat_12").value=sum1.toFixed(2);

}//vattot
	
function noitems(){
var sum=0;
var count=document.form.rows.value;
for(l=1;l<=count;l++)
	{
var str=document.getElementById("sqty"+l).value;
sum=eval(sum)+eval(str);
}//for

document.getElementById("nitem").value=count;
}//fun

function val(str,j)
{//alert(document.getElementById("vat").value)
	var sum1=0;
	var vatsum=0;
	var value1="value"+j;
	var sqty1="sqty"+j;
	var tqty1="tqty"+j;
	var free1="sfree"+j;
	var sal_tab1="sal_tab"+j;
		var sal_ftab1="sal_ftab"+j;
	var vat1="vat"+j;
	var sal_rate1="srate"+j;
    var noi1="noi"+j;
	var x=0;
	var y=0;
	var z=0;
	var value2=document.getElementById(value1).value;
	var tqty2=document.getElementById(tqty1).value;
	var free2=document.getElementById(free1).value;
	var noi2=document.getElementById(noi1).value;
	var sqty2=document.getElementById(sqty1).value;

	var vat2=document.getElementById(vat1).value;
		
	if(eval(sqty2)==null ||eval(sqty2)=='' ){
	//alert("Please Enter Qty");
	//document.getElementById(sqty1).focus();
	document.getElementById(tqty1).focus();
	document.getElementById(srate1).value="";
	return false;}//if
	
	tpqty1=eval(sqty2)+eval(free2);
	tpqty=eval(tpqty1)*eval(noi2);
		//alert(value2);
		x=str*sqty2;
		eachpri=x/tpqty;
	//alert(tpqty);
			each=str/noi2;
		//alert(str);
		sum1=str*sqty2;
		//alert(sum1);
		y=x*vat2/100;
		z=y/2;
		//alert(z);
		document.getElementById("sal_tab"+j).value=each;
		document.getElementById("sal_ftab"+j).value=eachpri;
		document.getElementById("value"+j).value=sum1;
		vatsum=(vat2/100)*sum1;
		//alert(vatsum);
		document.getElementById("vamt"+j).value=vatsum.toFixed(2);
		document.getElementById("sst"+j).value=z;
		document.getElementById("cst"+j).value=z;
		
tot();
vatt();
vattot();
nettotal();
}


function valk(str,j)
{//alert(document.getElementById("vat").value)
	var sum1=0;
	var vatsum=0;
	var srate1="noi"+j;
	var sqty1="sqty"+j;
	var vat1="tqty"+j;
	
	var x=0;
	var y=0;
	var z=0;
	var sqty2=document.getElementById(sqty1).value;
	
	var vat2=document.getElementById(srate1).value;
	//alert(vat2);
	sum1=vat2*sqty2;
	document.getElementById("tqty"+j).value=sum1;
	
	if(eval(sqty2)==null ||eval(sqty2)=='' ){
	//alert("Please Enter Qty");	
	document.getElementById(sqty1).focus();
	document.getElementById(noi).value="";
	return false;}//if
		sum1=vat2*sqty2;
		
	
		
		//vatsum=(vat2/100)*sum1;
		//document.getElementById("vamt"+j).value=vatsum.toFixed(2);
		//document.getElementById("sst"+j).value=z;
		//document.getElementById("cst"+j).value=z;
		
//tot();
//vatt();
//vattot();
//nettotal();
}



function mrpk(str,j)
{//alert(document.getElementById("vat").value)
	var sum1=0;
	var vatsum=0;
	var mrp_tab1="mrp_tab"+j;
	var mrp1="mrp"+j;
	var vat1="tqty"+j;
	var noi1="noi"+j;
	var x=0;
	var y=0;
	var z=0;
	var mrp_tab2=document.getElementById(mrp_tab1).value;
	var noi2=document.getElementById(noi1).value;
		var mrp2=document.getElementById(mrp1).value;

		each=mrp2/noi2;
		//alert(each);
document.getElementById("mrp_tab"+j).value=each;

}


function vatt()
{
	
var count=document.form.rows.value;
var vatsum4=0;
var vatsum12=0;
var vatsum14=0;
for(l=1;l<=count;l++)
{
var str=document.getElementById("vat"+l).value;
//if(str==15){
var vat14=document.getElementById("vamt"+l).value;
if(vat14==""||vat14==null){vat14=0;}
else{vatsum14=eval(vatsum14)+eval(vat14);}
document.getElementById("vat_14").value=vatsum14.toFixed(2);
//}//14


//if(str==14.5){
var vat12=document.getElementById("vamt"+l).value;
if(vat12==""||vat12==null){vat12=0;}
else{vatsum12=eval(vatsum12)+eval(vat12);}
document.getElementById("vat_12").value=vatsum12.toFixed(2);
//}//12
//if(str==5){
var vat4=document.getElementById("vamt"+l).value;
if(vat4==""||vat4==null){vat4=0;}
else{vatsum4=eval(vatsum4)+eval(vat4);}
document.getElementById("vat_4").value=vatsum4.toFixed(2);
//}//4
}//for
}

function tot()
{
	var sum3=0;
	var count3=document.form.rows.value;
	for(l=1;l<=count3;l++)
	{
		var value3="value"+l;
		var value4=document.getElementById(value3).value;
		var amt=eval(value4);
		
		sum3=(eval(sum3)+eval(amt));
		
		//alert(sum3);
		document.form.total.value=eval(sum3);
	}
}

</script>
<script>

function nettotal()
{
var count=document.form.rows.value;
if(count==0){
document.getElementById("nettot").value=0;
}
else{
var netsum=0;
var subtot=document.getElementById("total").value;

var vatadd=document.getElementById("vatadd").value;
//var vatadd=0;
var disc=document.getElementById("disc").value;
netsum=(eval(subtot)+eval(vatadd))-eval(disc);
if(netsum<0){alert("Please Check Discount");return false;}
document.getElementById("nettot").value=netsum;
}
adjttotal();
}
</script>
<script>


//////////////////////////addrow starts//////////
function Addrow()
{
	
 
		  
		
   var newRow = document.getElementById("TABLE1");
   var Row = newRow.rows.length;
   var row = newRow.insertRow(Row);
   var index=row.rowIndex;

	<!-- var oCell = document.createElement("TD");
    //oCell.innerHTML= "<div align='center' ><input  type='text' name='pcode"+Row+"' id='pcode"+Row+"' class='form-control' onblur='sameinvcode()'  size='4'  readonly> </div>"; 
	//row.appendChild(oCell);-->

	oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><input  type='text' required='required' name='pname"+Row+"' id='pname"+Row+"'  class='form-control' onblur='sameinvcode()' onclick=window.open('Drug_itemcode_pop.php?rowid="+Row+"','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no')  size='10'  readonly> </div>"; 
    row.appendChild(oCell);



   <!-- oCell = document.createElement("TD");
	 	// oCell.innerHTML = "<div align='center' ><input  type='text' name='packing"+Row+"' id='packing"+Row+"' class='textbox' size='5' readonly > </div>"; 
    // row.appendChild(oCell);-->
	  oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='maniby"+Row+"' id='maniby"+Row+"' class='form-control' size='10' readonly > </div>"; 
     row.appendChild(oCell);

 

	oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><input  type='text' name='bno"+Row+"' id='bno"+Row+"' class='form-control' size='4' > </div>"; 
    row.appendChild(oCell);

   

oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<input type='text'  value='<?php echo date('m-Y')?>' class='form-control' value='' name=mfg"+Row+" id=mfg"+Row+" size='5' >"; 
     row.appendChild(oCell);

	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<input type='text'  class='form-control' value='<?php echo date('m-Y')?>' name=exp"+Row+" id=exp"+Row+" size='5' ></a>"; 
     row.appendChild(oCell);
oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='number' style='width:70px;'  name='noi"+Row+"' id='noi"+Row+"' class='form-control' size='4'  > </div>"; 
     row.appendChild(oCell);
	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='sqty"+Row+"' id='sqty"+Row+"' onkeyup='valk(this.value,"+Row+")' class='form-control'  size='4' > </div>"; 
     row.appendChild(oCell);
	  oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='tqty"+Row+"' readonly id='tqty"+Row+"'class='form-control'  size='4' > </div>"; 
     row.appendChild(oCell);

	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='sfree"+Row+"' id='sfree"+Row+"' class='form-control'  size='4' value='0'> </div>"; 
     row.appendChild(oCell);

	  oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='dis"+Row+"' id='dis"+Row+"' class='form-control'  size='4'> </div>"; 
     //row.appendChild(oCell);

	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='srate"+Row+"' id='srate"+Row+"'class='form-control'  size='4' onkeyup='val(this.value,"+Row+")' > </div>"; 
     row.appendChild(oCell);

	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center'><input type='text' name='sal_tab"+Row+"' id='sal_tab"+Row+"' class='form-control'  size='4'  readonly> <input type='hidden' name='sal_ftab"+Row+"' id='sal_ftab"+Row+"' class='form-control'  size='4'  readonly> </div>"; 
     row.appendChild(oCell);

	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center'><input type='text' name='value"+Row+"' id='value"+Row+"' class='form-control'  size='4' onFocus='tot()' readonly> </div>"; 
     row.appendChild(oCell);

 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='mrp"+Row+"' id='mrp"+Row+"'class='form-control' onkeyup='mrpk(this.value,"+Row+")'  size='4'> </div>"; 
     row.appendChild(oCell);
 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center'><input type='text' name='mrp_tab"+Row+"' id='mrp_tab"+Row+"' class='form-control'  size='4'  readonly> </div>"; 
     row.appendChild(oCell);
	
 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center'><input type='text' readonly  name='sst"+Row+"' id='sst"+Row+"' class='form-control'  size='4' > </div>"; 
     row.appendChild(oCell);
	 
	 //oCell = document.createElement("TD");
	 	// oCell.innerHTML = "<div align='center'><input type='hidden' name='sgst"+Row+"' id='sgst"+Row+"' class='textbox'  size='3' > </div>"; 
    // row.appendChild(oCell);
	 
	 
	 
	  oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center'><input type='text' readonly name='cst"+Row+"' id='cst"+Row+"' class='form-control'  size='5' > </div>"; 
     row.appendChild(oCell);
	// oCell = document.createElement("TD");
	 	// oCell.innerHTML = "<div align='center'><input type='hidden' name='cgst"+Row+"' id='cgst"+Row+"' class='form-control'  size='3' > </div>"; 
   //  row.appendChild(oCell);
	 
	 
	  oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center'><input type='text'  name='vat"+Row+"' id='vat"+Row+"' class='form-control'  size='5' > </div>"; 
     row.appendChild(oCell);
	 
	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='hidden' name='vamt"+Row+"' id='vamt"+Row+"' class='form-control'  size='5' onFocus='vatt()' readonly> </div>"; 
    row.appendChild(oCell);
	

	// oCell = document.createElement("TD");
	 	// oCell.innerHTML = "<div align='center' ><input  type='text' name='cst"+Row+"' id='cst"+Row+"' class='form-control'  size='5' onFocus='cost()' readonly> </div>"; 
    // row.appendChild(oCell);
 
  document.getElementById("nitem").value=Row;

     document.getElementById("rows").value=Row;
//sameinvcodes(Row);
   }//addrow()


 function deleteRow(tableID) {  
 //alert("hi");
    var tbl = document.getElementById('TABLE1');
   var lastRow = tbl.rows.length;
    var rowss=document.getElementById("rows").value;
	//alert(rowss);
  if (lastRow > 1){ 
				  var txtAmt="value"+rowss;
				  var aa= document.getElementById(txtAmt).value;
				  var amt2=eval(aa);
				  var bb=document.form.total.value;
				    sum=bb-amt2;
				  document.form.total.value = eval(sum); 

				   var vat= document.getElementById("vat"+rowss).value;
				     //alert(vat)
				    var vatamt= document.getElementById("vamt"+rowss).value;
				   //alert(vatamt)
					if(eval(vat)==15){//alert("-14-")
					var vat14= document.getElementById("vat_14").value;
					var sum14=eval(vat14)-eval(vatamt);
					 document.getElementById("vat_14").value=sum14.toFixed(2);
					}
					else if(eval(vat)==14.5){//alert("-12-")
						var vat12= document.getElementById("vat_12").value;
					var sum12=eval(vat12)-eval(vatamt);
					 document.getElementById("vat_12").value=sum12.toFixed(2);}
					else if(eval(vat)==5){//alert("-4-")
					var vat4= document.getElementById("vat_4").value;
					var sum4=eval(vat4)-eval(vatamt);
					 document.getElementById("vat_4").value=sum4.toFixed(2);}

 var sqty= document.getElementById("sqty"+rowss).value;
var nitem= document.getElementById("nitem").value;
var itemsum=eval(nitem)-eval(sqty);
document.getElementById("nitem").value=itemsum;

  tbl.deleteRow(lastRow - 1);document.getElementById("rows").value=eval(rowss)-1;

  vattot();nettotal();
}
  else{ alert('Please Select Row');return false;}
}

</script>
<script>
function save()
{

 // if(document.form.supcode.value=="")
//{
//alert("Please Click On SupplierCode");
//document.form.supcode.focus();
//return false;
//}

//if(document.form.ptype.value=="")
//{
//alert("Please Select purchase Type");
//document.form.ptype.focus();
//return false;
//}
//if(document.form.invno.value=="")
//{
//alert("Invoice No Filed is Empty");
//document.form.invno.focus();
//return false;
//}
//if(document.form.invdate.value=="")
//{
//alert("Invoice Date Filed is Empty");
//document.form.invdate.focus();
//return false;
//}
//if(document.form.recdate.value=="")
//{
//alert("Received Date Filed is Empty");
//document.form.recdate.focus();
//return false;
//}
//if(document.form.recby.value=="")
//{
//alert("Received By Filed is Empty");
//document.form.recby.focus();
//return false;
//}


var count=document.getElementById("rows").value
	   for(k=1;k<=count;k++)
		{
		  var select3="pname"+k;
		  		  						
			if(document.getElementById(select3).value=="")
			{
				alert("Please Click on Product Code Feild");
				document.getElementById(select3).focus();
				return false;
			}
			
			var select4="noi"+k;
			if(document.getElementById(select4).value=="")
			{
				alert("Pack Qty Feild is Empty");
				document.getElementById(select4).focus();
				return false;
			}
			
                        var ss=document.getElementById(select4).value
                        if(isNaN(ss))
                            {
                                alert("Please enter Numbers in Pack Qty");
				document.getElementById(select4).focus();
				return false;  
                            }

			var select5="bno"+k;
			if(document.getElementById(select5).value=="")
			{
				alert("Batch No. Feild is Empty");
				document.getElementById(select5).focus();
				return false;
			}
			
			var select7="mfg"+k;
			if(document.getElementById(select7).value=="")
			{
				alert("Mfg.Date Feild is Empty");
				document.getElementById(select7).focus();
				return false;
			}
			var select8="exp"+k;
			if(document.getElementById(select8).value=="")
			{
				alert("Exp.Date Feild is Empty");
				document.getElementById(select8).focus();
				return false;
			}
                        if(!(document.getElementById(select7).value=="") && !(document.getElementById(select8).value==""))
                            {
                               var str2 = document.getElementById(select7).value;//alert("dob"+str2);
                                 var dt2  = parseInt(str2.substring(0,2),10);
                                 var mon2 = parseInt(str2.substring(3,5),10);
                                 var yr2  = parseInt(str2.substring(6,10),10);
                                 var date2 = new Date(yr2, mon2, dt2);
                               //alert(date2);

                                 var str3=document.getElementById(select8).value;//alert('str3--'+str3)
                                 var dt3 = parseInt(str3.substring(0,2),10);
                                 var mon3 = parseInt(str3.substring(3,5),10);
                                 var yr3  = parseInt(str3.substring(6,10),10);
                                 var current_datefor = new Date(yr3, mon3, dt3);
                                 //alert(current_datefor);
                            if(date2>current_datefor)
                                 {//alert("Date of Birth--"+date2);alert("current_datefor--"+current_datefor)
                                     alert("MFG date Should be Less than EXP date");//To date cannot be greater than from date
                                     return false;
                                 }  
                            }
			var select9="sqty"+k;
			if(document.getElementById(select9).value=="")
			{
				alert("Qty Feild is Empty");
				document.getElementById(select9).focus();
				return false;
			}
                        
                        var sqt=document.getElementById(select9).value
                        if(isNaN(sqt))
                            {
                                alert("Please enter Numbers in Qty");
				document.getElementById(select9).focus();
				return false;  
                            }
                            
			var select10="sfree"+k;
			if(document.getElementById(select10).value=="")
			{
				alert("Free Feild is Empty");
				document.getElementById(select10).focus();
				return false;
			}
                        var sfr=document.getElementById(select10).value
                        if(isNaN(sfr))
                            {
                                alert("Please enter Numbers in Qty");
				document.getElementById(select10).focus();
				return false;  
                            }
			var select6="mrp"+k;
			if(document.getElementById(select6).value=="")
			{
				alert("MRP Feild is Empty");
				document.getElementById(select6).focus();
				return false;
			}
                        var mr=document.getElementById(select6).value
                        if(isNaN(mr))
                            {
                                alert("Please enter Numbers in MRP");
				document.getElementById(select6).focus();
				return false;  
                            }
			var select12="srate"+k;
			if(document.getElementById(select12).value=="")
			{
				alert("Rate Feild is Empty");
				document.getElementById(select12).focus();
				return false;
			}
                        var sra=document.getElementById(select12).value
                        if(isNaN(sra))
                            {
                                alert("Please enter Numbers in Rate");
				document.getElementById(select12).focus();
				return false;  
                            }
					
	
		}//for
 
	
	document.form.action="insert_purchase_invoice.php";
	document.form.submit();
}
</script>

			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content1">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Add Purchase Invoice</div>
								
							
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="purchase_invoice_list.php">Purchase Invoice List</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Add Purchase Invoice</li>
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
								
								 <form name="form" method="post" action="insert_purchase_invoice.php" >
                                <div class="card-body " id="bar-parent2">
                                	<div class="row">
	                                    <div class="col-md-6 col-sm-6">
	                                        <!-- text input -->
	                                        <div class="form-group">
	                                            <label>Supplier Code</label>
	                                            <input type="text" class="form-control" name="supcode"  onclick="window.open('purchase_inv_popup.php','mypatwindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')"  required="required" id="supcode" >
	                                        </div>
											
										<div class="form-group">
	                                            <label>City</label>
	                                            <input type="text" class="form-control" name="city"  id="city" readonly >
	                                        </div>
											<br/>
											<div class="form-group">
                                            <label>GRN NO:</label>
                                            <input type="text" class="form-control" required name="grnno" readonly id="grnno" value="<?php echo "GRN".($pnid+1); ?>" readonly="readonly"/> 
									   </div>
											<div class="form-group">
	                                            <label>Invoice No.</label>
	                                            <input type="text" class="form-control" name="invno"  required="required" id="invno" >
	                                        </div>
										
											
											
												<div class="form-group">
	                                            <label>Received Date</label>
	                                            <input type="date"   value="<?php echo date('Y-m-d');?>" class="form-control" required name="recdate" id="recdate" >
	                                        </div>
										
											
											
											
											
	                                    </div>
	                                    <div class="col-md-6 col-sm-6">
                                        <!-- textarea -->
										
										
										
                                        <div class="form-group">
                                            <label>Supplier Name</label>
	                                            <input type="text" class="form-control" name="supname" required readonly id="supname" >
                                        </div>
										
										<div class="form-group">
                                            <label>Address</label>
                                   <textarea  class="form-control" name="addr" readonly id="addr" ></textarea>
									   </div>
									
                                        
										
										<div class="form-group">
	                                          <br /><br /><br />
	                                        </div>  
										
										
										
										<div class="form-group">
                                            <label>Invoice Date</label>
                                            <input type="date" class="form-control" value="<?php echo date('Y-m-d');?>" name="invdate"  id="invdate" >
									   </div>
									  <div class="form-group">
	                                            <label>Purchase Type</label>
										<select name="ptype" class="form-control" required>
										<option value="">Select</option>
									  <option value="Cash">Cash</option>
									  <option value="Cheque">Cheque</option></select>
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
					                                            	 <th width="10%" class="TH1">P.Name </th>     
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
																		<th width="7%" class="TH1">GST</th>
					                                            </tr>
					                                        </thead>
					                                        <tbody>
                                                           
															
                                                            
																
																
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
	                                            <input type="text" class="form-control"  readonly name="vat_12"  id="vat_12" >
	                                        </div>
											<div class="form-group">
                                            <label>No.of Items</label>
	                                            <input type="text" class="form-control" readonly id="nitem" name="nitem" size="10"  onclick="javasript:noitems()" >
                                        </div>										
	                                    </div>
										
										
	                                    <div class="col-md-3 col-sm-3">
                                        <!-- textarea -->
										
										
										
                                       <div class="form-group">
	                                            <label>SGST</label>
	                                            <input type="text" class="form-control" readonly name="vat_4" required id="vat_4" >
	                                        </div>
										
										<div class="form-group">
                                            <label> Discount</label>
                                  <input type="text" class="form-control" name="disc" value="0"  onkeyup="javascript:nettotal()"  id="disc" >
									   </div>
                                        <input name="vat_14" type="hidden" class="textbox" id="vat_14" size="10"/>
                                    </div>
									
									<div class="col-md-3 col-sm-3"><div class="form-group">
	                                            <label> GST</label>
										<input type="text" class="form-control" name="vatadd" readonly  id="vatadd" >
	                                        </div>
									<div class="form-group">
                                            <label>Sub Total</label>
	                                            <input type="text" class="form-control" name="total" readonly required id="total" >
                                        </div>
										<div class="form-group">
                                            <label>Net Amount</label>
	                                            <input type="text"  readonly="readonly" class="form-control" name="nettot" required id="nettot" >
                                        </div>
										<div class="form-group">
                                            <label>Adjustables</label>
	                                            <input type="text" class="form-control" readonly name="adjt" value="0"  id="adjt" onkeyup="javascript:adjttotal()" >
                                        </div>
										<div class="form-group">
                                            <label>Rounded</label>
	                                            <input type="text" class="form-control" readonly name="round" value="0" id="round" onkeyup="javascript:adjttotal()">
                                        </div>
										<div class="form-group">
                                            <label>Total Amount</label>
	                                            <input type="text" readonly="readonly"  class="form-control" name="gtot"  id="gtot" onclick="javascript:adjttotal()" >
                                        </div>
										<div class="form-group">
                                            <label>Paid Amount</label>
	                                            <input type="text" class="form-control" name="paid" required id="paid" onkeyup="javascript:krk()" >
                                        </div>
										<div class="form-group">
                                            <label>Balance Amount</label>
	                                            <input type="text" class="form-control" name="bal" value="0" readonly="readonly" id="bal" >
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
                                                    <input type="submit" class="btn btn-info" name="submit" onclick="save1()" value="Submit" name=" ">
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