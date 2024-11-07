<?php //include('config.php');
session_start();
if($_SESSION['user'])
{
$ses=$_SESSION['user']; 

include("header.php");
include("../db/connection.php");
?>
<script>
function showHint52(str)
{

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
	
	document.getElementById("fdate").value=strar[1];
	
	document.getElementById("pname").value=strar[2];
	document.getElementById("fname").value=strar[3];
	document.getElementById("age").value=strar[4];
	
	
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search567.php?q="+str,true);
xmlhttp.send();
}
</script>

<?php
ob_start();

if(isset($_POST['Submit'])){
//error_reporting(E_ALL);
$mrno = $_POST['mrno'];
$hosname = $_POST['hosname'];
$wrdno=$_POST['wrdno'];
$pttime = $_POST['pttime'];
$nmdec=$_POST['nmdec'];

$gender=$_POST['gender'];

$one_year_more=$_POST['one_year_more'];
$one_year_less=$_POST['one_year_less'];
//$fdate1=$_POST['fdate'];
//$fdate=date('Y-m-d',strtotime($fdate1));
//$tdate1=$_POST['tdate'];
//$tdate=date('Y-m-d',strtotime($tdate1));
$one_month = $_POST['one_month'];
$one_day = $_POST['one_day'];
$office=$_POST['office'];
$nmdec1 = $_POST['nmdec1'];
$intbet=$_POST['intbet'];
$immcase=$_POST['immcase'];
$antcase=$_POST['antcase'];
$other=$_POST['other'];
$death=$_POST['death'];
//$fdate=date('Y-m-d',strtotime($fdate1));
$injury=$_POST['injury'];
//$tdate=date('Y-m-d',strtotime($tdate1));
$preg = $_POST['preg'];
$delivry = $_POST['delivry'];
$verify=$_POST['verify'];
$pname = $_POST['pname'];
$fname=$_POST['fname'];
$doct=$_POST['doct'];
$hospi=$_POST['hospi'];
//$user=$_POST['user'];
$fdate1=$_POST['fdate'];
$fdate=date('Y-m-d',strtotime($fdate1));
$tdate1=$_POST['tdate'];
$tdate=date('Y-m-d',strtotime($tdate1));
$ro=$_POST['ro'];
$certi=$_POST['certi'];


  
  
  
  
 $sq="INSERT INTO `form4a`( `mrno`, `hosname`, `wrdno`, `pttime`, `nmdec`, `gender`, `one_year_more`, `one_year_less`,
 `one_month`, `one_day`, `office`, `nmdec1`, `intbet`, `immcase`, `antcase`, `other`, `death`, `injury`, `preg`,
  `delivry`, `verify`, `pname`, `fname`, `fdate`, `tdate`, `doct`, `hospi`,`ro`,`certi`) 
  VALUES ('$mrno', '$hosname', '$wrdno', '$pttime', '$nmdec', '$gender', '$one_year_more', '$one_year_less',
 '$one_month', '$one_day', '$office', '$nmdec1', '$intbet', '$immcase', '$antcase', '$other', '$death', '$injury', '$preg',
  '$delivry', '$verify', '$pname', '$fname', '$fdate', '$tdate', '$doct', '$hospi','$ro','$certi')"; 
mysqli_query($link,$sq) or die(mysql_error()); 
$id=mysql_insert_id();
if($sq){
print "<script>";
			print "alert('Successfully Added ');";
			print "self.location='medicalcertificateofcauseofdeathlist(4A).php?id=$id';";
			print "</script>";

}
else{
mysql_error();}
}
?>

<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">ADD MEDICAL CERTIFICATE OF CAUSE OF DEATH LIST(4A)</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Certificates</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active"> MEDICAL CERTIFICATE OF CAUSE OF DEATH LIST(4A) </li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>MEDICAL CERTIFICATE OF CAUSE OF DEATH LIST(4A)</header>
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
								<?php //include('../db/insert_emergencycertificate.php');?>
                                <div class="card-body" id="bar-parent">
								 <div class="form-group row">
								 <div class="col-md-12" align="center">
								 <h2 align="center">MEDICAL CERTIFICATE OF CAUSE OF DEATH LIST(4A)</h2>
								 (Hospital in-patients. Not to be used for still births)
</br>To be sent to Registrar along with Form No. 2 (Death Report)
								</div>
							
											
								</div>
                                    <form action="#" id="form_sample_1" class="form-horizontal" method="post">
                                        <div class="form-body">
										
                                        <div class="form-group row">
                                                <label class="control-label col-md-2">MR No
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
												<input type="hidden" name="rnum" id="reg"  class="form-control" />
												
												<input id=\"mrno\" list=\"city1\" class="form-control" name="mrno" onChange="showHint52(this.value);" onfocus="showHint52(this.value);" >
<datalist id=\"city1\" >

<?php 
$sql="SELECT PAT_REGNO FROM ip_pat_admit WHERE dis_status='ADMITTED' or dis_status='Intimated' ";  // Query to collect records
$r=mysqli_query($link,$sql) or die(mysql_error());
while ($row=mysqli_fetch_array($r)) {
echo  "<option value=\"$row[PAT_REGNO]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist>
                                                    <!--input type="text" name="mrno"  value="" id="mrno" placeholder="Enter MRNO" class="form-control mrno" required onChange="showHint5(this.value)"/--> 
													<input type="hidden" name="user"  value="<?php echo $ses; ?>" id="user"  class="form-control" required /> 
													 </div>
                                            
											</div>
											
											
											<div class="form-group row">
												<label class="control-label col-md-2"> Hospital Name:
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
												 <input type="text" name="hosname"   id="hosname" value="Sai Surya Hospital" class="form-control"/>
												 </div>
												 </div>
												 
												 <div class="form-group row">
												<div class=" col-md-12">I hereby certify that the person whose particulars are given below died in the hospital
                                                    <span class="required"> * </span>
                                                </div>
												</div>
                                                 
												 
												 <div class="form-group row">
												<label class="control-label col-md-2">Inward No: 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
												 <input type="text" name="wrdno" id="wrdno" class="form-control">
												 </div><label class="control-label col-md-2">On at: 
                                                    <span class="required"> * </span>
                                                </label>
												<div class="col-md-2">
												 <input type="time" name="pttime" id="pttime" class="form-control">
												 </div>
												 
												 </div>
												 
												  <div class="form-group row">
												<label class="control-label col-md-3">NAME OF DECEASED:
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
												 <input type="text" name="nmdec"   id="nmdec" class="form-control"/>
												 </div>
												 </div>
												 
												  
												 
												  <div class="form-group row">
												  <div class="col-md-12">
												  <table border="1" align="center"  width="100%" cellpadding="0" cellspacing="0" >

     <tr>
         <th>Sex</th>
         
         <th colspan="4" style="float:center; text-align:center">Age at Death</th>
		
		 
		 <th style="height:30px"  colspan="2">For use of Statistical Office</th>
    </tr>
    <tr>
         <td>
		 <input type="radio" name="gender" value="male" > Male
         <input type="radio" name="gender" value="female"> Female
		 </td>
		 
		 <td>If 1 year or more,age in years</td>
		 <td>If less than 1 year,age in months</td>
         <td>If less than one month,age in Days</td>
         <td>If less than oneday, age in Hours</td>
<td></td>
    </tr>
	<tr>
<td style="height:50px;">&nbsp;</td><td>
<textarea name="one_year_more" rows="2"cols="15"></textarea>
</td><td>
<textarea name="one_year_less"  rows="2"cols="15"></textarea>
</td><td>
<textarea name="one_month"  rows="2"cols="15"></textarea>
</td><td>
<textarea name="one_day"  rows="2"cols="15"></textarea>
</td>
<td >
<textarea name="office"  rows="2"cols="15"></textarea>
</td>
</tr>
</table>
												  
												 </div>
												 </div>
												 
												  <div class="form-group row">
												  <div class="col-md-12">
												 <table border="1" align="center"  width="100%" cellpadding="0" cellspacing="0">
<tr>
<td>CAUSE OF DEATH:<input type="text" id="nmdec1" class="form-control" style="width:300px"  name="nmdec1"></td>
<td>Interval between on set & death approx :</td><td>
<input type="text" id="intbet" class="form-control" style="width:300px"name="intbet"></td>
</tr>

<tr>
<td><b>I.
Immediate cause</b><br/>
State the disease,
injury or complication which caused death,<br/>
not the mode of dying such as heart failure, asthma etc.</td>
<td>(a):<br/>Due to (or as a consequences of)</td><td>
<input type="text" id="immcase" class="form-control" style="width:300px"name="immcase"></td>
</tr>

<tr>
<td>
<b>Antecedent cause</b><br/>
Morbid conditions, if any, giving rise to the
above Cause, stating underlying condition last</td>
<td>(b):<br/>Due to (or as a consequences of)</td><td>
<input type="text" id="antcase" class="form-control" style="width:300px"name="antcase"></td>
</tr>

<tr>
<td><b>II.</b><br/>
Other significant conditions contributing to the
death but not related to the disease or
conditions causing II</td>
<td>(c):</td><td><input type="text" id="other" class="form-control" style="width:300px"name="other"></td>
</tr>
</table>
                                                 
                                                 </div>
												 </div>
                                                 <hr/>
												 <div class="form-group row">
												<label class="control-label col-md-2">Manner of Death: :  
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
												 <input type="radio" name="death" value="Natural"id="dnat"> Natural
     <input type="radio" name="death" value="Accident"id="dacc"> Accident
	 <input type="radio" name="death" value="Suicide" id="dsuc"> Suicide
	 <input type="radio" name="death" value="Homicide" id="dhom"> Homicide
	 <input type="radio" name="death" value="Pending" id="dpend"> Pending Investigation

												 </div>
                                                
												 </div>
                                                 
												 <div class="form-group row">
												<div class="col-md-2.7">&nbsp; How did the injury occur?
                                                </div>
                                                <input type="text" id="injury" class="form-control" style="width:300px"name="injury"></div>
												 <hr/>
                                                 <div class="form-group row">
												<label class="control-label col-md-6">If deceased was a female, was pregnancy the death associated with?
:   
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
												 <input type="radio"  name="preg"   id="prgyes" value="Yes" >Yes
												 <input type="radio"  name="preg"   id="prgno" value="No" >No
												 </div>
												 </div>
												 <div class="form-group row">
												<label class="control-label col-md-3">If yes, was there a delivery?   
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-3">
                                                <input type="radio"  name="delivry"   id="delyes" value="Yes">Yes
												 <input type="radio"  name="delivry"   id="delno" value="No" >No
                                                                                           
												 </div>
												 </div>
												 <div class="form-group row" >
												<div class="col-md-12" align="right">Name and signature of the Medical Attendant certifying the cause of death  
                                                																						</div>
												 </div>
                                                 <div class="form-group row">
												<label class="control-label offset-md-6 col-md-3">Date of Verification   
                                                    
                                                </label>
                                                <div class="col-md-3">
                                                <input type="date" id="verify" class="form-control" name="verify">
                                           
												 </div>
												 </div>
												 <hr/>
                                                 <div class="form-group row" >
												<div class="col-md-12" align="center">(To be detached and handed over to the related of the deceased)<br/><br/>Certified that&nbsp;<input type="text" id="certi"  name="certi"> Sri/Smt <input type="text" name="pname" id="pname" >Son/ Daughter/ Wife of Shri<input type="text" name="fname"  id="fname">was admitted to this hospital on 
<input type="text" name="fdate" id="fdate">and expired on <input type="text" name="tdate" id="tdate" value="<?php echo date('Y-m-d');?>">

                                                 </div>
												 </div>
                                                  <div class="form-group row">
												<label class="control-label offset-md-6 col-md-3">Doctor   
                                                    
                                                </label>
                                                <div class="offset-md-12 col-md-3">
                                                <input type="text" id="doct" class="form-control" name="doct">(Medical Supdt.)
                                           
												 </div>
												 </div>
                                                 <div class="form-group row">
												<label class="control-label offset-md-6 col-md-3">Name of Hospital   
                                                    
                                                </label>
                                                <div class="offset-md-12 col-md-3">
                                                <input type="text" id="hospi" class="form-control" name="hospi">
                                           
												 </div>
												 </div>
												
									         
                                           <div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" name="Submit" class="btn btn-info">Submit</button>
                                                    <a href="medicalcertificateofcauseofdeathlist(4A).php"><button type="button" class="btn btn-default">Cancel</button></a>
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