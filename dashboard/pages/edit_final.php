<?php //include('config.php');
session_start();
if($_SESSION['user'])
{
$ses=$_SESSION['user']; 

include('../db/htarrif_list.php');
include('../db/insert_finalbillk.php');

include("header.php");?>
<<script>
function valk(u1,u2,u3,u4,u5)
{
	var sum1=0;
	var srate2=0; 
	var sqty2=0;
	var tlamount=0;
	var count1=document.getElementById("rows").value;
	srate2=document.getElementById("qty"+u3).value;
		sqty2=document.getElementById("rate"+u3).value;
		var tlamount1=document.getElementById("tlamount").value;
		//alert(u3);
	sum1=eval(srate2)*eval(sqty2);
	//alert(sum1);
document.getElementById("amn"+u3).value=sum1;

	  //document.getElementById("amount"+u2).value=sum1.toFixed(2);
	  tot();
	}
	


</script>
<script>
function val(u1,u2,u3,u4,u5)
{
	var sum1=0;
	var srate2=0; 
	var sqty2=0;
	var count1=document.getElementById("rows").value;
	srate2=document.getElementById("qty"+u3).value;
		sqty2=document.getElementById("rate"+u3).value;
		//alert(u5);
	sum1=eval(srate2)*eval(sqty2);
	//alert(sum1);
	document.getElementById("amn"+u3).value=sum1;
	  //document.getElementById("amount"+u2).value=sum1.toFixed(2);
	  tot();
	}
	

function tot()
{
alert(hi);
	var sum=0;
	var tlamount=document.getElementById("tlamount").value;
	sum1=eval(srate2)*eval(sqty2);
	document.getElementById("tlamount").value=tlamount+sum1;
}
	
</script>

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



<!--
<script>
function val(u1,u2,u3)
{
	alert(hi);
	var sum1=0;
	var srate2=0; 
	var sqty2=0;
	var count1=document.getElementById("rows").value;
	//alert(u1,u2,u3,u4,u5);
	//alert(count1);
	for(j=1;j<=count1;j++)
	
	{
	    
	   
		//alert(u1,u2,u3,u4,u5);
	    srate2=document.getElementById("qty"+u3).value;
		sqty2=document.getElementById("rate"+u3).value;
		sum1=(srate2*sqty2);
		document.getElementById("rate"+u3).value=sum1;
	    tot();
		break;
	   
	}
	
}

</script>

-->

 <script type="text/javascript" src="jquery-1.11.0.min.js"></script>
     <script>
function addRow()
   {
	  var count=document.getElementById("rows1").value
   var newRow = document.getElementById("TABLE1");
   var Row = newRow.rows.length;
   var row = newRow.insertRow(Row);
   var index=row.rowIndex;

	
	oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><select  name='docname[]' id='docname"+Row+"' class='form-control print-type'  data-row='"+Row+"'><option value=''>Select Doctor Name </option><?php $p=mysqli_query($link,"select * from doct_infor");while($row=mysqli_fetch_array($p)){?> <option value='<?php  echo $row['dname1']?>'><?php echo $row['dname1']; ?></option> <?php } ?></select> </div>"; 
    row.appendChild(oCell);

    oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='daysk[]'  id='daysk1"+Row+"'class='form-control changesNo2 ' size='8' style='text-align:right'  value='0'  data-row='"+Row+"' > </div>"; 
     row.appendChild(oCell);
	 
	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='amountk[]' id='amountk1"+Row+"'class='form-control changesNo2' size='8' style='text-align:right'  data-row='"+Row+"'  value='0' > </div>"; 
     row.appendChild(oCell);
	  oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='tot[]'  id='total1"+Row+"'class='form-control tet4 tet6  '  data-row='"+Row+"' size='8' style='text-align:right'   > </div>"; 
     row.appendChild(oCell);

	  //oCell = document.createElement("TD");
	 	// oCell.innerHTML = ""; 
     //row.appendChild(oCell);

     document.getElementById("rows1").value=Row;

   }

 function deleteRow()
   {	
var rr=document.getElementById("rows1").value

if(rr!=0){
   // var oRow = rr.parentNode.parentNode;
    document.getElementById("TABLE1").deleteRow(rr);  
	var row=document.getElementById("rows1").value
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
function addRow1()
   {
	  var count=document.getElementById("rows2").value
   var newRow = document.getElementById("TABLE2");
   var Row = newRow.rows.length;
   var row = newRow.insertRow(Row);
   var index=row.rowIndex;

	
	oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><select  name='test_name[]' id='test_name"+Row+"' class='form-control print-type'  data-row='"+Row+"'><option value=''>Select Test Name </option><?php $p=mysqli_query($link,"select * from labtest");while($row=mysqli_fetch_array($p)){?> <option value='<?php  echo $row['tname']?>'><?php echo $row['tname']; ?></option> <?php } ?></select> </div>"; 
    row.appendChild(oCell);


	 
	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text'  name='lab_amnt[]' id='lab_amnt"+Row+"'class='form-control tet2 tet6' size='8' style='text-align:right'  data-row='"+Row+"'  value='0' > </div>"; 
     row.appendChild(oCell);


	  //oCell = document.createElement("TD");
	 	// oCell.innerHTML = ""; 
     //row.appendChild(oCell);

     document.getElementById("rows2").value=Row;

   }

 function deleteRow1()
   {	
var rr=document.getElementById("rows2").value

if(rr!=0){
   // var oRow = rr.parentNode.parentNode;
    document.getElementById("TABLE2").deleteRow(rr);  
	var row=document.getElementById("rows2").value
	document.getElementById("rows2").value=row-1;
total();
	}
	else{
	alert('Please Select Atleast One Row');
	return false;
	}
   }
   
   
   </script>
   
   
   
   
   
   
   <script>/*
function addRow2()
   {
	  var count=document.getElementById("rows3").value
   var newRow = document.getElementById("TABLE3");
   var Row = newRow.rows.length;
   var row = newRow.insertRow(Row);
   var index=row.rowIndex;

	
	oCell = document.createElement("TD");
    oCell.innerHTML = "<input  type='text' name='desc[]'  id='description"+Row+"'class='form-control  ' size='8' style='text-align:right'    data-row='"+Row+"' > </div>"; 
    row.appendChild(oCell);

    oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='qty[]'  id='qty"+Row+"'class='form-control changesNo4 ' size='8' style='text-align:right'  value='0'  data-row='"+Row+"' > </div>"; 
     row.appendChild(oCell);
	 
	 oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='rate[]' id='rate"+Row+"'class='form-control changesNo4' size='8' style='text-align:right'  data-row='"+Row+"'  value='0' > </div>"; 
     row.appendChild(oCell);
	  oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' name='amn[]'  id='amn"+Row+"'class='form-control txt3 tet6  '  data-row='"+Row+"' size='8' style='text-align:right'   > </div>"; 
     row.appendChild(oCell);



     document.getElementById("rows3").value=Row;

   }*/

 function deleteRow()
   {	
var rr=document.getElementById("rows3").value

if(rr!=0){
   // var oRow = rr.parentNode.parentNode;
    document.getElementById("TABLE3").deleteRow(rr);  
	var row=document.getElementById("rows3").value
	document.getElementById("rows3").value=row-1;
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
		ds=(parseFloat(days1)*parseFloat(amount1)).toFixed(2);
		
	mm= $('#total1'+id).val(ds);
	
var tt=document.getElementById("total1"+id).value;
	//alert(tt);
	tamount11 = $('#tdramount').val();
	//alert(tamount11);
	var dtot=document.getElementById("tdramount").value;
//alert(dtot);
var nn=eval(dtot)+eval(tt);
//alert(nn);
//document.getElementById("tdramount").value=eval(nn);

	//calculateTotal();
	//calculateTotal22();
	
});



</script>


 <script>
$(document).on('keyup ','.changesNo3',function(){
	
	id = $(this).attr('data-row');
	
	//alert(id);
	days1 = $('#daysk1'+id).val();
	//alert(days1);
	amount1 = $('#lab_amnt'+id).val();
		//alert(amount10);
	mm= $('#tlamount'+id).val( (parseFloat(days1)*parseFloat(amount1)).toFixed(2) );



	//calculateTotal();
	
	
});</script>


<script>
$(document).on('keyup ','.changesNo4',function(){
	
	id = $(this).attr('data-row');
	
	//alert(id);
	days1 = $('#qty'+id).val();
	//alert(days1);
	amount1 = $('#rate'+id).val();
		//alert(amount10);
		ds=(parseFloat(days1)*parseFloat(amount1)).toFixed(2);
		
	mm= $('#amn'+id).val(ds);
	
var tt=document.getElementById("amn"+id).value;
	//alert(tt);
	tamount11 = $('#tpamount').val();
	//alert(tamount11);
	var dtot=document.getElementById("tpamount").value;
//alert(dtot);
var nn=eval(dtot)+eval(tt);
//alert(nn);
//document.getElementById("tdramount").value=eval(nn);

	//calculateTotal();
	//calculateTotal22();
	
});



</script>


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
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search5.php?q="+str,true);
xmlhttp.send();
}

	</script>	


<?php 
echo $id=$_GET['id'];
$sq=mysqli_query($link,"select * from final_bill_fin where id='$id'");
$r=mysqli_fetch_array($sq);

 ?>

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
								
                                    <form action="" id="form_sample_1" class="form-horizontal" autocomplete="on" method="post" enctype="multipart/form-data">
                                        <div class="form-body">
										 <div class="form-group row">
                                                <label class="control-label col-md-2">Bill No
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="bno"  value="<?php echo $r['bno']; ?>"  id="bno" placeholder="Enter Bill NO" class="form-control" required/> 
												</div>
                                    	</div>
										 <input type="hidden" name="id"  value="<?php echo $r['id']; ?>"  id="id" placeholder="Enter Bill NO" class="form-control" /> 
											
                                        <div class="form-group row">
                                                <label class="control-label col-md-2">UMR No
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
												
		
												
                                                 <input type="text" name="mrno" value="<?php echo $r['mrno'];?>"  id="mrno" placeholder="Enter UMR NO" class="form-control mrno"  readonly="readonly"  required/> 
												</div>
                                            
											<label class="control-label col-md-2">Pat No
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="patno" data-required="1" value="<?php echo $r['patno'];?>" id="patno" placeholder="Enter Patient No" class="form-control" value="" />
													
													</div>
                                           	</div>
											
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Patient Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="patname" data-required="1" id="patname" value="<?php echo $r['pname'];?>" placeholder="Enter Patient Name" class="form-control " required/>
													
													</div>
													
													 <label class="control-label col-md-2">Contact No
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="mobile" data-required="1" id="mobile" value="<?php echo $r['mobile'];?>" placeholder="Enter Age " class="form-control" required/> 
													
													<input class="form-control " size="16" placeholder="Father Name" type="hidden" value="<?php echo $r['fname'];?>"  name="fname" id="fname">
													</div>
													
													
												<!--	
                                            <label class="control-label col-md-2">Father Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    
		                                                <input class="form-control " size="16" placeholder="Father Name" type="text"  name="fname" id="fname">
		                                                
	                                            	</div>-->
	                                    	</div>
																			
											<div class="form-group row">
                                                <label class="control-label col-md-2">Age
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="age" data-required="1" id="age" value="<?php echo $r['age'];?>" placeholder="Enter Age " class="form-control" required/> 
													
													</div>
                                            <label class="control-label col-md-2">Sex
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                     <input type="text" name="sex" data-required="1" id="sex" value="<?php echo $r['sex'];?>" placeholder="Enter Sex " class="form-control" required/> 
	                                            
	                                            </div>
											
											</div>
											<!--<div class="form-group row">
                                               
                                           
											
											</div>
											-->
											
											<div class="form-group row">
                                                
                                            <label class="control-label col-md-2">Date of Admission
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    
                                                    <input class="form-control " size="16" placeholder="Date of Birth" type="date" value="<?php echo $r['doa'];?>" name="doa" id="doa">
                                                    
	                                            
	                                            </div>
											<label class="control-label col-md-2">Date of Discharge
                                                    <span class="required"> * </span>
                                                </label>
                                                 <div class="col-md-4">
                                                     
                                                      <input class="form-control " size="16" placeholder="Date of Discharge" type="date" value="<?php echo $r['dichargedate']; ?>" name="dichargedate" id="dichargedate">
                                                      
                                                   
	                                            
	                                            </div>
											</div>
										
                                            
                                            <div class="form-group row">
                                                <label class="control-label col-md-2">Current Address
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <textarea name="address" id="address" placeholder=" Address" class="form-control-textarea" rows="5" ><?php echo $r['address']; ?></textarea>
                                                </div>
												 <label class="control-label col-md-2">Consultant Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <textarea name="doctors" id="doctors" placeholder="Consultant Name" class="form-control-textarea" rows="5" ><?php echo $r['doctors']; ?></textarea>
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
												   
 $a="SELECT * FROM final_bill_genral where id1='$id' limit 0,14";
 $query = mysqli_query($link,$a);

												   $i=1;
												   while($y=mysqli_fetch_array($query)){
												   
												   //$result as $key=>$y){ 
												   ?>
												   <tr>
												   <td><input type="hidden" name="description[]"  data-row="<?php echo $i; ?>" id="description" value="<?php echo $y['desc1'];?>"/><?php echo $y['desc1'];?></td>
												   <td><input type="text" name="days[]" id="days<?php echo $i; ?>" data-row="<?php echo $i; ?>" value="<?php echo $y['days'];?>" class='tet'/></td>
												   <td><input type="text" name="charge[]" readonly id="charge<?php echo $i; ?>" data-row="<?php echo $i; ?>" value="<?php echo $y['charge'];?>" class='tet'/></td>
												   <td><input type="text" name="amount[]" readonly id="amount<?php echo $i; ?>" data-row="<?php echo $i; ?>" value="<?php echo $y['amnt'];?>" class="txt tet6"/></td>
												    <input type="hidden" name="fin_gen[]" value="<?php echo $y['id'];?>">
												   </tr>
												   <?php $i++;}?>
												   </table>
                                                </div>
                                                												 
                                            </div>
											
									<!--
											<fieldset style="border:1px solid;">
											
								 <table width="100%" id="TABLE1" border="1">
 <thead>
 <tr><td colspan="4"><br /></td></tr>
  <tr align="center" style="background-color:#000; color:#FFF;">

  <th class="TH1">Dr.Name</th>
   <th class="TH1">No of Days Visit</th>
    <th class="TH1">Amount</th>
 <th class="TH1">Total </th>
  <!--
<th class="THH1"><input name="new" type="button" class="butnbg1" value="  +  " onclick="javascript:addRow()">&nbsp; <input name="new2" type="button" class="butnbg1" value="  -  " onclick="javascript:deleteRow()"></th>
-->
 <!--</tr>
 
		   <?php 
												   
 $a="SELECT * FROM final_doctor where id1='$id' and dname!=''";
 $query = mysqli_query($link,$a);

												   $i=1;
												   while($y=mysqli_fetch_array($query)){
													   $cnt=mysqli_num_rows($query);
													   
													   ?>
 </thead>
   <tr><td><select  name='docname[]' id='docname"+Row+"' class='form-control print-type' >
    <option value='<?php echo $y['dname'];?>'><?php echo $y['dname'];?></option>
   <option value=''>Select Doctor Name </option>
   <?php $p=mysqli_query($link,"select * from doct_infor");
   while($row=mysqli_fetch_array($p)){?> <option value='<?php  echo $row['dname1']?>'><?php echo $row['dname1']; ?></option> 
   <?php } ?></select> </td> 
   <td>
   <input  type='text' name='daysk[]'  id='daysk1"+<?php echo $row['id'];?>+"'class='form-control changesNo2 ' size='8' style='text-align:right'  value='<?php echo $y['days'];?>'  data-row='"+Row+"' ></td>
   </td><td>
   
   <input  type='text' name='amountk[]' id='amountk1"+<?php echo $row['id'];?>+"'class='form-control changesNo2' size='8' style='text-align:right'  data-row='"+Row+"'  value='<?php echo $y['amnt'];?>' >
   
  </td>
  
  <td>
  
  
  <input  type='text' name='tot[]'  id='total1"+<?php echo $row['id'];?>+"'class='form-control tet4 tet6  '  data-row='"+Row+"' size='8' value="<?php echo $y['total'];?>" style='text-align:right'   > </td>
   </td>
   <input type="hidden" name="doct_id[]" value="<?php echo $y['id'];?>">
   
   </tr>
												   <?php }?>
   
</table>			
		<br />	
 <input type="hidden" name="rows1" id="rows1" value="<?php echo $cnt;?>" onclick="javasript:noitems()"/>		
			</fieldset>		-->						
							
							
		<!--<fieldset style="border:1px solid;">
											
								 <table width="100%" id="TABLE2" border="1">
 <thead>
 <tr><td colspan="4"><br /></td></tr>
  <tr align="center" style="background-color:#000; color:#FFF;">

  <th class="TH1">Test Name</th>
 
    <th class="TH1">Amount</th>

  
<th class="THH1"><input name="new" type="button" class="butnbg1" value="  +  " onclick="javascript:addRow1()">&nbsp; 
<input name="new2" type="button" class="butnbg1" value="  -  " onclick="javascript:deleteRow1()"></th>

 </tr>
 

 </thead>
   
</table>	
 <input type="hidden" name="rows2" id="rows2" value="0" onclick="javasript:noitems()"/>			
		<br />									
			</fieldset>								
						




			<fieldset style="border:1px solid;">
											
								 <table width="100%" id="TABLE3" border="1">
 <thead>
 <tr><td colspan="4"><br /></td></tr>
  <tr align="center" style="background-color:#000; color:#FFF;">

  <th class="TH1">
Particular Name</th>
   <th class="TH1">Qty</th>
    <th class="TH1">Rate</th>
 <th class="TH1">Amount </th>
  
<th class="THH1"><input name="new" type="button" class="butnbg1" value="  +  " onclick="javascript:addRow2()">&nbsp; <input name="new3" type="button" class="butnbg1" value="  -  " onclick="javascript:deleteRow2()"></th>

 </tr>
 

 </thead>
   
</table>			
		<br />	
 <input type="hidden" name="rows3" id="rows3" value="0" onclick="javasript:noitems()"/>		
			</fieldset>	


						
				
<div id="productdetails" class="form-group row" > <table width="100%" class="ruler" id="TABLE1"></table>
-->
												   
	
 </table>

</div>

     
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Total Hospital Amount
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" readonly name="tot_hosp_amnt" id="thamount" placeholder=" Total Hospital Amount" class="form-control  " value="<?php echo $r['tot_hosp_amnt'];?>" />
                                                </div>
												
												<label class="control-label col-md-2">Advance Amount
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" readonly name="hosp_paid_amnt" id="hadamount" placeholder=" Total HospitalAdvance  Amount" class="form-control tet7" value="<?php echo $r['hosp_paid_amnt'];?>"/>
                                                </div>
												
												
												<label class="control-label col-md-2">Bal Amount
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" readonly name="hosp_bal_amnt" id="hbamount" placeholder="Hospital Bal Amount" class="form-control tet8" value="<?php echo $r['hosp_bal_amnt'];?>"/>
                                                </div>
																							
												 
                                            </div>
											
											<input type="hidden" name="tot_doct_amnt" id="tdramount" placeholder=" Total Lab Amount" class="form-control " value="<?php echo $r['tot_doct_amnt'];?>" />
                                              <input type="hidden" name="tot_doct_paid" id="drpamount" placeholder=" Total Lab Advance  Amount" class="form-control tet7" value="<?php echo $r['tot_doct_paid'];?>"/>
                                                 <input type="hidden" name="tot_doct_bal" id="drbal" placeholder="Lab Bal Amount" class="form-control tet8" value="<?php echo $r['tot_doct_bal'];?>"/>
                                                
											
											<!--
											<div class="form-group row">
                                                <label class="control-label col-md-2">Total Doctor Amount
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" name="tot_doct_amnt" id="tdramount" placeholder=" Total Lab Amount" class="form-control " value="<?php echo $r['tot_doct_amnt'];?>" />
                                                </div>
												
												<label class="control-label col-md-2">Advance Amount
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" name="tot_doct_paid" id="drpamount" placeholder=" Total Lab Advance  Amount" class="form-control tet7" value="<?php echo $r['tot_doct_paid'];?>"/>
                                                </div>
												
												
												<label class="control-label col-md-2">Bal Amount
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" name="tot_doct_bal" id="drbal" placeholder="Lab Bal Amount" class="form-control tet8" value="<?php echo $r['tot_doct_bal'];?>"/>
                                                </div>
																							
												 
                                            </div>-->
											
											
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Total Lab Amount
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" readonly name="tot_lab_amnt" id="tlamount" placeholder=" Total Lab Amount" class="form-control tet2 tet6" value="<?php echo $r['tot_lab_amnt'];?>" />
                                                </div>
												
												<label class="control-label col-md-2">Advance Amount
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" readonly name="lab_paid_amnt" id="ladamount" placeholder=" Total Lab Advance  Amount" class="form-control tet7" value="<?php echo $r['lab_paid_amnt'];?>"/>
                                                </div>
												
												
												<label class="control-label col-md-2">Bal Amount
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" readonly name="lab_bal_amnt" id="lbamount" placeholder="Lab Bal Amount" class="form-control tet8" value="<?php echo $r['lab_bal_amnt'];?>"/>
                                                </div>
																							
												 
                                            </div>
											<div class="form-group row">
                                                <label class="control-label col-md-2">Total Procedur Amount
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" readonly name="tot_proc_amnt" id="tprocamount" placeholder=" Total Procedur Amount" class="form-control txt8 tet6 " value="<?php echo $r['tot_proc_amnt'];?>" />
                                                </div>
												
												<label class="control-label col-md-2">Advance Amount
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" readonly name="proc_paid_amnt" id="procadamount" placeholder=" Total Procedur Advance  Amount" class="form-control tet7" value="<?php echo $r['proc_paid_amnt'];?>"/>
                                                </div>
												
												
												<label class="control-label col-md-2">Bal Amount
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" readonly name="proc_bal_amnt" id="procbamount" placeholder="Lab Procedur Amount" class="form-control tet8" value="<?php echo $r['proc_bal_amnt'];?>"/>
                                                </div>
																							
												 
                                            </div>
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Total Pharmacy Amount
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" readonly name="tot_pharma_amnt" id="tpamount" placeholder=" Total Pharmacy Amount" class="form-control txt3 tet6" value="<?php echo $r['tot_pharma_amnt'];?>"/>
                                                </div>
												
												<label class="control-label col-md-2">Advance Amount
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" readonly name="pharma_paid" id="padamount" placeholder=" Total Pharmacy Amount" class="form-control tet7" value="<?php echo $r['pharma_paid'];?>"/>
                                                </div>
												
												
												<label class="control-label col-md-2">Bal Amount
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" readonly name="pharma_bal" id="pbamount" placeholder="Pharmacy Bal Amount " class="form-control tet8" value="<?php echo $r['pharma_bal'];?>"/>
                                                </div>
																							
												 
                                            </div>
											
											
											
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Total 
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" readonly name="total" id="total" placeholder=" Total Amount" class="form-control"  value="<?php echo $r['total'];?>"/>
                                                </div>
												
												<label class="control-label col-md-2">Paid                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" readonly name="paid" id="paid" placeholder=" Total paid Amount" class="form-control" value="<?php echo $r['paid'];?>"/>
                                                </div>
												
												
												<label class="control-label col-md-2">Due
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" readonly name="due" id="due" placeholder="Due Amount" class="form-control" value="<?php echo $r['due'];?>"/>
                                                </div>
																							
												 
                                            </div>
											
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Concession 
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" readonly name="concession" id="concession" placeholder=" concession Amount" class="form-control" value="<?php echo $r['concession'];?>"/>
                                                </div>
												
													
												
												
																							
												 
                                            </div>
											
											
											<div class="form-group row">
                                                <label class="control-label col-md-2">Net Amount 
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" readonly name="namount" id="namount" placeholder=" Net Amount" class="form-control" value="<?php echo $r['namount'];?>"/>
                                                </div>
												
													
												
												
																							
												 
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-2">Payment Type
                                                    
                                                </label>
                                                <div class="col-md-2">
                                                    <select name="paymenttype"  id="paymenttype"  class="form-control" required> 
													<option value="">Select Payment</option>
													<option value="UPILAB"  <?php if($paymenttype=="UPILAB"){echo 'selected';} ?>>UPILAB</option>
													<option value="UPIHOSPITAL"  <?php if($paymenttype=="UPIHOSPITAL"){echo 'selected';} ?>>UPIHOSPITAL</option>
													<option value="CARDLAB"  <?php if($paymenttype=="CARDLAB"){echo 'selected';} ?>>CARDLAB</option>
													<option value="CARDHOSPITAL"  <?php if($paymenttype=="CARDHOSPITAL"){echo 'selected';} ?>>CARDHOSPITAL</option>
													<option value="CASH" <?php if($paymenttype=="CASH"){echo 'selected';} ?> >CASH</option>
												    <option value="FREE"  <?php if($paymenttype=="FREE"){echo 'selected';} ?>>FREE</option>
													</select>  </div>
												
													
												
												
																							
												 
                                            </div>
											
											
                                           <div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                  
												   <button type="submit" name="Submit1" class="btn btn-info">Submit</button>
                                                    <a href="finalbilllis1.php"><button type="button" class="btn btn-default">Cancel</button></a>
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
		$(function(){
$('#hadamount').keyup(function() { 
    var balance = parseFloat($(this).val());
    var totalpoints = parseFloat($('#thamount').val());
    $('#hbamount').val(totalpoints - balance);
});



});

$(function(){
$('#drpamount').keyup(function() { 
    var balance = parseFloat($(this).val());
    var totalpoints = parseFloat($('#tdramount').val());
    $('#drbal').val(totalpoints - balance);
});



});

$(function(){
$('#ladamount').keyup(function() { 
    var balance = parseFloat($(this).val());
    var totalpoints = parseFloat($('#tlamount').val());
    $('#lbamount').val(totalpoints - balance);
});



});

$(function(){
$('#padamount').keyup(function() { 
    var balance = parseFloat($(this).val());
    var totalpoints = parseFloat($('#tpamount').val());
    $('#pbamount').val(totalpoints - balance);
});



});
$(function(){
$('#concession').keyup(function() { 
    var balance = parseFloat($(this).val());
    var totalpoints = parseFloat($('#total').val());
    $('#namount').val(totalpoints - balance);
});



});
$(function(){
$('#procadamount').keyup(function() { 
    var balance = parseFloat($(this).val());
    var totalpoints = parseFloat($('#tprocamount').val());
    $('#procbamount').val(totalpoints - balance);
});



});
   
</script>

												
												
 
<script type="text/javascript">

$(document).on('keyup ','.tet',function(){
	
	id = $(this).attr('data-row');
	//alert(id);
	days = $('#days'+id).val();
	
	cost = $('#charge'+id).val();
		
	$amnt= $('#amount'+id).val( (parseFloat(days)*parseFloat(cost)).toFixed(2) );
	

	calculateTotal2();
	
	
	});
	
	
	
	$(document).on('keyup ','.tet4',function(){
	
	id = $(this).attr('data-row');
	//alert(id);
	days = $('#days'+id).val();
	
	cost = $('#charge'+id).val();
		
	$amnt= $('#amount'+id).val( (parseFloat(days)*parseFloat(cost)).toFixed(2) );

	calculateTotal3();
	
	});
	
	function calculateTotal3(){
	subTotal = 0 ; total = 0; 
	$('.tet4').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tdramount').val(subTotal.toFixed(2) );
	t=$('#tdramount').val();

	$('#txtTot1').val(subTotal.toFixed(2));
	
	
}
	
	
	$(document).on('keyup ','.tet2',function(){
	
	id = $(this).attr('data-row');
	//alert(id);
	days = $('#days'+id).val();
	
	cost = $('#charge'+id).val();
		
	$amnt= $('#amount'+id).val( (parseFloat(days)*parseFloat(cost)).toFixed(2) );

	calculateTotal4();
	
	});
	
	function calculateTotal4(){
	subTotal = 0 ; total = 0; 
	$('.tet2').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tlamount').val(subTotal.toFixed(2) );
	t=$('#tlamount').val();

	$('#txtTot1').val(subTotal.toFixed(2));
	

}
	
	
	
	
	$(document).on('keyup ','.txt3',function(){
	
	id = $(this).attr('data-row');
	//alert(id);
	days = $('#days'+id).val();
	
	cost = $('#charge'+id).val();
		
	$amnt= $('#amount'+id).val( (parseFloat(days)*parseFloat(cost)).toFixed(2) );

	calculateTotal5();
	
	});
	
	function calculateTotal5(){
	subTotal = 0 ; total = 0; 
	$('.txt3').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tpamount').val(subTotal.toFixed(2) );
	t=$('#tpamount').val();

	$('#txtTot1').val(subTotal.toFixed(2));
		//var tt=document.getElementById("total").value;
//document.getElementById("total").value=eval(tt)+eval(t);

}
	
	$(document).on('keyup ','.txt8',function(){
	
	id = $(this).attr('data-row');
	//alert(id);
	days = $('#days'+id).val();
	
	cost = $('#charge'+id).val();
		
	$amnt= $('#amount'+id).val( (parseFloat(days)*parseFloat(cost)).toFixed(2) );

	calculateTotal51();
	
	});
	
	function calculateTotal51(){
	subTotal = 0 ; total = 0; 
	$('.txt8').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tprocamount').val(subTotal.toFixed(2) );
	t=$('#tprocamount').val();

	$('#txtTot1').val(subTotal.toFixed(2));
		//var tt=document.getElementById("total").value;
//document.getElementById("total").value=eval(tt)+eval(t);

}
	  //procadamount procbamount
	
	$(document).on('keyup ','.tet6',function(){
	
	id = $(this).attr('data-row');
	//alert(id);
	days = $('#days'+id).val();
	
	cost = $('#charge'+id).val();
		
	$amnt= $('#amount'+id).val( (parseFloat(days)*parseFloat(cost)).toFixed(2) );

	calculateTotal7();
	
	});
	
	function calculateTotal7(){
	subTotal = 0 ; total = 0; 
	$('.tet6').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#total').val(subTotal.toFixed(2) );
	t=$('#total').val();

	$('#txtTot1').val(subTotal.toFixed(2));
	
	
}
	
	
	
	
	
	$(document).on('keyup ','.tet7',function(){
	
	id = $(this).attr('data-row');
	//alert(id);
	days = $('#days'+id).val();
	
	cost = $('#charge'+id).val();
		
	$amnt= $('#amount'+id).val( (parseFloat(days)*parseFloat(cost)).toFixed(2) );

	calculateTotal8();
	
	});
	
	function calculateTotal8(){
	subTotal = 0 ; total = 0; 
	$('.tet7').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#paid').val(subTotal.toFixed(2) );
	t=$('#paid').val();

	$('#txtTot1').val(subTotal.toFixed(2));
	
	
}
	
	
	
	
	$(document).on('keyup ','.tet8',function(){
	
	id = $(this).attr('data-row');
	//alert(id);
	days = $('#days'+id).val();
	
	cost = $('#charge'+id).val();
		
	$amnt= $('#amount'+id).val( (parseFloat(days)*parseFloat(cost)).toFixed(2) );

	calculateTotal9();
	
	});
	
	function calculateTotal9(){
	subTotal = 0 ; total = 0; 
	$('.tet8').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#due').val(subTotal.toFixed(2) );
	t=$('#due').val();

	$('#txtTot1').val(subTotal.toFixed(2));
	
	
}
	
	
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
//pharmacytot=$("#pharmacytot").val();
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



function calculateTotal21(){
	
	subTotal = 0 ; total = 0; 
	$('.tet1').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#pharmacytot').val(subTotal.toFixed(2) );
	t=$('#pharmacytot').val();

	
}
$(".txt1").each(function(){
$(this).keyup(function(){
calculateTotal21();

});
});

function calculateTotal22(){
	alert(hi);
	subTotal = 0 ; total = 0; 
	$('.txt2').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tdramount').val(subTotal.toFixed(2) );
	t=$('#tdramount').val();

	
}
$(".txt2").each(function(){
	alert(hi);
$(this).keyup(function(){
calculateTotal22();


});
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

var ptot=document.getElementById("tlamount").value;


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