<?php
session_start();
 $ses= $_SESSION['user'] ;
 if($_SESSION['user'])

{
 ?>
<?php include("header.php");


?>
<link rel="stylesheet" href="../css/all1.css" type="text/css" /> 
<script>

function qtychek(str,row){

var sqt=document.getElementById("sqty"+row).value;


if(eval(sqt)<eval(str)){
alert("Check Return Quntity Should be Less Than Purchage Quantity");
document.getElementById("rqty"+row).value="";
return false;
}
tot(str,row);
}

function tot(str,row)
{
		var value3="rrate"+row;
		var rrate=document.getElementById(value3).value;
		var vat=document.getElementById("vat"+row).value;
var sum=eval(rrate)*eval(str)

var vatsum=(vat/100)*sum;

document.getElementById("vatamt"+row).value=vatsum.toFixed(2);
	document.getElementById("amt"+row).value=eval(sum);
nettot();		
}

function nettot()
{
	var sum2=0;
	var sum1=0;
var vatsum=0;
	var count2=document.form.rows.value;

	for(k=1;k<=count2;k++)
	{
		var value1="amt"+k;
		var value2=document.getElementById(value1).value;
		var disc=document.getElementById("disc"+k).value;
		var rqt=document.getElementById("rqty"+k).value;
                  var vsum=document.getElementById("vatamt"+k).value
				  
		var dd=eval(rqt)*eval(disc);
sum1=eval(sum1)+eval(dd);
		sum2=eval(sum2)+eval(value2);
		vsum=0;
vatsum=eval(vatsum)+eval(vsum);
	}
sum2=(eval(sum2)+eval(vatsum))-eval(sum1);
	document.getElementById("total").value=sum2;
	document.getElementById("total1").value=sum2;
document.getElementById("totalvat").value=vatsum;
	document.getElementById("disctot").value=sum1;

if(count2==0){	document.getElementById("disctot").value=sum1;
document.getElementById("total").value=0;
document.getElementById("total1").value=0;}
}

function invfun(str){
 xmlHttp=GetXmlHttpObject();
  if (xmlHttp==null){
  alert ("Browser does not support HTTP Request")
  return
  }
  var url="purchase_return_inv1.php"
  url=url+"?emp_id="+str;
  xmlHttp.onreadystatechange=stateChanged 
 xmlHttp.open("GET",url,true)
 xmlHttp.send(null)
	 }
function stateChanged(){ 
	  if (xmlHttp.readyState==4){ 
		  var showdata = xmlHttp.responseText; 
//alert(showdata)

		  var strar =showdata.split("@");
		  if(strar.length>0){
			 // window.opener.location.reload();
			 //window.location.reload(); 
		//alert(strar[0]+"---"+strar[1]);
			document.getElementById("recdate").value=strar[1];
			document.getElementById("invdate").value=strar[0];
			document.getElementById("ptype").value=strar[2];
			}
	  }
  }
  
function GetXmlHttpObject(){
	  var xmlHttp=null;
	  try{
		  // Firefox, Opera 8.0+, Safari
		  xmlHttp=new XMLHttpRequest();
	  }
	  catch (e){
		  //Internet Explorer
		  try{
			  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		  }
		  catch (e){
			  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
	  }
	  return xmlHttp;
  }
</script>

<script>


//////////////////////////addrow starts//////////
function Addrow()
{
  if(document.form.supcode.value=="")
	{
		alert("Please Click On SupplierCode");
		document.form.supcode.focus();
		return false;
	}

	 if(document.form.invno.selectedIndex==0)
	{
		alert("Please Click On Invoice No");
		document.form.invno.focus();
		return false;
	}
   
     
   var count=document.getElementById("rows").value
	   
	   for(k=1;k<=count;k++)
		{
		  var select3="pcode"+k;
		  		  						
			if(document.getElementById(select3).value=="")
			{
				alert("Please Click on Product Code Feild");
				document.getElementById(select3).focus();
				return false;
			}
			
				
			var select9="rqty"+k;
			if(document.getElementById(select9).value=="")
			{
				alert("Return Quantity Feild is Empty");
				document.getElementById(select9).focus();
				return false;
			}
			
			var select11="rrate"+k;
			if(document.getElementById(select11).value=="")
			{
				alert("Return Rate Feild is Empty");
				document.getElementById(select11).focus();
				return false;
			}
								
	
		}//for
 
		     if(count>=2)
			{
      for(i=1;i!=count;i++)
		{	
		  var select3="pcode"+i;
		var pp=document.getElementById(select3).value;	
		for(j=count;j!=i;j--)
			{	
		 var select32="pcode"+j;
		var p=document.getElementById(select32).value;
		
		if(pp==p)
		{
		
		alert("Product Codes are same ");

		document.getElementById(select32).value="";
		document.getElementById(select32).focus();
		document.getElementById('TABLE1').deleteRow(j);
			document.getElementById("rows").value=eval(count)-1;
		nettot();
		return (false);

		}
		}
		}
		}
		
    



  // var count=document.getElementById("rows").value
	  var supcode1=document.getElementById("supcode").value
		 var invoic_no=document.form.invno.value
   var newRow = document.getElementById("TABLE1");
   var Row = newRow.rows.length;
   var row = newRow.insertRow(Row);
   var index=row.rowIndex;

	 var oCell = document.createElement("TD");
    oCell.innerHTML= "<div align='center' ><input  type='text' name='pcode"+Row+"' id='pcode"+Row+"' class='textbox' onblur='sameinvcode()'  size='4' onclick=window.open('prdret_itemcode_pop.php?rowid="+Row+"&supcode="+supcode1+"&invcno="+invoic_no+"','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no') readonly> </div>"; 
	<!------onblur='sameroomno("+Row+")'----->
	row.appendChild(oCell);

	oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><input  type='text' name='pname"+Row+"' onclick=window.open('prdret_itemcode_pop.php?rowid="+Row+"&supcode="+supcode1+"&invcno="+invoic_no+"','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no') id='pname"+Row+"' class='textbox'  size='15'> </div>"; 
    row.appendChild(oCell);

   oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><input  type='text' name='manfby"+Row+"' id='manfby"+Row+"' class='textbox'  size='15'> </div>"; 
    row.appendChild(oCell);

  oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='hidden' name='packing"+Row+"' id='packing"+Row+"' class='textbox' size='5'  > </div>"; 
    // row.appendChild(oCell);
	 
 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='hidden' name='noi"+Row+"' id='noi"+Row+"' class='textbox' size='3'  > </div>"; 
    // row.appendChild(oCell);

  

	oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><input  type='text' name='bno"+Row+"' id='bno"+Row+"' class='textbox' size='5' > </div>"; 
    row.appendChild(oCell);

  
	 
	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='vat"+Row+"' id='vat"+Row+"'class='textbox'  size='4'><input  type='hidden' name='vatamt"+Row+"' id='vatamt"+Row+"'class='textbox'  size='4'> </div>"; 
     row.appendChild(oCell);

	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='sqty"+Row+"' id='sqty"+Row+"'class='textbox'  size='4'><input  type='hidden' name='disc"+Row+"' id='disc"+Row+"'class='textbox'  size='4'> </div>"; 
     row.appendChild(oCell);

	 

	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='srate"+Row+"' id='srate"+Row+"'class='textbox'  size='4'  readonly> </div>"; 
   //  row.appendChild(oCell);

	
	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center'><input type='text' name='value"+Row+"' id='value"+Row+"' class='textbox'  size='4' readonly> </div>"; 
    // row.appendChild(oCell);


  oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='hidden' name='disc"+Row+"' id='disc"+Row+"'class='textbox'  size='4'></div>"; 
     //row.appendChild(oCell);
	 
		 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='rrate"+Row+"' id='rrate"+Row+"' class='textbox'  size='5' readonly> </div>"; 
     row.appendChild(oCell);

	  oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center'><input type='text' name='rqty"+Row+"' id='rqty"+Row+"' class='textbox'  size='3' onkeyup='qtychek(this.value,"+Row+")'> </div>"; 
     row.appendChild(oCell);

	 	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='amt"+Row+"' id='amt"+Row+"' class='textbox'  size='5'  readonly><input  type='hidden' name='inv_id"+Row+"' id='inv_id"+Row+"' class='textbox'  size='5'  readonly> </div>"; 
     row.appendChild(oCell);

     document.getElementById("rows").value=Row;
//sameinvcodes(Row);

   }//addrow()
   
   
/*
function deleteRow()
{
  var tbl = document.getElementById('TABLE1');
  var lastRow = tbl.rows.length;
var rowss=document.getElementById("rows").value;
  if (lastRow > 1){ tbl.deleteRow(lastRow - 1);document.getElementById("rows").value=eval(rowss)-1;
}
  else{ alert('Please Select Row');return false;}
}
*/
 function deleteRow(tableID) {  
            var tbl = document.getElementById('TABLE1');
   var lastRow = tbl.rows.length;
    var rowss=document.getElementById("rows").value;
  if (lastRow > 1){ 
				 /* var txtAmt="amt"+rowss;
				  var aa= document.getElementById(txtAmt).value;
				  var amt2=eval(aa);
				  var bb=document.form.total.value;
				    sum=bb-amt2;
				  document.form.total.value = eval(sum);*/ 	
  tbl.deleteRow(lastRow - 1);document.getElementById("rows").value=eval(rowss)-1;
nettot();


}
  else{ alert('Please Select Row');return false;}
}
</script>
<script>
function save(finflg)
{
	
document.getElementById("fin_flag").value=finflg

if(document.form.supcode.value=="")
{
alert("Please Click On SupplierCode");
return false;
}

if(document.form.invno.selectedIndex==0)
{
alert("Please Click On Invoice No ");
return false;
}


var count=document.getElementById("rows").value
	   for(k=1;k<=count;k++)
		{
		  var select3="pcode"+k;
		  		  						
			if(document.getElementById(select3).value=="")
			{
				alert("Please Click on Product Code Feild in Row No"+k);
				document.getElementById(select3).focus();
				return false;
			}
			
			var select9="rqty"+k;
			if(document.getElementById(select9).value=="")
			{
				alert("Return Quantity Feild is Empty in Row No"+k);
				document.getElementById(select9).focus();
				return false;
			}
			
			var select11="rrate"+k;
			if(document.getElementById(select11).value=="")
			{
				alert("Return Rate Feild is Empty in Row No"+k);
				document.getElementById(select11).focus();
				return false;
			}
			
					
	
		}//for
 
		     if(count>=2)
			{
      for(i=1;i!=count;i++)
		{	
		  var select3="pcode"+i;
		var pp=document.getElementById(select3).value;	
		for(j=count;j!=i;j--)
			{	
		 var select32="pcode"+j;
		var p=document.getElementById(select32).value;
		
		if(pp==p)
		{
		
		alert("Product Codes are same ");
		document.getElementById(select32).value="";
		document.getElementById(select32).focus();
		document.getElementById('TABLE1').deleteRow(j);
		document.getElementById("rows").value=eval(count)-1;
		nettot();
		return (false);

		}
		}
		}
		}



  
	//document.form.action="insert_purchase_return.php";
	document.form.submit();
	
}
</script>
<?php 
$sql = mysqli_query($link,"select max(lr_no) from phr_pur_returns_mast");
if($sql)
{
	$row = mysqli_fetch_array($sql);
	$pnid = $row[0];
}?>
			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Add Purchase Return</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="purchase_return_list.php">Purchase Return List</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Add Purchase Return</li>
                            </ol>
                        </div>
                    </div>
				<?php 	
				
				 $a="select max(lr_no) from phr_pur_returns_mast";
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
                                    <header>Purchase Return</header>
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
								
								 <form name="form" method="post" action="insert_purchase_return.php" >
								  <input type="hidden" name="authby" value="<?php echo $ses ?>" />
                                <div class="card-body " id="bar-parent2">
                                	<div class="row">
	                                    <div class="col-md-6 col-sm-6">
	                                        <!-- text input -->
	                                        <div class="form-group">
	                                            <label>Supplier Code</label>
	                                            <input type="text" class="form-control" name="supcode"  onclick="window.open('purchase_return_popup.php','mypatwindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')"  required="required" id="supcode" >
	                                        </div>
											<div class="form-group">
                                            <label>Address</label>
                                   <textarea  class="form-control" name="addr" readonly id="addr" ></textarea>
									   </div>
										<div class="form-group">
	                                            <label>City</label>
	                                            <input type="text" class="form-control" name="city"  id="city" readonly >
	                                        </div>
											<br/>
											<div class="form-group">
                                            <label>Invoice No.</label>
                                           <div id="invdiv">
				    <select name="invno" id="invno" class="form-control">
                        <option selected="selected">--Select--</option>
				      </select>
				    </div>
									   </div>
	                                    </div>
	                                    <div class="col-md-6 col-sm-6">
                                       
                                        <div class="form-group">
                                            <label>Supplier Name</label>
	                                            <input type="text" class="form-control" name="supname" required readonly id="supname" >
                                        </div>
										
										<div class="form-group">
                                            <label>Purchase Return No.</label>
                                   <input type="text" class="form-control" name="retno" value="<?php echo "RET".($pnid+1); ?>" readonly  required="required" id="retno" >
									   </div>
									
                                        
										
										<div class="form-group">
	                                          <br />
	                                        </div>  
										
										
										
										<div class="form-group">
                                            <label>Purchase Type</label>
                                           <input type="text" class="form-control" name="ptype" readonly required="required" id="ptype" >
									   </div>
									  <br/>
									 <div class="form-group">
	                                            <label>Invoice Date</label>
	                                            <input type="date"   value="<?php echo date('Y-m-d');?>" class="form-control" required name="invdate" id="invdate" >
	                                        </div>
											<div class="form-group">
	                                            <label>Received Date</label>
	                                            <input type="date"   value="<?php echo date('Y-m-d');?>" class="form-control" required name="recdate" id="recdate" >
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
                                      					   <table class="table table-hover table-checkable order-column full-width" border="1" id="TABLE1">
					                                        <thead>
					                                            <tr>
																<th width="10%" class="TH1">P.Code </th>  
					                                            	 <th width="10%" class="TH1">P.Name </th>     
																		<th width="7%" class="TH1">Mnf.By</th>
																		<th width="7%" class="TH1">Batch.No</th> 																	
																	     <th width="7%" class="TH1">GST</th>
																		<th width="7%" class="TH1">Tot Qty</th>
																		<th width="7%" class="TH1">Rate</th>
																		<th width="7%" class="TH1">Rtrn Qty</th>
																		<th width="7%" class="TH1">Amount</th>
																		
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
											
										
	                                            <input type="hidden" class="form-control" id="nitem" name="nitem" size="10"  onclick="javasript:noitems()" >
                                        										
	                                    </div>
										
										
	                                    <div class="col-md-3 col-sm-3">
                                        <!-- textarea -->
										
											<div class="form-group">
                                            <label> Total Amount</label>
                                  <input type="text" class="form-control"  value="0" onkeyup="javascript:nettotal()" readonly  name="total"  id="total" >
									   </div>
										
                                       	<div class="form-group">
                                            <label> Discount</label>
                                  <input type="text" class="form-control" name="disctot" value="0" onkeyup="javascript:krk1()"  id="disctot" >
									   </div>
										
										<!--<div class="form-group">
                                            <label> GST</label>
                                  <input type="text" class="form-control" name="totalvat" value="0" onkeyup="javascript:nettotal()"  id="totalvat" >
									   </div>-->
                                        <input name="vat_14" type="hidden" class="textbox" id="vat_14" size="10"/>
										<div class="form-group">
                                            <label>Net Amount</label>
	                                            <input type="text" readonly="readonly" class="form-control" name="total1"  id="total1" onclick="javascript:adjttotal()" >
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
function krk1(){
	//alert("hi");
	
	var gtot=document.getElementById("total").value;
	var paid=document.getElementById("disctot").value;
	
	var ss=eval(gtot)-eval(paid);
document.getElementById("total1").value=ss;
}</script>
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
                                                    <input type="submit" class="btn btn-info" name="submit" onclick="save1()" value="Submit" name=" ">
                                                    <button type="button" class="btn btn-default" onclick="javascript:location.href=''">Cancel</button>
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