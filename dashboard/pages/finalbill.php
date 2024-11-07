<?php //include('config.php');
session_start();
if($_SESSION['user'])
{
$ses=$_SESSION['user']; 
include('../db/itarrif_list.php');

include("header.php");?>
<script>
function showHint52()
{
var str=document.getElementById("umrno").value;
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
	showUser(str)
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search67.php?q="+str,true);
xmlhttp.send();
}
function showUser(str) {
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
      document.getElementById("labre").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","search31.php?q="+str,true);
  xmlhttp.send();
}
</script>
<script src="//cdn.ckeditor.com/4.5.10/full/ckeditor.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 

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
								
                                    <form action="final_bill.php" id="form_sample_1" class="form-horizontal" method="post" enctype="multipart/form-data">
                                        <div class="form-body">
										
                                        <div class="form-group row">
                                                <label class="control-label col-md-2">MR No
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                 <!--   <input type="text" name="umrno" data-required="1"  id="umrno" placeholder="Enter UMR NO" class="form-control" onChange="showHint52()" required/> -->
													 <input id="umrno" list=\"city21\" class="form-control" name="umrno"  onChange="showHint52()"  >
<datalist id=\"city21\" >

<?php 

$sql="select distinct PAT_REGNO from ip_pat_admit where DIS_STATUS='ADMITTED' ";  // Query to collect records
$r1=mysqli_query($link,$sql) or die(mysql_error());
while ($row=mysqli_fetch_array($r1)) {
echo  "<option value=\"$row[PAT_REGNO]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";

?>	
													 
													 
													 <strong class="required"><?php if(isset($errorecode)){ echo $errorecode;} ?> </strong></div>
                                            
											<label class="control-label col-md-2">Pat No
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="patno" data-required="1" id="patno" placeholder="Enter Patient No" class="form-control" value="<?php if(isset($patno)){ echo $patno;} ?>" />
													
													</div>
                                            
											
											</div>
											
											
											
											
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Age
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="age" data-required="1" id="age" value="<?php if(isset($age)){ echo $age;} ?>" placeholder="Enter Age " class="form-control" required/> 
													
													</div>
                                            <label class="control-label col-md-2">Sex
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                     <input type="text" name="sex" data-required="1" id="sex" value="<?php if(isset($sex)){ echo $sex;} ?>" placeholder="Enter Sex " class="form-control" required/> 
	                                            
	                                            </div>
											
											</div>
											
											
											
											<div class="form-group row">
                                                
                                            <label class="control-label col-md-2">Date of Admission
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="control-label col-md-4">
		                                                <input class="form-control " size="16" placeholder="Date of Birth" type="date" value="<?php echo date('Y-m-d'); ?>" name="doa" id="doa">
		                                               
	                                          </div>  
	                                            
	                                           
											<label class="control-label col-md-2">Date of Discharge
                                                    <span class="required"> * </span>
                                                </label>
                                                 <div class="col-md-4">
                                                    
		                                                <input class="form-control " size="16" placeholder="Date of Discharge" type="date" value="<?php echo date('Y-m-d'); ?>" name="dichargedate" id="dichargedate">
		                                                
	                                            	</div>
	                                            
	                                            </div>
											</div>
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Patient Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="patname" data-required="1" value="<?php if(isset($patname)){ echo $patname;} ?>" id="patname" placeholder="Enter Patient Name" class="form-control " required/>
													
													</div>
                                            <label class="control-label col-md-2">Address
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                     <textarea  name="address" id="address" placeholder=" Address" class="form-control-textarea" rows="5" ></textarea>
                                               
		                                                <input class="form-control " style="display:none;" size="16" placeholder="Father Name" type="text"  name="fname" id="fname">
		                                                
	                                            	</div>
	                                            
											
											</div>
											
											
											
											
										
											
                                                   
                                                    <textarea name="doctors" style="display:none;" id="doctors" placeholder="Consultant Name" class="form-control-textarea" rows="5" ></textarea>
                                                
										
                                          	
										
											
											
											
											
										
											
											
											
										
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
												   <td><input type="text" name="days[]" id="days<?php echo $i; ?>" data-row="<?php echo $i; ?>" value="0" class='tet'/></td>
												   <td><input type="text" name="charge[]" readonly id="charge<?php echo $i; ?>" data-row="<?php echo $i; ?>" value="<?php echo $y['amount'];?>" class='tet'/></td>
												   <td><input type="text" name="amount[]" readonly id="amount<?php echo $i; ?>" data-row="<?php echo $i; ?>" value="" class="txt tet6"/></td>
												    
												   </tr>
												   <?php $i++;}?>
												   </table>
                                                </div>
                                                												 
                                            </div>
										
											
										
											
											
											
											
											
											<div class="form-group row">
                                                
                                            
												
												<label class="control-label offset-md-8 col-md-2"><b>Total Amount</b>
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                   
		                                               <input type="text" name="tot_amt" id="tot_amt" value="0" class="form-control">
													   
		                                            
	                                            
	                                            
	                                            </div>
												
												
											
											</div>
											
											
											
											<div class="form-group row">
                                                
                                            
												  
											
												
												
											
												
												
												<label class="control-label offset-md-8 col-md-2"><b>Discount</b>
                                                    <span class="required">  </span>
                                                </label>
                                                <div class="col-md-2">
                                                   
		                                               <input type="text" name="discount" id="discount"  onkeyup="krk5(this.value)" class="form-control">
													   
		                                            
	                                            	</div>
	                                            
	                                            
												
												
											
											</div>
                                                 
												 
												 
												 
												 
											<div class="form-group row">
                                            	
												<label class="control-label offset-md-8  col-md-2"><b>Net Amount</b>
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                    
		                                               <input type="text" name="net" id="net"  class="form-control">
													   
		                                   
	                                            </div>
										
											</div>
											
											<div class="form-group row">
                                            	
												<label class="control-label offset-md-8  col-md-2"><b>Paid Amount</b>
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                    
		                                               <input type="text" name="paid" id="paid"  class="form-control" onkeyup="krk7(this.value)">
													   
		                                   
	                                            </div>
										
											</div>
											
											<div class="form-group row">
                                            	
												<label class="control-label offset-md-8  col-md-2"><b>Due Amount</b>
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                    
		                                               <input type="text" name="due" id="due"  class="form-control">
													   
		                                   
	                                            </div>
										
											</div>
											
											<div class="form-group row">
                                                
                                            <label class="control-label  offset-md-8 col-md-2"><b>Payment Type</b>
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                    
		                                          <select name="paymenttype"  id="paymenttype"  class="form-control" required> 
													<option value="">Select Payment</option>
													<option value="UPILAB">UPILAB</option>
													<option value="UPIHOSPITAL">UPIHOSPITAL</option>
													<option value="CARDUPI">CARDUPI</option>
													<option value="CARDHOSPITAL">CARDHOSPITAL</option>
													<option value="CASH">CASH</option>
													<option value="FREE">FREE</option>
													</select>
		                                        	</div>
	                                            </div>
											  </div>
											
                                           <div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" name="Submit" class="btn btn-info">Submit</button>
                                                    <a href="finalbilllist.php"><button type="button" class="btn btn-default">Cancel</button></a>
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
	$('#tot_amt').val(subTotal.toFixed(2) );
	$('#net').val(subTotal.toFixed(2) );
	$('#due').val(subTotal.toFixed(2) );

	
	//$('#txtTot1').val( subTotal.toFixed(2) );
	//$('#netamt').val( subTotal.toFixed(2) );
	
}
	</script>
	<script>
function nett1x(str){
							  var o_dis=document.getElementById("room_days").value;
							 
							  var nettotal=document.getElementById("room_rent").value;
							 
							   sumk=(eval(nettotal))*(eval(o_dis));
					
							   document.getElementById("room_charges").value=eval(sumk).toFixed(2);
							
						
							
							  }
							  krk();
							  </script>	
							  
							  	<script>
function nett2x(str){
							  var o_dis=document.getElementById("nurs_days").value;
							 
							  var nettotal=document.getElementById("nurs_rent").value;
							 
							   sumk=(eval(nettotal))*(eval(o_dis));
					
							   document.getElementById("nurs_charges").value=eval(sumk).toFixed(2);
							
							  }</script>
							  <script>
function nett3x(str){
							  var o_dis=document.getElementById("inv_days").value;
							 
							  var nettotal=document.getElementById("inv_rent").value;
							 
							   sumk=(eval(nettotal))*(eval(o_dis));
					
							   document.getElementById("inv_charges").value=eval(sumk).toFixed(2);
							
							  }</script>
							  <script>
function nett4x(str){
							  var o_dis=document.getElementById("prof_days").value;
							 
							  var nettotal=document.getElementById("prof_rent").value;
							 
							   sumk=(eval(nettotal))*(eval(o_dis));
					
							   document.getElementById("prof_charges").value=eval(sumk).toFixed(2);
							
							  }</script>
							  <script>
function nett5x(str){
							  var o_dis=document.getElementById("phr_days").value;
							 
							  var nettotal=document.getElementById("phr_rent").value;
							 
							   sumk=(eval(nettotal))*(eval(o_dis));
					
							   document.getElementById("phr_charges").value=eval(sumk).toFixed(2);
							
							  }</script>
							  
								<script>
function krk(str){
							  var o_dis=document.getElementById("tot_amt").value;
							 
							  var room_charges=document.getElementById("room_charges").value;
							   var nurse=document.getElementById("nurs_charges").value;
							   	   var prof=document.getElementById("prof_charges").value;
								    var inv=document.getElementById("inv_charges").value;
									 var phr=document.getElementById("phr_charges").value;
							
							   sumk=(eval(room_charges))+(eval(nurse))+(eval(prof))+(eval(inv))+(eval(phr));

							   document.getElementById("tot_amt").value=eval(sumk).toFixed(2);
							
							  }
							 
							 
				function krk1(str){
							  var o_dis=document.getElementById("tot_amt").value;
							 
							  var room_charges=document.getElementById("nurs_charges").value;
							
							   sumk=(eval(room_charges))+(eval(o_dis));

							   document.getElementById("tot_amt").value=eval(sumk).toFixed(2);
							
							  }			 
							 function krk2(str){
							  var o_dis=document.getElementById("tot_amt").value;
							 
							  var room_charges=document.getElementById("prof_charges").value;
							
							   sumk=(eval(room_charges))+(eval(o_dis));

							   document.getElementById("tot_amt").value=eval(sumk).toFixed(2);
							
							  }
							  function krk3(str){
							  var o_dis=document.getElementById("tot_amt").value;
							 
							  var room_charges=document.getElementById("inv_charges").value;
							
							   sumk=(eval(room_charges))+(eval(o_dis));

							   document.getElementById("tot_amt").value=eval(sumk).toFixed(2);
							
							  }
							  function krk4(str){
							  var o_dis=document.getElementById("tot_amt").value;
							 
							  var room_charges=document.getElementById("phr_charges").value;
							
							   sumk=(eval(room_charges))+(eval(o_dis));

							   document.getElementById("tot_amt").value=eval(sumk).toFixed(2);
							
							  }
							 
							 
							  function krk5(str){
							  var o_dis=document.getElementById("tot_amt").value;
							 
							  var room_charges=document.getElementById("discount").value;
							
							   sumk=(eval(o_dis))-(eval(room_charges));

							   document.getElementById("net").value=eval(sumk).toFixed(2);
							   document.getElementById("due").value=eval(sumk).toFixed(2);
							
							  }
							 
							 
							  function krk7(str){
							  var o_dis=document.getElementById("net").value;
							 
							  var room_charges=document.getElementById("paid").value;
							
							   sumk=(eval(o_dis))-(eval(room_charges));

							   document.getElementById("due").value=eval(sumk).toFixed(2);
							
							  }
							  </script>	  
							     
		
 <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>    

	      <script>
               // CKEDITOR.replace( 'result1', {
              //  height: 160
              // } );
				
				CKEDITOR.replace('#result');
				//ckeditor.replace('result'); // ADD THIS
				//$('#result').ckeditor();
            </script>
			 <script>
               // CKEDITOR.replace( 'result1', {
              //  height: 160
              // } );
				
				CKEDITOR.replace('#result1');
				//ckeditor.replace('result'); // ADD THIS
				//$('#result').ckeditor();
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