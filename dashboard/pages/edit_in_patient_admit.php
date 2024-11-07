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
 $pat_id=$_GET['id'];
 $patno=$_GET['pat'];
 echo "<br />";
   $a="SELECT distinct a.PAT_REGNO, b.patientname, a.ADMIT_DATE, a.admit_time, a.BED_NO, a.CONCESSION_TYPE,
 a.CONCESSION_CARDNO, a.AMOUNT, a.CONS_AMT, a.ALLOT_BY, c.roomno, d.ROOM_FEE, e.dname1, a.doc_code, b.registerdate, a.cash_credit,
 a.diet_cost, a.mr_cost,b.gender,a.room_type,a.room_no,a.room_loc,a.room_rent,b.age,a.adv_amnt,a.AUTH_BY
FROM ip_pat_admit AS a, patientregister AS b, beds AS c, room_tariff AS d, doct_infor AS e
WHERE a.PAT_REGNO = b.registerno and a.PAT_ID='$pat_id'

AND e.id = a.doc_code
AND a.pat_no =  '$patno'";
$sql1 = mysqli_query($link,$a);

if($sql1)
{
	$row1 = mysqli_fetch_array($sql1);
	
	$regno = $row1['PAT_REGNO'];
	$patname = $row1['patientname'];
	$adate = date('d-m-Y',strtotime($row1['ADMIT_DATE']));
	$atime = $row1['admit_time'];
	$bedno = $row1['BED_NO'];
	$contype = $row1['CONCESSION_TYPE'];
	$concardno = $row1['CONCESSION_CARDNO'];
	$amt = $row1['AMOUNT'];
	$conamt= $row1['CONS_AMT'];
	$allotby = $row1['ALLOT_BY'];
	$roomno = $row1['room_no'];
	$roomfee = $row1['ROOM_FEE'];
	$dname = $row1['dname1'];
	$dcode =$row1['doc_code'];
	$patregdate =date('d-m-Y',strtotime($row1['registerdate']));
	$cashcredit =$row1['cash_credit'];
	$dietcost = $row1['diet_cost'];
	$mrcost =$row1['mr_cost'];
	$gender=$row1['gender'];
	$room_loc=$row1['room_loc'];
	$room_type=$row1['room_type'];
	$room_no=$row1['room_no'];
	$room_rent=$row1['room_rent'];
	$age=$row1['age'];
	$adv_amnt=$row1['adv_amnt'];
	$ADMIT_DATE=$row1['ADMIT_DATE'];
	$AUTH_BY=$row1['AUTH_BY'];
	
	
	//$insutype =$row1['insu_type'];
	if($cashcredit == "credit"){
	$sql2 = mysqli_query($link,"select CONCE_NAME from concession_type where CONCE_CODE='$contype'");
	if($sql2)
	{
		$row2 = mysqli_fetch_array($sql2);
		$conname = $row2['CONCE_NAME'];
	}
	}
	$sql3 = mysqli_query($link,"select sno from ip_pat_bed where pat_no = '$patno'");
	if($sql3)
	{
		$row3 = mysqli_fetch_array($sql3);
		$sno = $row3['sno'];
	}
}

 $sahhh="SELECT * FROM `locations` where id='$room_loc'";
$ssq=mysqli_query($link,$sahhh);
$r=mysqli_fetch_array($ssq);
 $lname=$r['lname'];
 
  $sa="SELECT * FROM `roomtype` where id='$room_type'";
$ssq1=mysqli_query($link,$sa);
$r1=mysqli_fetch_array($ssq1);
 $rtype=$r1['rtype'];
 $sa2="SELECT * FROM `rooms` where id='$room_no'";
$ssq2=mysqli_query($link,$sa2);
$r2=mysqli_fetch_array($ssq2);
 $roomno=$r2['roomno']; 
 
  $sa2="SELECT * FROM `beds` where id='$bedno'";
$ssq2=mysqli_query($link,$sa2);
$r2=mysqli_fetch_array($ssq2);
 $bed=$r2['bedno'];
 ?>

			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">EDIT IN PATIENT ADMISSION </div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="inpatient.php">PATIENT LIST</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">EDIT IN PATIENT ADMISSION</li>
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
				                  
                                </div>
								
								<form name="myform" method="post" action="../modal/update_in_patient.php">
                                
								
								<input type="hidden" name="opno"  value="<?php echo $patno;?>"/>
<input type="hidden" name="ipno" value="<?php echo "IP".($row1[0]+1);?>"/>
<input type="hidden" name="ser" value="<?php echo $ser?>" />
<input type="hidden" name="authby" value="<?php echo $ser; ?>"/>
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
 value="<?php echo $ADMIT_DATE;?>" readonly placeholder=""/></td><td>
												
												</td></tr></table>
 
 </div>
 
 
 
 
											<div class="form-group">
	                                            <label>Doctor Name </label><br />
												<select name="docname"  class="form-control" required >
<option value="<?php echo $dcode?>"><?php echo $dname?></option> 
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
												<input type="text" class="form-control" value="<?php echo $age?>" name="age" id="age"  />
											</td></tr></table>
 
 </div>
										<div class="form-group">
	                                            <label>Room Location  </label><br />
	                                        <select name="room_location" id="room_location"  class="form-control" onchange="showHint2k1(this.value)" required>
											  
  <option value="<?php echo $room_loc?>"> <?php echo $lname?></option>
  <?php

	 $sq = mysqli_query($link,"select * from locations where id!='$room_loc'");
			  $tot=mysqli_num_rows($sq);
			  $i = 1;
			  if($sq){
			  while($res=mysqli_fetch_array($sq)){
			 
			  $rid = $res['ROOMTYPE_ID'];
			  //$rtype1=$res['lname'];
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
    <option value="<?php echo $room_no?>"><?php echo $roomno?></option>
      </select></td></tr></table>
 
 </div>
												
	
											<input name="adm_fee" type="hidden" class="form-control"  size="10" value="0"/>
											  <input name="conce_fee" type="hidden" class="text" size="10" value="0.0"/>
											
		
											
											
											
											
											
	                                    </div>
	                                    <div class="col-md-6 col-sm-6">
                                        <!-- textarea -->
										
										<div class="form-group">
	                                            <label><strong>Patient MR No</label></strong>
												<input type="text" name="rnum" class="form-control" 
 id="regno" readonly value="<?php echo $regno ?>" /></div>
										
                                        <div class="form-group">
                                            <label><strong>Admit Date / Time :</strong></label>
											
											<table><tr><td>
												
												 <input name="admitdate" id="date"  class="form-control"  type="text "  size="20"  required="required"
 value="<?php echo $ADMIT_DATE;  ?>"  placeholder=""/></td><td>
												
												<input name="time" id="intime1"   value="<?php echo $atime; ?>" type="text"  size="20"  class="form-control"  required="required"
 /></td></tr></table>
											 
                                        </div>
										
										
										
										 <div class="form-group">
                                            <label>Patient Name :</label>
											
											
											
											 <input name="pname" id="patname"  value="<?php echo $patname ?>"  class="form-control" type="text"  size="20"  required="required"
 />
	                                            
                                        </div>
										
										
										<div class="form-group">
                                            <label>Gender :</label>
											
											
											
											 <input name="sex" id="gen1"   class="form-control" type="text" value="<?php echo $gender?>" name="gender" id="gender"   size="20"  required="required"
 />
	                                            
                                        </div>
										
										
										<div class="form-group">
	                                            <label>Room Type  </label>
	                                        <select name="room_type" id="room_type"  class="form-control" onchange="showHint2k(this.value)" required>
											<option value="<?php echo $room_type?>"><?php echo $rtype?></option>
  
  </select>
	                                        </div>
										
										
		 <?php
  /**
   * Created by PhpStorm.
   * User: sakthikarthi
   * Date: 9/22/14
   * Time: 11:26 AM
   * Converting Currency Numbers to words currency format
   */
$number = $adv_amnt;
   $no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'One', '2' => 'Two',
    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'Eighty', '90' => 'Ninety');
   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
  $rupee= $result . "Rupees  " ;
 ?> 									 
								<input type="hidden" name="patno" value="<?php echo $patno;?>"/>
<input type="hidden" name="sno" value="<?php echo $sno;?>"/>		
										 
									
                                        <div class="form-group">
	                                            <label>Bed No</label>
												 <select name="bedsno" id="bedsno" class="form-control" onchange="showHint2(this.value)" required>
  <option value="<?php echo $bedno;?>"><?php echo $bed;?></option>
  
  </select>
	                                               </div>
										
										<!--<div class="form-group">
                                            <label>Medical Records Charges</label>
											
											
                                           
											
                                        </div>-->
										<input name="mr_charge" type="hidden" class="form-control"  size="10" value="<?php echo $mrcost?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/>
										
										<!--
										<div class="form-group">
                                            <label>Date of Advance</label>
											 <input name="adv_date" type="date" class="form-control" value="<?php echo $ADMIT_DATE; ?>" readonly >
									   </div>
									   <div class="form-group">
                                            <label>Advance in Words</label>
											<textarea name="adv_words" class="form-control" readonly class="textarea1"><?php echo $rupee?> Only</textarea>
                                          
									   </div>
									  
									   -->
									   
									   
									   
									   
										
										
                                    </div>
									
                                	</div>
									
									
                                </div>
								<div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
												
											
										
<input type="submit" id="prt" name="submit" value="Save"  class="btn btn-info"/>&nbsp;
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
