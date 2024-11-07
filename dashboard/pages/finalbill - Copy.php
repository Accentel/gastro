<?php //include('config.php');
session_start();
if($_SESSION['user'])
{
$ses=$_SESSION['user']; 

include('../db/htarrif_list.php');

include("header.php");?>

<script>

function showHint52()
{
var str=document.getElementById("mrno").value;
if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	//document.getElementById("supname").value=strar[2];
	
	document.getElementById("patno").value=strar[1];
	
	document.getElementById("patname").value=strar[2];
	document.getElementById("fname").value=strar[3];
	document.getElementById("age").value=strar[4];
	document.getElementById("sex").value=strar[5];
	document.getElementById("doa").value=strar[6];
	document.getElementById("dichargedate").value=strar[7];
	document.getElementById("address").value=strar[8];
	document.getElementById("doctors").value=strar[9];
	document.getElementById("mobile").value=strar[10];
	var adate=document.getElementById("doa").value;
	var ddate=document.getElementById("dichargedate").value;
	showUser(str,adate,ddate);
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search166.php?q="+str,true);
xmlhttp.send();
}
function showUser(str,adate,ddate) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
     var show=xmlhttp.responseText;
	var strar=show.split(":");
	
	
	document.getElementById("tlamount").value=strar[1];
	document.getElementById("ladamount").value=strar[2];
	document.getElementById("lbamount").value=strar[3];
	document.getElementById("hadamount").value=strar[4];

    }
  }
  xmlhttp.open("GET","search311.php?q="+str+"&adate="+adate+"&ddate="+ddate,true);
  xmlhttp.send();
}
</script>
 <script type="text/javascript" src="jquery-1.11.0.min.js"></script>
     <script>
function addRow()
   {
	  var count=document.getElementById("rows").value
   var newRow = document.getElementById("TABLE1");
   var Row = newRow.rows.length;
   var row = newRow.insertRow(Row);
   var index=row.rowIndex;

	
	oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><select  name='docname[]' id='docname"+Row+"' class='form-control print-type'  data-row='"+Row+"'><option value=''>Select Doctor Name </option><?php $p=mysqli_query($link,"select * from doct_infor");while($row=mysqli_fetch_array($p)){?> <option value='<?php  echo $row['id']?>'><?php echo $row['dname1']; ?></option> <?php } ?></select> </div>"; 
    row.appendChild(oCell);

    oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='days1[]'  id='daysk1"+Row+"'class='form-control changesNo2 ' size='8' style='text-align:right'  value='0'  data-row='"+Row+"' > </div>"; 
     row.appendChild(oCell);
	 
	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='amount1[]' id='amountk1"+Row+"'class='form-control changesNo2' size='8' style='text-align:right'  data-row='"+Row+"'  value='0' > </div>"; 
     row.appendChild(oCell);
	  oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='total1[]' id='total1"+Row+"'class='form-control totalLinePrice txt '  data-row='"+Row+"' size='8' style='text-align:right'   > </div>"; 
     row.appendChild(oCell);

	  //oCell = document.createElement("TD");
	 	// oCell.innerHTML = ""; 
     //row.appendChild(oCell);

     document.getElementById("rows").value=Row;

   }

 function deleteRow()
   {	
var rr=document.getElementById("rows").value

if(rr!=0){
   // var oRow = rr.parentNode.parentNode;
    document.getElementById("TABLE1").deleteRow(rr);  
	var row=document.getElementById("rows").value
	document.getElementById("rows").value=row-1;
total();
	}
	else{
	alert('Please Select Atleast One Row');
	return false;
	}
   }
   
   
   </script>
   <script>
$(document).on('keyup ','.changesNo2',function(){
	
	id = $(this).attr('data-row');
	
	//alert(id);
	days1 = $('#daysk1'+id).val();
	//alert(days1);
	amount1 = $('#amountk1'+id).val();
		//alert(amount10);
	mm= $('#total1'+id).val( (parseFloat(days1)*parseFloat(amount1)).toFixed(2) );



	//calculateTotal();
	
	
});</script>

<script>
function showHint5(str)
{
//var str=document.getElementById('mrno').value;
if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	
	document.getElementById("patname").value=strar[1];
	document.getElementById("age").value=strar[2];
	document.getElementById("sex").value=strar[3];
	document.getElementById("patno").value=strar[4];
	document.getElementById("fname").value=strar[5];
	document.getElementById("mobile").value=strar[6];
	document.getElementById("doa").value=strar[7];
	document.getElementById("address").value=strar[8];
	
	 
	 pharmacy(str);
	 
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search5.php?q="+str,true);
xmlhttp.send();
}

function pharmacy(str){
if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	
	document.getElementById("pharma").value=strar[1];
	
	

	 
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search6.php?q="+str,true);
xmlhttp.send();
}

</script>



			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Final Bill Details</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Billing</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Final Bill Details</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Final Bill Details</header>
                                     <button id = "panel-button" 
				                           class = "mdl-button mdl-js-button mdl-button--icon pull-right" 
				                           data-upgraded = ",MaterialButton">
				                           <i class = "material-icons">more_vert</i>
				                        </button>
				                        <ul class = "mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
				                           data-mdl-for = "panel-button">
				                           <li class = "mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>
				                           <li class = "mdl-menu__item"><i class="material-icons">print</i>Another action</li>
				                           <li class = "mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>
				                        </ul>
                                </div>
                                <div class="card-body" id="bar-parent">
								<?php
			include("../db/connection.php");
			$dt = date('d-m-Y');
			$dt1 = explode("-",$dt);
			$dt2 = implode($dt1);
			$dt3 = ltrim($dt2, '0');
			$str = "BL-".$dt3."-";
			$sql = mysqli_query($link,"select count(distinct bno) from final_bill where bno like '$str%'");
			if($sql){
				$res = mysqli_fetch_array($sql);
				$c = $res[0];
				$bno = $str.($c+1);
			}
		?>
                                    <form action="#" id="form_sample_1" class="form-horizontal" autocomplete="on" method="post" enctype="multipart/form-data">
                                        <div class="form-body">
										 <div class="form-group row">
                                                <label class="control-label col-md-2">Bill No
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="bno"  value="<?php echo $bno; ?>"  id="bno" placeholder="Enter Bill NO" class="form-control" required/> 
												</div>
                                    	</div>
										
                                        <div class="form-group row">
                                                <label class="control-label col-md-2">UMR No
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
												
												<input id="mrno" list=\"city1\" name="mrno" onChange="showHint5(this.value)" class="form-control mrno"   placeholder="Enter MRNO">
<datalist id=\"city1\" >

<?php 
$sql="select distinct PAT_REGNO,PAT_NO  FROM   ip_pat_admit  ";  // Query to collect records
$r=mysqli_query($link,$sql) or die(mysql_error());
while ($row=mysqli_fetch_array($r)) {
echo  "<option value='$row[PAT_REGNO]'/>$row[PAT_NO] </option>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist>
												
												
                                                   <!-- <input type="text" name="mrno"   id="mrno" placeholder="Enter UMR NO" class="form-control mrno" onclick="window.open('finalbill_popup.php','mypatwindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')" readonly="readonly"  required/> 
													 --></div>
                                            
											<label class="control-label col-md-2">Pat No
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="patno" data-required="1" id="patno" placeholder="Enter Patient No" class="form-control" value="" />
													
													</div>
                                           	</div>
											
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Patient Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="patname" data-required="1" value="" id="patname" placeholder="Enter Patient Name" class="form-control " required/>
													
													</div>
                                            <label class="control-label col-md-2">Father Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    
		                                                <input class="form-control " size="16" placeholder="Father Name" type="text"  name="fname" id="fname">
		                                                
	                                            	</div>
	                                    	</div>
																			
											<div class="form-group row">
                                                <label class="control-label col-md-2">Age
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="age" data-required="1" id="age" value="" placeholder="Enter Age " class="form-control" required/> 
													
													</div>
                                            <label class="control-label col-md-2">Sex
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                     <input type="text" name="sex" data-required="1" id="sex" value="" placeholder="Enter Sex " class="form-control" required/> 
	                                            
	                                            </div>
											
											</div>
											<div class="form-group row">
                                                <label class="control-label col-md-2">Contact No
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="mobile" data-required="1" id="mobile" value="" placeholder="Enter Contact No " class="form-control" required/> 
													
													</div>
                                           
											
											</div>
											
											
											<div class="form-group row">
                                                
                                            <label class="control-label col-md-2">Date of Admission
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                                <input class="form-control " size="16" placeholder="Date of Birth" type="text" value="" name="doa" id="doa">
		                                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
	                                            	</div>
	                                            
	                                            </div>
											<label class="control-label col-md-2">Date of Discharge
                                                    <span class="required"> * </span>
                                                </label>
                                                 <div class="col-md-4">
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                                                <input class="form-control " size="16" placeholder="Date of Discharge" type="text" value="<?php echo date('d/m/Y'); ?>" name="dichargedate" id="dichargedate">
		                                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
	                                            	</div>
	                                            
	                                            </div>
											</div>
										
                                            
                                            <div class="form-group row">
                                                <label class="control-label col-md-2">Current Address
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <textarea name="address" id="address" placeholder=" Address" class="form-control-textarea" rows="5" ></textarea>
                                                </div>
												 <label class="control-label col-md-2">Consultant Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <textarea name="doctors" id="doctors" placeholder="Consultant Name" class="form-control-textarea" rows="5" ></textarea>
                                                </div>
                                            </div>
											
                                         
									<div class="form-group row">
                                                <div class="control-label col-md-12" >
                                                   <table class="table">
												   <tr>
												   <th>Description</th>
												   <th>Days</th>
												   <th>Charge</th>
												   <th>Amount</th>
												   </tr>
												   <?php 
												   $i=1;
												   foreach($result as $key=>$y){ ?>
												   <tr>
												   <td><input type="hidden" name="description[]"  data-row="<?php echo $i; ?>" id="description" value="<?php echo $y['tname'];?>"/><?php echo $y['tname'];?></td>
												   <td><input type="text" name="days[]" id="days<?php echo $i; ?>" data-row="<?php echo $i; ?>" value="" class='tet'/></td>
												   <td><input type="text" name="charge[]" id="charge<?php echo $i; ?>" data-row="<?php echo $i; ?>" value="<?php echo $y['amount'];?>" class='tet'/></td>
												   <td><input type="text" name="amount[]" id="amount<?php echo $i; ?>" data-row="<?php echo $i; ?>" value="" class="txt"/></td>
												    
												   </tr>
												   <?php $i++;}?>
												   </table>
                                                </div>
                                                												 
                                            </div>
											
									
											<fieldset style="border:1px solid;">
											
								 <table width="100%" id="TABLE1" border="1">
 <thead>
 <tr><td colspan="4"><br /></td></tr>
  <tr align="center" style="background-color:#000; color:#FFF;">

  <th class="TH1">Dr.Name</th>
   <th class="TH1">No of Days Visit</th>
    <th class="TH1">Amount</th>
 <th class="TH1">Total </th>
  
<th class="THH1"><input name="new" type="button" class="butnbg1" value="  +  " onclick="javascript:addRow()">&nbsp; <input name="new2" type="button" class="butnbg1" value="  -  " onclick="javascript:deleteRow()"></th>

 </tr>
 

 </thead>
   
</table>			
		<br />									
			</fieldset>								
										
							
					
				


     
									<div class="form-group row" id="pharma">
																 
                                            </div>				
											<div class="form-group row">
                                                <label class="control-label col-md-2">Total Hospital Amount
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" name="thamount" id="thamount" placeholder=" Total Hospital Amount" class="form-control " value="0" />
                                                </div>
												
												<label class="control-label col-md-2">Advance Amount
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" name="hadamount" id="hadamount" placeholder=" Total HospitalAdvance  Amount" class="form-control" value="0"/>
                                                </div>
												
												
												<label class="control-label col-md-2">Bal Amount
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" name="hbamount" id="hbamount" placeholder="Hospital Bal Amount" class="form-control" value="0"/>
                                                </div>
																							
												 
                                            </div>
											
											
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Total Lab Amount
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" name="tlamount" id="tlamount" placeholder=" Total Lab Amount" class="form-control" value="0" />
                                                </div>
												
												<label class="control-label col-md-2">Advance Amount
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" name="ladamount" id="ladamount" placeholder=" Total Lab Advance  Amount" class="form-control" value="0"/>
                                                </div>
												
												
												<label class="control-label col-md-2">Bal Amount
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" name="lbamount" id="lbamount" placeholder="Lab Bal Amount" class="form-control" value="0"/>
                                                </div>
																							
												 
                                            </div>
											
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Total Pharmacy Amount
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" name="tpamount" id="tpamount" placeholder=" Total Pharmacy Amount" class="form-control" value="0"/>
                                                </div>
												
												<label class="control-label col-md-2">Advance Amount
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" name="padamount" id="padamount" placeholder=" Total Pharmacy Amount" class="form-control" value="0"/>
                                                </div>
												
												
												<label class="control-label col-md-2">Bal Amount
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" name="pbamount" id="pbamount" placeholder="Pharmacy Bal Amount" class="form-control" value="0"/>
                                                </div>
																							
												 
                                            </div>
											
											
											
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Total 
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" name="total" id="total" placeholder=" Total Amount" class="form-control"  value="0"/>
                                                </div>
												
												<label class="control-label col-md-2">Paid                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" name="paid" id="paid" placeholder=" Total paid Amount" class="form-control" value="0"/>
                                                </div>
												
												
												<label class="control-label col-md-2">Due
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" name="due" id="due" placeholder="Due Amount" class="form-control" value="0"/>
                                                </div>
																							
												 
                                            </div>
											
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Concession 
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" name="concession" id="concession" placeholder=" concession Amount" class="form-control" value="0"/>
                                                </div>
												
													
												
												
																							
												 
                                            </div>
											
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Net Amount 
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" name="namount" id="namount" placeholder=" Net Amount" class="form-control" value="0"/>
                                                </div>
												
													<input type="hidden" name="rows" id="rows" value="0" >
												
												
																							
												 
                                            </div>
											
											
                                           <div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" name="Submit" class="btn btn-info">Submit</button>
                                                    <a href="dischargesummarylist.php"><button type="button" class="btn btn-default">Cancel</button></a>
                                                </div>
                                            	</div>
                                        	</div>
										</div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page content -->
            <!-- start chat sidebar -->
            
            <!-- end chat sidebar -->
        </div>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>    
<script type="text/javascript">

$(document).on('keyup ','.tet',function(){
	
	id = $(this).attr('data-row');
	//alert(id);
	days = $('#days'+id).val();
	
	cost = $('#charge'+id).val();
		
	$amnt= $('#amount'+id).val( (parseFloat(days)*parseFloat(cost)).toFixed(2) );

	calculateTotal2();
	
	});
	
	
	function calculateTotal2(){
	subTotal = 0 ; total = 0; 
	$('.txt').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#thamount').val(subTotal.toFixed(2) );
	t=$('#thamount').val();
	//alert(t);
	$('#txtTot1').val(subTotal.toFixed(2));
	t3=$('#txtTot1').val();
	//alert(t3);
	labtot=$("#labtot").val();
pharmacytot=$("#pharmacytot").val();
t5=parseFloat(t3)+parseFloat(labtot)+parseFloat(pharmacytot);
$("#txtTot1").val(t5.toFixed(2));
$("#netamt").val(t5.toFixed(2));


hospitalpaid=$("#hosppaid").val();
hospdue=parseFloat(t)-parseFloat(hospitalpaid);
$("#hospdue").val(hospdue.toFixed(2));
labpaid=$("#labpaid").val();
pharmacypaid=$("#pharmacypaid").val();
tp=parseFloat(hospitalpaid)+parseFloat(labpaid)+parseFloat(pharmacypaid)
$("#totpaid").val(tp.toFixed(2));

tp1=$("#totpaid").val();
tdue=parseFloat(t5)-parseFloat(tp1);
$("#totdue").val(tdue.toFixed(2));
	
	//$('#txtTot1').val( subTotal.toFixed(2) );
	//$('#netamt').val( subTotal.toFixed(2) );
	
}

/*$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
calculateTableSum(currentTable);
});*/
$(".txt").each(function(){
$(this).keyup(function(){
calculateTotal2();
});
});

$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents(".form-group").remove();
	$('#check_all').prop("checked", false); 
	calculateTotal();
});


var i=2;
$(".addmore1").on('click',function(){
     
	var data ="<div class='form-group'>";
   
    data +="<div class='col-sm-12'>";          
    data +="<input type='checkbox' class='case'/><select class='text' id='mtype"+i+"' data-row='"+i+"' name='mtype[]'> <option value=''>Select Type</option><?php $r2 = $crud->getdata('select * from phr_prdtype_mast'); foreach($r2 as $key=>$r){?><option value='<?php echo $r['PRDTYPE_NAME']?>'><?php echo $r['PRDTYPE_NAME']?></option><?php }?></select><input type='text' class='text print-type10' id='pname"+i+"' data-row='"+i+"' name='pname[]' placeholder='Drug Name'/><input type='text' class=' ' id='generic"+i+"' data-row='"+i+"' name='generic[]' placeholder='Generic' style='width:90px;'/><input type='text' class=' ' id='dtime"+i+"' data-row='"+i+"' name='dtime[]' placeholder='Dosage Time' style='width:90px;'/><input type='text' class=' ' id='dadmin"+i+"' data-row='"+i+"' name='dadmin[]' placeholder='Route ' style='width:90px;'/><input type='text'  id='Days"+i+"' data-row='"+i+"' name='Days[]' placeholder='Days' style='width:50px;'/><input type='text'  id='qty"+i+"' data-row='"+i+"' name='qty[]' placeholder='Quantity' style='width:50px;'/><input type='text'  id='indication"+i+"' data-row='"+i+"' name='indication[]' placeholder='indication' style='width:90px;'/>";
   data +="<input type='hidden' name='ksr[]' value='1'/>";
    data +="</div></div>";
	
	
	
	
	
	$('.osu1').append(data);
	i++;
});



function select_all() {
	$('input[class=case]:checkbox').each(function(){ 
		if($('input[class=check_all]:checkbox:checked').length == 0){ 
			$(this).prop("checked", false); 
		} else {
			$(this).prop("checked", true); 
		} 
	});
	
	
		
}

</script>  
        <!-- end page container -->
        <!-- start footer -->
       <?php include("footer.php");?>
	    <?php 

}else
{
session_destroy();

session_unset();

header('Location:../../index.php?authentication failed');

}

?>