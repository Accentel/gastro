<?php 
include('../db/connection.php');

session_start();

if($_SESSION['user'])

{ 

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
		

<script type="text/javascript">
function trim(stringToTrim) {
	return stringToTrim.replace(/^\s+|\s+$/g,"");
}



function validate(){
	
	var emp_value ="";
	//var selected=false;

  for (var i=0; i < document.docpat.empid.length; i++){

   if (document.docpat.empid[i].checked){
	   var emp_value = document.docpat.empid[i].value;
	 //alert("emp val -->"+emp_value);     
   }
  }
  if( emp_value == "" || emp_value== null ){
	 	  alert("Please select Patient Name");
	  return false;
  }
  return true
}
  function showDoc(cc){
	
	
	
	
	
		 xmlHttp=GetXmlHttpObject();
		  if (xmlHttp==null){
			  alert ("Browser does not support HTTP Request")
				  return
		  }
			  var url="finalbill_popup1.php"
			  url=url+"?emp_id="+cc;
                
			  xmlHttp.onreadystatechange=stateChanged 
				  xmlHttp.open("GET",url,true)
				  xmlHttp.send(null)
	 }
			
function stateChanged(){ 
	  if (xmlHttp.readyState==4){ 
		  var showdata = xmlHttp.responseText; 
		  //alert(showdata);
		  var strar = showdata.split(":");
		//alert(strar);
		  if(strar.length>0){
			 //window.opener.location.reload();
			 //window.location.reload(); 
	 //alert(strar.length);
		//"|" + emp_id + "|" + 2 name + "|" +  regno + "|" + age + "|" + 5sex + "|" + admdt + "|" + 7constype + "|" + conscard + "|" + admfee + "|" + diet; data=data + "|" + consultantfee1+ "|" +  invgfee + "|" + 13 therfee + "|" + 14 carmfee + "|"+ consinvgfee + "|"+ 16 totrent + "|" +17 adv_amt + "|" +18 bedno + "|" +019 arogya_amount + "|"+ 20 admfee_cons + "|" +21 out side +service +22 attender;

	//alert('<%=current_date%>')
			opener.document.getElementById("patno").value=strar[1];
			opener.document.getElementById("patname").value=strar[2];
			opener.document.getElementById("mrno").value=strar[3];
			opener.document.getElementById("age").value=strar[4];
			opener.document.getElementById("sex").value=strar[5];
			opener.document.getElementById("address").value=strar[6];
			opener.document.getElementById("doctors").value=strar[7];
			
			opener.document.getElementById("fname").value=strar[8];
			opener.document.getElementById("mobile").value=strar[9];
			opener.document.getElementById("doa").value=strar[10];
			opener.document.getElementById("tlamount").value=strar[11];
			opener.document.getElementById("ladamount").value=strar[12];
			opener.document.getElementById("lbamount").value=strar[13];
			opener.document.getElementById("tpamount").value=strar[14];
			opener.document.getElementById("padamount").value=strar[15];
			opener.document.getElementById("pbamount").value=strar[16];
			opener.document.getElementById("hadamount").value=strar[17];
			opener.document.getElementById("tprocamount").value=strar[18];
			opener.document.getElementById("procadamount").value=strar[19];
			opener.document.getElementById("procbamount").value=strar[20];
			
			opener.document.getElementById("productdetails").innerHTML=strar[11];
			

			
			
   			   window.close();
		  }
	  }
  }
  


function GetXmlHttpObject(){
	  var xmlHttp=null;
	  try{
		  // Firefox, Opera 8.0+, Safari
		  xmlHttp=new XMLHttpRequest();
	  }
	  catch (e){
		  //Internet Explorer
		  try{
			  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		  }
		  catch (e){
			  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
	  }
	  return xmlHttp;
  }
</script>
	</head>

	<body>


	
                       <form name="frm" method="post" >
           
                
<table width="70%" cellspacing="2">

<tr><td></td><td>Search By Patient Name : <input type="text" name="name" id="name" required /></td>
<td align="left"><input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td></tr>


</table>
</form>

<table width="100%" cellpadding="0" cellspacing="0" border="1" id="expense_table" style="font-size:14px;">
<tr height="25px"><TH>PATIENT REG NO.</TH><TH>PATIENT NO.</TH><TH>PATIENT NAME</TH></tr>
<?php 
			  include("../db/connection.php");
			  
			   if(isset($_REQUEST['submit'])){
				$n=$_REQUEST['name'];
					
			    if($n != "")
				{
					$sq=mysqli_query($link,"select distinct a.PAT_NO,b.patientname,b.registerno from ip_pat_admit as a,patientregister as b WHERE a.pat_regno=b.registerno and patientname='$n'");
				}
			   if($sq)
			   {
			   $rows=mysqli_num_rows($sq);
			  
			  while($res=mysqli_fetch_array($sq)){
			 
			  $a = $res['PAT_NO'];
			  $h = $res['patientname'];
			  $r = $res['registerno'];
			 ?>
             <tr height="25px"><td style="text-align:center;"><input type="radio" name="empid" value="<?php echo $a ?>" onclick="javascript:showDoc(this.value);"/></td><td><?php echo $a ?></td><td><?php echo $h;?></td></tr>
             
				 <?php }
			 }
			 }
			 else{
				  $x="select distinct a.PAT_NO,b.patientname,b.registerno from ip_pat_admit as a,patientregister as b WHERE a.PAT_REGNO=b.registerno AND a.DIS_STATUS='ADMITTED' and a.PAT_NO not in (Select patno from final_bill) ";
				$sq=mysqli_query($link,$x) or die(mysqli_error($link));
	 
			if($sq){	
				$rows=mysqli_num_rows($sq);
			  
			  while($res=mysqli_fetch_array($sq)){
			 
			  $a = $res['PAT_NO'];
			  $h = $res['patientname'];
			  $r = $res['registerno'];
			 ?> 
             <tr height="25px">
			 <td style="text-align:center;">
             <input type="radio" name="empid" value="<?php echo $a ?>" onclick="javascript:showDoc(this.value);"/><?php echo $r ?></td>
			 <td><?php echo $a ?></td>
			 <td><?php echo $h;?></td>
			 </tr>
             <?php }
			 
			 }
			 }
			 ?></table>
              <?php if($rows==0){?>
	<table align="center" style="margin-left:250px;"><tr><th style="color:#FF0000; " align="center">
	<?php echo "No Records Found";}?></th></tr></table>
</body>
</html>
<?php 

}else

{

session_destroy();

session_unset();

header('Location:login.php');

}

?>