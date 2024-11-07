<?php
session_start();
 $ses= $_SESSION['user'] ;
 if($_SESSION['user'])

{
 ?>
<?php include("header.php");?>
	
<script>
function calc(){
	var fee=document.getElementById('fee').value;
var hopshare=document.getElementById('hospitalshare').value/100;
//var doctshare=document.getElementById('doctorshare').value/100;
hamount=fee*hopshare;
htotal=fee-hamount;
document.getElementById('hamo').value=hamount;
}
</script>
<script>
function calc1(){a
	var fee=document.getElementById('fee').value;
//var hopshare=document.getElementById('hospitalshare').value/100;
var doctshare=document.getElementById('doctorshare').value/100;
damount=fee*doctshare;
//dtotal=fee-hamount;
document.getElementById('doctoramount').value=damount;
}
</script>
<script>
function calc2(form){
	//var fee=document.getElementById('fee').value;
//var hopshare=document.getElementById('hospitalshare').value/100;
//var doctshare=document.getElementById('doctorshare').value/100;
//damount=fee*doctshare;
//dtotal=fee-hamount;
hamount=document.getElementById('hamo').value;
damount=document.getElementById('doctoramount').value;
//var number1 = form.hamo.value
// var number2 = form.doctoramount.value
tt=parseFloat(hamount)+parseFloat(damount);
document.getElementById('total').value=tt;
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
mnt=nmonth+1;

if(nyear<1000) nyear=nyear+1900;

     if(nhour ==  0) {ap = " AM";nhour = 12;} 
else if(nhour <= 11) {ap = " AM";} 
else if(nhour == 12) {ap = " PM";} 
else if(nhour >= 13) {ap = " PM";nhour -= 12;}

if(nmin <= 9) {nmin = "0" +nmin;}
if(nsec <= 9) {nsec = "0" +nsec;}


document.getElementById('intime').value=""+nhour+":"+nmin+":"+nsec+ap+"";
//document.getElementById('outtime').value=" "+nhour+":"+nmin+":"+nsec+ap+"";
setTimeout("GetClock()", 1000);
}
window.onload=GetClock;

</script>
<script>
function showHint1(str)
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
	document.getElementById("pname").value=strar[1];
	document.getElementById("age").value=strar[2];
	if(strar[3] == "male"){
	document.getElementById("sex1").checked =true;
	}
	if(strar[3] == "female"){
	document.getElementById("sex2").checked =true;
	}
	document.getElementById("addr").value=strar[4];
	document.getElementById("mnum").value=strar[5];	
	document.getElementById("occ").value=strar[6];		
    }
  }
xmlhttp.open("GET","set100.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function showHint2(str)
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
	document.getElementById("pname").value=strar[1];
	document.getElementById("age").value=strar[2];
	if(strar[3] == "male"){
	document.getElementById("sex1").checked =true;
	}
	if(strar[3] == "female"){
	document.getElementById("sex2").checked =true;
	}
	document.getElementById("addr").value=strar[4];
	document.getElementById("mnum").value=strar[5];	
	document.getElementById("occ").value=strar[6];		
    }
  }
xmlhttp.open("GET","set101.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function showHint01(str)
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
	
	document.getElementById("con_fee").value=strar[1];
	document.getElementById("con_fee1").value=strar[2];
	document.getElementById("con_doct_mob").value=strar[3];
	
	}
  }
xmlhttp.open("GET","set010.php?q="+str,true);
xmlhttp.send();
}
</script>

<script>
function showHint011(str)
{
var apt_type=document.getElementById("appoint_type").value;
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
	
	document.getElementById("token").value=strar[1];
	document.getElementById("con_fee").value=strar[2];
	}
  }
xmlhttp.open("GET","set13.php?q="+str+'&q1='+apt_type,true);

xmlhttp.send();
}
</script>
<script>
function showHint012(str)
{
var apt_type=document.getElementById("appoint_type").value;
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
	
	document.getElementById("token").value=strar[1];
	document.getElementById("con_fee").value=strar[2];
	document.getElementById("con_fee").value=strar[3];
	}
  }
xmlhttp.open("GET","set13.php?q="+str+'&q1='+apt_type,true);
xmlhttp.send();
}
</script>
<script>
function showHint013(str)
{
var apt_type=document.getElementById("appoint_type").value;
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
	
	document.getElementById("token").value=strar[1];
	document.getElementById("con_fee").value=strar[2];
	}
  }
xmlhttp.open("GET","set13.php?q="+str+'&q1='+apt_type,true);
xmlhttp.send();
}
</script>




<script>
function showHint01345(str)
{
var apt_type=document.getElementById("sex1").value;
//alert(apt_type);
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
	
	document.getElementById("token1").value=strar[1];
	document.getElementById("con_fee").value=strar[2];
	document.getElementById("con_fee1").value=strar[3];
	}
  }
xmlhttp.open("GET","setn13.php?q="+str+'&q1='+apt_type,true);
xmlhttp.send();
}
</script>

<script>
function showHint022(str)
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
	
	document.getElementById("ref_mob").value=strar[1];
	}
  }
xmlhttp.open("GET","set022.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function showHint0222(str)
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
	
	document.getElementById("ser_amt").value=strar[1];
	document.getElementById("total").value=strar[2];
	}
  }
xmlhttp.open("GET","set0222.php?q="+str,true);
xmlhttp.send();
}
</script>

<script type="text/javascript">
   function funconce2(str){
	//alert(str);
	if(str == "Yes"){
	
		//document.getElementById("card1").style.display='none';
		//document.getElementById("card2").style.display='none';
		document.getElementById("insu2").style.display='';
		document.getElementById("insu3").style.display='';
		document.getElementById("insu4").style.display='';
		document.getElementById("insu5").style.display='';
		document.getElementById("insu6").style.display='';
		document.getElementById("insu7").style.display='';
		
		//document.getElementById("card1").style.display='none';
		//document.getElementById("cardk").style.display='none';
		
	}else if(str == "No"){
		//document.getElementById("insu1").style.display='none';
	//	document.getElementById("conce_card").style.display='none';
		//document.getElementById("card2").style.display='none';
		//document.getElementById("cardk").style.display='';
		//document.getElementById("card1").style.display='';
		document.getElementById("insu2").style.display='none';
		document.getElementById("insu3").style.display='none';
		document.getElementById("insu4").style.display='none';
		document.getElementById("insu5").style.display='none';
		document.getElementById("insu6").style.display='none';
		document.getElementById("insu7").style.display='none';
		
		
	}
}
		</script>
		
		<script type="text/javascript">
   function funcash(str){
	//alert(str);
	if(str == "Card"){
	

		document.getElementById("rec_type").style.display='';
		document.getElementById("rec_type1").style.display='none';
		
		
		
	}else if(str == "Paytm"){
	
		document.getElementById("rec_type").style.display='';
		document.getElementById("rec_type1").style.display='none';
			
		
	}
	else if(str == "Cash"){
	
		document.getElementById("rec_type").style.display='none';
		document.getElementById("rec_type1").style.display='';
		
		
		
	}
}
		</script>
		
		
		
		
		<script type="text/javascript">
   function showUser1111(str){
	//alert(str);
	if(str == "Free"){
	

		document.getElementById("con_fee").value="0";
		//document.getElementById("rec_type1").style.display='none';
		
		
		//alert(val);
	}else {
	
		var val=document.getElementById("con_fee1").value;
		//alert(val);
		document.getElementById("con_fee").value=val;
			
		
	}
	
}
		</script>
		
		
		<script type="text/javascript">
   function funconcekk2(str){
	//alert(str);
	if(str == "Yes"){
	

		document.getElementById("kkk").style.display='';
		//document.getElementById("insu3").style.display='';
		
	}else if(str == "No"){
		
		document.getElementById("kkk").style.display='none';
		//document.getElementById("insu3").style.display='none';
		
	}
}
		</script>
 <?php
date_default_timezone_set('Asia/Kolkata');

//$abc=$_GET['id'];

$y=date('Y');
$dxx1=date($y.'-01-01');
$d2=date($y.'-12-31');
$s=mysqli_query($link,"select distinct (`registerno`) as reg,date from patientregister");
while($r1=mysqli_fetch_array($s)){
$new=$r1['reg'];
}
 $aa="select max(`reg_no`) as id from patientregister where date between '$dxx1' and '$d2'  ";
$qs=mysqli_query($link,$aa);
$r2=mysqli_fetch_array($qs);
   $new1=$r2['id'];
    $gcnt=$r2['id'];
   if($new1<0){
	   $idf=00001;
   }else 
   if($new1>1 and $new1<9){
	   echo $idf="0000".$gcnt+1;
   }   if($new1>10 and $new1<99){
	   $idf="000".$gcnt+1;
	      }   if($new1>100 and $new1<999){
			  $idf="00".$gcnt+1;
			     }   if($new1>1000 and $new1<9999){
					 $idf="0".$gcnt+1;
				 } if( $new1>10000){
					 $idf=$gcnt+1;
				 }
 if($new1!=''){
	 
	 $output = explode("-",$new1);
	 $da=$output[count($output)-1];
 $reg1=$da+1;
$reg=("$y-".($idf));

 }else {
	$reg= ("SS-$y-".($new1+1));
 }
echo $idf;
$reg=("$y-".($idf));
	
	$abc=mysqli_query($link,"select distinct max(reg_id)+0,registerdate from patientregister");
	$row1=mysqli_fetch_array($abc);
	//echo $row1[0]+1;
	$date=$row1['registerdate'];
	 //$dd=date("Y-m-d", strtotime("$date"));
	 
	
	$dc=date('Y-m-d');
	
	
	 $dd="select distinct count(reg_id)+0 as cnt from patientregister where date='$dc'";
	$abc=mysqli_query($link,$dd);
	$row1=mysqli_fetch_array($abc);
	//echo $row1[0]+1;
	$max=$row1['cnt']+1;

if($abc){
	
	
}
else
{
echo "allredy exit";

}
//$ddd=date('Y-m-d');
//echo $date = strtotime("-1 day", $ddd);
 $date=date('Y-m-d', strtotime('-1 days'));
  $xxx="select * from patientregister where registerdate='$date' and pat_type='OP'";
$abcd=mysqli_query($link,$xxx);
 $cnt=mysqli_num_rows($abcd);
	//$row1=mysql_fetch_array($abc);
	//echo $row1[0]+1;
	//$date=$row1['registerdate'];
	//echo $dd=date("Y-m-d", strtotime("$date"));

?><?php 
//  $xxx1="SELECT * FROM `validity_days`";
// $abcd1=mysqli_query($link,$xxx1);
//  //$cnt=mysql_num_rows($abcd);
// 	$row2=mysqli_fetch_array($abcd1);
// 	 $valid_days=$row2['valid_days'];
// 	  $valid=date('Y-m-d', strtotime("+$valid_days days"));

?><script>
  function showUser(str)
{

if (str=="")

  {

  document.getElementById("state").innerHTML="";

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

	document.getElementById("city").innerHTML=show;
    }

  }

xmlhttp.open("GET","get-data.php?q="+str,true);

xmlhttp.send();

}

</script>
<script>
  function showUser1(str)
{

if (str=="")

  {

  document.getElementById("city").innerHTML="";

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

	document.getElementById("plac").innerHTML=show;
    }

  }

xmlhttp.open("GET","get-data1.php?q="+str,true);

xmlhttp.send();

}

</script>

<script>
function showUser21(str)
{
 //var date1=document.getElementById("date").value;
  //alert(date1);
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
	document.getElementById("state").value=strar[1];
	document.getElementById("city").value=strar[2];
	//document.getElementById("room_type").value=strar[4];
	document.getElementById("plac").value=strar[3];
    }
  }
xmlhttp.open("GET","get-data2.php?q="+str,true);
xmlhttp.send();
}
</script>	
			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <!--<div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Add Appointment</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="book_appointment.php">Appointment</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Add Appointment</li>
                            </ol>
                        </div>
                    </div>-->
					
					
					
					
					
					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>PATIENT REGISTRATION</header>
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
								
								<form name="form" method="post" enctype="multipart/form-data" action="../modal/patient_reg_insert.php">
                                
								
								<input type="hidden" name="opno"  value="<?php echo "OP".($row1[0]+1);?>"/>
<input type="hidden" name="ipno" value="<?php echo "IP".($row1[0]+1);?>"/>
<input type="hidden" name="ser" value="<?php echo $aname?>" />
<input type="hidden" name="authby" value="<?php echo $aname; ?>"/>
<?php $dt=date('y');
		 $d1=date('m');
		if($d1=='01'){$y=$dt-1;}
		if($d1=='02'){$y=$dt-1;}
		if($d1=='03'){$y=$dt-1;}
		
		if($d1=='04'){$y=$dt;}
		if($d1=='05'){$y=$dt;}
		if($d1=='06'){$y=$dt;}
		
		if($d1=='07'){$y=$dt;}
		if($d1=='08'){$y=$dt;}
		if($d1=='09'){$y=$dt;}
		
		if($d1=='10'){$y=$dt;}
		if($d1=='11'){$y=$dt;}
		if($d1=='12'){$y=$dt;}
		
		?>
								<input type="hidden" name="reg_no" value="<?php echo $new1?>" />
								<div class="card-body " id="bar-parent2">
                                	<div class="row">
	                                    <div class="col-md-4 col-sm-4">
	                                        <!-- text input -->
	                                        <div class="form-group">
												<input type="hidden" class="form-control"  name="max" id="max" value="<?php echo $max;?>" />
	                                            	                                            <label><b>Patient Type </b></label>
												
											
												<select name="type" id="sex1" required  onchange="showHint011(this.value)"  onclick="funconce1(this.value);"  class="form-control">
												<option value="">Select</option>
												<option value="OP">OP</option>
												<option value="IP">IP</option>
												<option value="Insurence">Insurence</option>
												</select></td>
	                                        

	                                        
 </div>				
											<!-- <div class="form-group">
	                                            <label><strong>Registration Date :</strong></label>
												
												<table><tr><td>
												
												 <input name="ApplicationDeadline" id="date"  class="form-control"  type="text"  size="20"  required="required"
 value="<?php echo date('d-m-y'); ?>" readonly placeholder=""/></td><td>
												
												<input name="ApplicationDeadline1" id="intime" readonly="readonly"  value="<?php echo date('d-m-y'); ?>" type="text"  size="20"  class="form-control"  required="required"
 /></td></tr></table>
 
 </div>-->
  <input name="ApplicationDeadline" id="date"  class="form-control"  type="hidden"  size="20"  required="required"
 value="<?php echo date('d-m-y'); ?>" readonly placeholder=""/>
 <input name="ApplicationDeadline1" id="intime" readonly="readonly"  value="<?php echo date('d-m-y'); ?>" type="hidden"  size="20"  class="form-control"  required="required"
 />
											
											<div class="form-group">
	                                            <label>Patient Name :</label>
												
												<table width="100%"><tr><td>
												
												<select name="pname_type" required class="form-control" >
<option value="Mr">Mr</option>
<option value="Mrs">Mrs</option>
<option value="Miss">Miss</option>
<option value="Master">Master</option>
<option value="Baby">Baby</option>
<option value="B/O">B/O</option>
</select></td><td>
												
												<input type="text" class="form-control"  name="pname" id="pname" required="required" /></td></tr></table>
 
 </div>
										
	<input name="token1" id="token1" readonly="readonly"  class="form-control" type="hidden"  size="20" 
 />									
											
												
												
											<div class="form-group" style="display:none;">
	                                            <label>Appointment Type</label>
												<select name="appoint_type" id="appoint_type"  class="form-control">
												<option value="">Select</option>
												<option value="OP">OP</option>
												<option value="IP">IP</option>
												<option value="Insurence">Insurence</option>
												</select></div>
										
											
											<div class="form-group">
	                                            <label>Consult Doct Name</label>
	                                          

<input id=\"doctorname\" list=\"city1\" name="doctorname" class="form-control" required  onfocus="showHint01(this.value)"  onChange="showHint01345(this.value)"  onblur="showHint01345(this.value)">
<datalist id=\"city1\" >

<?php  
 $sql="select distinct dname1 from doct_infor ";  // Query to collect records
$r=mysqli_query($link,$sql) or die(mysql_error());
while ($row=mysqli_fetch_array($r)) {
echo  "<option value=\"$row[dname1]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist>

											 <!-- <select name="doctorname" required id="doctorname" class="form-control"   onfocus="showHint01(this.value)"  onChange="showHint01345(this.value)"  onblur="showHint01345(this.value)">
<option value="">Select Doctor Name</option>
<?php 

$sq=mysqli_query($link,"select * from  doct_infor");
if($sq){
while($row=mysqli_fetch_array($sq)){

$rk=$row['dname1'];
$rk1=$row['id'];
?>
<option value="<?php echo $rk1; ?>"><?php echo $rk; ?></option>
<?php } } ?>
</select>
	                      -->                  </div>
											 <div class="form-group">
                                            <label>Village </label>
                                         
											<input id=\"village\" list=\"city22\" name="village"  class="form-control" required onchange="showUser21(this.value)">
<datalist id=\"city22\" >

<?php  
$sql="SELECT distinct vil_name FROM village";
  // Query to collect records
$r=mysqli_query($link,$sql) or die(mysqli_error());
while ($row=mysqli_fetch_array($r)) {
echo  "<option value=\"$row[vil_name]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist>
									   </div>
											
									<div class="form-group">
	                                            <label>State</label>
	                                             <!--<select name="state" class="form-control" onchange="showUser(this.value)">
												   <option value="">Select State</option>
												   <?php $sq=mysqli_query($link,"select * from location_states where cname='India' order by state asc");
												   while($r=mysqli_fetch_array($sq)){?>
												   
												   <option value="<?php echo $r['state'];?>"><?php echo $r['state'];?></option>
												   <?php }?>
												   </select>-->

<input type="text" name="state" id="state" class="form-control">
												   </div>
											
										
											
											
	                                    </div>
	                                    <div class="col-md-4 col-sm-4">
 <div class="form-group">

												<label><strong>New/Existing</label></strong>
<input type="radio" required="required" checked="checked" name="new" id="new" value="New"/> New 
<input type="radio" onclick="javascript:location.href='patientregister2.php'" required="required"  name="new" id="new" value="Existing"/> Existing</td>
	                                        
	                                           
											<!--	
												<input type="radio" required="required" name="type"  id="sex1" value="OP" onchange="showHint011(this.value)"  onclick="funconce1(this.value);"/>
 Out Patient <input type="radio" required="required" name="type" id="sex1" onchange="showHint012(this.value)" onclick="funconce1(this.value);" value="IP"/> In Patient
  -->
  
  
  <!--<input type="radio" required="required" name="type" id="sex1" onchange="showHint013(this.value)" onclick="funconce1(this.value);" value="Lab"/> Lab

 <input type="radio" required="required" name="type" id="sex5" onchange="showHint013(this.value)" onclick="funconce1(this.value);" value="Physiotherapy"/> Physiotherapy
-->
												
												
	                                        </div>
										<input type="file" name="image" style="display:none;">
										 <input name="token" id="token" readonly="readonly"  class="form-control" type="hidden"  size="20"  required="required"
 />
										<!-- <div class="form-group">
										
                                            <label>Patient ID :</label>
											
											
											
											 
	                                            
                                        </div>-->
										
                                       
										
										
										
										
										<!--<div class="form-group">
	                                            <label><strong>Father/Hus Name:</strong></label>
												
												<table width="100%"><tr><td>
												
												<select name="rel"  class="form-control" >
<option value="">Relation</option>
<option value="Self">Self</option>
<option value="Father">Father</option>
<option value="Husband">Husband</option>
<option value="Mother">Mother</option>
<option value="Son">Son</option>
<option value="Daughter">Daughter</option>
<option value="Guardian">Guardian</option>
</select></td><td>
												
												<input type="text" class="form-control"  name="fname" id="fname"  /></td></tr></table>
 
 </div>
						-->				
									
<div class="form-group">
	                                            <label>Patient Mobile</label>
	                                            <input type="text" class="form-control" name="mobile" id="mobile"  required="required" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
	                                        </div>
									
													 <div class="form-group">
	                                            <label>Consultation Fee</label>
	                                          <input type="text"  name="con_fee" readonly   id="con_fee" class="form-control"/>
	                                        </div>
												
										
									 <input type="hidden"  name="con_fee1"   id="con_fee1" class="form-control"/>
                                        	
									
                                           
											
										
											
											
										
                                          
									 
							
									 
									 
										
										   
									
                                     
											
											  <div class="form-group">
                                                <label class="control-label ">City/District
                                                  
                                                </label>
                                         
                                                  <!-- <select name="city" id="city" class="form-control" onchange="showUser1(this.value)">
												  
												   </select>-->
												   <input type="text" name="city" id="city" class="form-control">
                                        
                                            </div>
											
									  	<div class="form-group">
	                                            <label>Pay Type</label>
	                                        <select name="pay_type" class="form-control" onchange="showUser1111(this.value)">
												 <option value="">Select</option>
												 <option value="UPILAB">UPI LAB</option>
												 <option value="UPIHospital">UPI Hospital</option>
												 <option value="CARDLAB">CARD LAB</option>
												 <option value="CARDHospital">CARD Hospital</option>
												 <option value="cash">CASH</option>
												 <option value="FREE">FREE</option>
												   </select>


												   </div>
									  
									   
									   
									   
									   
									   
										
										
                                    </div>
									<div class="col-md-4 col-sm-4">
                                      
									   
									    <div class="form-group">
                                            <label><strong>MR No :</strong></label>
											
											<?php //echo $reg;
											$y=date('Y');
											 $aa="select max(`reg_no`) as id from patientregister where date between '$dxx1' and '$d2'  ";
$qs=mysqli_query($link,$aa);
$r2=mysqli_fetch_array($qs);
    $new1=$r2['id'];
      $gcnt=$r2['id'];
   if($new1>=0 and $new1<9){
	   $gcn=$gcnt+1;
	    $idf="0000"."$gcn";
   }else 
  
      if($new1>=9 and $new1<99){
		  $gcn=$gcnt+1;
	   $idf="000"."$gcn";
	      }   if($new1>=99 and $new1<999){
			  $gcn=$gcnt+1;
	   $idf="00"."$gcn";
			     }   if($new1>=999 and $new1<9999){
					$gcn=$gcnt+1;
	   $idf="0"."$gcn";
				 } if( $new1>=9999){
					 $idf=$gcnt+1;
				 }

 $idf;
echo $reg=("$y".($idf));
											
											?>
	                                            <input type="hidden" class="form-control" name="rnum" id="rnum" value="<?php echo $reg;?>" readonly >
                                        </div>
									   
									   <div class="form-group">
	                                            <label>Gender </label><br>
	                                         <input type="radio" class="" required="required" name="sex" id="sex1" value="male"/> Male
											 <input type="radio" required="required" name="sex" id="sex2" value="female"/> Female
                                              <input type="radio" required="required" name="sex" id="sex3" value="Others"/> Others
	                                        </div>
											 <div class="form-group">
                                            <label>Age</label>
	                                           <input type="text" class="form-control" name="age" id="age" required="required" />
                                        </div>
									   
										<div class="form-group">
	                                            <label>Mandal</label>
	                                            <!--<select name="plac"  id="plac" class="form-control" >
												   
												   </select> -->
												   
												   <input type="text" name="plac" id="plac" class="form-control"> </div>	
												   <div class="form-group">
	                                            <label>Refference Doctor</label>
	                                            <input type="text" class="form-control" name="ref_doc" id="ref_doc" >
	                                        </div>
												   <div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <input type="submit" class="btn btn-info" value="Submit" name="submit">
                                                    <button type="button" class="btn btn-danger" onclick="javascript:location.href='book_appointment.php'">Cancel</button>
                                                </div>
                                            	</div>
                                        	</div>
										
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