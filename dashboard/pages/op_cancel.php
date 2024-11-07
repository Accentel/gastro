<?php
session_start();
 $ses= $_SESSION['user'] ;
 if($_SESSION['user'])
{
 $aname=$_SESSION['user'];
 ?>
<?php include("header.php");?>
	<script>
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
function calc1(){
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
	document.getElementById("con_doct_mob").value=strar[2];
	document.getElementById("total").value=strar[3];
	}
  }
xmlhttp.open("GET","set010.php?q="+str,true);
xmlhttp.send();
}
</script>

<script>
function showHint011(str)
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
	
	document.getElementById("token").value=strar[1];
	}
  }
xmlhttp.open("GET","set13.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function showHint012(str)
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
	
	document.getElementById("token").value=strar[1];
	}
  }
xmlhttp.open("GET","set13.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function showHint013(str)
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
	
	document.getElementById("token").value=strar[1];
	}
  }
xmlhttp.open("GET","set13.php?q="+str,true);
xmlhttp.send();
}
</script>




<script>
function showHint01345(str)
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
	
	document.getElementById("token1").value=strar[1];
	}
  }
xmlhttp.open("GET","setn13.php?q="+str,true);
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
 <?php

//$abc=$_GET['id'];

$y=date('y');
$s=mysqli_query($link,"select distinct (`registerno`) as reg,registerdate from patientregister");
while($r1=mysqli_fetch_array($s)){
$new=$r1['reg'];
}
$qs=mysqli_query($link,"select max(`reg_no`) as id from patientregister ");
$r2=mysqli_fetch_array($qs);
   $new1=$r2['id'];
 if($new1!=''){
	 
	 $output = explode("-",$new1);
	 $da=$output[count($output)-1];
 $reg1=$da+1;
$reg=("RH-$y-".($reg1));

 }else {
	$reg= ("RH-$y-".($new1+101));
 }


	
	$abc=mysqli_query($link,"select distinct max(reg_id)+0,registerdate from patientregister");
	$row1=mysqli_fetch_array($abc);
	//echo $row1[0]+1;
	$date=$row1['registerdate'];
	 //$dd=date("Y-m-d", strtotime("$date"));
	 
	
	//date('Y-m-d' strtotime($date));

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

?>

			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">PATIENT Cancelation</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="book_appointment.php">Appointment</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">PATIENT Cancelation</li>
                            </ol>
                        </div>
                    </div>
					
					
					
					
					
					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>PATIENT Cancelation</header>
                                  <hr>
                                 <form name="frm" method="post" ><table width="100%"><tr><td align="right">  Search By MR No:</td><td>
                                  <input id="mrno" name="reg"  class="form-control"required  onclick="window.open('wrno4.php','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')">
</td><td>
<input name="submit" type="submit" value="" style="background:url(../img/go1.gif);width:42px;height:22px;border-style:none;" />
           </td></tr></table> </form>                  
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
                                
                                
                                
                                <?php 
      
        $r=$_REQUEST['reg'];
        
        $xxx="select * from patientregister where registerno='$r' ";
$abc=mysqli_query($link,$xxx);
 //$cnt=mysql_num_rows($abcd);
	$row1=mysqli_fetch_array($abc);
$registerno=$row1['registerno'];
$radte=$row1['date'];
//$ptype=$row1['pat_type'];
$doctorname=$row1['doctorname'];
$patientname=$row1['patientname'];
$age=$row1['age'];
$gaurdianname=$row1['gaurdianname'];
$gender=$row1['gender'];
$address=$row1['address'];
$phoneno=$row1['phoneno'];
$registerfee=$row1['registerfee'];
$remarks=$row1['remarks'];
$aadar=$row1['aadar'];
$ref_doc=$row1['ref_doc'];
$ref_doc_mob=$row1['ref_doc_mob'];
$con_doc_mob=$row1['con_doc_mob'];
$rel_type=$row1['rel_type'];
//$tokenno=$row1['tokenno'];
$cons_fee=$row1['cons_fee'];
$total=$row1['total'];
$pat_type1=$row1['pat_type1'];
$pname_type=$row1['pname_type'];
$concession_type=$row1['concession_type'];
$dept=$row1['dept'];
 $validity=$row1['validity'];
  $image=$row1['image'];
  $visit_count_pat=$row1['visit_count_pat'];
$opt_type=$row1['opt_type'];
$state=$row1['state'];
$city=$row1['city'];
$mandal=$row1['mandal'];
 $d=date('Y-m-d');
 $bill_num=$row1['bill_num'];
$id=$row1['reg_id'];
 
 $qss=mysqli_query($link,"select * from patient_vist where mrno='$registerno'");
 $rr=mysqli_fetch_array($qss);
 $validity1=$rr['validity'];
 $visit_cnt=$rr['visit_cnt'];
 
 
 $aq="select * from  doct_infor where dname1='$doctorname'";
$sqq=mysqli_query($link,$aq);

$rowq=mysqli_fetch_array($sqq);
 $valid1=$rowq['valdity'];
  $vcnt=$rowq['visit_count'];
 
if($validity1>=$d and $visit_cnt<$vcnt){
	//$amt=$cons_fee/2;
	$amt=0;
} else {
	$a="select dname1,op_fee,ip_fee,ins_fee from  doct_infor where dname1='$doctorname'";
$sq=mysqli_query($link,$a);

while($row=mysqli_fetch_array($sq)){

   $rk=$row['dname1'];
  $op_fee=$row['op_fee'];
  $ip_fee=$row['ip_fee'];
  $ins_fee=$row['ins_fee'];
	//$amt=$cons_fee;
}
if($opt_type=='OP'){
	$amt=$op_fee;
}else if($opt_type=='IP'){
	$amt=$ip_fee;
	}else if($opt_type=='Insurence'){
	$amt=$ins_fee;
	
}
}
	$abc=mysqli_query($link,"select max(reg_id)+0,registerdate from patientregister");
	$row1=mysqli_fetch_array($abc);
	//echo $row1[0]+1;
	$date=$row1['registerdate'];
	$da=date('Y-m-d');
	
	
   //echo ":" ."OP". $cnt;
   
   
   $rest = substr("$doctorname", 0, 4); 
   
   $sql="select * from patientregister where date='$da' and doctorname='$doctorname'";

//$sql="select b.ROOM_NO,b.ROOM_FEE,b.MAINT_FEE,b.NURSE_FEE,b.OTHER_FEE from bed_details as a inner join room_tariff as b where a.ROOM_no= b.room_no and a.BED_STATUS='Unreserved' and a.BED_NO = '$q'";

$result = mysqli_query($link,$sql);
 $cnt=mysqli_num_rows($result)+1;


//while($row = mysql_fetch_array($result))
 // {

   $tok= "$rest"."_".$cnt;
  

   
   
?>
								
								<form name="form" method="post" enctype="multipart/form-data" action="">
                                
								
<input type="hidden" name="opno"  value="<?php echo "OP".($row1[0]+1);?>"/>
<input type="hidden" name="ipno" value="<?php echo "IP".($row1[0]+1);?>"/>

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
		 $sq11=mysqli_query($link,"select sum(amount) as amt from daily_amount where bill_num='$bill_num' and mrnum='$r'");
   $rr=mysqli_fetch_array($sq11);
   $amt=$rr['amt'];
		
		?> 
								<input type="hidden" name="reg_no" value="<?php echo $new1?>" />
								<div class="card-body " id="bar-parent2">
                                	<div class="row">
	                                    <div class="col-md-6 col-sm-6">
	                                        <!-- text input -->
	                                        
											
											<div class="form-group">
	                                            <label>Registration Date </label><br />
												
												<input type="text" class="form-control"  name="ApplicationDeadline" id="date" value="<?php echo $radte?>"  required="required" /></td></tr></table>
 

												
												
	                                        </div>
											<div class="form-group">
	                                            <label>Paid Amount :</label>
												
												<table width="100%"><tr><td>
												
												
												<input type="text" name="paid" class="form-control" id="paid" class="text" value="<?php echo $amt; ?>" readonly /></td></tr></table>
 
</td><td>
												 </div>
										
											
											
											<input type="hidden" name="id" id="id" value="<?php echo $id;?>">	
											
											<input type="hidden" name="bill_num" id ="bill_num" value="<?php echo $bill_num;?>">
											
											
											
										
											
											
											
											
											
										
										
										
										
											
											
										
                                            
                                 
                                                  
                                            
											
											
	                                    </div>
	                                    <div class="col-md-6 col-sm-6">
                                        <!-- textarea -->
									
										<!--<div class="form-group">
	                                            <label><strong>Appointment Type</label></strong>
												<select name="appoint_type" id="appoint_type" required class="form-control">
												<option value="">Select</option>
												<option value="Ortho">Ortho</option>
												<option value="Ayurvedic">Ayurvedic</option>
												<option value="Genral">Genral</option>
												</select></div>-->
										
                                        <div class="form-group">
                                            <label><strong>MR No :</strong></label>
											
										
	                                          <input type="text" name="rnum" id="rnum" class="form-control" value="<?php echo $registerno; ?>" readonly />     </div>
										
										
										
										 <div class="form-group">
                                            <label>Return Amount :</label>
											
											
											
											 <input name="return_amt" id="return"   class="form-control" type="text"  size="20"  required="required"
 />
	                                            
                                        </div>
										
										
										
										
									
									
									
											
											
											
											
                                       
											
                                          
                                 
									  
											
									   
												
									   
									   
										
										
                                    </div>
									
                                	</div>
									
									
                                </div>
								<div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <input type="submit" class="btn btn-info" value="Submit" name="submit2">
                                                    <button type="button" class="btn btn-default" onclick="javascript:location.href='op_can1.php'">Cancel</button>
                                                </div>
                                            	</div>
                                        	</div>
                            </div>
                        </div>
                    </div>
					
					</form>
					
					
					<?php 
if(isset($_POST['submit2'])){
	date_default_timezone_set('Asia/Kolkata');
 $ndate=date( 'Y-m-d H:i:s', time ()); 
	$rnum=$_POST['rnum'];
	$paid=$_POST['paid'];
	$return_amt=$_POST['return_amt'];
	 $dt=date('Y-m-d');
	 $id=$_POST['id'];
	 $bill_num=$_POST['bill_num'];
$sq=mysqli_query($link,"select * from daily_amount where date(date1)='$dt'");
$bcnt=mysqli_num_rows($sq);
$cnt1=$bcnt+1;
$cnt=date('dmy')."-".$cnt1;
	$sq2=mysqli_query($link,"insert into op_cancel (mrno,amount,ret_amount,bill_date,id1)values('$rnum','$paid','$return_amt','$cnt','$id')");
	$qq=mysqli_query($link,"insert into daily_amount(amnt_type,amount,bill_num,mrnum,recv_by,pay_type,date_time,amnt_desc,doct_name)
values('Patient Register','$return_amt','$cnt','$rnum','$aname','Cash','$ndate','Patient Register Canceled','$new_doct_type')");
$sq3=mysqli_query($link,"update patientregister set pcancel='Canceled' where reg_id='$id'");
	
if($sq3){	print "<script>";
			print "alert('Suceefully Canceled');";
			print "self.location='op_can1.php';";
			print "</script>";
}
}
	?>
              
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