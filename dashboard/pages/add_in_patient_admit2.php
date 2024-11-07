<?php
session_start();
 $ses= $_SESSION['user'] ;
 if($_SESSION['user'])

{
 ?>
<?php include("header.php");?>
<script type="text/javascript">
var n = "";

function validate(input) 
{document.myform.adv_words.value="";
	//alert(input)

var inp=Math.round(input*100)/100;
	inp=inp.toString();
//document.myform.rupees.value=inp;
	var ss=inp.split(".")
		
		
		

	if (input.length == 0) 
	{
		alert ('Please Enter A Number.');
		document.myform.rupees.value = "";
		return true;
	}

	
	else {
	var result="";
	for(ix=0;ix<ss.length;ix++){
		//alert(convert(ss[ix]));
		if(ix==0)
		result=convert(ss[ix])+" Rupees";
		if(ix==1){
		//ss[ix]=Math.round(ss[ix]);
		
		result=result+convert(ss[ix])+" Paise";
		}
		
	}
	//alert(result)
	document.myform.adv_words.value += result+" only";
	
	}
}

function d1(x) 
{ // single digit terms
	switch(x) 
	{
		case '0': n= ""; break;
		case '1': n= " One "; break;
		case '2': n= " Two "; break;
		case '3': n= " Three "; break;
		case '4': n= " Four "; break;
		case '5': n= " Five "; break;
		case '6': n= " Six "; break;
		case '7': n= " Seven "; break;
		case '8': n= " Eight "; break;
		case '9': n= " Nine "; break;
		default: n = "Not a Number";
	}
	return n;
}

function d2(x) 
{ // 10x digit terms
	switch(x) 
	{
		case '0': n= ""; break;
		case '1': n= ""; break;
		case '2': n= " Twenty "; break;
		case '3': n= " Thirty "; break;
		case '4': n= " Forty "; break;
		case '5': n= " Fifty "; break;
		case '6': n= " Sixty "; break;
		case '7': n= " Seventy "; break;
		case '8': n= " Eighty "; break;
		case '9': n= " Ninety "; break;
		default: n = "Not a Number";
	}
	return n;
}

function d3(x) 
{ // teen digit terms
	switch(x) 
	{
		case '0': n= " Ten "; break;
		case '1': n= " Eleven "; break;
		case '2': n= " Twelve "; break;
		case '3': n= " Thirteen "; break;
		case '4': n= " Fourteen "; break;
		case '5': n= " Fifteen "; break;
		case '6': n= " Sixteen "; break;
		case '7': n= " Seventeen "; break;
		case '8': n= " Eighteen "; break;
		case '9': n= " Nineteen "; break;
		default: n=  "Not a Number";
	}
	return n;
}

function convert(input) 
{
	var inputlength = input.length;

	var x = 0;
	var teen1 = "";
	var teen2 = "";
	var teen3 = "";
	var numName = "";
	var invalidNum = "";
	var a1 = ""; // for insertion of million, thousand, hundred 
	var a2 = "";
	var a3 = "";
	var a4 = "";
	var a5 = "";
	digit = new Array(inputlength); // stores output
	
	for (i = 0; i < inputlength; i++)  
	{
		// puts digits into array
		digit[inputlength - i] = input.charAt(i)
	};
	
	store = new Array(9); // store output
	
	for (i = 0; i < inputlength; i++) 
	{
		x= inputlength - i;
		switch (x) 
		{ // assign text to each digit
			case x=9: d1(digit[x]); store[x] = n; break;
			case x=8: if (digit[x] == "1") {teen3 = "yes"}
					  else {teen3 = ""}; d2(digit[x]); store[x] = n; break;
			case x=7: if (teen3 == "yes") {teen3 = ""; d3(digit[x])}
					  else {d1(digit[x])}; store[x] = n; break;
			case x=6: d1(digit[x]); store[x] = n; break;
			case x=5: if (digit[x] == "1") {teen2 = "yes"}
					  else {teen2 = ""}; d2(digit[x]); store[x] = n; break;
			case x=4: if (teen2 == "yes") {teen2 = ""; d3(digit[x])}    
					  else {d1(digit[x])}; store[x] = n; break;
			case x=3: d1(digit[x]); store[x] = n; break;
			case x=2: if (digit[x] == "1") {teen1 = "yes"}
					  else {teen1 = ""}; d2(digit[x]); store[x] = n; break;
			case x=1: if (teen1 == "yes") {teen1 = "";d3(digit[x])}     
					  else {d1(digit[x])}; store[x] = n; break;
		}
		
		if (store[x] == "Not a Number"){invalidNum = "yes"};
		
		switch (inputlength)
		{
			case 1:   store[2] = ""; 
			case 2:   store[3] = ""; 
			case 3:   store[4] = ""; 
			case 4:   store[5] = "";
			case 5:   store[6] = "";
			case 6:   store[7] = "";
			case 7:   store[8] = "";
			case 8:   store[9] = "";
		}
		
		if (store[9] != "") { a1 =" Hundred, "} else {a1 = ""};
		if ((store[9] != "")||(store[8] != "")||(store[7] != ""))
		{ a2 =" Million, "} else {a2 = ""};
		if (store[6] != "") { a3 =" Hundred "} else {a3 = ""};
		if ((store[6] != "")||(store[5] != "")||(store[4] != ""))
		{ a4 =" Thousand, "} else {a4 = ""};
		if (store[3] != "") { a5 =" Hundred "} else {a5 = ""};
	}
	// add up text, cancel if invalid input found
	if (invalidNum == "yes"){numName = "Invalid Input"}
	else 
	{
		numName =  store[9] + a1 + store[8] + store[7] 
		+ a2 + store[6] + a3 + store[5] + store[4] 
		+ a4 + store[3] + a5 + store[2] + store[1];
	}
	
	store[1] = ""; store[2] = ""; store[3] = ""; 
	store[4] = ""; store[5] = ""; store[6] = "";
	store[7] = ""; store[8] = ""; store[9] = "";
	if (numName == ""){numName = "Zero"};
return numName;

	return true;
}
  

</script>		


<script>
function showHint2k1(str)
{

if (str=="")

  {

  document.getElementById("room_location").innerHTML="";

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

	document.getElementById("room_type").innerHTML=show;
    }

  }

xmlhttp.open("GET","get-room_loc.php?q="+str,true);

xmlhttp.send();

}

</script>  

<script>
function showHint2k(str)
{

var loc=document.getElementById("room_location").value;
if (str=="")

  {

  document.getElementById("room_type").innerHTML="";

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

	document.getElementById("room_no").innerHTML=show;
    }

  }

xmlhttp.open("GET","get-room_det.php?q="+str+"&loc="+loc,true);

xmlhttp.send();

}

</script>  
<script>
function showHint3k(str)
{
	var loc=document.getElementById("room_location").value;
	var room=document.getElementById("room_type").value;

if (str=="")

  {

  document.getElementById("room_no").innerHTML="";
  
  

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

	document.getElementById("bedsno").innerHTML=show;
    }

  }

xmlhttp.open("GET","get-bed_det.php?q="+str+"&loc="+loc+"&room="+room,true);

xmlhttp.send();

}

</script> 
<script>
function showHint2(str)
{
var loc=document.getElementById("room_location").value;
var room=document.getElementById("room_type").value;
var room_no=document.getElementById("room_no").value;
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
	//document.getElementById("roomsno").value=strar[1];
	document.getElementById("roomrents").value=strar[1];
	
	
	
    }
  }
xmlhttp.open("GET","set12.php?q="+str+"&loc="+loc+"&room="+room+"&rnum="+room_no,true);
xmlhttp.send();
}
</script>

<script>
function showHint6k(str)
{

if (str=="")

  {

  document.getElementById("pkg").innerHTML="";

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

	document.getElementById("room_type").innerHTML=show;
    }

  }

xmlhttp.open("GET","get-pkg_det.php?q="+str,true);

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
 <?php
$abc=mysqli_query($link,"select max(PAT_ID)+0 from ip_pat_admit");
	$row1=mysqli_fetch_array($abc);
	
	

if($query = true){
//echo "inserted";
}
else
{
echo "allredy exit";

}
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
                                <div class="page-title">ADD IN PATIENT ADMISSION</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="inpatient.php">PATIENT LIST</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">ADD IN PATIENT ADMISSION</li>
                            </ol>
                        </div>
                    </div>
					
					
					
					
					
					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header> IN PATIENT ADMISSION</header>
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
								
								<form name="myform" method="post" action="../modal/insert_in_patient.php">
                                
								
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
	                                    <div class="col-md-6 col-sm-6">
	                                        <!-- text input -->
	                                        <div class="form-group">
	                                            <label><strong>Without Package/Package</label></strong>
Without Package &nbsp;&nbsp;<input type="radio" checked="checked" value="No" name="pkg_type" />&nbsp;&nbsp;&nbsp;&nbsp;<!--Package &nbsp;&nbsp;
<input type="radio" onclick="javascript:location.href='add_in_patient_admit1.php'" name="pkg_type" />--></td>
	                                        

	                         <input type="hidden" name="patno" value="<?php echo "PAT-".($row1[0]+101)?>"/>               
 </div>				
											 <div class="form-group">
	                                            <label><strong>Registration Date :<br /><br /></strong></label>
												
												<table><tr><td>
												
												 <input name="ApplicationDeadline1" id="regdate"  class="form-control"  type="text"  size="20"  required="required"
 value="<?php echo date('Y-m-d'); ?>" readonly placeholder=""/></td><td>
												
												</td></tr></table>
 
 </div>
 
 
 
 
											<div class="form-group">
	                                            <label>Doctor Name </label><br />
												<select name="docname"  class="form-control" required >
<option value=""> -- Select Doctor Name -- </option>
<?php
	
	
	$sql = mysqli_query($link,"select * from doct_infor");
	if($sql)
	{
		while($row = mysqli_fetch_array($sql))
		{
			$did = $row['id'];
			$dname = $row['dname1'];
?>
<option value="<?php echo $did ?>"><?php echo $dname ?></option>
<?php
		}
	}	
?>
</select>
												
												
	                                        </div>
											<div class="form-group">
	                                            <label>Age :</label>
												
												<table width="100%"><tr><td>
												<input type="text" class="form-control" name="age" id="age" readonly />
											</td></tr></table>
 
 </div>
										<div class="form-group">
	                                            <label>Room Location  </label><br />
	                                        <select name="room_location" id="room_location"  class="form-control" onchange="showHint2k1(this.value)" required>
  <option value=""> -- Select -- </option>
  <?php

	 $sq = mysqli_query($link,"select * from locations");
			  $tot=mysqli_num_rows($sq);
			  $i = 1;
			  if($sq){
			  while($res=mysqli_fetch_array($sq)){
			 
			  $rid = $res['ROOMTYPE_ID'];
			  $rtype=$res['lname'];
  ?>
  <option value="<?php echo $res['id'] ?>"><?php echo $res['lname'] ?></option>
  <?php
	}
	}
  ?>
  </select>
	                                        </div>
											
											<div class="form-group">
	                                            <label>Room No:</label>
												
												<table width="100%"><tr><td>
												
												<select name="roomsno" id="room_no" class="form-control" onChange="showHint3k(this.value)" >
    <option value="">Select Room No</option>
      </select></td></tr></table>
 
 </div>
												
									<!--<div class="form-group">
                                            <label>Room Rent</label>
											<input name="roomrents" type="text" class="form-control"  id="roomrents"  size="8" />
	                                          
                                        </div>		
											
											<div class="form-group">
	                                            <label>Admission Charge </label>
	                                          <input name="adm_fee" type="text" class="form-control"  size="10" value="300"/>
											  <input name="conce_fee" type="hidden" class="text" size="10" value="0.0"/>
	                                        </div>
											
											
											<div class="form-group">
	                                            <label>Advance Paid</label>
	                                          <input type="text" name="rupees" id="rupees" onKeyUp="return validate(document.myform.rupees.value)" class="form-control"/>
	                                        </div>
											
											<div class="form-group">
	                                            <label> Received By</label>
												<input name="emp_name" type="text" class="form-control" value="<?php echo $ses; ?>" />
	                                        </div>
											<div class="form-group">
	                                            <label>Mode of Payment</label>
	                                         <input type="radio" name="pay_type" value="Cash" onclick="javascript:card_fun(this.value)" checked />
    Cash
      <input type="radio" name="pay_type" value="Card" onclick="javascript:card_fun(this.value)" />
    Card
	                                        </div>
											
											
											-->
											
											
											
	                                    </div>
	                                    <div class="col-md-6 col-sm-6">
                                        <!-- textarea -->
										
										<div class="form-group">
	                                            <label><strong>Patient MR No</label></strong>
												<input type="text" name="rnum" class="form-control" onclick="javascript:window.open('patient_popup.php','mypatwindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no')"
 id="regno" readonly /></div>
										
                                        <div class="form-group">
                                            <label><strong>Admit Date / Time :</strong></label>
											
											<table><tr><td>
												
												 <input name="admitdate" id="date"  class="form-control"  type="text"  size="20"  required="required"
 value="<?php echo date('Y-m-d'); ?>" readonly placeholder=""/></td><td>
												
												<input name="time" id="intime" readonly="readonly"  value="<?php echo date('d-m-Y'); ?>" type="text"  size="20"  class="form-control"  required="required"
 /></td></tr></table>
											 
                                        </div>
										
										
										
										 <div class="form-group">
                                            <label>Patient Name :</label>
											
											
											
											 <input name="pname" id="patname" readonly="readonly"  class="form-control" type="text"  size="20"  required="required"
 />
	                                            
                                        </div>
										
										
										<div class="form-group">
                                            <label>Gender :</label>
											
											
											
											 <input name="sex" id="gen1" readonly="readonly"  class="form-control" type="text"  size="20"  required="required"
 />
	                                            
                                        </div>
										
										
										<div class="form-group">
	                                            <label>Room Type  </label>
	                                        <select name="room_type" id="room_type"  class="form-control" onchange="showHint2k(this.value)" required>
  
  </select>
	                                        </div>
										
										
										
										
										 
									
                                        <div class="form-group">
	                                            <label>Bed No</label>
												 <select name="bedsno" id="bedsno" class="form-control" onchange="showHint2(this.value)" required>
  
 
  </select>
	                                               </div>
										
									<!--	<div class="form-group">
                                            <label>Medical Records Charges</label>
											<input name="mr_charge" type="text" class="form-control"  size="10" value="250" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/>
											
                                           
											
                                        </div>
										
										
										
										<div class="form-group">
                                            <label>Date of Advance</label>
											 <input name="adv_date" type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" readonly >
									   </div>
									   <div class="form-group">
                                            <label>Advance in Words</label>
											<textarea name="adv_words" class="form-control" readonly class="textarea1"></textarea>
                                          
									   </div>
									  -->
									   
									   
									   
									   
									   
										
										
                                    </div>
									
                                	</div>
									
									
                                </div>
								<div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
												
												
												<input type="submit" id="prt" name="submit" value="Save" onClick="printt()" class="btn btn-info"/>&nbsp;
<input type="button" name="close" id="close" value="Close" class="btn btn-default" onClick="window.location.href='inpatient.php'"/>
                                                    
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