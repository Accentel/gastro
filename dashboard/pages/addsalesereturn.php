<?php
session_start();
 $ses= $_SESSION['user'] ;
 if($_SESSION['user'])

{
 ?>
<?php include("header.php");

$res = mysqli_query($link,"select max(SUP_ID) FROM phr_supplier_mast");
	IF($res)
	{
		$row = mysqli_fetch_array($res);
		$sid = $row[0];	
	}
?>
<link rel="stylesheet" href="../css/all1.css" type="text/css" /> 
<script>
function val(u1,u2,u3,u4,u5)
{
	var sum1=0;
	var srate2=0; 
	var sqty2=0;
	var count1=document.getElementById("rows").value;
	//alert(u1,u2,u3,u4,u5);
	//alert(count1);
	for(j=1;j<=count1;j++)
	
	{
	    if(u1 > u2)  
		 {	
	        alert("U Buy Only" +u2+ " items");
	   	  document.getElementById("rqty"+u3).value=0;
		  document.getElementById("rtotal").value=0;
		  return false;
	     }
	   if(u1 <= u2)
	   {
		//alert(u1,u2,u3,u4,u5);
	    srate2=document.getElementById("urate"+u3).value;
		sqty2=document.getElementById("rqty"+u3).value;
		sum1=(srate2*sqty2);
	    tot();
		break;
	   }
	}
	
}

</script>
<script>

function tot()
{

	var sum=0;
	var amt=0;
	var sum1=0;
	var count1=document.getElementById("rows").value;
	
	for(var x=1;x<=count1;x++)
	{
	
	var value1=document.getElementById("urate"+x).value;
	var value2=document.getElementById("rqty"+x).value;
	var value4=eval(value1)*eval(value2);
	amt=amt+eval(value4);
	
	}//for
	var str=document.getElementById("Discount").value;

	sum=(eval(amt))*(eval(str))/100;
	  sum1=(eval(amt))-sum;
	  //alert(sum1);
	document.getElementById("rtotal").value=sum1.toFixed(2);
	
}
</script>
<script>


//////////////////////////addrow starts//////////
function Addrow()
{
	
   
	   var count=document.getElementById("rows").value;
	   for(k=1;k<=count;k++)
		{
		  var select3="pcode"+k;
		  		  						
			if(document.getElementById(select3).value=="")
			{
				alert("Please Click on Product Code Feild");
				document.getElementById(select3).focus();
				return false;
			}
			
			var select4="pname"+k;
			if(document.getElementById(select4).value=="")
			{
				alert("P.Name Feild is Empty");
				document.getElementById(select4).focus();
				return false;
			}

			var select5="noitems"+k;
			if(document.getElementById(select5).value=="")
			{
				alert("QTY Feild is Empty");
				document.getElementById(select5).focus();
				return false;
			}
			var select6="uom"+k;
			if(document.getElementById(select6).value=="")
			{
				alert("UOM Feild is Empty");
				document.getElementById(select6).focus();
				return false;
			}
			var select7="batch"+k;
			if(document.getElementById(select7).value=="")
			{
				alert("Batch Feild is Empty");
				document.getElementById(select7).focus();
				return false;
			}
			var select8="mfg"+k;
			if(document.getElementById(select8).value=="")
			{
				alert("MFG.Date Feild is Empty");
				document.getElementById(select8).focus();
				return false;
			}
			var select9="exp"+k;
			if(document.getElementById(select9).value=="")
			{
				alert("EXP.DT Feild is Empty");
				document.getElementById(select9).focus();
				return false;
			}
			var select10="uqty"+k;
			if(document.getElementById(select10).value=="")
			{
				alert("UQTY Feild is Empty");
				document.getElementById(select10).focus();
				return false;
			}
			var select11="urate"+k;
			if(document.getElementById(select11).value=="")
			{
				alert("URATE Feild is Empty");
				document.getElementById(select11).focus();
				return false;
			}
			var select12="value"+k;
			if(document.getElementById(select12).value=="")
			{
				alert("VALUE Feild is Empty");
				document.getElementById(select12).focus();
				return false;
			}
					
	
		}//for
 
		     if(count>=2)
			{
      for(i=1;i!=count;i++)
		{	
		  var select39="pcode"+i;
		var pp=document.getElementById(select39).value;	
		for(j=count;j!=i;j--)
			{	
		 var select36="pcode"+j;
		var p=document.getElementById(select36).value;
		
		if(pp==p)
		{
		
		alert("Product Codes are same ");
		document.getElementById(select36).value="";
		document.getElementById(select36).focus();
		return (false);

		}
		}
		}
		}


//var dept_code=document.getElementById("dept_code").value;
	  // var supcode=document.getElementById("supcode").value
	  alert(dept_code);
  var newRow = document.getElementById("TABLE1");
   var Row = newRow.rows.length;
   
   

   var row = newRow.insertRow(Row);
   var index=row.rowIndex;
     
	 var oCell = document.createElement("TD");
    oCell.innerHTML= "<div align='center' ><input  type='text' name='pcode"+Row+"' id='pcode"+Row+"' class='textbox'  size='8' onclick=window.open('Sale_Return_Popup.jsp?rowid="+Row+"','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no') readonly> </div>"; 
	<!------onblur='sameroomno("+Row+")'----->
	row.appendChild(oCell);

	oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><input  type='text' name='pname"+Row+"' id='pname"+Row+"' class='textbox' size='8'> </div>"; 
    row.appendChild(oCell);

	oCell = document.createElement("TD");
	oCell.innerHTML = "<div align='center' ><input   type='hidden' name='noitems"+Row+"' id='noitems"+Row+"' class='textbox'  size='8'> </div>"; 
    row.appendChild(oCell);

    oCell = document.createElement("TD");
	oCell.innerHTML = "<div align='center' ><input  type='hidden' name='uom"+Row+"' id='uom"+Row+"' class='textbox' size='8'> </div>"; 
    row.appendChild(oCell);

	oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><input  type='hidden' name='batch"+Row+"' id='batch"+Row+"' class='textbox' size='8' > </div>"; 
    row.appendChild(oCell);

    
    oCell = document.createElement("TD");
	oCell.innerHTML = "<div align='center' ><input type=text  name=mfg"+Row+" id='mfg"+Row+"' class='textbox' size='7' ></a>"; 
    row.appendChild(oCell);

	oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><input type=text  name=exp"+Row+" id='exp"+Row+"' class='textbox' size='7' ></a>"; 
    row.appendChild(oCell);

    oCell = document.createElement("TD");
	oCell.innerHTML = "<div align='center' ><input  type='text' name='uqty"+Row+"' id='uqty"+Row+"' 'class='textbox' size='4'> </div>"; 
    row.appendChild(oCell);
	
	oCell = document.createElement("TD");
	oCell.innerHTML = "<div align='center' ><input  type='text' name='rqty"+Row+"' id='rqty"+Row+"' 'class='textbox' size='4'> </div>"; 
    row.appendChild(oCell);

	oCell = document.createElement("TD");
	oCell.innerHTML = "<div align='center' ><input  type='text' name='urate"+Row+"' id='urate"+Row+"' class='textbox'  size='4'> </div>"; 
    row.appendChild(oCell);

	  
    oCell = document.createElement("TD");
	oCell.innerHTML = "<div align='center'><input type='text' name='value"+Row+"' id='value"+Row+"' class='textbox' size='4'  readonly> </div>"; 
    row.appendChild(oCell);




     document.getElementById("rows").value=Row;
//sameinvcodes(Row);


   }//addrow()


function deleteRow(tableID) {  
            var tbl = document.getElementById('TABLE1');
   var lastRow = tbl.rows.length;
    var rowss=document.getElementById("rows").value;
  if (lastRow > 1){ 
				 
  tbl.deleteRow(lastRow - 1);document.getElementById("rows").value=eval(rowss)-1;
}
  else{ alert('Please Select Row');return false;}
}

</script>
<script>
function save(finflg)
{
document.getElementById("fin_flag").value=finflg

if(document.form.btype.value=="")
{
alert("Please Select Billing Type");
document.form.btype.focus();
return false;
}

if(document.form.custname.value=="")
{
alert("Customer Name Filed is Empty");
document.form.custname.focus();
return false;
}

if(document.form.stype.value=="")
{
alert("Please Select Sales Type");
document.form.stype.focus();
return false;
}

if(document.form.invno.value=="")
{
alert("Invoice No Filed is Empty");
document.form.invno.focus();
return false;
}

if(document.form.saledate.value=="")
{
alert("Sale Date Filed is Empty");
document.form.saledate.focus();
return false;
}




var count=document.getElementById("rows").value
	//alert(count);

	if(count == 0)
	{
		alert("Select any row");
	    for(k=0;k<=count;k++)
		{
		  var select41="pcode"+k;
		  if(document.getElementById(select41).value=="")
			{
				alert("Please Click on Product Code Feild");
				document.getElementById(select41).focus();
				return false;
			}
			
			var select42="pname"+k;
			if(document.getElementById(select42).value=="")
			{
				alert("P.Name Feild is Empty");
				document.getElementById(select42).focus();
				return false;
			}

			var select43="noitems"+k;
			if(document.getElementById(select43).value=="")
			{
				alert("QTY Feild is Empty");
				document.getElementById(select44).focus();
				return false;
			}
			var select45="uom"+k;
			if(document.getElementById(select45).value=="")
			{
				alert("UOM Feild is Empty");
				document.getElementById(select45).focus();
				return false;
			}
			var select46="batch"+k;
			if(document.getElementById(select46).value=="")
			{
				alert("Batch Feild is Empty");
				document.getElementById(select46).focus();
				return false;
			}
			var select47="mfg"+k;
			if(document.getElementById(select47).value=="")
			{
				alert("MFG.Date Feild is Empty");
				document.getElementById(select47).focus();
				return false;
			}
			var select48="exp"+k;
			if(document.getElementById(select48).value=="")
			{
				alert("EXP.DT Feild is Empty");
				document.getElementById(select48).focus();
				return false;
			}
			var select49="uqty"+k;
			if(document.getElementById(select49).value=="")
			{
				alert("UQTY Feild is Empty");
				document.getElementById(select49).focus();
				return false;
			}
			var select50="urate"+k;
			if(document.getElementById(select50).value=="")
			{
				alert("URATE Feild is Empty");
				document.getElementById(select50).focus();
				return false;
			}
			var select51="value"+k;
			if(document.getElementById(select51).value=="")
			{
				alert("VALUE Feild is Empty");
				document.getElementById(select51).focus();
				return false;
			}
				
	
		}//for
	}//if
 
		     if(count>=2)
			{
      for(i=1;i!=count;i++)
		{	
		  var select37="pcode"+i;
		var pp=document.getElementById(select37).value;	
		for(j=count;j!=i;j--)
			{	
		 var select32="pcode"+j;
		var p=document.getElementById(select32).value;
		
		if(pp==p)
		{
		
		alert("Product Codes are same ");
		document.getElementById(select32).value="";
		document.getElementById(select32).focus();
		return (false);

		}
		}
		}
		}
		
  
	
	
	document.form.action="salesreturn_insert.php";
	document.form.submit();
	
	
}
</script>

			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Add Sales Return</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="salesreturn.php">Sales Return List</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Add Sales Return</li>
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
                                    <header>Sales Return</header>
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
								
								 <form name="form" method="post" action="salesreturn_insert.php"  >
                                <div class="card-body " id="bar-parent2">
                                	<div class="row">
	                                    <div class="col-md-6 col-sm-6">
	                                        <!-- text input -->
	                                        <div class="form-group">
	                                            <label>Customer Name</label>
	                                            <input type="text" class="form-control" name="custname"   onclick="window.open('sales_return_popup.php','mywindow','width=500,height=550,toolbar=no,resizable=yes,menubar=no,scrollbars=yes')"  required="required" id="custname" >
	                                        </div>
											 <div class="form-group">
	                                            <label>Sale Date</label>
	                                            <input type="date"   value="<?php echo date('Y-m-d');?>" class="form-control" readonly required name="saledate" id="saledate" >
	                                        </div>
										
											 <input type="hidden" name="stype" id="stype" class="textbox1" />			
				
                <input name="invno" type="hidden" class="textbox1" id="invno"/>
										
	                      <input name="authby" type="hidden" class="textbox1" value="<?php echo $ses?>" id="authby"/>               </div>
	                                    <div class="col-md-6 col-sm-6">
                                       
                                        <div class="form-group">
                                            <label>Billing Type</label>
	                                            <input type="text" class="form-control" name="btype" required readonly id="btype" >
                                        </div>
										
										<div class="form-group">
                                            <label>Sale Type</label>
                                           <input type="text" class="form-control" name="stype1" readonly required="required" id="stype1" >
									   </div>
								                                      
                                    </div>
									
                                	</div>
									
									<input type="hidden" name="mvalue"/>
                                </div>
								<div class="table-scrollable">
								<table id="t1" width="99%">
								
								  <tr><td colspan="2" align="center"><div id="productdetails"> <table width="100%" class="ruler" id="TABLE1"></table></div></td></tr>
								
								
			<tr><td>
            	   
           <tr><td width="100%" align="center"><br />

<div id="purtable" valign="top">
                                      					   
														</table>

													</div>	
												<div class="card-body " id="bar-parent2">
                                	<div class="row">
	                                    <div class="col-md-3 col-sm-3">
	                                        <!-- text input -->
											
											<div class="form-group">
                                         
	                                            <input type="hidden" class="form-control" id="nitem" name="nitem" size="10"  onclick="javasript:noitems()" >
                                        </div>										
	                                    </div>
										
										
	                                    <div class="col-md-3 col-sm-3">
                                        <!-- textarea -->
										
										
										<div class="form-group">
                                            <label> Total Amount</label>
                                  <input type="text" class="form-control" name="ntotal" value="0" readonly  id="ntotal" >
									   </div>
                                       	<div class="form-group">
                                            <label> Discount</label>
                                  <input type="text" class="form-control" name="Discount" value="0" onkeyup="javascript:nettotal()"  id="Discount" >
									   </div>
                                        <input name="vat_14" type="hidden" class="textbox" id="vat_14" size="10"/>
										<div class="form-group">
                                            <label>Net Amount</label>
	                                            <input type="text"  class="form-control" name="total"  id="total" onclick="javascript:adjttotal()" >
                                        </div>
										<div class="form-group">
                                            <label>Return Amount</label>
	                                            <input type="text"  class="form-control" name="rtotal"  id="rtotal" onclick="" >
                                        </div>
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
												
												
												
                                                    <input type="submit" class="btn btn-info" name="submit" onclick="save(1)" value="Submit" name=" ">
                                                    <button type="button" class="btn btn-default" onclick="javascript:location.href='salesreturn.php'">Cancel</button>
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