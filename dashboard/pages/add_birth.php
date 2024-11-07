<?php //include('config.php');
session_start();
if($_SESSION['user'])
{
$ses=$_SESSION['user']; 

include("header.php");?>
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
	
	document.getElementById("pname").value=strar[1];
	document.getElementById("age").value=strar[2];
	
	
	document.getElementById("fname").value=strar[7];
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search2166.php?q="+str,true);
xmlhttp.send();
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
                                <div class="page-title">ADD BIRTH CERTIFICATE</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Certificates</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">BIRTH Certificate</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Birth Certificate</header>
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
								
                                    <form action="../modal/birth_insert.php" id="form_sample_1" class="form-horizontal" method="post">
                                        <div class="form-body">
										
                                        <div class="form-group row">
                                                <label class="control-label col-md-2">MR No
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
												<input type="text" name="rnum" id="reg"  class="form-control" />
												
												
                                                    <!--input type="text" name="mrno"  value="" id="mrno" placeholder="Enter MRNO" class="form-control mrno" required onChange="showHint5(this.value)"/--> 
													<input type="hidden" name="user"  value="<?php echo $ses; ?>" id="user"  class="form-control" required /> 
													 </div>
                                            
											</div>
											
											
											<div class="form-group row">
												<label class="control-label col-md-2">Patient Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
												 <input type="text" name="pname"   id="pname" class="form-control"/>
												 <input type="hidden" name="user"   id="user" value="<?php echo $ses ?>" class="form-control"/>
												 </div>
												 </div>
												 
												 
												 <div class="form-group row">
												<label class="control-label col-md-2">S/O,D/O,W/O 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
												 <input type="text" name="wife"   id="wife" class="form-control"/>
												 </div>
												 </div>
												 
												 
												 <div class="form-group row">
												<label class="control-label col-md-2">Address 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
												 <textarea name="motaddress"   id="motaddress" class="form-control"></textarea>
												 </div>
												 </div>
												 
												  <div class="form-group row">
												<label class="control-label col-md-2">P.O:
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
												 <input type="text" name="po"   id="po" class="form-control"/>
												 </div>
												 </div>
												 
												  
												 
												  <div class="form-group row">
												<label class="control-label col-md-2">P.S:
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
												 <input type="text" name="ps"   id="ps" class="form-control"/>
												 </div>
												 </div>
												 
												  <div class="form-group row">
												<label class="control-label col-md-2">Dist:
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
												 <input type="text" name="Dist"   id="Dist" class="form-control"/>
												 </div>
												 </div>
												 <div class="form-group row">
												<label class="control-label col-md-2">Baby Weight :  
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
												 <input type="text"  name="weight"   id="weight" class="form-control">
												 </div>
												 </div>
												 <div class="form-group row">
												<label class="control-label col-md-2">Delivered By:   
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
												 <input type="radio"  name="delby"   id="delby1" value="Sygering"  checked>Sygering
												 <input type="radio"  name="delby"   id="delby2" value="Normal " >Normal Delivery
												 </div>
												 </div>
												 <div class="form-group row">
												<label class="control-label col-md-2">Sex:   
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
												 <input type="radio"  name="sex"   id="Male" value="Male"  checked>Male
												 <input type="radio"  name="sex"   id="Female" value="Female" >Female
												 </div>
												 </div>
												 <div class="form-group row">
												<label class="control-label col-md-2">Birth Date :  
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
												 <input type="date"  name="BirthDate"   id="BirthDate" class="form-control">
												 </div>
												 </div>
												 <div class="form-group row">
												<label class="control-label col-md-2">Birth Time :  
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
												 <input type="time"  name="time"   id="time" class="form-control">
												 </div>
												 </div>
												
									         
                                           <div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" name="Submit" class="btn btn-info">Submit</button>
                                                    <a href="birthcertificatelist.php"><button type="button" class="btn btn-default">Cancel</button></a>
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



$(function() {
    for(var i=1;i<=10;i++){
    //autocomplete
    $(".tname"+i).autocomplete({
        source: "set1999.php",
        minLength: 1
    });  
	}
	
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