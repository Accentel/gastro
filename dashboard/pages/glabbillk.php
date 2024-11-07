<?php //include('config.php');
session_start();
if($_SESSION['user'])
{
$ses=$_SESSION['user']; 
include('../db/insert_labbill1.php');
include('../db/connection.php');
include("header.php");?>
<script>

for(var i=1;i<=10;i++){
	//var sy="showHint()"+i;
	//alert(sy);
function showHint(i)
{
var str=document.getElementById('tname'+i).value;
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
	
	document.getElementById("amount"+i).value=strar[1];
	calculateSum();
	var cost = document.getElementById("cost1").value;
	var tot = document.getElementById("tot").value;
	tot = parseFloat(tot)+parseFloat(cost);
	document.getElementById("tot").value=tot;
	document.getElementById("price").value=tot;
	document.getElementById("bal").value=tot;
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search117.php?q="+str,true);
xmlhttp.send();
}

}


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
	
	document.getElementById("pname").value=strar[1];
	document.getElementById("age").value=strar[2];
	document.getElementById("gender").value=strar[3];
	document.getElementById("dname").value=strar[4];
	document.getElementById("mobile").value=strar[5];
	document.getElementById("ptype").value=strar[6];
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search216.php?q="+str,true);
xmlhttp.send();
}



</script>
<script type="text/javascript">
tday  =new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

function GetClock(){
d = new Date();
nday   = d.getDay();
nmonth = d.getMonth();
ndate  = d.getDate();
nyear = d.getYear();
nhour  = d.getHours();
nmin   = d.getMinutes();
nsec   = d.getSeconds();

if(nyear<1000) nyear=nyear+1900;

     if(nhour ==  0) {ap = " AM";nhour = 12;} 
else if(nhour <= 11) {ap = " AM";} 
else if(nhour == 12) {ap = " PM";} 
else if(nhour >= 13) {ap = " PM";nhour -= 12;}

if(nmin <= 9) {nmin = "0" +nmin;}
if(nsec <= 9) {nsec = "0" +nsec;}


document.getElementById('time').value=" "+nhour+":"+nmin+":"+nsec+ap+"";

setTimeout("GetClock()", 1000);
}
window.onload=GetClock;
</script>
<script>
function showuser(str){
	//alert(str);
	if(str=="general"){
		document.getElementById('mid').style.display="none";
		document.getElementById('d1').style.display="none";
		document.getElementById('d2').style.display="none";
		
	}
	if(str=="OP"){
		document.getElementById('mid').style.display="";
		document.getElementById('d1').style.display="";
		document.getElementById('d2').style.display="";
		
	}
	if(str=="IP"){
		document.getElementById('mid').style.display="";
		document.getElementById('d1').style.display="";
		document.getElementById('d2').style.display="";
		
	}
	
}

</script>
<script type="text/javascript">
   function showUser1111(str){
	//alert(str);
	if(str == "Free"){
	

		document.getElementById("balamount").value="0";
		//document.getElementById("rec_type1").style.display='none';
		
		
		//alert(val);
	}else {
	
		var val=document.getElementById("con_fee1").value;
		//alert(val);
		document.getElementById("balamount").value=val;
			
		
	}
	
}
		</script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 


			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">General Procedure Bill</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Billing</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">General  Procedure Bill</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>General Procedure Bill</header>
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
								
                                    <form action="#" id="form_sample_1" class="form-horizontal" method="post">
                                        <div class="form-body">
										
										
										<div class="form-group row">
                                                <label class="control-label col-md-2">Patient Type
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                   <!-- <select  name="ptype" id="ptype" class="form-control" required onchange="showuser(this.value);">
													<option value="">Select patient Type</option>
													<option value="general">General</option>
													<option value="OP">OP</option>
													<option value="IP">IP</option>
													</select>-->
	<input type="radio" name="ptype" value="OP" onClick="window.location.href='labbillk.php';" />&nbsp;OP&nbsp;<input type="radio" name="ptype" value="IP" onClick="window.location.href='iplabbillk.php';"/>&nbsp;IP&nbsp;<input type="radio" name="ptype" value="General" checked />&nbsp;General													
													
													</div>
											                                   
											
											</div>
																									
										
                                       				
											<div class="form-group row">
                                                <label class="control-label col-md-2">Bill No
                                                    <span class="required"> * </span>
                                                </label>
												
											
                                                <div class="col-md-4">
												<?php $y=date('Y');
												$dxx1=date($y.'-01-01');
$d2=date($y.'-12-31');
$aa="select max(`reg_no`) as id from bill_proc where bdate between '$dxx1' and '$d2'  ";
$qs=mysqli_query($link,$aa);
$r2=mysqli_fetch_array($qs);
    $new1=$r2['id'];
    $new=$new1 + 1;
 
 $reg=(($new."0000".$y));
						
											?>
                                                    <input type="text" name="bno" data-required="1" id="bno" placeholder="Enter Bill No" class="form-control" value="<?php echo $reg; ?>" />
													 <input type="hidden" name="user"  id="user"  class="form-control" value="<?php echo $ses; ?>" />
													 <input type="hidden" name="reg_no"  value="<?php echo $new; ?>" id="reg_no"  class="form-control"  /> 
													</div>
											
                                            <label class="control-label col-md-2">Bill Date
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    
		                                                <input class="form-control " size="16" placeholder="Bill Date" type="date" value="<?php echo date('Y-m-d'); ?>" name="bdate" id="bdate">
		                                                
	                                            
	                                            </div>
											
											</div>
											
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Patient Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="pname" data-required="1" id="pname"  placeholder="Enter Patient Name" class="form-control" required/> 
													
													</div>
												<label class="control-label col-md-2">Age
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
												<input type="text" name="age" data-required="1" id="age"  placeholder="Enter Age" class="form-control" required/> 
                                              </div>
											
											</div>
											
											
											 <div class="form-group row">
                                                <label class="control-label col-md-2">Gender
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="gender" data-required="1" id="gender"   placeholder="Enter Gender" class="form-control" required/> 
													
													</div>
													
                                            <label class="control-label col-md-2" id="d1" >Doctor Name</label>
                                                <div class="col-md-4" id="d2">
                                                    <input type="text" name="dname" data-required="1" id="dname" placeholder="Enter Doctor Name" class="form-control" /> 
													</div>
                                           
											
											</div>
											
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Mobile No</label>
                                                <div class="col-md-4">
                                                    <input type="text" name="mobile" data-required="1" id="mobile" placeholder="Enter Mobile No" class="form-control" /> </div>
                                           <label class="control-label col-md-2">Time
                                                  
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="time" data-required="1" id="time" placeholder="" class="form-control" /> </div>
                                           
											
											</div>
											
											<div align="right">
	
<button type="button" class='btn btn-success addmore'>+</button>
<button type="button" class='btn btn-danger delete'>-</button>
	</div>										
											
											<div class="form-group row">
											<div class="col-md-12">
											<table class=" full-width" id="table" >
					                                        <thead>
					                                            <tr>
					                                            	<th></th>
																	 <th> Test Name </th>
					                                                <th> Amount </th>
														        </tr>
					                                        </thead>
					                                        <tbody>
					                                            <tr>
												   <td><input type='checkbox' class='case'/></td>
   
	
	<td><select name="tname[]"  id='tname1' data-row='1' style="width:300px;" class="form-control" onChange="showHint(1)">
	<option value="">Select Test Name</option>
	<?php 
	$u=mysqli_query($link,"select * from procedure1 order by name asc") or die(mysqli_error($link));
	while($u1=mysqli_fetch_array($u)){
	?>
	<option value="<?php echo $u1['name']; ?>"><?php echo $u1['name']; ?></option>
	<?php }?>
	</select></td>
	<td><input type='text' name='amount[]'    id='amount1' data-row='1' readonly value='0' class='form-control col-md-4 txt' onkeyup='calculateSum()'/></td>
												        
   
    </tr>
															 <tr>
					                                            	<!--<th></th>
																	 <th> <input type="text" name="tname[]"  id="tname1" placeholder="" class="form-control col-md-4 tname1" onChange="showHint(1)" /></th>
					                                                <th> <input type="text" name="amount[]"  id="amount1" placeholder="" class="form-control col-md-4 txt" /> </th>
														        </tr>
																<tr>
					                                            	<th></th>
																	 <th> <input type="text" name="tname[]"  id="tname2" placeholder="" class="form-control col-md-4 tname2" onChange="showHint(2)"/></th>
					                                                <th> <input type="text" name="amount[]"  id="amount2" placeholder="" class="form-control col-md-4 txt" /> </th>
														        </tr>
																<tr>
					                                            	<th></th>
																	 <th> <input type="text" name="tname[]"  id="tname3" placeholder="" class="form-control col-md-4 tname3" onChange="showHint(3)"/></th>
					                                                <th> <input type="text" name="amount[]"  id="amount3" placeholder="" class="form-control col-md-4 txt" /> </th>
														        </tr>
																<tr>
					                                            	<th></th>
																	 <th> <input type="text" name="tname[]"  id="tname4" placeholder="" class="form-control col-md-4 tname4" onChange="showHint(4)"/></th>
					                                                <th> <input type="text" name="amount[]"  id="amount4" placeholder="" class="form-control col-md-4 txt" /> </th>
														        </tr>
																<tr>
					                                            	<th></th>
																	 <th> <input type="text" name="tname[]"  id="tname5" placeholder="" class="form-control col-md-4 tname5" onChange="showHint(5)"/></th>
					                                                <th> <input type="text" name="amount[]"  id="amount5" placeholder="" class="form-control col-md-4 txt" /> </th>
														        </tr>
																<tr>
					                                            	<th></th>
																	 <th> <input type="text" name="tname[]"  id="tname6" placeholder="" class="form-control col-md-4 tname6" onChange="showHint(6)"/></th>
					                                                <th> <input type="text" name="amount[]"  id="amount6" placeholder="" class="form-control col-md-4 txt" /> </th>
														        </tr>
																<tr>
					                                            	<th></th>
																	 <th> <input type="text" name="tname[]"  id="tname7" placeholder="" class="form-control col-md-4 tname7" onChange="showHint(7)"/></th>
					                                                <th> <input type="text" name="amount[]"  id="amount7" placeholder="" class="form-control col-md-4 txt" /> </th>
														        </tr>
																
																<tr>
					                                            	<th></th>
																	 <th> <input type="text" name="tname[]"  id="tname8" placeholder="" class="form-control col-md-4 tname8" onChange="showHint(8)"/></th>
					                                                <th> <input type="text" name="amount[]"  id="amount8" placeholder="" class="form-control col-md-4 txt" /> </th>
														        </tr>
																
																<tr>
					                                            	<th></th>
																	 <th> <input type="text" name="tname[]"  id="tname9" placeholder="" class="form-control col-md-4 tname9" onChange="showHint(9)"/></th>
					                                                <th> <input type="text" name="amount[]"  id="amount9" placeholder="" class="form-control col-md-4 txt" /> </th>
														        </tr>
																
																<tr>
					                                            	<th></th>
																	 <th> <input type="text" name="tname[]"  id="tname10" placeholder="" class="form-control col-md-4 tname10" onChange="showHint(10)"/></th>
					                                                <th> <input type="text" name="amount[]"  id="amount10" placeholder="" class="form-control col-md-4 txt" /> </th>
														        </tr>-->
														        
															</tbody>
											</table>
											
											</div>
                                            </div>
                                            
											<div class="form-group row">
                                                <label class="control-label col-md-2">Total Amount
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="tamount" readonly data-required="1" id="tamount"  value="" placeholder="Enter Total Amount" class="form-control" required/> 
													
													</div>
                                            <label class="control-label col-md-2">Discount
                                                    
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="discount"  value="0" id="discount" placeholder="Enter Discount" class="form-control txt1" /> </div>
                                            
											
											</div>
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Net Amount
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="namount" readonly id="namount"  value="" placeholder="Enter Net Amount" class="form-control" required/> 
													
													</div>
                                            <label class="control-label col-md-2">Pay Amount
                                                    
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="pamount"  id="pamount"  placeholder="Enter Paid Amount" value="0" class="form-control txt2" /> </div>
                                            
											
											</div>
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Balance Amount
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="balamount"  readonly id="balamount"  value="" placeholder="Enter Balance Amount" class="form-control" required/> 
													
													</div>
                                            <label class="control-label col-md-2">Remarks
                                                    
                                                </label>
                                                <div class="col-md-4">
                                                    <textarea name="remarks"  id="remarks" placeholder="Enter Remarks" class="form-control" ></textarea> </div>
                                            
											
											</div>
											<div class="form-group row">
                                                <label class="control-label col-md-2">Payment Type
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select name="paymenttype"  id="paymenttype" required class="form-control" onchange="showUser1111(this.value)" required> 
													<option value="">Select Payment</option>
													<option value="cash">Cash</option>
													<option value="card">Card</option>
													<option value="Free">Free</option>
														<option value="Bank">Bank</option>
													</select>
													</div>
                                           
                                                
											
											</div>
                                           
                                           <div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" name="Submit" class="btn btn-info">Submit</button>
                                                    <a href="labbilllist.php"><button type="button" class="btn btn-default">Cancel</button></a>
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
        <!-- end page container -->
        <!-- start footer -->
       <?php include("footer.php");?>
	   
	   <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>    
<script type="text/javascript">
$(function() {
    
    //autocomplete
    $(".mrno").autocomplete({
        source: "set9.php",
        minLength: 1
    });    


;})

$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
calculateTotal2();
});
$(".txt").each(function(){
$(this).keyup(function(){
calculateTotal2();
});
});


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



});
function callus(i)
{
    
    //autocomplete
    $(".tname"+i).autocomplete({
        source: "set19999.php",
        minLength: 1
    });  
   
	
}
function calculateSum(){
var sum=0;
$(".txt").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value)
;}});
$("#tamount").val(sum.toFixed(2));
$("#namount").val(sum.toFixed(2));
$("#balamount").val(sum.toFixed(2))

;}


function calculateSum1(){
var sum1=0;
$(".txt1").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum1+=parseFloat(this.value)
;}});
$t=$("#tamount").val();

$d=$("#discount").val();
$n=parseFloat($t)-parseFloat($d);
$("#namount").val($n);
$("#balamount").val($n)

;}


var i=2;
$(".addmore").on('click',function(){
	
	var data ="<tr>";
    data +="<td><input type='checkbox' class='case'/></td>";
	data +="<td><select name='tname[]'  id='tname"+i+"' data-row='"+i+"' style='width:300px;' class='form-control'  onChange='showHint("+i+")'><option value=''>Select Description</option>";
	<?php 
	$u=mysqli_query($link,"select * from procedure1 order by name asc") or die(mysqli_error($link));
	while($u1=mysqli_fetch_array($u)){
	?>
	data +="<option value='<?php echo $u1["name"]; ?>'><?php echo $u1["name"]; ?></option>";
	<?php }?>
	data +="</select></td>";
	
	data +="<td><input type='text' name='amount[]' id='amount"+i+"' readonly data-row='"+i+"' value='0' class='form-control col-md-4 txt' onkeyup='calculateSum()' /></td>";
												        
   
    data +="</tr>";
												   
	$('#table ').append(data).find('#table>tbody>tr:nth-child(2)');
	callus
	i++;
});


function calculateSum2(){
var sum2=0;
$(".txt2").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum2+=parseFloat(this.value)
;}});
//$("#tamount").val(sum.toFixed(2));
$ts=$("#namount").val();
$pm=$("#pamount").val();
$bm=parseFloat($ts)-parseFloat($pm);
$("#balamount").val($bm);

;}
	   </script>
	    <?php 

}else
{
session_destroy();

session_unset();

header('Location:../../index.php?authentication failed');

}


?>